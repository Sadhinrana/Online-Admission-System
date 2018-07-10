<?php


/*
    DB class is used for updating,quering database using PDO 
*/
class DB {

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_lastInsertedId,
            $_count = 0;
            
    
    function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password') );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    


    //if we are already connected with db then return instance or call the constructor to create an instance
    //this can help us to avoid reconcect every time
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    


    /*
        query into database
        $sql is mysql command like "SELECT {colum} FROM {table}"
        $params is an array contain searching parameters
        if command is like "SELECT {colum} FROM {table} WHERE {colum}=?" then params cntains "?"
    */
    public function query($sql, $params = array()){
        
        $this->_error = false;
        
        if( $this->_query = $this->_pdo->prepare($sql) ){
            $i = 1;
            if(count($params)){
                foreach ($params as $param){
                    $this->_query->bindValue($i, $param); //binding values if we have have multiple params
                    $i++;
                }
            }
        }
        
        if($this->_query->execute()){
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_lastInsertedId = $this->_pdo->lastInsertId();
            $this->_count = $this->_query->rowCount();
        }
        else{
            $this->_error = true; //if quering fails set error true
        }
             
        return $this;
        
    }
    


    /*
        $action = SELECT,DELETE,UPDATE etc

        $table is our desire table where we want to quering

        $where contains 'field', 'operator', and 'value' of a command. If commad is "username = something"
        then $where contains $where[0]='username',$where[1]='=',$where[2]='something'
    */
    public function action($action, $table , $where = array() ){
        if(count($where) === 3){
            $operators = array('=','>','<','>=','<=');
            
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            
            //check if it is a valid operator
            if(in_array($operator, $operators)){
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";//settings up the mysql command
                if( !$this->query($sql, array($value))->error() ){ //bonding values using query() finction
                    return $this;
                }
            }
        }
        return false; 
    }
    

    //get is used to select something. so action always SELECT
    public function get($table , $where){
        return $this->action('SELECT *', $table, $where);
    }
    

    //delete has always DELETE action
    public function delete($table , $where ){
        return $this->action('DELETE', $table, $where);
    }


    //return errors of any action
    public function error(){
        return $this->_error;
    }
    

    //return rowcount of any action
    public function count(){
        return $this->_count;
    }
    

    //if query is a single command return the only element in result
    public function first(){
        $ret = $this->results();
        return $ret[0];
    }
    

    //return the quering results
    public function results(){
        return $this->_results;
    }    

    //return the quering results
    public function getLastInsertId(){
        return $this->_lastInsertedId;
    }
    
    /*
        insert into database
        $table is the desire table where we insert something
        $fields is the columns that we insert in that table
    */
    public function insert($table, $fields = array()){
        if(count($fields)){
            $keys = array_keys($fields);
            $values = null;
            $i = 1;
            
            //creating ?,?,? for further use for binding values
            foreach ($fields as $field){
                $values .= "?";
                if($i < count($fields)){
                    $values .= ", ";
                }
                $i++;
            }
            
    
            $sql = "INSERT INTO {$table} (`".implode('`, `',$keys)."`) VALUES ({$values})";
            
            if(!$this->query($sql,$fields)->error()){
                return true;
            }
            
        }
        else{
            return false;;
        }
    }
    


    /*
        similar as insert but to update we need a id number of column that we want to update
    */
    public function update($table, $id, $fields = array()){
        $set = '';
        $i = 1;
        
        foreach ($fields as $name => $value){
            $set .= "{$name} = ?";
            if($i < count($fields)){
                $set .= ", ";
            }
            $i++;
        }
        
        $sql  = "UPDATE {$table} SET {$set} WHERE id = {$id} ";
        
        if(!$this->query($sql,$fields)->error()){
            return true;
        }
        
        return false;
    }

}

