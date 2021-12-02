<?php


class users extends connection
{
    public function echoUsers(){
        $connection = $this->connectionToDatabase();
        $output = "<table border='solid'><tr>";
        $output .= "<th>ID</th><th>Username</th><th>Password</th></tr>";

        foreach ($connection->query("SELECT * FROM login_users.users") as $user) {
            $output .= "<tr>";
            $output .= '<th>' . $user['ID'] . '</th>';
            $output .= '<th>' . $user['username'] . '</th>';
            $output .= '<th>' . $user['password'] . '</th>';
            $output .= "</tr>";
        }
        $output .= "</table>";
        return $output;
    }

    public function deleteUser($username, $password) //FUNCIONA
    {
        $connection = $this->connectionToDatabase();
        try {
            if ($connection->exec("DELETE FROM login_users.users WHERE username = '$username' and password='$password'") == TRUE) {
                echo "User $username deleted!";
            } else {
                echo "Try again! The username or password are wrong!";
            }

        } catch (PDOException $e) {
            echo "Error deleting!";
            die();
        }
    }


}