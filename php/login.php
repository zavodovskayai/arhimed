<?php
session_start();
require __DIR__ . '/bd.php';

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
$stmt->execute([$login]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    // Авторизация успешна
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_role'] = $user['role']; // например, 'admin'
    header("Location: /adminAddForm.html");
    exit();
} else {
    echo "Неверный логин или пароль.";
}