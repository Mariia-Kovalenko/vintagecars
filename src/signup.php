<?php
    session_start();
    require_once "connect.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $login = $_POST['login'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);
    mysqli_query($connection, "INSERT INTO `clients`(`idclient`, `first_name`, `last_name`, `email`, `login`, `password`, `country_idcountry`) VALUES (NULL, '$first_name', '$last_name', '$email', '$login', '$password', (select idcountry from country where country = '$country'))");

    $_SESSION['message'] ='Registration successful';
    header('Location: /src/authorize.php');
?>