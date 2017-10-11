<?php

namespace Adolph;

use PHPMailer;
use phpmailerException;

class Mailer{

    private $_config = [];

    private $_keys = ['port','host','username','password'];

    // 初始化构造方法.
    public function __construct($settings = [])
    {
        $this->_config = $settings;
    }

    /**
     * send email
     * @param $user
     * @param $title
     * @param $content
     * @return bool
     */
    public function sendMail($user,$title,$content){
        $this->checkParam();
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

    /**
     * set port
     * @param int $port
     * @return $this
     */
    public function setPort($port = 0){
        $this->_config['port'] = $port;
        return $this;
    }

    /**
     * set host
     * @param string $host
     * @return $this
     */
    public function setHost($host = ''){
        $this->_config['host'] = $host;
        return $this;
    }

    public function setUser($user = ''){
        $this->_config['username'] = $user;
        return $this;
    }

    /**
     * set password
     * @param string $password
     * @return $this
     */
    public function setPass($password = ''){
        $this->_config['password'] = $password;
        return $this;
    }

    /**
     * check email setting param
     * @return bool
     * @throws \Exception
     */
    protected function checkParam(){
        if(is_array($this->_config)){
            $diff = array_diff($this->_keys,array_keys($this->_config));
            if(count($diff) !== 0)
                throw new \Exception(implode(' ',$diff) . 'not is null');
            foreach($this->_config as $key=>$value){
                if(empty($value))
                    throw new \Exception($key . ' not is null');
            }
        }else{
            throw new \Exception('config must a array');
        }
        return true;
    }
}