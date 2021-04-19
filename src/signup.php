<?php
    session_start();
    require_once "connect.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);
    mysqli_query($connection, "INSERT INTO `user` (`userid`, `first_name`, `last_name`, `age`, `photo`, `login`, `password`) VALUES (NULL, '$first_name', '$last_name', NULL, NULL, '$login', '$password')");

    $_SESSION['message'] ='Registration successful';
    header('Location: /authorize.php');
?>
