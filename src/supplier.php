<?php
session_start();
require_once "connect.php";

$supplierselect = mysqli_query($connection, "select s.logo, s.describtion, c.country, s.year from supplier s, country c where s.country_idcountry = c.idcountry limit 9");
$query = mysqli_query($connection, "select * from `supplier`");

$sqlfrocarfilter = "SELECT supplier.logo, supplier.describtion, supplier.country_idcountry, supplier.year, car.model, car.supplier_idsupplier FROM `supplier`, `car` WHERE car.model like 'AMC%' and car.supplier_idsupplier = idsupplier";
$sqlcarfilter = "SELECT distinct s.logo, s.describtion, s.country_idcountry, s.yearfrom supplier s join car c on s.idsupplier = c.supplier_idsupplier where c.model like 'ford%'";
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

    <div class="page-wrapper">

    <div class="wrapper">
        <div class="container">
            <header class="other-header">
                <div class="header__inner">
                    <div class="logo"><a href="index.php"><img src="/src/img/Logo.svg" height="40px" alt="logo"></a></div>
                    <nav class="nav">
                        <ul class="nav__list">
                            <li class="nav__list-item"><a class="nav__link" href="catalogue.php">Catalogue</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Suppliers</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="section-heading">
                <h2 class="section-heading__text white">Suppliers</h2>
            </div>
            <div class="filter-block">
                <div class="filter-heading">
                    <img src="/src/icons/filter.svg" height="25px" alt="filter">
                    <p class="filter__text">Filter</p>
                </div>

                    <form action="" method="post">
                        <ul class ="forms-wrapper suppliers-form">
                            <li class="columns">
                                <h3 class="column-name">Car Marks Provided</h3>
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
                                    <li><input name="model8" type="checkbox" value="Chrysler" />Chrysler </li>
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
                                <h3 class="column-name">Supplier Country</h3>
                                <ul class ="checkbox-list">
                                    <li><input name="country1" type="checkbox" value="US" />US</li>
                                    <li><input name="country2" type="checkbox" value="Germany" />Germany</li>
                                    <li><input name="country3" type="checkbox" value="Japan" />Japan</li>
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

    <main class="main">
        <div class="container">
            <div class="suppliers-container">
                <?php
                while($supplier = mysqli_fetch_assoc($supplierselect)){
                ?>
                <div class="suppl__item">
                    <div class="suppl-logo">
                        <img src="<?php if ($supplier['logo'] == NULL) {
                                                echo "no logo";
                                            } else echo $supplier['logo']; ?>" alt="logo">
                    </div>
                    <ul class="suppl-desc">
                        <li><p class="suppl-desc__text"><?php echo $supplier['describtion']; ?></p></li>
                        <li><?php echo $supplier['country']; ?></li>
                        <li><?php echo $supplier['year']; ?></li>
                    </ul>
                </div>
                <?php
                }
                ?>
            </div>

        </div>
    </main>
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
</div>
</body>
</html>