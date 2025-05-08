<?php
$host = 'localhost';
$dbname = 'u3105732_products'; // имя твоей базы
$user = 'root';            // имя пользователя (чаще всего root на локалке)
$pass = '';                // пароль (обычно пустой на XAMPP/WAMP, но может быть другой на хостинге)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}