<?php

class Database{
    // properties needed for the database
    // Following variables are set in config.php file
    private $host = DB_HOST;
    private $user = DB_USER;
    private $passwrd = DB_PSSWRD;
    private $dbName = DB_NAME;

    private $dbHandler;
    private $error;
    private $statment;

    // constructor
    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        // set options 
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRORMODE => PDO::ERRMODE_EXCEPTION
        );

        // PDO instance
        try{
            $this->dbHanlder = new PDO($dsn, $this->user, $this->passwrd, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    // query method 
    public function query($queryString){
        $this->statement = $this->dbHandler->prepare($queryString);
    }

    // bind method to bind the values
    public function bind($parameter, $value, $type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    // execute 
    public function execute(){
        return $this->statement->execute();
    }

    // geting the full result set
    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJECT);
    }

    // getting a single result
    public function resultSingle(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJECT);
    }

}



