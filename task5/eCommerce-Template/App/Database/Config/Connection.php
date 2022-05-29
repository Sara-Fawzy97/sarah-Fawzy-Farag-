<?php
 namespace App\Database\Config;

use mysqli;

class Connection {
       
    private string $host='localhost';
    private string $userName='root';
    private string $password='';
    private string $dbName='x';
    private  $dbPort=3307;
    public \mysqli $con;

    public function __construct()
    {
       $this->con= new \mysqli($this->host,$this->userName,$this->password,$this->dbName,$this->dbPort);
        
    }

    public function __destruct()
    {
        $this->con->close();
    }
    
}