<?php

session_start();
require_once "connect.php";

if(isset($_GET['item_id'])){
    $id = $_GET['item_id'];
    //$car = mysqli_query($connection, "select * from car where idcar = '$id'");

    $result = mysqli_query($connection, "select idcar, model, photo from car where idcar = '$id'");
    $row = mysqli_fetch_assoc($result); 

    $_SESSION['car'] = [
        "idcar" => $row['idcar'],
        "photo" => $row['photo'],
        "model" => $row['model']
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto</title>
    <link rel="stylesheet" href="/src/css/order.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="order-wrapper">
        <div class="order-heading">
            <h1>Confirm Your Order</h1>
        </div>
        <div class="order-info">
            <div class="order-info__car">
                <img src="<?php echo $_SESSION['car']['photo'] ?>" alt="">
            </div>
            <div class="order-info__details">
                <ul class="order-info__detail">
                    <li>
                        <h4 class="detail__heading">Car model</h4>
                        <p class="detail__text"><?php echo $_SESSION['car']['model'] ?></p>
                    </li>
                    <li>
                        <h4 class="detail__heading">Delivery Country</h4>
                        <p class="detail__text"><?php if($_SESSION['user']){ echo $_SESSION['user']['country']; } ?></p>
                    </li>
                    <li>
                        <h4 class="detail__heading">Client first name</h4>            
                        <p class="detail__text"><?php if($_SESSION['user']){ echo $_SESSION['user']['first_name']; } ?></p>  
                    </li>
                    <li>
                        <h4 class="detail__heading">Client last name</h4>
                        <p class="detail__text"><?php if($_SESSION['user']){ echo $_SESSION['user']['last_name']; } ?></p>
                    </li>
                    <li>
                        <h4 class="detail__heading">Email</h4>
                        <p class="detail__text"><?php if($_SESSION['user']){ echo $_SESSION['user']['email']; } ?></p>
                    </li>
                    <li>
                        <form action="order_confirm.php" class="form" method="post">
                            <label for="password">Password</label>
                            <input class="input" type="password" name="password" placeholder="Enter your password">
                            <button class="form__button " type="submit">Confirm</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>