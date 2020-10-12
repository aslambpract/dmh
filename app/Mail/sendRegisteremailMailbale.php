<?php

namespace App\Mail;

use \App\Emails ;
use \App\Welcome ;
use \App\EmailTemplates ;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendRegisteremailMailbale extends Mailable
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
        $email = Emails::find(1);
        $setting=EmailTemplates::first();
        $content=$setting->body;  
     

       
        $return = $this->view('emails.register')
                    ->subject($setting->subject)
                    ->from($email->from_email, $email->from_name)
                    ->with([
                                'email'          =>  $email,
                                'company_name'  => 'Dream makers home',
                                'firstname'  => $this->data['firstname'],
                                'name'  => $this->data['lastname'],
                                'login_username'  => $this->data['username'],
                                'password'  => $this->data['password'],
                                'content'  => $content,
                                 
                            ]);
        return $return ;
    }
}
