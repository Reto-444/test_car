<?php
session_start();
require_once 'config/database.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = trim($_POST['email']);
    
    // Валидация
    if (empty($login) || empty($password) || empty($confirm_password)) {
        $error = 'Все поля обязательны для заполнения!';
    } elseif (strlen($login) < 3) {
        $error = 'Логин должен содержать минимум 3 символа!';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль должен содержать минимум 6 символов!';
    } elseif ($password !== $confirm_password) {
        $error = 'Пароли не совпадают!';
    } else {
        // Проверка, существует ли пользователь
        $stmt = $conn->prepare("SELECT id FROM users WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = 'Пользователь с таким логином уже существует!';
        } else {
            // Хешируем пароль
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Добавляем пользователя
            $stmt = $conn->prepare("INSERT INTO users (login, password, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $login, $hashed_password, $email);
            
            if ($stmt->execute()) {
                $success = 'Регистрация успешна! Теперь вы можете войти в систему.';
                header("refresh:2;url=login.php");
            } else {
                $error = 'Ошибка при регистрации: ' . $conn->error;
            }
        }
        $stmt->close();
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="auth-form-container">
        <div class="auth-form">
            <h2><i class="fas fa-user-plus"></i> Регистрация</h2>
            <p class="form-subtitle">Создайте аккаунт для заказа автомобилей</p>
            
            <?php if ($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="login">
                        <i class="fas fa-user"></i> Логин *
                    </label>
                    <input type="text" id="login" name="login" 
                           value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : ''; ?>"
                           placeholder="Введите логин" required>
                </div>
                
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" id="email" name="email"
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                           placeholder="Введите email (необязательно)">
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Пароль *
                    </label>
                    <input type="password" id="password" name="password" 
                           placeholder="Минимум 6 символов" required>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">
                        <i class="fas fa-lock"></i> Подтвердите пароль *
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" 
                           placeholder="Повторите пароль" required>
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-user-plus"></i> Зарегистрироваться
                </button>
            </form>
            
            <div class="auth-links">
                <p>Уже есть аккаунт? <a href="login.php">Войдите здесь</a></p>
                <p><a href="index.php"><i class="fas fa-home"></i> Вернуться на главную</a></p>
            </div>
        </div>
        
        <div class="auth-info">
            <h3><i class="fas fa-car"></i> Преимущества регистрации</h3>
            <ul>
                <li><i class="fas fa-check"></i> Возможность заказать автомобиль</li>
                <li><i class="fas fa-check"></i> Личный кабинет с историей заказов</li>
                <li><i class="fas fa-check"></i> Специальные предложения для клиентов</li>
                <li><i class="fas fa-check"></i> Уведомления о новых поступлениях</li>
                <li><i class="fas fa-check"></i> Быстрое оформление заказов</li>
            </ul>
            
            <div class="security-note">
                <i class="fas fa-shield-alt"></i>
                <p>Ваши данные защищены и не передаются третьим лицам</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>