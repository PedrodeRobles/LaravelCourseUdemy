<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Messagescontroller extends Controller
{
    public function store(Request $request) 
    {
        $msg = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ], [
            'name.required' => "Necesito tu nombre"
        ]);

        //Enviar email
        Mail::to('piterddr@gmail.com')->queue(new MessageRecieved($msg));

        return back()->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas.');
    }
}
