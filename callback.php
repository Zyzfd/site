<?php
 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
 $name = strip_tags($_POST['idata']['name']);
 $email = strip_tags($_POST['idata']['email']);
 $phone = strip_tags($_POST['idata']['phone']);

 
 $res = array();
 
 if(empty($phone)) {
 $res['error'] = "Нужно добавить номер телефона!";
 echo json_encode($res);
 
 exit();
 }
 
 require 'assets/lib/swift_required.php';
 
 $message = Swift_Message::newInstance();
 
 $message->setSubject('Обратный звонок');
 
 $message->setFrom(array('yan.kalyshev@mail.ru' => 'Zyzf'));
 
 $message->setTo(array('vashipotolki@bk.ru'));
 
 $message->setBody($name . $phone . $email);
 
 $transport = Swift_MailTransport::newInstance();
 
 $mailer = Swift_Mailer::newInstance($transport);
 
 $mailer->send($message);
 exit(json_encode($res));
}
 
exit();
