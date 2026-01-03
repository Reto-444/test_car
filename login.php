<?php
session_start();
require_once 'config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $conn->real_escape_string($_POST['login']);
    $password = $_POST['password'];
    
    $sql = "SELECT id, login, password FROM users WHERE login = '$login'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_login'] = $user['login'];
            header('Location: mycab.php');
            exit();
        } else {
            $error = "Неверный пароль!";
        }
    } else {
        $error = "Пользователь не найден!";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="auth-form-container">
        <div class="auth-form">
            <h2><i class="fas fa-sign-in-alt"></i> Вход в систему</h2>
            <p class="form-subtitle">Введите данные для входа в личный кабинет</p>
            
            <?php if ($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['registered'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Регистрация успешна! Теперь войдите в систему.
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="login">
                        <i class="fas fa-user"></i> Логин
                    </label>
                    <input type="text" id="login" name="login" 
                           value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : ''; ?>"
                           placeholder="Введите ваш логин" required>
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Пароль
                    </label>
                    <input type="password" id="password" name="password" 
                           placeholder="Введите ваш пароль" required>
                    <div class="password-toggle">
                        <input type="checkbox" id="showPassword"> 
                        <label for="showPassword">Показать пароль</label>
                    </div>
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-sign-in-alt"></i> Войти
                </button>
            </form>
            
            <div class="auth-links">
                <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь здесь</a></p>
                <p><a href="index.php"><i class="fas fa-home"></i> Вернуться на главную</a></p>
            </div>
        </div>
        
        <div class="auth-info">
            <h3><i class="fas fa-star"></i> Почему стоит зарегистрироваться?</h3>
            <ul>
                <li><i class="fas fa-check-circle"></i> Доступ к полному каталогу</li>
                <li><i class="fas fa-check-circle"></i> Возможность оформлять заказы</li>
                <li><i class="fas fa-check-circle"></i> История ваших заказов</li>
                <li><i class="fas fa-check-circle"></i> Специальные предложения</li>
                <li><i class="fas fa-check-circle"></i> Быстрая техподдержка</li>
            </ul>
            
            <div class="demo-credentials">
                <h4><i class="fas fa-key"></i> Тестовый аккаунт:</h4>
                <p>Логин: <strong>demo</strong></p>
                <p>Пароль: <strong>demo123</strong></p>
            </div>
        </div>
    </div>
</div>

<script>
    // Показать/скрыть пароль
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('password');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

<?php include 'includes/footer.php'; ?>