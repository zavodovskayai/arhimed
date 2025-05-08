<?php
session_start();
require __DIR__ . '/bd.php'; // подключение к базе

$data = json_decode(file_get_contents("php://input"), true);

$login = $data['login'] ?? '';
$password = $data['password'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT id, password_hash, is_admin FROM users WHERE username = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password_hash'] === $password && $user['is_admin'] == 1) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = 'admin';
        http_response_code(200);
        exit();
    } else {
        http_response_code(401);
        exit("Неверный логин или пароль");
    }
} catch (PDOException $e) {
    http_response_code(500);
    exit("Ошибка БД: " . $e->getMessage());
}