<?php
// case 1
$settings = [
    'host'			=>'******',
    'username'		=>'***********@*****.com',
    'port'			=>25,
    'password'		=>'*********',
];
$mail = new Adolph\Mailer($settings);
$result = $mail->sendMail('1138027478@qq.com','这里是传递的消息','这里是内容');
var_dump($result);
// case 2
$mail = new Adolph\Mailer();
$result = $mail->setHost('****')
    ->setUser('******')
    ->setPass('*********')
    ->setPort(25)
    ->sendMail('1138027478@qq.com','这里是传递的消息','这里是内容');
var_dump($result);