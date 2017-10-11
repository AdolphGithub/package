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
OR
```
$mail = new Adolph\Mailer();
$result = $mail->setHost('****')
    ->setUser('******')
    ->setPass('*********')
    ->setPort(25)
    ->sendMail('1138027478@qq.com','这里是传递的消息','这里是内容');
var_dump($result);
```