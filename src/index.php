<?php
session_start();
require_once "connect.php";

$carselect = mysqli_query($connection, "select idcar, model, price, photo, mileage, country.country, restor_year from car join country on car.country_idcountry = country.idcountry limit 9");
$supplierselect = mysqli_query($connection, "select logo from supplier limit 6");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto</title>
    <link rel="stylesheet" href="/src/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
   
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="logo"><a href="index.php"><img src="/src/img/Logo.svg" height="40px" alt="logo"></a></div>
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__list-item"><a class="nav__link" href ="catalogue.php">Catalogue</a></li>
                        <li class="nav__list-item"><a class="nav__link" href ="supplier.php">Suppliers</a></li>
                        <li class="nav__list-item"><a class="nav__link" href ="#">Contacts</a></li>
                    </ul>      
                </nav>
                <div class="sign-nav">
                    <?php
                    if($_SESSION['user']){
                        ?>
                        <p class="sign-nav__button" ><?= $_SESSION['user']['first_name'] ?></p>
                        <a class="sign-nav__button" href="/src/logout.php">Log Out</a>
                   <?php
                    }else {
                    ?>
                    <a class="sign-nav__button" href="/src/register.php">Sign Up</a>
                    <a class="sign-nav__button" href="/src/authorize.php">Log In</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>


<main class ="main">
    <div class="intro">
        <div class="container">
            <div class="intro__inner">
                <h1 class ="heading">Best Retro Cars for Everyone</h1>
                <h2 class ="post-heading">Order your first car with 20% discount</h2>
                <a href="catalogue.php" class="button">Browse Cars</a>
            </div>
        </div>
    </div>

    <div class="catalogue">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__text">Catalogue</h2>
            </div>
            <div class="catalogue__items">
            <?php
            while($cars = mysqli_fetch_assoc($carselect)){

            ?>
                <div class="catalogue__item">
                    <div class="item__image">
                    <img src="<?php if($cars['photo'] == NULL) {echo "/src/img/cars/car-default.jpg"; } else echo $cars['photo']; ?>" width="340px" alt="car">
                    </div>
                    <p class="item__name"><?php echo $cars['model']; ?></p>
                    <ul class="item__desc">
                        <li><?php echo $cars['price']; ?></li>
                        <li><?php echo $cars['mileage']; ?> miles</li>
                        <li><?php echo $cars['country']; ?></li>
                        <li><?php echo $cars['restor_year']; ?></li>
                    </ul>
                    <a href="item.php?item_id=<?= $cars['idcar']?>" class="more-button">More</a>
                </div>
                <?php
            }
            ?>
            </div>
            <div class="button-block">
                <a href="catalogue.php" class="button">All Cars</a>
            </div>
        </div>
    </div>

    <div class="suppliers">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__text white">Suppliers</h2>
            </div>
            <div class="suppliers-container">
            <?php
            while($supplier = mysqli_fetch_assoc($supplierselect)){
            ?>
                <div class="supplier__item"><img src="<?php if($supplier['logo'] == NULL) {echo "no logo"; } else echo $supplier['logo']; ?>" alt="logo" class="supplier__logo"></div>
                <?php
            }
            ?>
            </div>
            <div class="button-block">
                <a href="catalogue.php" class="button">View All</a>
            </div>        
        </div>
    </div>

    <div class="contacts">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__text">Contacts</h2>
            </div>
            <div class="contacts-container">
                <div class="adress">
                    <ul class="adress__links">
                        <li>230 Old Maitland Road, HEXHAM NSW 2322</li>
                        <li>bestautosales@auctions.com</li>
                    </ul>
                </div>
                <div class="social-media">
                    <div class="social-media__text">Find us on social media</div>
                    <div class="social-media__items">
                        <a href="" class="social-media__item"><img src="/src/icons/facebook.svg" height="55px" alt=""></a>
                        <a href="" class="social-media__item"><img src="/src/icons/twitter.svg" height="55px" alt=""></a>
                        <a href="" class="social-media__item"><img src="/src/icons/youtube-logotype.svg" height="55px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer__inner">
                <div class="logo"><a href="#"><img src="/src/img/Logo.svg" height="50px" alt="logo"></a></div>
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__list-item"><a class="nav__link" href ="catalogue.php">Catalogue</a></li>
                        <li class="nav__list-item"><a class="nav__link" href ="supplier.php">Suppliers</a></li>
                        <li class="nav__list-item"><a class="nav__link" href ="index.php">Contacts</a></li>
                    </ul>      
                </nav>
            </div>
            <h4 class="copyright">
                BestAuto 2012 - 2021. All Rights Reserved
            </h4>
        </div>
    </footer>
</body>
</html>