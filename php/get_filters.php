<?php
require __DIR__ . '/bd.php';

$categories = $pdo->query("SELECT id, name FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$applications = $pdo->query("SELECT id, name FROM applications")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
  'categories' => $categories,
  'applications' => $applications
]);