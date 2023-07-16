<?php

namespace App\Http\Controllers\Admin;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;


class  ContactController extends Controller
{

    public function contact(Request $request)
    {
        $input = $request->except('_token');

        return $input;
    }


    public function sendMail($email, $msg)
    {
        $mail = new PHPMailer(true);

        $mail->Mailer = env('MAIL_MAILER');
        $mail->Host = env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port = env("MAIL_PORT");

        $mail->setFrom($email, 'visitor');
        $mail->addAddress('vit.chebotnikov@gmail.com');

        $mail->Subject = "question";
        $mail->Body = $msg;

        return ($mail->send()) ? true : false;
    }
}
