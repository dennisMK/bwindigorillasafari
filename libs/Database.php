<?php

class Database extends PDO
{
//    public function __construct() {
//        parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
//    }
    
    private $_dbh = null;

    public function __construct() {
        $this->_dbh = PDO::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
//parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    
    public function SelectData($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
        return $sth->fetchAll();
    }   
    
    public function InsertData($table, $data) {
        ksort($data);

        $fieldNames = implode(', ', array_keys($data));
        $fieldInputs = ':' . implode(', :', array_keys($data));
        $sql_statement = "INSERT INTO $table 
                    ($fieldNames)
            VALUES  ($fieldInputs)";
        $sth = $this->prepare($sql_statement);

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
            $fieldlog .= "$key = :$value,";
        }

        $sth->execute();
        $now = date('Y-m-d H:i:s');
        $user_id = $_SESSION['uid'];

        $logdata = array(
            'log_time' => $now,
            'table_name' => $table,
            'query_executed' => $sql_statement,
            'data_set' => $fieldlog,
            'user_id' => $user_id
        );
        //$this->SystemLog($logdata);
    }
    
    public function UpdateData($table, $data, $where) {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key = :$key,";
           
        }

        $fieldDetails = rtrim($fieldDetails, ',');

        $sql_statement = "UPDATE $table SET $fieldDetails WHERE $where";

        $sth = $this->prepare($sql_statement);

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
        
    }
    
} 