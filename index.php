<?php
require_once 'Product.php';

$products = [
    new Product(1, 'Телефон', 15000),
    new Product(2, 'Наушники', 3000),
    new Product(3, 'Чехол', 1000),
    new Product(4, 'Зарядка', 800)
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Магазин</title>
</head>
<body>
    <h1>Товары</h1>
    <?php foreach ($products as $product): ?>
        <div>
            <strong><?php echo $product->getTitle(); ?></strong><br>
            Цена: <?php echo $product->getPrice(); ?> руб.<br>
            <a href="add.php?id=<?php echo $product->getId(); ?>">Добавить в корзину</a>
        </div>
        <hr>
    <?php endforeach; ?>
    
    <a href="cart.php">Перейти в корзину</a>
</body>
</html>
