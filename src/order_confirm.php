<?php
session_start();
require_once "connect.php";

$date = '2021-02-02';
$idclient = $_SESSION['user']['userid'];
$idcar = $_SESSION['car']['idcar'];

$password = md5($_POST['password']);

$check_user =mysqli_query($connection, "SELECT idclient, first_name, last_name, login, email, password, c.country FROM `clients`, `country` c where `password` = '$password'");

if( mysqli_num_rows($check_user) > 0){
    $user = mysqli_fetch_assoc($check_user);
    mysqli_query($connection, 
    "INSERT INTO `orders`(`idorder`, `date`, `clients_idclient`, `car_idcar`, `car_supplier_idsupplier`, `car_country_idcountry`) VALUES (NULL, '$date',
(select idclient from clients where idclient = '$idclient'), 
(select idcar from car where idcar = '$idcar'), 
(select supplier_idsupplier from car where idcar = '$idcar'), 
(select country_idcountry from car where idcar = '$idcar'))");

mysqli_query($connection, "UPDATE `car` SET `Status` = 'ordered' WHERE `idcar` = '$idcar'");

  $_SESSION['message'] ='successful';
  header('Location: /src/catalogue.php');
}else{
    echo 'no user found';
}

?>