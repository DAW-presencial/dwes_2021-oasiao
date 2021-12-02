<?php


class connection
{
    protected function connectionToDatabase(){
        $host = 'localhost';
        $dbname = 'logIn_users';
        $username = 'root';
        $password = 'root';
        try{
            $connection = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
            return $connection;
        }catch (PDOException $e){
            echo "ERROR!";
            die();
        }
    }
}