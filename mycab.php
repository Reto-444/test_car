<?php
session_start();
require_once 'config/database.php';
require_once 'includes/auth.php'; // Проверка авторизации

checkAuth(); // Функция проверки авторизации

$user_id = $_SESSION['user_id'];

// Получаем заказы пользователя
$sql = "SELECT o.*, c.brand, c.model, c.price 
        FROM orders o 
        JOIN cars c ON o.car_id = c.id 
        WHERE o.user_id = $user_id 
        ORDER BY o.order_date DESC";
$orders = $conn->query($sql);
?>

<?php include 'includes/header.php'; ?>

<h2>Личный кабинет</h2>
<p>Добро пожаловать, <?php echo $_SESSION['user_login']; ?>!</p>

<h3>Ваши заказы:</h3>
<?php if ($orders->num_rows > 0): ?>
    <table>
        <tr>
            <th>Автомобиль</th>
            <th>Цена</th>
            <th>Дата заказа</th>
            <th>Статус</th>
        </tr>
        <?php while ($order = $orders->fetch_assoc()): ?>
        <tr>
            <td><?php echo $order['brand'] . ' ' . $order['model']; ?></td>
            <td>$<?php echo number_format($order['price'], 2); ?></td>
            <td><?php echo $order['order_date']; ?></td>
            <td><?php echo $order['status']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>У вас пока нет заказов.</p>
<?php endif; ?>

<p><a href="index.php">Вернуться в каталог</a></p>
<p><a href="logout.php">Выйти</a></p>

<?php include 'includes/footer.php'; ?>