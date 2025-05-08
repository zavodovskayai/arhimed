<?php
require __DIR__ . '/bd.php';
$data = json_decode(file_get_contents("php://input"), true);

if ($data['type'] === 'category') {
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
} elseif ($data['type'] === 'application') {
    $stmt = $pdo->prepare("DELETE FROM applications WHERE id = ?");
} else {
    http_response_code(400);
    echo "Неверный тип";
    exit;
}

$stmt->execute([$data['id']]);
http_response_code(200);