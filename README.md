### install
composer require adolph/email
### using
```
$settings = [
    'host'			=>'smtp.163.com',
    'username'		=>'**********@**.com',
    'port'			=>25,
    'password'		=>'********',
];

$mail = new Adolph\Mailer($settings);

$result = $mail->sendMail('1138027478@qq.com','这里是传递的消息','这里是内容');
```