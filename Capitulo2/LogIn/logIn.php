<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
if (isset($_POST['logIn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $values = connectionToDatabase();
    logIn($values, $username, $password);
} else if (isset($_POST['signIn'])) {
    $user = $_POST['new_username'];
    $pass = $_POST['new_password'];
    signIn($user, $pass);
} else {
    displayForm();
}
function displayForm()
{
    ?>
    <h1>Log In</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Username"/>
        <input type="text" name="password" placeholder="Password"/>
        <input type="submit" name="logIn" value="Log In"/>
    </form>

    <h1>Sign In</h1>
    <form method="post">
        <input type="text" name="new_username" placeholder="Username"/>
        <input type="text" name="new_password" placeholder="Password"/>
        <input type="submit" name="signIn" value="Sign In"/>
    </form>

    <?php
}

function connectionToDatabase()
{
    try {
        $connection = new PDO('mysql:host=localhost;dbname=logIn_users', 'root', 'root');

        foreach ($connection->query("SELECT username,password FROM login_users.users") as $values) {
            print_r($values['username'], $values['password']);
            return $values;
        }

    } catch (PDOException $e) {
        echo "Error!";
        die();
    }
}

function logIn($values, $username, $password)
{
    if ($username == $values['username'] && $password == $values['password']) {
        echo "LOG IN!";
    } else {
        if ($username != $values['username']) {
            echo "Usuario incorrecto!";
        } else if ($password != $values['password']) {
            echo "Password incorrecto!";
        }
    }
}

function signIn($username, $password)
{
    try {
        $existe = false;
        $connection = new PDO('mysql:host=localhost;dbname=logIn_users', 'root', 'root');
        $sql = "INSERT INTO login_users.users (username, password) VALUES ('$username','$password')";

        foreach ($connection->query("SELECT username FROM login_users.users") as $user) {
            if ($user['username'] == $username) {
                $existe = true;
                break;
            }
        }

        if ($existe === false) {
            $connection->exec($sql);
            $connection->exec("ALTER TABLE login_users.users AUTO_INCREMENT = 1"); //just in case
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


?>

</body>
</html>
