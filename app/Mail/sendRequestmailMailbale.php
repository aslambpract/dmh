<?php

namespace App\Mail;

use \App\Emails ;
use \App\User;
use \App\EmailTemplates ;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendRequestmailMailbale extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;

    public function __construct($data)
    {  
        $this->data = $data;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
   
      
       
        $req_name   =User::where('id','=',$this->data['user_id'])->value('username');
        $amount     =$this->data['amount'];
        $subject    =EmailTemplates::where('id','=','10')->value('subject');
        $content    =EmailTemplates::where('id','=','10')->value('body');
        $content_replaced=str_replace(array('[user:name]','[user:amount]'), array($req_name,$amount), $content);
        $email_admin = Emails::find(1);
   
        $return = $this->view('emails.request')
                    ->subject($subject)
                    ->from($email_admin->from_email, $email_admin->from_name)
                    ->with([
                               
                                'username'      =>$email_admin->from_name,
                                'content'       =>$content_replaced,
                            ]);
       
        return $return ;
    }
}
