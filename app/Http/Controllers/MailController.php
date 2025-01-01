<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
// use Mail;
use App\Mail\DemoMail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
  
class MailController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
    
        $adminEmail = 'taima.6.2000@gmail.com';
        $mail = new DemoMail($name, $email, $message);

        // Send the email message
        Mail::to('taima.6.2000@gmail.com')->send($mail);
        // Mail::to($adminEmail)->send($mail);
        // Get the message body as a string
$body = $mail->render();

// Get the message subject as a string
$subject = $mail->subject;
    
        return response()->json(['success' => true]);
    }
}