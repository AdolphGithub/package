<?php

namespace Adolph;

use PHPMailer;
use phpmailerException;

class Mailer{

    private $_config = [];

    // 初始化构造方法.
    public function __construct($settings)
    {
        $this->_config = $settings;
    }

    public function sendMail($user,$title,$content){
        try {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet='UTF-8';
            $mail->SMTPAuth = true;
            $mail->Port = $this->_config['port'];
            $mail->Host = $this->_config['host'];
            $mail->Username = $this->_config['username'];
            $mail->Password = $this->_config['password'];
            $mail->setFrom($this->_config['username'], $this->_config['user_name']);
            $mail->addAddress($user);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $content;
            if($mail->Send()){
                return true;
            }else{
                return $mail->ErrorInfo;
            }
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        }
    }
}