<?php namespace App\Services;

use Mail;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Swift_TransportException;

class EmailService
{

    /**
     * obj for replace setting email configuration
     */
    private $transport;

    /**
     * global setting
     */
    public $setting;


    /**
     * array encryptions
     */
    private $type_encryption = [
        '587' => 'tls',
        '465' => 'ssl'
    ];

    public function __construct($setting)
    {

        $port = $this->get_port_host($setting['host']);

            $this->setting = [
                'username' => $setting['username'],
                'password' => $setting['password'],
                'host' => $port['domain'],
                'port' => $port['port'],
                'encryption' => $this->type_encryption[$port['port']],
                'template' => $setting['template']
            ];

            $this->transport_email();

    }

    /**
     * sending email
     *
     * @param $to
     * @param $data
     */
    public function send_mail($to, $data, $name = 'Support',$subject = '')
    {
        try {
            Mail::send('emails.' . $this->setting['template'], $data, function ($m) use ($to, $name, $subject) {
                $m->to($to, $name)->subject($subject);
            });
        }catch (Swift_TransportException $e){
            return false;
        }
    }


    /**
     * replace setting email configuration
     */
    private function transport_email(){
        $this->transport = Swift_SmtpTransport::newInstance($this->setting['host'], $this->setting['port']);

        if (isset($this->setting['encryption'])) $this->transport->setEncryption($this->setting['encryption']);

        if (isset($this->setting['username']))
        {
            $this->transport->setUsername($this->setting['username']);
            $this->transport->setPassword($this->setting['password']);
        }

        Mail::setSwiftMailer(new Swift_Mailer($this->transport));
        Mail::alwaysFrom($this->setting['username'], 'Support');
    }



    /**
     * explode port and host
     * example (smtp.gmail.com:587)
     *
     * @param $value
     * @return array
     */
    private function get_port_host($value){
        $value = explode(':',$value);
        $value['domain'] = head($value);
        if(count($value)==1){
            $value['port']='587';
        }else {
            $value['port']=$value[1];
        }
        return $value;
    }



}