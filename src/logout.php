<?php
session_start();
unset($_SESSION['user']);
header('Location: /src/index.php');
?>