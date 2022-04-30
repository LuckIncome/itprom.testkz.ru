<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\UnionFeedback;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    
    public function feedback(Request $request)
    {
        if($request->get('check') == 'choice1')
        {
            $check = "Вступить в союз";
        }
        if($request->get('check') == 'choice2') {
            $check = "Другие деловые запросы";
        } 
        if($request->get('check') == 'choice3') {
            $check = "Сообщить о технической проблеме сайта";
        }
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $company = $request->get('company');
        $message = $request->get('message');
        $url = $request->get('url');

        $to = "itprom@itprom.kz";
        $subject = "Заявка с сайта itprom.kz";
        $sendfrom   = "no-reply@itprom.kz";
        $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

        $message = "
        $subject<br>
        <b>Выбор:</b> $check <br>
        <b>Имя:</b> $name <br>
        <b>Email:</b> $email <br>
        <b>Телефон:</b> $phone <br>
        <b>Компания:</b> $company <br>
        <b>Сообщения:</b> $message <br>
        <b>URL:</b> $url";

        $send = mail($to, $subject, $message, $headers);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        
        if ($send)
        { 
            $feedback = new Feedback();
            $feedback->check = $check;
            $feedback->name = $request->name;
            $feedback->email = $request->email;
            $feedback->phone = $request->phone;
            $feedback->company = $request->company;
            $feedback->message = $request->message;
            $feedback->save();
        }

        return response()->json(['success' => true], 200);
    }

    public function join(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $company = $request->get('company');
        $message = $request->get('message');
        $url = $request->get('url');

        $to = "itprom@itprom.kz";
        $subject = "Заявка с сайта itprom.kz";
        $sendfrom   = "no-reply@itprom.kz";
        $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

        $message = "
        $subject<br>
        <b>Имя:</b> $name <br>
        <b>Email:</b> $email <br>
        <b>Телефон:</b> $phone <br>
        <b>Компания:</b> $company <br>
        <b>Сообщения:</b> $message <br>
        <b>URL:</b> $url";

        $send = mail($to, $subject, $message, $headers);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        
        if ($send)
        { 
            $feedback = new UnionFeedback();
            $feedback->name = $request->name;
            $feedback->email = $request->email;
            $feedback->phone = $request->phone;
            $feedback->company = $request->company;
            $feedback->message = $request->message;
            $feedback->save();
        }

        return response()->json(['success' => true], 200);
    }
}
