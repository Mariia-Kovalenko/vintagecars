<?php
session_start();
require_once "connect.php";

$carselect = mysqli_query($connection, "select idcar, model, price, mileage, photo, country.country, restor_year from car join country on car.country_idcountry = country.idcountry where car.status = 'available' limit 99");

$query = mysqli_query($connection, "select * from `car`");

function addWhere($where, $add, $other = false, $and = false)
{
    if ($where) {
        if ($other) {
            $where .= $add;
            return $where;
        }
        if ($and) $where .= " AND $add";
        else $where .= " OR $add";
    } else $where = $add;
    return $where;
}

function addBrec($where, $right, $left)
{
    // if($where){
    if ($right) $where .= "(";
    if ($left)  $where .= ")";
    //}
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
                            <li class="nav__list-item"><a class="nav__link" href="index.php">Contacts</a></li>
                        </ul>
                    </nav>
                    <div class="sign-nav">
                        <?php
                        if ($_SESSION['user']) {
                        ?>
                            <p class="sign-nav__button"><?= $_SESSION['user']['first_name'] ?></p>
                            <a class="sign-nav__button" href="/src/logout.php">Log Out</a>
                        <?php
                        } else {
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
                    <ul class="forms-wrapper">
                        <li>
                            <h3 class="column-name">Mark</h3>
                            <ul class="model-list">
                                <div>
                                    <li><input name="model[]" type="checkbox" value="AMC" />AMC</li>
                                    <li><input name="model[]" type="checkbox" value="Audi" />Audi</li>
                                    <li><input name="model[]" type="checkbox" value="BMW" />BMW </li>
                                    <li><input name="model[]" type="checkbox" value="Buick" />Buick </li>
                                    <li><input name="model[]" type="checkbox" value="Cadillac" />Cadillac </li>
                                </div>
                                <div>
                                    <li><input name="model[]" type="checkbox" value="Capri" />Capri </li>
                                    <li><input name="model[]" type="checkbox" value="Chevrolet" />Chevrolet </li>
                                    <li><input name="model[]" type="checkbox" value="Crysler" />Chrysler </li>
                                    <li><input name="model[]" type="checkbox" value="Datsun" />Datsun</li>
                                    <li><input name="model[]" type="checkbox" value="Fiat" />Fiat </li>
                                </div>
                                <div>
                                    <li><input name="model[]" type="checkbox" value="Ford" />Ford </li>
                                    <li><input name="model[]" type="checkbox" value="Honda" />Honda </li>
                                    <li><input name="model[]" type="checkbox" value="Mazda" />Mazda </li>
                                    <li><input name="model[]" type="checkbox" value="Mercury" />Mercury </li>
                                    <li><input name="model[]" type="checkbox" value="Nissan" />Nissan </li>
                                </div>
                                <div>
                                    <li><input name="model[]" type="checkbox" value="Oldsmobile" />Oldsmobile</li>
                                    <li><input name="model[]" type="checkbox" value="Opel" />Opel </li>
                                    <li><input name="model[]" type="checkbox" value="Peugeot" />Peugeot </li>
                                    <li><input name="model[]" type="checkbox" value="Plymouth" />Plymouth </li>
                                    <li><input name="model[]" type="checkbox" value="Pontiac" />Pontiac </li>
                                </div>
                                <div>
                                    <li><input name="model[]" type="checkbox" value="Renault" />Renault </li>
                                    <li><input name="model[]" type="checkbox" value="Saab" />Saab </li>
                                    <li><input name="model[]" type="checkbox" value="Toyota" />Toyota </li>
                                    <li><input name="model[]" type="checkbox" value="Volkswagen" />Volkswagen </li>
                                    <li><input name="model[]" type="checkbox" value="Volvo" />Volvo </li>
                                </div>
                            </ul>
                        </li>
                        <li>
                            <h3 class="column-name">Year</h3>
                            <ul class="checkbox-list">
                                <li><input name="age_interval[]" type="checkbox" value="1960 and 1965" />1960 - 1965</li>
                                <li><input name="age_interval[]" type="checkbox" value="1966 and 1967" />1966 - 1967</li>
                                <li><input name="age_interval[]" type="checkbox" value="1965 and 1970" />1965 - 1970</li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="column-name">Mileage</h3>
                            <ul class="checkbox-list">
                                <li><input name="miles_interval[]" type="checkbox" value="13000 and 20000" />13.000 - 20.000 m</li>
                                <li><input name="miles_interval[]" type="checkbox" value="21000 and 30000" />21.000 - 30.000 m</li>
                                <li><input name="miles_interval[]" type="checkbox" value="31000 and 40000" />31.000 - 40.000 m</li>
                                <li><input name="miles_interval[]" type="checkbox" value="41000 and 50000" />41.000 - 50.000 m</li>
                                <li><input name="miles_interval[]" type="checkbox" value="51000 and 60000" />51.000 - 60.000 m</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="form-buttons">
                        <input class="apply-button" name="filter" type="submit" value="Apply" />
                        <!-- <input class ="apply-button" name ="reset" type="reset" value="Reset"/> -->
                        <a class="apply-button" href="/src/catalogue.php"> Clear</a>
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
                    $sql = "select idcar, model, price, mileage, photo,c.country, manuf_year from car join country c on car.country_idcountry = c.idcountry";
                    $where = "";

                    if (isset($_POST['model'])) {
                        $ids = $_POST["model"];
                        if (count($ids) > 1) {
                            $where = addBrec($where, true, false);
                            foreach ($_REQUEST['model'] as $key => $value) {
                                if ($key == 0) {
                                    $where = addWhere($where, "model like '" . $value, true, false) . "%'";
                                } else $where = addWhere($where, "model like '" . $value, false, false) . "%'";
                            }
                            $where = addBrec($where, false, true);
                        } else {
                            foreach ($_REQUEST['model'] as $key => $value) {
                                $where = addWhere($where, "model like '" . $value, false, false) . "%'";
                            }
                        }
                    }

                    if (isset($_POST['age_interval'])) {
                        $ids = $_POST["age_interval"];
                        if (count($ids) > 1) {
                            if (isset($_POST['model'])){
                                $where .= " AND ";
                            }
                            $where = addBrec($where, true, false);
                            foreach ($_REQUEST['age_interval'] as $key => $value) {
                                if ($key == 0) {
                                    $where = addWhere($where, "manuf_year between " . $value, true, false) . "";
                                } else $where = addWhere($where, "manuf_year between " . $value, false, false) . "";
                            }
                            $where = addBrec($where, false, true);
                        } else {
                            foreach ($_REQUEST['age_interval'] as $key => $value) {
                                $where = addWhere($where, "manuf_year between " . $value, false, true) . "";
                            }
                        }
                    }

                    if ($_POST["miles_interval"]) {
                        $ids = $_POST["miles_interval"];
                        if (count($ids) > 1) {
                            if (isset($_POST['age_interval'])){
                                $where .= " AND ";
                            }
                            $where = addBrec($where, true, false);
                            foreach ($_REQUEST['miles_interval'] as $key => $value) {
                                if ($key == 0) {
                                    $where = addWhere($where, "mileage between " . $value, true, false) . "";
                                } else $where = addWhere($where, "mileage between " . $value, false, false) . "";
                            }
                            $where = addBrec($where, false, true);
                        } else {
                            foreach ($_REQUEST['miles_interval'] as $key => $value) {
                                $where = addWhere($where, "mileage between " . $value, false, true) . "";
                            }
                        }
                    }
                    
                    if ($where) {
                        $sql .= " WHERE $where  AND car.status = 'available'";
                    } else {
                        $sql .= " WHERE ";
                    }
                    //echo '<h4>???????????????? ?????????? SQL ????????????:</h4>' . $sql;

                    $res =  mysqli_query($connection, $sql);
                    if(!mysqli_fetch_assoc($res)) echo "no cars corresponding your requirements";
                    else
                    while ($car = mysqli_fetch_assoc($res)) {
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
                                <li><?php echo $car['manuf_year']; ?></li>
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
                        <li class="nav__list-item"><a class="nav__link" href="catalogue.php">Catalogue</a></li>
                        <li class="nav__list-item"><a class="nav__link" href="suppliers.php">Suppliers</a></li>
                        <li class="nav__list-item"><a class="nav__link" href="index.php">Contacts</a></li>
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