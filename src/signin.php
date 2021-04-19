<?php
    session_start();
    require_once "connect.php";

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user =mysqli_query($connection, "SELECT * FROM `user` where `login` = '$login' and `password` = '$password'");
    if( mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "userid" => $user['userid'],
            "first_name" => $user['first_name'],
            "email" => $user['email']
        ];

        header('Location: /index.php');
    }
?>