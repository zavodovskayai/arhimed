<?php
require __DIR__ . '/bd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO subcategories (category_id, name) VALUES (?, ?)");
  $stmt->execute([$_POST['category_id'], $_POST['subcategory_name']]);
  header("Location: /pages/manageOptions.html");
}