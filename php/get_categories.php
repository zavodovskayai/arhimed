<?php
require __DIR__ . '/bd.php';
$stmt = $pdo->query("SELECT id, name FROM categories");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));