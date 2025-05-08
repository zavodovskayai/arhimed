<?php
require './db.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$subcategories = $pdo->query("SELECT * FROM subcategories")->fetchAll(PDO::FETCH_ASSOC);
$applications = $pdo->query("SELECT * FROM applications")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "categories" => $categories,
    "subcategories" => $subcategories,
    "applications" => $applications
]);