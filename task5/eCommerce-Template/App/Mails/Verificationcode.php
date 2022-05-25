<?php 

class Verificationcode {

    public string $mailFromName = 'NTI Ecommerce';
    
    public function send(){
        try{
            $this->mail->setFrom($this->mailFrom, $this->mailFromName);
            $this->mail->addAddress($this->mailTo);


            $this->mail->isHTML(true);
            $this->mail->Subject= $this->subject;
            $this->mail->body =$this->body;
            $this->mail->send();

            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }

}