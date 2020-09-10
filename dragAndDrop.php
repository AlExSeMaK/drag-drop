<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$text = "Тот самый текст";

var_dump($_POST);

$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>$text
<b>Номер телефона:</b> $phone<br>
";

$mail = new \PHPMailer\PHPMailer\PHPMailer();

try {
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    $mail->Host       = 'smtp.yandex.ru';
    $mail->Username   = 'login'; // Логин на почте
    $mail->Password   = 'password'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('login@yandex.ru', 'Отправитель');

    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;

    if ($mail->send()) {
        $result = "success";
        var_dump($result);
    }
    else {
        $result = "error";
        var_dump($mail->ErrorInfo);
    }

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
    var_dump($status);
}

