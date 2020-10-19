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
       
         
       
        $req_name  =User::where('id','=',$this->data['user_id'])->value('username');
        $amount     =$this->data['amount'];
        $email_admin = Emails::find(1);
     
        $return = $this->view('emails.request')
                    ->subject('Payout request')
                    ->from($email_admin->from_email, $email_admin->from_name)
                    ->with([
                                'amount'        =>$this->data['amount'],
                                'username'      =>$email_admin->from_name,
                                'content'       =>$req_name.' requested an amount of ' .$amount,
                            ]);
       
        return $return ;
    }
}
