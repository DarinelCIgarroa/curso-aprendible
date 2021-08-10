<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store()
    {
        $message = request()->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
            'subject'   =>  'required',
            'text'      =>  'required|min:10',
        ],[
            'text.min'   =>  'La descripción debe tener al menos 10 caracteres'
        ]);

        Mail::to('darinelcigarroa97@gmail.com')->queue(new MessageReceived($message));
        return back()->with('status', 'The email was sent successfully, we will contact you shortly.');
    }
}
