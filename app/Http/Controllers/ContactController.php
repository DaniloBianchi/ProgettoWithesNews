<?php

namespace App\Http\Controllers;
use App\Mail\MailContatti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
      public function form()
    {
        $title = 'Pagina contatti';
        return view('contatti', ['title' => $title,]);
    }
    public function send(Request $request)
    {

       //dd($request->all());
       Mail::to('admin@example.com')->send(new MailContatti($request->name, $request->email, $request->message));

       if($request->mail){
           return redirect()->back()->with(['success' => 'Messaggio inviato con successo!']);
       }
        else{
            return redirect()->back()->with(['failed' => 'Campo Email obbligatorio']);
            }
    }

}
