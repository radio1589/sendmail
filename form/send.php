<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require __DIR__.'/inc/Exception.php';
    require __DIR__.'/inc/PHPMailer.php';
    require __DIR__.'/inc/SMTP.php';

    if ($_POST) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Timeout = 60;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your@gmail.com';
        $mail->Password = 'yoursecretpassword';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->CharSet = 'UTF-8';
	$mail->From = 'admin@gmail.com'; // адрес почты, с которой идет отправка
	$mail->FromName = 'Администрация сайта'; // имя отправителя
	$mail->addAddress('your@gmail.com', 'Имя');
	$mail->addAddress('your@gmail.com', 'Имя 2');
	$mail->addCC('your@gmail.com');

	$mail->isHTML(true);

	$mail->Subject = 'Обратная связь с Нашего Сайта';
	$mail->Body = "Имя: {$_POST['name']}<br> Телефон: {$_POST['phone']}<br> Сообщение: Новое письмо";
	$mail->AltBody = "Имя: {$_POST['name']}\r\n Телефон: {$_POST['phone']}\r\n Сообщение: Новое письмо";

    $mail->SMTPDebug = 4;


	if( $mail->send() ){
		$answer = '1';
	}else{
        $answer = '0';
	}
	//die( $answer );
    }
