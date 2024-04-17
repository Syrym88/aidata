<?php
// Устанавливаем кодировку для скрипта и отправляемого письма
header('Content-type: text/html; charset=utf-8');

// Получаем данные из формы
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Адрес, на который будет отправлено письмо
$to = 'info@aidata.kz';

// Заголовок письма
$subject = 'Сообщение от ' . $name;

// Тело письма
$body = "Имя: $name\n";
$body .= "Email: $email\n";
$body .= "Сообщение:\n$message";

// Устанавливаем дополнительные заголовки для корректной обработки UTF-8
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Отправляем письмо
$mailSent = mail($to, $subject, $body, $headers);

// Проверяем, было ли письмо успешно отправлено
if ($mailSent) {
    // Отправляем успешный статус обратно на клиентскую сторону
    http_response_code(200);
    echo "Сообщение успешно отправлено!";
    // После успешной отправки письма делаем редирект на основной сайт
    header("Location: https://aidata.kz");
    exit(); // Прерываем выполнение скрипта, чтобы редирект сработал
} else {
    // Если письмо не удалось отправить, отправляем ошибку обратно на клиентскую сторону
    http_response_code(500);
    echo "Ошибка отправки сообщения. Пожалуйста, попробуйте еще раз.";
}
?>
