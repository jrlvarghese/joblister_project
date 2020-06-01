<?php

class Database{
    // properties needed for the database
    // Following variables are set in config.php file
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PSSWRD;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;
    private $stmt;

    // constructor
    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;
        // set options 
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    // query method 
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // bind method to bind the values
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int ( $value ) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool ( $value ) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null ( $value ) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
}
    // execute 
    public function execute(){
        return $this->stmt->execute();
    }

    // geting the full result set
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // getting a single result
    public function resultSingle(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

}



