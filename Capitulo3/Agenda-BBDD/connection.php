<?php


class connection
{
    private $host = 'localhost';
    private $dbname = 'agenda';
    private $username= 'root';
    private $password = 'root';


    public function __construct(){}

    public function getConnection(){

        try{
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->username","$this->password");
            return $connection;

        }catch (PDOException $e){
            echo "ERROR!";
            die();
        }
    }
}