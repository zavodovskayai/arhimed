<?php
require __DIR__ . '/bd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
  $stmt->execute([$_POST['category_name']]);
  header("Location: /pages/manageOptions.html");
}