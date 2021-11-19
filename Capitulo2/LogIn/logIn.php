<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LogIn</title>
</head>
<body>
<?php

$connection = connectionToDatabase();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['logIn'])) {
        logIn($connection, $username, $password);
        back();

    } else if (isset($_POST['signIn'])) {
        signIn($connection, $username, $password);
        back();

    } else if (isset($_POST['users'])) {
        echo users($connection);
        back();

    } else if (isset($_POST['back'])) {
        displayForm();

    } else if (isset($_POST['delete'])) {
        deleteUser($connection, $username, $password);
        displayForm();
    }
} else {
    displayForm();
}
function displayForm()
{
    ?>
    <h1>Log In / Register / Delete / Show</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" name="logIn" value="Log In"/>
        <input type="submit" name="signIn" value="Register"/>
        <input type="submit" name="delete" value="Delete"/>
        <input type="submit" name="users" value="Show all users"/>
    </form>

    <?php
} //OK!

function back()
{
    ?>
    <form method="post">
        <input type="submit" name="back" value="Go back"/>
    </form>
    <?php
} //OK!

function connectionToDatabase()
{
    try {
        $connection = new PDO('mysql:host=localhost;dbname=logIn_users', 'root', 'root');
        return $connection;

    } catch (PDOException $e) {
        echo "Error!";
        die();
    }
} //OK!

function logIn($connection, $username, $password)
{
    $logIn = false;
    foreach ($connection->query("SELECT username,password FROM login_users.users") as $values) {
        if ($username == $values['username'] && $password == $values['password']) {
            $logIn = true;
            break;
        }
    }

    if ($logIn) {
        echo "Log In con exito!";
    } else {
        echo "Vuelve a intentarlo!";
    }
} //FUNCIONA

function signIn($connection, $username, $password) //FUNCIONA
{
    try {
        $existe = false;
        $ID = missingId($connection);
        $query = "INSERT INTO login_users.users (ID, username, password) VALUES ('$ID','$username','$password')";

        foreach ($connection->query("SELECT username FROM login_users.users") as $user) {
            if ($user['username'] == $username) {
                $existe = true;
                break;
            }
        }

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

function users($connection)
{
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
} //FUNCIONA

function deleteUser($connection, $username, $password) //FUNCIONA
{
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

function missingId($connection)
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

?>

</body>
</html>
