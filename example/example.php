<?php
/**
 * Created by PhpStorm.
 * User: adolph
 * Date: 17-6-2
 * Time: 下午3:05
 */

$settings = [
    'host'			=>'smtp.163.com',
    'username'		=>'**********@**.com',
    'port'			=>25,
    'password'		=>'********',
];

$mail = new Adolph\Mailer($settings);

$result = $mail->sendMail('1138027478@qq.com','这里是传递的消息','这里是内容');
var_dump($result);