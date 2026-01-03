<?php
session_start();
require_once 'config/database.php';
include 'includes/header.php';
?>

<h1>Каталог автомобилей</h1>

<div class="catalog">
    <?php
    $sql = "SELECT * FROM cars ORDER BY price";
    $result = $conn->query($sql);
    
    while ($car = $result->fetch_assoc()):
    ?>
    <div class="car-card">
        <h3><?php echo $car['brand'] . ' ' . $car['model']; ?></h3>
        <p>Год: <?php echo $car['year']; ?></p>
        <p>Цена: $<?php echo number_format($car['price'], 2); ?></p>
        <p>Цвет: <?php echo $car['color']; ?></p>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="add_zakaz.php?car_id=<?php echo $car['id']; ?>" class="btn-order">
                Заказать
            </a>
        <?php else: ?>
            <p>Для заказа <a href="login.php">войдите</a> в систему</p>
        <?php endif; ?>
    </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>