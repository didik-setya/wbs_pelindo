<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Master_model extends CI_Model {
    public function send_mail(){
        $config = [
            //INI BAWAAN DARI GOOGLE
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'didikarpuz@gmail.com',
            'smtp_pass' => 'jmqyoqpqxbhryefr',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        
    }
}