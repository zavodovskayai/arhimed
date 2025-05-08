<?php
require __DIR__ . '/bd.php';

$category_id = $_GET['category_id'] ?? null;

if ($category_id) {
  $stmt = $pdo->prepare("SELECT id, name FROM subcategories WHERE category_id = ?");
  $stmt->execute([$category_id]);
  $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($subcategories);
} else {
  echo json_encode([]);
}
