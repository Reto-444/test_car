<?php
session_start();
require_once 'config/database.php';
include 'includes/header.php';
?>

<!-- ЗАГОЛОВОК КАТАЛОГА -->
<div class="container">
    <div class="page-title">
        <h2><i class="fas fa-car"></i> Каталог автомобилей</h2>
        <p>Выберите автомобиль своей мечты</p>
    </div>

    <!-- КАТАЛОГ -->
    <div class="catalog">
        <?php
        $sql = "SELECT * FROM cars ORDER BY price";
        $result = $conn->query($sql);
        
        while ($car = $result->fetch_assoc()):
        ?>
        <div class="car-card">
            <h3><?php echo htmlspecialchars($car['brand']) . ' ' . htmlspecialchars($car['model']); ?></h3>
            
            <p><i class="far fa-calendar-alt"></i> Год: <?php echo htmlspecialchars($car['year']); ?></p>
            
            <div class="price">
                <i class="fas fa-tag"></i> $<?php echo number_format($car['price'], 2); ?>
            </div>
            
            <p><i class="fas fa-palette"></i> Цвет: <?php echo htmlspecialchars($car['color']); ?></p>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="add_zakaz.php?car_id=<?php echo $car['id']; ?>" class="btn-order">
                    <i class="fas fa-shopping-cart"></i> Заказать
                </a>
            <?php else: ?>
                <p>Для заказа <a href="login.php">войдите</a> в систему</p>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>