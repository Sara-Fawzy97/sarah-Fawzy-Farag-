<?php

namespace App\Database\Config;

class Connection
{

    private string $host = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $dbName = 'ecommerce';
    public \mysqli $con;

    public function __construct()
    {

        $this->con = new \mysqli($this->host, $this->username, $this->password, $this->dbName);
    }


    public function __destruct()
    {
        $this->con->close();
    }
}
