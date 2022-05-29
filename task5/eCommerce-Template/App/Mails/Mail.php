<?php

namespace App\Mails;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class Mail{

    protected string $mailTo;
    protected string $subject;
    protected string $body;
    protected PHPMailer $mail;
    private string $host="smtp.gmail.com";
    protected string $mailFrom="NTImay2022@gmail.com";
    private string $password="01004411210";

    public function __construct(string $mailTo, string $subject, string $body)
    {$this->mailTo=$mailTo;
        $this->subject= $subject;
        $this->body= $body;

        $this->mail=new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $this->host;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $this->mailFrom;                     //SMTP username
        $this->mail->Password   = $this->password;                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465;  
        
    }
}