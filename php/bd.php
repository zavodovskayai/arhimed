<?php
$host = 'localhost';
$dbname = 'u3105732_products'; // имя твоей базы
$user = 'u3105732_Irina';            // имя пользователя (чаще всего root на локалке)
$pass = '1q2s3cILOVEYOU';                // пароль (обычно пустой на XAMPP/WAMP, но может быть другой на хостинге)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}