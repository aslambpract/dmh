<?php

namespace App\Mail;

use \App\Emails ;
use \App\Welcome ;
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
        // $setting=Welcome::first();
        

       
        $return = $this->view('emails.register')
                    ->subject('Welcome to flytoinfinity')
                    ->from('info@flytoinfinity.com', 'Flytoinfinity')
                    ->with([
                                'email'          => $email,
                                'company_name'  => 'Fly to inifinity',
                                'firstname'  => $this->data['firstname'],
                                'name'  => $this->data['lastname'],
                                'login_username'  => $this->data['username'],
                                'password'  => $this->data['password'],
                                'content'  =>''
                                 
                            ]);
        return $return ;
    }
}
