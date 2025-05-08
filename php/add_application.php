<?php
require __DIR__ . '/bd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO applications (name) VALUES (?)");
  $stmt->execute([$_POST['application_name']]);
  header("Location: /pages/manageOptions.html");
}