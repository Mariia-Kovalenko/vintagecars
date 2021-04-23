<?php
session_start();
require_once "connect.php";

function addWhere($where, $add, $and) {
    if ($where) {
        if ($and) $where .= " AND $add";
        else $where .= " OR $add";
    }
    else $where = $add;
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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
</head>
<body>
<form method="post" name="form">
    <ul>
        <li>car manuf year equals:
            <ul>
                <li><input name="age_interval1" type="checkbox" value="1960 and 1965"/>1960 - 1965</li>
                <li><input name="age_interval2" type="checkbox" value="1966 and 1967"/>1966 - 1967</li>
                <li><input name="age_interval3" type="checkbox" value="1965 and 1970"/>1965 - 1970</li>
            </ul>
        </li>
        <li>car model equals:
            <ul>
                <li><input name="model1" type="checkbox" value="AMC"/>AMC</li>
                <li><input name="model2" type="checkbox" value="Audi"/>Audi</li>
                <li><input name="model3" type="checkbox" value="BMW"/>BMW </li>
            </ul>
        </li>
    </ul>
    <input name="filter" type="submit" value="View"/>
    </form>
    <?php

if (!empty($_POST["filter"])) {
    $sql = "select * from `car`";
    $where = "";
    $and = false;

    if ($_POST["model1"]) {
        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model1"]), false) . "%'";
    }
    if ($_POST["model2"]) {
        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model2"]), false) . "%'";
    }
    if ($_POST["model3"]) {
        $where = addWhere($where, "model like '" . htmlspecialchars($_POST["model3"]), false) . "%'";
    }
    if ($_POST["age_interval1"]) {
        $where = addWhere($where, "manuf_year between " . htmlspecialchars($_POST["age_interval1"]),true) . "";
    }
    if ($_POST["age_interval2"]) {
        $where = addWhere($where, "manuf_year between " . htmlspecialchars($_POST["age_interval2"]),true) . "";
    }
    if ($_POST["age_interval3"]) {
        $where = addWhere($where, "manuf_year between " . htmlspecialchars($_POST["age_interval3"]),true) . "";
    }
    if ($where) {
        $sql .= " WHERE $where";
    } else {
        $sql .= " WHERE ";
    }
}
echo '<h1>Получили такой SQL запрос:</h1>' . $sql;
?>

    <?php

        $res =  mysqli_query($connection, $sql);
        while($car = mysqli_fetch_assoc($res)){
        ?>
            <p class ="user__info">Model:  <?php echo $car['model']; ?> </p>
            <p class ="user__info">Year:  <?php echo $car['manuf_year']; ?> </p>
            <br>
            <?php
            }
            ?>
            </div>
</body>
</html>

