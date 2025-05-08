<?php
require __DIR__ . '/bd.php';

$cats = $pdo->query("SELECT id, name FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$apps = $pdo->query("SELECT id, name FROM applications")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "categories" => $cats,
    "applications" => $apps
]);