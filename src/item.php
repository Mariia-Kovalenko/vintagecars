<?php
session_start();
require_once "connect.php";

if(isset($_GET['item_id'])){
    $id = $_GET['item_id'];
    $sql = "select car.idcar, car.model, car.price, car.mileage, car.restor_year, car.manuf_year, car.photo, supplier.supplier as suppl, country.country as cntr from car join supplier on car.supplier_idsupplier = supplier.idsupplier join country on car.country_idcountry = country.idcountry where idcar = '$id'";
    
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result); 
}
else echo "something went wrong";
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
                    <div class="logo"><a href="#"><img src="/src/img/Logo.svg" height="40px" alt="logo"></a></div>
                    <nav class="nav">
                        <ul class="nav__list">
                            <li class="nav__list-item"><a class="nav__link" href="#">Catalogue</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Suppliers</a></li>
                            <li class="nav__list-item"><a class="nav__link" href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="item-heading">
                <h2 class="item-heading__title">Item Details</h2>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="item-wrapper">
                <div class="item__image">
                    <img src="<?php if($row['photo'] == NULL) {echo "/src/img/cars/car-default.jpg"; } else echo $row['photo']; ?>" height="245px" alt="">
                </div>
                <div class="item__desc">
                    <h3 class="item__model"><?php echo $row['model'] ?></h3>
                    <div class="item__properties">
                        <div class="item__properties-part">
                            <div class="item__properties-property">
                                <h4 class="item__properties-ident">ID Code:</h4>
                                <p class="item__properties-data"><?php echo $row['idcar'] ?></p>
                            </div> 
                            <div class="item__properties-property">
                                <h4 class="item__properties-ident">Price:</h4>
                                <p class="item__properties-data"><?php echo $row['price'] ?></p>
                            </div> 
                            <div class="item__properties-property">
                                <h4 class="item__properties-ident">Mileage:</h4>
                                <p class="item__properties-data"><?php echo $row['mileage'] ?> miles</p>
                            </div>
                            <div class="item__properties-property">
                                <h4 class="item__properties-ident">Restoration year:</h4>
                                <p class="item__properties-data"><?php echo $row['restor_year'] ?></p>
                            </div>
                            <div class="item__properties-property">
                                <h4 class="item__properties-ident">Manufacture year:</h4>
                                <p class="item__properties-data"><?php echo $row['manuf_year'] ?></p>
                            </div>
                            </div>
                            <div class="item__properties-part">
                                <div class="item__properties-property">
                                    <h4 class="item__properties-ident">Supplier:</h4>
                                    <p class="item__properties-data"><?php echo $row['suppl'] ?></p>
                                </div>
                                <div class="item__properties-property">
                                    <h4 class="item__properties-ident">Origin:</h4>
                                    <p class="item__properties-data"><?php echo $row['cntr'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="options">
                <div class="options__container">
                    <div class="return">
                        <a href="catalogue.html" class="arrow-icon">
                            <img src="/src/icons/left-arrow 1.svg" alt="">
                        </a>
                        <a href="catalogue.php" class="return-link">Back to Catalogue</a>
                    </div>
                    <a href="#" class="button order-button">Order</a>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>