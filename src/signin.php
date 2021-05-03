<?php
    session_start();
    require_once "connect.php";

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user =mysqli_query($connection, "SELECT idclient, first_name, last_name, login, email, password, c.country FROM `clients`, `country` c where `login` = '$login' and `password` = '$password'");
    if( mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "userid" => $user['idclient'],
            "ulogin" => $user['login'],
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "email" => $user['email'],
            "country" => $user['country']
        ];

        header('Location: /src/index.php');
    }else{
        echo 'Wrong login or/and password';
    }
?>