<?php


class signIn extends connection
{
    public function signIn($username, $password) //FUNCIONA
    {
        $connection = $this->connectionToDatabase();
        try {
            $existe = false;
            $ID = $this->missingId($connection);

            foreach ($connection->query("SELECT username FROM login_users.users") as $user) {
                if ($user['username'] == $username) {
                    $existe = true;
                    break;
                }
            }
            $query = "INSERT INTO login_users.users (ID, username, password) VALUES ('$ID','$username','$password')";
            if ($existe === false) {
                $connection->exec($query);
                //$connection->exec("ALTER TABLE login_users.users AUTO_INCREMENT = 1"); //just in case
                echo "Registered!";
            } else {
                echo "Este usuario existe!";
                displayForm();
            }

        } catch (PDOException $e) {
            echo "Error Sign In!";
            die();
        }
    }

    public function missingId($connection)
    {
        //$query = "SELECT ID FROM login_users.users ORDER BY ID DESC LIMIT 1";
        //$maxID = $connection->query($query)->fetch();
        $i = 1;
        foreach ($connection->query("SELECT ID FROM login_users.users") as $id) {
            if ($i == $id['ID']) {
                $i++;
            } else {
                break;
            }
        }
        return $i;
    }

}