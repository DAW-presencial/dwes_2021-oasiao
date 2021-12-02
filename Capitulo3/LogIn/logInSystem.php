<?php


class logInSystem extends connection
{
    public function logIn($username,$password){
        $connection = $this->connectionToDatabase();
        $loggedIn = false;
        foreach ($connection->query("SELECT username,password FROM login_users.users") as $values)
        {
            if ($username === $values['username'] && $password === $values['password']) {
                $loggedIn = true;
                $this->cookie($username);
                //var_dump($_COOKIE["login"]);
                break;
            }
        }
        return $loggedIn;
    }

    public function cookie($username){
        //if (($_COOKIE['login'])){
            session_start();
            $_SESSION['login']=$username;
            var_dump($_COOKIE["login"]);
            setcookie('login',$username,time()+3600); //(nombre de la cookie, valor de la cookie, caducidad [en este caso, 3600s === 1h)
        //}
    }

    public function logOut($username){
        if (isset($_COOKIE['login'])){
            setcookie('login',$username,-1);
            unset($_COOKIE['login']);
            session_unset();
            session_destroy();
        }


    }
}