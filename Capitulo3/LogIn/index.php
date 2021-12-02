<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>myLogInSystem</title>
</head>
<body>
<?php
include 'connection.php';
include 'logInSystem.php';
include 'signIn.php';
include 'users.php';

$logIn = new logInSystem();
$signIn = new signIn();
$users = new users();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (isset($_POST['logIn'])) {
        if ($logIn->logIn($username,$password)){
            echo "Logged In!";
            logOut();
        }
        else {
            echo "Error! Try again!";
            back();
        }


    } else if (isset($_POST['signIn'])) {
        $signIn -> signIn($username, $password);
        back();

    } else if (isset($_POST['users'])) {
        echo $users -> echoUsers();
        back();

    } else if (isset($_POST['back'])) {
        displayForm();

    } else if (isset($_POST['delete'])) {
        $users->deleteUser($username, $password);
        displayForm();
    }
    else if (isset($_POST['logout'])){
        $logIn->logOut($username);
        displayForm();
        var_dump($_COOKIE["login"]);
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
}

function back()
{?>
    <form method="post">
        <input type="submit" name="back" value="Go back"/>
    </form>
<?php
}

function logOut()
{
?>
<form method="post">
    <input type="submit" name="logout" value="Log out"/>
</form>
<?php
}
?>



</body>
</html>
