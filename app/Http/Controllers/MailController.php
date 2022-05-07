<?php

namespace App\Http\Controllers;

use App\Mail\Test;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   public function send(Request $request)
   {
      $details = [
         'first_name' => 'test',
         'last_name' => 'xyz',
         'address' => 'test xyz'
      ];
      $mailable = new TestMail($details);
      // return $mailable;
      Mail::to('jose.fournier@mailbox.com')->send($mailable);

      return ['response' => 'the mail has been sent'];
   }
}
