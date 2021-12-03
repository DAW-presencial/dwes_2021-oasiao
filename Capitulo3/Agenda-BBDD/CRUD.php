<?php

//include 'connection.php';

class CRUD extends connection
{

    public function create($name,$lastname,$surname,$phone){
        $connection = $this->getConnection();
        try {
            $existe = false;

            foreach ($connection->query("SELECT PHONE FROM agenda.contacts") as $contact) {
                if ($contact['PHONE'] === $phone) {
                    $existe = true;
                    break;
                }
            }

            $query = "INSERT INTO agenda.CONTACTS (NAME, LASTNAME, SURNAME, PHONE) VALUES ('$name','$lastname','$surname','$phone')";
            if ($existe === false) {
                $connection->exec($query);
                echo "New contact added!";
            } else {
                echo "This contact it's already in the agenda!";
            }

        } catch (PDOException $e) {
            echo "Error in adding a new contact!";
            die();
        }
    }

    public function read(){
            $connection = $this->getConnection();
            $output = "<table border='solid'><tr>";
            $output .= "<th>Name</th><th>Lastname</th><th>Surname</th><th>Phone</th></tr>";
            foreach ($connection->query("SELECT * FROM agenda.contacts") as $contact) {
                $output .= "<tr>";
                $output .= '<th>' . $contact['NAME'] . '</th>';
                $output .= '<th>' . $contact['LASTNAME'] . '</th>';
                $output .= '<th>' . $contact['SURNAME'] . '</th>';
                $output .= '<th>' . $contact['PHONE'] . '</th>';
                $output .= "</tr>";
            }
            $output .= "</table>";
            return $output;
    }

    public function update($name,$lastname,$surname,$phone){
        $connection = $this->getConnection();
        try {
            $existe = false;

            foreach ($connection->query("SELECT * FROM agenda.contacts") as $contact) {
                if ($contact['PHONE'] === $phone || $contact['NAME'] === $name || $contact['LASTNAME'] === $lastname || $contact['SURNAME'] === $surname) {
                    $existe = true;
                    break;
                }
            }

            if($contact['PHONE'] === $phone){
                $query = "UPDATE agenda.CONTACTS SET NAME = '$name', LASTNAME = '$lastname', SURNAME = '$surname', PHONE = '$phone' WHERE PHONE = '$phone'";
            }
            else if($contact['LASTNAME'] === $lastname && $contact['SURNAME'] === $surname && $name === $contact['NAME']){
                $query = "UPDATE agenda.CONTACTS SET NAME = '$name', LASTNAME = '$lastname', SURNAME = '$surname', PHONE = '$phone' WHERE NAME = '$name' AND SURNAME = '$surname' AND LASTNAME = '$lastname'";
            }


            if ($existe === true) {
                $connection->exec($query);
                echo "UPDATED!";
            } else {
                echo "This contact doesn't exist in the agenda!";
            }

        } catch (PDOException $e) {
            echo "Error in updating contact!";
            die();
        }
    }

    public function delete($phone){
        $connection = $this->getConnection();
        try {
            $existe = false;

            foreach ($connection->query("SELECT PHONE FROM agenda.contacts") as $contact) {
                if ($contact['PHONE'] === $phone) {
                    $existe = true;
                    break;
                }
            }

            $query = "DELETE FROM CONTACTS WHERE PHONE = '$phone'";


            if ($existe === true) {
                $connection->exec($query);
                echo "ELIMINADO!";
            } else {
                echo "This contact doesn't exist in the agenda!";
            }

        } catch (PDOException $e) {
            echo "Error in updating contact!";
            die();
        }

    }


}