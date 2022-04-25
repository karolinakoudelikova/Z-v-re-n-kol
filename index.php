<?php
require "Product.php";
require "Emailer.php";

define('SQL_HOST', 'localhost');
define('SQL_DBNAME', 'price_offer');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

$dsn = 'mysql:dbname=' . SQL_DBNAME . ';host=' . SQL_HOST . ';charset=utf8';
$user = SQL_USERNAME;
$password = SQL_PASSWORD;

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

if (isset($_POST) && !empty($_POST)) {
    $emailer = new Emailer();
    $emailer->sendEmail($_POST["email"], $_POST["name"], $_POST["price"], $_POST["quantity"]);
}
else {
    $product = new Product($pdo);
    require('form.php');
}