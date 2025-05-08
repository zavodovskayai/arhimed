<?php
session_start();
require __DIR__ . '/bd.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    http_response_code(403);
    exit('Доступ запрещён');
}

$created_by = $_SESSION['user_id'];

require __DIR__ . '/bd.php';;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO products 
        (name, description, country, company, price_single, price_10000, price_50000, price_200000, min_package, packs_per_box, package_type, category_id, subcategory_id, sterility, volume, created_by) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['country'] ?? null,
        $_POST['company'] ?? null,
        $_POST['price_single'] ?? null,
        $_POST['price_10000'] ?? null,
        $_POST['price_50000'] ?? null,
        $_POST['price_200000'] ?? null,
        $_POST['min_package'] ?? null,
        $_POST['packs_per_box'] ?? null,
        $_POST['package_type'] ?? null,
        $_POST['category_id'] ?? null,
        $_POST['subcategory_id'] ?? null,
        $_POST['sterility'] ?? null,
        $_POST['volume'] ?? null,
        1 // ID администратора, если есть сессия — использовать $_SESSION['user_id']
    ]);

    $product_id = $pdo->lastInsertId();

    // Связь с application (сферами)
    if (!empty($_POST['applications'])) {
        $stmtApp = $pdo->prepare("INSERT INTO product_applications (product_id, application_id) VALUES (?, ?)");
        foreach ($_POST['applications'] as $app_id) {
            $stmtApp->execute([$product_id, $app_id]);
        }
    }

    // Загрузка изображений
    $uploadDir = '../images/uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

    foreach ($_FILES['images']['tmp_name'] as $i => $tmpName) {
        if ($_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
            $imageName = time() . '_' . basename($_FILES['images']['name'][$i]);
            $targetFile = $uploadDir . $imageName;
            move_uploaded_file($tmpName, $targetFile);

            $stmtImg = $pdo->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
            $stmtImg->execute([$product_id, $targetFile]);
        }
    }

    header("Location: /pages/adminAddForm.html?success=1");
    exit;
}
?>