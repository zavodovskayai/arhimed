<?php
require __DIR__ . '/bd.php';

$category = $_GET['category'] ?? null;
$subcategory = $_GET['subcategory'] ?? null;
$application = $_GET['application'] ?? null;

$sql = "SELECT p.id, p.name, p.description, p.price_single
        FROM products p
        LEFT JOIN product_applications pa ON p.id = pa.product_id
        WHERE p.visible = 1";

$params = [];

if ($category) {
  $sql .= " AND p.category_id = ?";
  $params[] = $category;
}

if ($subcategory) {
  $sql .= " AND p.subcategory_id = ?";
  $params[] = $subcategory;
}

if ($application) {
  $sql .= " AND pa.application_id = ?";
  $params[] = $application;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);