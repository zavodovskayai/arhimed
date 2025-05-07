<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Настройки для отправки письма
    $to = "zavodovskayai@yandex.ru";
    $subject = "Перезвонить клиенту";
    $body = "Сообщение от: $name\nТелефон: $phone\n\nСообщение:\n$message";
    $headers = "From: zavodovskayai@yandex.ru";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        echo "Ваш запрос на звонок успешно отправлен!";
    } else {
        echo "Ошибка при отправке письма.";
    }
}
?>