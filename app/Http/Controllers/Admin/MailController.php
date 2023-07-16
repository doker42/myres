<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Mail\Foo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = [
            'email' => $request['email'],
            'message' => $request['message'],
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($data, [
            'email' => 'bail|required|email',
            'message' => 'bail|required',
        ]);

        if ($validator->fails()) {

            return [
                'contact_status' => false,
                'contact_message' => $validator->errors()->toArray()
            ];
        }

        Mail::to('vit.chebotnikov@gmail.com')->send(new HelloMail($data));

        return [
            'contact_status' => true,
            'request' => $data
        ];
    }
}
