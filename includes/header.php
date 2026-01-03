<?php
// Старт сессии для всех страниц
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АвтоСалон - Продажа автомобилей</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: white;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .logo-icon {
            font-size: 32px;
            background: white;
            color: #1a237e;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .auth-links a {
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 4px;
            border: 2px solid white;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .auth-links a:hover {
            background: white;
            color: #1a237e;
        }

        .welcome {
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 4px;
            font-weight: 500;
        }

        .welcome strong {
            color: #ffeb3b;
        }

        .logout-btn {
            background: #ff5252;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #ff1744;
        }

        /* MAIN CONTENT */
        main {
            flex: 1;
            padding: 30px 0;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 15px;
            border-bottom: 2px solid #1a237e;
        }

        .page-title h2 {
            color: #1a237e;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .page-title p {
            color: #666;
            font-size: 18px;
        }

        /* Messages */
        .message {
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
            text-align: center;
            font-weight: 500;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #4caf50;
        }

        .error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #f44336;
        }

        .info {
            background: #e3f2fd;
            color: #1565c0;
            border-left: 4px solid #2196f3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .user-info {
                flex-direction: column;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h1>АвтоСалон</h1>
                </a>

                <nav>
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i> Главная</a></li>
                        <li><a href="index.php"><i class="fas fa-car"></i> Каталог</a></li>
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li><a href="mycab.php"><i class="fas fa-user"></i> Личный кабинет</a></li>
                        <?php endif; ?>
                        <li><a href="#"><i class="fas fa-info-circle"></i> О нас</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i> Контакты</a></li>
                    </ul>
                </nav>

                <div class="user-info">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <div class="welcome">
                            Добро пожаловать, <strong><?php echo htmlspecialchars($_SESSION['user_login']); ?></strong>!
                        </div>
                        <a href="logout.php" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Выйти
                        </a>
                    <?php else: ?>
                        <div class="auth-links">
                            <a href="login.php"><i class="fas fa-sign-in-alt"></i> Войти</a>
                            <!-- Можно добавить ссылку на регистрацию -->
                            <!-- <a href="register.php">Регистрация</a> -->
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <?php if(isset($_GET['success'])): ?>
            <div class="message success">
                <i class="fas fa-check-circle"></i> Операция выполнена успешно!
            </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['error'])): ?>
            <div class="message error">
                <i class="fas fa-exclamation-circle"></i> Произошла ошибка!
            </div>
        <?php endif; ?>