<?php
namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function sendEmailReminder()
    {
        $data = 'ทดสอบการส่ง Mail';
        Mail::send('Test Mail gun', $data, function ($message) {
            $message->from('info@moresmartstore.com', 'mStore');
            $message->to('adzoneservice@gmail.com');
        });
    }
}
