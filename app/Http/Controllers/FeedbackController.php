<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function send(Request $request)
    {

        if (isset($request)) {
            $comment = 'Это сообщение отправлено из формы обратной связи \r\n';
            $comment .= $request['searchName'];
            $comment .= $request['searchTel'];
            $comment .= $request['searchComment'];
            $toEmail = "alex_mobi@mail.ru";
            Mail::to($toEmail)->send(new FeedbackMail($comment));
            return 'Сообщение отправлено на адрес ' . $toEmail;
        } else {
            return 'Что-то пошло не так ';
        }
    }
}
