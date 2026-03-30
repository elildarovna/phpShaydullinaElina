<?php
session_start();
require_once 'Cart.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : new Cart();
$items = $cart->getItems();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
    <h1>Корзина</h1>
    
    <?php if (empty($items)): ?>
        <p>Корзина пуста</p>
    <?php else: ?>
        <?php foreach ($items as $id => $item): ?>
            <div>
                <strong><?php echo $item['product']->getTitle(); ?></strong><br>
                Цена: <?php echo $item['product']->getPrice(); ?> руб.<br>
                Количество: <?php echo $item['quantity']; ?><br>
                Стоимость: <?php echo $item['product']->getPrice() * $item['quantity']; ?> руб.<br>
                <a href="remove.php?id=<?php echo $id; ?>">Удалить</a>
            </div>
            <hr>
        <?php endforeach; ?>
        
        <h3>Общая сумма: <?php echo $cart->getTotal(); ?> руб.</h3>
    <?php endif; ?>
    
    <a href="clear.php">Очистить корзину</a><br>
    <a href="index.php">Продолжить покупки</a>
</body>
</html>
