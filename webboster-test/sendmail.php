<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $Mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);


    $mail->setFrom('user@mail.ru');
    $mail->addAddress('dimulya.kuznetsov.99@mail.ru');
    $mail->Subject = 'Кресло компьютерное';

    $body = '<h1>Заказ на компьютерное кресло</h1>';

    if(trim(!empty($_POST['name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    };
    if(trim(!empty($_POST['tel']))) {
        $body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
    };
    if(trim(!empty($_POST['email']))) {
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    };
    if(trim(!empty($_POST['product']))) {
        $body.='<p><strong>Товар:</strong> '.$_POST['product'].'</p>';
    };

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены';
    }

    $response = ['message => $message'];

    header('Content-type: application/json');
    echo json_encode($response);
?>