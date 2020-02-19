<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Items;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
   //  public function basic_email(){
   //      $data = array('name'=>"Virat Gandhi");

   //      Mail::send(['text'=>'mail'], $data, function($message) {
   //         $message->to('alex_mobi@mail.ru', 'Tutorials Point')->subject
   //            ('Laravel Basic Testing Mail');
   //         $message->from('manager@gmail.com','Virat Gandhi');
   //      });
   //      echo "Basic Email Sent. Check your inbox.";
   //   }

   public function html_email(Request $request)
   {
      $items = '';
      if ($request['searchName'] != '') {
         if (isset($request['id'])) {
            $items = Items::select()->where('id', $request['id'])->first();
         }
         $data = array('name' => "Онлайн менеджер", 'request' => $request, 'items' => $items);
         Mail::send('mail', $data, function ($message) {
            $email = User::select()->where('id', 1)->first()->email;
            $message->to($email, 'Tutorials Point')->subject('Заявка с сайта');
            $message->from('manager@gmail.com', 'Онлайн менеджер');
         });
         return redirect('/')->with('status', 'Спасибо за заявку, мы скоро с Вами свяжемся!');
      } else {
         return redirect('/');
      }
   }

   //   public function attachment_email(){
   //      $data = array('name'=>"Virat Gandhi");
   //      Mail::send('mail', $data, function($message) {
   //         $message->to('alex_mobi@mail.ru', 'Tutorials Point')->subject
   //            ('Laravel Testing Mail with Attachment');
   //         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
   //         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
   //         $message->from('xyz@gmail.com','Virat Gandhi');
   //      });
   //      echo "Email Sent with attachment. Check your inbox.";
   //   }
}
