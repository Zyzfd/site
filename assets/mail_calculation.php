<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

 $phone = strip_tags($_POST['phone']);
 $square = strip_tags($_POST['square']);
 $corner = strip_tags($_POST['corner']);
 $lamp = strip_tags($_POST['lamp']);
 $pipe = strip_tags($_POST['pipe']);
 $luster = strip_tags($_POST['luster']);
 $perimeter = strip_tags($_POST['perimeter']);


if($phone == "") {
	print_r('error');
	exit();
}


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'yan.kalyshev@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '250303zy'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('yan.kalyshev@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('vashipotolki@bk.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML                               // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' . 'Оставили заявку, телефон ' . $phone . ' Площадь потолка: ' . $square . ' Периметр: '. $perimeter . ' Количество углов: ' . $corner . ' Количество светильников: ' . $lamp . ' Количество люстр: ' . $luster . ' Количество труб: ' . $pipe;
$mail->AltBody = 'ERROR';

if($mail->send()) {
    print_r('ok');
} else {
    print_r('error');
}
?>
