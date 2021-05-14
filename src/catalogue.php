<?php
session_start();
require_once "connect.php";

$carselect = mysqli_query($connection, "select idcar, model, price, mileage, photo, country.country, restor_year from car join country on car.country_idcountry = country.idcountry where car.status = 'available' limit 99");

$query = mysqli_query($connection, "select * from `car`");

function addWhere($where, $add, $and = false)
{
    if ($where) {
        if ($and) $where .= " AND $add";
        else $where .= " OR $add";
    } else $where = $add;
    return $where;
}

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
    <div class="wrapper">
        <div class="container">
            <header class="other-header">
                <div class="header__inner">
                    <div class="logo"><a href="index.php"><img src="/src/img/Logo.svg" height="40px" alt="logo"></a></div>
                    <nav class="nav">
                        <ul class="nav__list">
                            <li class="nav__list-item"><a class="nav__link" href="catalogue.php">Catalogue</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="supplier.php">Suppliers</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Contacts</a></li>
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
            </header>
            <div class="section-heading">
                <h2 class="section-heading__text white">Catalogue</h2>
            </div>
            <div class="filter-block">
                <div class="filter-heading">
                    <img src="/src/icons/filter.svg" height="25px" alt="filter">
                    <p class="filter__text">Filter</p>
                </div>

                    <form action="" method="post">
                        <ul class ="forms-wrapper">
                            <li>
                                <h3 class="column-name">Mark</h3>
                                <ul class ="model-list">
                                    <div>
                                    <li><input name="model1" type="checkbox" value="AMC" />AMC</li>
                                    <li><input name="model2" type="checkbox" value="Audi" />Audi</li>
                                    <li><input name="model3" type="checkbox" value="BMW" />BMW </li>
                                    <li><input name="model4" type="checkbox" value="Buick" />Buick </li>
                                    <li><input name="model5" type="checkbox" value="Cadillac" />Cadillac </li>
                                    </div>
                                    <div>
                                    <li><input name="model6" type="checkbox" value="Capri" />Capri </li>
                                    <li><input name="model7" type="checkbox" value="Chevrolet" />Chevrolet </li>
                                    <li><input name="model8" type="checkbox" value="Crysler" />Chrysler </li>
                                    <li><input name="model9" type="checkbox" value="Datsun" />Datsun</li>
                                    <li><input name="model10" type="checkbox" value="Fiat" />Fiat </li>
                                    </div>
                                    <div>
                                    <li><input name="model11" type="checkbox" value="Ford" />Ford </li>
                                    <li><input name="model12" type="checkbox" value="Honda" />Honda </li>
                                    <li><input name="model13" type="checkbox" value="Mazda" />Mazda </li>
                                    <li><input name="model14" type="checkbox" value="Mercury" />Mercury </li>
                                    <li><input name="model15" type="checkbox" value="Nissan" />Nissan </li>
                                    </div>
                                    <div>
                                    <li><input name="model16" type="checkbox" value="Oldsmobile" />Oldsmobile</li>
                                    <li><input name="model17" type="checkbox" value="Opel" />Opel </li>
                                    <li><input name="model18" type="checkbox" value="Peugeot" />Peugeot </li>
                                    <li><input name="model19" type="checkbox" value="Plymouth" />Plymouth </li>
                                    <li><input name="model20" type="checkbox" value="Pontiac" />Pontiac </li>
                                    </div>
                                    <div>
                                    <li><input name="model21" type="checkbox" value="Renault" />Renault </li>
                                    <li><input name="model22" type="checkbox" value="Saab" />Saab </li>
                                    <li><input name="model23" type="checkbox" value="Toyota" />Toyota </li>
                                    <li><input name="model24" type="checkbox" value="Volkswagen" />Volkswagen </li>
                                    <li><input name="model25" type="checkbox" value="Volvo" />Volvo </li>
                                    </div>
                                </ul>
                            </li>
                            <li >
                                <h3 class="column-name">Year</h3>
                                <ul class ="checkbox-list">
                                    <li><input name="age_interval1" type="checkbox" value="1960 and 1965" />1960 - 1965</li>
                                    <li><input name="age_interval2" type="checkbox" value="1966 and 1967" />1966 - 1967</li>
                                    <li><input name="age_interval3" type="checkbox" value="1965 and 1970" />1965 - 1970</li>
                                </ul>
                            </li>
                            <li>
                                <h3 class="column-name">Mileage</h3>
                                <ul class ="checkbox-list">
                                    <li><input name="miles_interval1" type="checkbox" value="13000 and 20000" />13.000 - 20.000 m</li>
                                    <li><input name="miles_interval2" type="checkbox" value="21000 and 30000" />21.000 - 30.000 m</li>
                                    <li><input name="miles_interval3" type="checkbox" value="31000 and 40000" />31.000 - 40.000 m</li>
                                    <li><input name="miles_interval3" type="checkbox" value="41000 and 50000" />41.000 - 50.000 m</li>
                                    <li><input name="miles_interval3" type="checkbox" value="51000 and 60000" />51.000 - 60.000 m</li>
                                </ul>
                            </li>
                        </ul>
                        <div class="form-buttons">
                            <input class ="apply-button" name="filter" type="submit" value="Apply" />
                            <!-- <input class ="apply-button" name ="reset" type="reset" value="Reset"/> -->
                            <a class ="apply-button" href ="/src/catalogue.php">  Clear</a>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>


    <div class="catalogue catalogue-list">
        <div class="container">
            <div class="catalogue__items">
                <?php

                if (!empty($_POST["filter"])) {
                    $sql = "select * from `car`";
                    $where = "";

                    if ($_POST["model1"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model1"]), false) . "%'";
                    }
                    if ($_POST["model2"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model2"]), false) . "%'";
                    }
                    if ($_POST["model3"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model3"]), false) . "%'";
                    }
                    if ($_POST["model4"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model4"]), false) . "%'";
                    }
                    if ($_POST["model5"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model5"]), false) . "%'";
                    }
                    if ($_POST["model6"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model6"]), false) . "%'";
                    }
                    if ($_POST["model7"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model7"]), false) . "%'";
                    }
                    if ($_POST["model8"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model8"]), false) . "%'";
                    }
                    if ($_POST["model9"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model9"]), false) . "%'";
                    }
                    if ($_POST["model10"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model10"]), false) . "%'";
                    }
                    if ($_POST["model11"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model11"]), false) . "%'";
                    }
                    if ($_POST["model12"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model12"]), false) . "%'";
                    }
                    if ($_POST["model13"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model13"]), false) . "%'";
                    }
                    if ($_POST["model14"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model14"]), false) . "%'";
                    }
                    if ($_POST["model15"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model15"]), false) . "%'";
                    }
                    if ($_POST["model16"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model16"]), false) . "%'";
                    }
                    if ($_POST["model17"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model17"]), false) . "%'";
                    }
                    if ($_POST["model18"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model18"]), false) . "%'";
                    }
                    if ($_POST["model19"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model19"]), false) . "%'";
                    }
                    if ($_POST["model20"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model20"]), false) . "%'";
                    }
                    if ($_POST["model21"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model21"]), false) . "%'";
                    }
                    if ($_POST["model22"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model22"]), false) . "%'";
                    }
                    if ($_POST["model23"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model23"]), false) . "%'";
                    }
                    if ($_POST["model24"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model24"]), false) . "%'";
                    }
                    if ($_POST["model25"]) {
                        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model25"]), false) . "%'";
                    }

                    if ($_POST["age_interval1"]) {
                        $where = addWhere($where, "manuf_year between " . htmlspecialchars($_POST["age_interval1"]), true) . "";
                    }
                    if ($_POST["age_interval2"]) {
                        $where = addWhere($where, "manuf_year between " . htmlspecialchars($_POST["age_interval2"]), true) . "";
                    }
                    if ($_POST["age_interval3"]) {
                        $where = addWhere($where, "manuf_year between " . htmlspecialchars($_POST["age_interval3"]), true) . "";
                    }

                    if ($_POST["miles_interval1"]) {
                        $where = addWhere($where, "mileage between " . htmlspecialchars($_POST["miles_interval1"]), true) . "";
                    }
                    if ($_POST["miles_interval2"]) {
                        $where = addWhere($where, "mileage between " . htmlspecialchars($_POST["miles_interval2"]), true) . "";
                    }
                    if ($_POST["miles_interval3"]) {
                        $where = addWhere($where, "mileage between " . htmlspecialchars($_POST["miles_interval3"]), true) . "";
                    }
                    if ($_POST["miles_interval4"]) {
                        $where = addWhere($where, "mileage between " . htmlspecialchars($_POST["miles_interval4"]), true) . "";
                    }
                    if ($_POST["miles_interval5"]) {
                        $where = addWhere($where, "mileage between " . htmlspecialchars($_POST["miles_interval5"]), true) . "";
                    }
                    if ($where) {
                        $sql .= " WHERE $where  and car.status = 'available'";
                    } else {
                        $sql .= " WHERE ";
                    }
                    echo '<h4>Получили такой SQL запрос:</h4>' . $sql;

                    $res =  mysqli_query($connection, $sql);
                    while($car = mysqli_fetch_assoc($res)){
                    ?>
                    <div class="catalogue__item">
                            <div class="item__image">
                                <img src="<?php if ($car['photo'] == NULL) {
                                                echo "/src/img/cars/car-default.jpg";
                                            } else echo $car['photo']; ?>" width="340px" alt="car">
                            </div>
                            <p class="item__name"><?php echo $car['model']; ?></p>
                            <ul class="item__desc">
                                <li><?php echo $car['price']; ?></li>
                                <li><?php echo $car['mileage']; ?> miles</li>
                                <li><?php echo $car['country']; ?></li>
                                <li><?php echo $car['restor_year']; ?></li>
                            </ul>
                            <a href="item.php?item_id=<?= $car['idcar'] ?>" class="more-button">More</a>
                        </div> 
                <?php
                }
                } else {
                    while ($cars = mysqli_fetch_assoc($carselect)) {

                ?>
                        <div class="catalogue__item">
                            <div class="item__image">
                                <img src="<?php if ($cars['photo'] == NULL) {
                                                echo "/src/img/cars/car-default.jpg";
                                            } else echo $cars['photo']; ?>" width="340px" alt="car">
                            </div>
                            <p class="item__name"><?php echo $cars['model']; ?></p>
                            <ul class="item__desc">
                                <li><?php echo $cars['price']; ?></li>
                                <li><?php echo $cars['mileage']; ?> miles</li>
                                <li><?php echo $cars['country']; ?></li>
                                <li><?php echo $cars['restor_year']; ?></li>
                            </ul>
                            <a href="item.php?item_id=<?= $cars['idcar'] ?>" class="more-button">More</a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer__inner">
                <div class="logo"><a href="#"><img src="/src/img/Logo.svg" height="50px" alt="logo"></a></div>
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__list-item"><a class="nav__link" href="#">Catalogue</a></li>
                        <li class="nav__list-item"><a class="nav__link" href="#">Suppliers</a></li>
                        <li class="nav__list-item"><a class="nav__link" href="#">Contacts</a></li>
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