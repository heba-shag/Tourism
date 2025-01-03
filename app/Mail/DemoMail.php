<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class DemoMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $name;
    public $email;
    public $message;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $message)
    {
       
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
        ->subject('New message from website')
        ->view('send-e')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
    }
}