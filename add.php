<?php
session_start();
require_once 'Product.php';
require_once 'Cart.php';

// Товары (те же самые, что и в index.php)
$products = [
    1 => new Product(1, 'Телефон', 15000),
    2 => new Product(2, 'Наушники', 3000),
    3 => new Product(3, 'Чехол', 1000),
    4 => new Product(4, 'Зарядка', 800)
];

$id = $_GET['id'];

if (isset($products[$id])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = new Cart();
    }
    
    $_SESSION['cart']->add($products[$id]);
}

header('Location: index.php');
exit;
?>
