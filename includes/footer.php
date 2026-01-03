</main>

<footer style="
    background: linear-gradient(135deg, #263238 0%, #37474f 100%);
    color: white;
    padding: 40px 0 20px;
    margin-top: auto;
">
    <div class="container" style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-bottom: 30px;
    ">
        <div class="footer-section">
            <h3 style="
                color: #ffeb3b;
                font-size: 22px;
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 2px solid #ffeb3b;
                display: inline-block;
            ">
                <i class="fas fa-car"></i> АвтоСалон
            </h3>
            <p style="color: #b0bec5; line-height: 1.8;">
                Продажа новых и подержанных автомобилей. 
                Лучшие цены, гарантия качества, профессиональное обслуживание.
            </p>
        </div>

        <div class="footer-section">
            <h3 style="
                color: #ffeb3b;
                font-size: 20px;
                margin-bottom: 20px;
            ">Быстрые ссылки</h3>
            <ul style="list-style: none;">
                <li style="margin-bottom: 10px;">
                    <a href="index.php" style="
                        color: #b0bec5;
                        text-decoration: none;
                        transition: color 0.3s ease;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    ">
                        <i class="fas fa-chevron-right"></i> Главная
                    </a>
                </li>
                <li style="margin-bottom: 10px;">
                    <a href="index.php" style="
                        color: #b0bec5;
                        text-decoration: none;
                        transition: color 0.3s ease;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    ">
                        <i class="fas fa-chevron-right"></i> Каталог
                    </a>
                </li>
                <li style="margin-bottom: 10px;">
                    <a href="login.php" style="
                        color: #b0bec5;
                        text-decoration: none;
                        transition: color 0.3s ease;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    ">
                        <i class="fas fa-chevron-right"></i> Вход в систему
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer-section">
            <h3 style="
                color: #ffeb3b;
                font-size: 20px;
                margin-bottom: 20px;
            ">Контакты</h3>
            <ul style="list-style: none; color: #b0bec5;">
                <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-map-marker-alt" style="color: #ffeb3b;"></i>
                    г. Москва, ул. Автомобильная, 123
                </li>
                <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-phone" style="color: #ffeb3b;"></i>
                    +7 (495) 123-45-67
                </li>
                <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-envelope" style="color: #ffeb3b;"></i>
                    info@autosalon.ru
                </li>
            </ul>
        </div>

        <div class="footer-section">
            <h3 style="
                color: #ffeb3b;
                font-size: 20px;
                margin-bottom: 20px;
            ">Мы в соцсетях</h3>
            <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                <a href="#" style="
                    background: #3b5998;
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-decoration: none;
                    transition: transform 0.3s ease;
                ">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" style="
                    background: #1da1f2;
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-decoration: none;
                    transition: transform 0.3s ease;
                ">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" style="
                    background: #e1306c;
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-decoration: none;
                    transition: transform 0.3s ease;
                ">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" style="
                    background: #0e76a8;
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-decoration: none;
                    transition: transform 0.3s ease;
                ">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <p style="color: #b0bec5; font-size: 14px;">
                <i class="fas fa-clock"></i> Режим работы: 9:00 - 21:00, без выходных
            </p>
        </div>
    </div>

    <div style="
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #455a64;
        color: #b0bec5;
        font-size: 14px;
    ">
        <p>&copy; <?php echo date('Y'); ?> АвтоСалон. Все права защищены.</p>
        <p style="margin-top: 5px;">
            Разработано с <i class="fas fa-heart" style="color: #ff5252;"></i> для любителей автомобилей
        </p>
    </div>
</footer>

<script>
    // Простой скрипт для анимации социальных иконок
    document.querySelectorAll('footer a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
</body>
</html>