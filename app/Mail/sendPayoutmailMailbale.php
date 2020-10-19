<?php

namespace App\Mail;

use \App\Emails ;
use \App\EmailTemplates ;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendPayoutmailMailbale extends Mailable
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
        $subject=EmailTemplates::where('id','=','9')->value('subject');
        $content=EmailTemplates::where('id','=','9')->value('body');
       

        $return = $this->view('emails.payout')
                    ->subject( $subject)
                    ->from($email->from_email, $email->from_name)
                    ->with([
                                'email'         => $email,
                                'company_name'  => 'thedreammakershome',
                                'username'      => $this->data['username'],
                                'content'       =>$content,
                                 
                            ]);
       
        return $return ;
    }
}
