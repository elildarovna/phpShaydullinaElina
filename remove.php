<?php
session_start();
require_once 'Cart.php';

if (isset($_SESSION['cart'])) {
    $_SESSION['cart']->remove($_GET['id']);
}

header('Location: cart.php');
exit;
?>
