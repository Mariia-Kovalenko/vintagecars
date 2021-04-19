<?php
session_start();
require_once "connect.php";

$carselect = mysqli_query($connection, "select idcar, model, price, mileage, country.country, restor_year from car join country on car.country_idcountry = country.idcountry limit 9");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestAuto</title>
    <link rel="stylesheet" href="/src/css/styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <header class="other-header">
                <div class="header__inner">
                    <div class="logo"><a href="index.php"><img src="/src/img/Logo.svg" height="40px" alt="logo"></a></div>
                    <nav class="nav">
                        <ul class="nav__list">
                            <li class="nav__list-item"><a class="nav__link" href="#">Catalogue</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Suppliers</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Contacts</a></li>
                        </ul>
                    </nav>
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

                <div class="forms-wrapper">

                    <form action="" method="post">
                        <h3 class="column-name">Mark</h3>
                        <div class="form-marks">
                            <ul class="car-marks">
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">AMC</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Audi</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">BMW</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Buick</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Cadillac</label>
                                </li>
                            </ul>

                            <ul class="car-marks">
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Capri</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Chevrolet</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Chrysler</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Datsun</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Dodge</label>
                                </li>
                            </ul>
                            <ul class="car-marks">
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Fiat</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Ford</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Honda</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Mazda</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Mercury</label>
                                </li>
                            </ul>
                            <ul class="car-marks">
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Nissan</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Oldsmobile</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Opel</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Peugeot</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Plymouth</label>
                                </li>
                            </ul>
                            <ul class="car-marks">
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Pontiac</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Renault</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Saab</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Toyota</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Volkswagen</label>
                                </li>
                            </ul>
                            <ul class="car-marks">
                                <li>
                                    <input type="checkbox" id="mark" name="car_mark">
                                    <label for="mark">Volvo</label>
                                </li>
                            </ul>
                        </div>
                    </form>

                    <form action="" method="post">
                        <h3 class="column-name">Year</h3>
                        <div class="form-years">
                            <ul class="car-years">
                                <li>
                                    <input type="checkbox" id="year" name="car_year">
                                    <label for="year">1960-1965</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="year" name="car_year">
                                    <label for="year">1966-1970</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="year" name="car_year">
                                    <label for="year">1971-1975</label>
                                </li>
                            </ul>
                        </div>
                    </form>

                    <form action="" method="post">
                        <h3 class="column-name">Mileage</h3>
                        <div class="form-mileages">
                            <ul class="car-mileages">
                                <li>
                                    <input type="checkbox" id="mileage" name="car_mileage">
                                    <label for="mileage">1960-1965</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mileage" name="car_mileage">
                                    <label for="mileage">1966-1970</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="mileage" name="car_mileage">
                                    <label for="mileage">1971-1975</label>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <input class="apply-button" name="filter" type="submit" value="Apply"/>
            </div>
        </div>
    </div>

    <div class="catalogue catalogue-list">
        <div class="container">
            <div class="catalogue__items">
                <div class="catalogue__item">
                    <div class="item__img"><img src="/src/img/cars/Ford Torino.jpg" width="340px" alt="car"></div>
                    <p class="item__name">Ford Torino</p>
                    <ul class="item__desc">
                        <li>10564</li>
                        <li>140 miles</li>
                        <li>USA</li>
                        <li>2015</li>
                    </ul>
                    <a href="#" class="more-button">More</a>
                </div>
                <div class="catalogue__item">
                    <div class="item__img"><img src="/src/img/cars/chevrolet Impala.jpg" width="340px" alt="car"></div>
                    <p class="item__name">Chevrolet Impala</p>
                    <ul class="item__desc">
                        <li>10264</li>
                        <li>220 miles</li>
                        <li>USA</li>
                        <li>2014</li>
                    </ul>
                    <a href="#" class="more-button">More</a>
                </div>
                <div class="catalogue__item">
                    <div class="item__img"><img src="/src/img/cars/plymouth fury.jpg" width="340px" alt="car"></div>
                    <p class="item__name">Plymouth Fury iii</p>
                    <ul class="item__desc">
                        <li>9201</li>
                        <li>215 miles</li>
                        <li>USA</li>
                        <li>2010</li>
                    </ul>
                    <a href="#" class="more-button">More</a>
                </div>

                <div class="catalogue__item">
                    <div class="item__img"><img src="/src/img/cars/Ford Torino.jpg" width="340px" alt="car"></div>
                    <p class="item__name">Ford Torino</p>
                    <ul class="item__desc">
                        <li>10564</li>
                        <li>140 miles</li>
                        <li>USA</li>
                        <li>2015</li>
                    </ul>
                    <a href="#" class="more-button">More</a>
                </div>
                <div class="catalogue__item">
                    <div class="item__img"><img src="/src/img/cars/chevrolet Impala.jpg" width="340px" alt="car"></div>
                    <p class="item__name">Chevrolet Impala</p>
                    <ul class="item__desc">
                        <li>10264</li>
                        <li>220 miles</li>
                        <li>USA</li>
                        <li>2014</li>
                    </ul>
                    <a href="#" class="more-button">More</a>
                </div>
                <div class="catalogue__item">
                    <div class="item__img"><img src="/src/img/cars/plymouth fury.jpg" width="340px" alt="car"></div>
                    <p class="item__name">Plymouth Fury iii</p>
                    <ul class="item__desc">
                        <li>9201</li>
                        <li>215 miles</li>
                        <li>USA</li>
                        <li>2010</li>
                    </ul>
                    <a href="#" class="more-button">More</a>
                </div>
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