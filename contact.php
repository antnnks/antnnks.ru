<?php

$post = (!empty($_POST)) ? true : false;

if ($post) {
    $email = trim($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $error = '';

    if (!$name) {
        $error .= 'Пожалуйста введите ваше имя<br />';
    }

    if (!$email) {
        $error .= "Пожалуйста введите email<br />";
    }

    if (!$message || strlen($message) < 1) {
        $error .= "Введите ваше сообщение<br />";
    }

    if (!$error) {
        $name_tema = "=?utf-8?b?" . base64_encode($name) . "?=";
        $subject = "Новая заявка с сайта domain.name";
        $subject1 = "=?utf-8?b?" . base64_encode($subject) . "?=";
        $message1 = "\n\nИмя:" . $name . "\n\nE-mail: " . $email . "\n\nСообщение: " . $message . "\n\n";
        $header = "Content-Type: text/plain; charset=utf-8\n";
        $header .= "From: Новая заявка <antnnks@gmail.com>\n\n";
        $mail = mail("antnnks@gmail.com", $subject1, iconv('utf-8', 'windows-1251', $message1), iconv('utf-8', 'windows-1251', $header));
        if ($mail) {
            echo 'OK';
        }
    } else {
        echo '<div class="notification_error">' . $error . '</div>';
    }
}
