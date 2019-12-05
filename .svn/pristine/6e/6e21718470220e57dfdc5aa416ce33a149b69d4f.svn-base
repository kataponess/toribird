<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getIndex()
    {
        return view('contact.form');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'title' => 'required',
            'body' => 'required|max:500',
        ]);

        $data = $request->all();
        return view('contact.confirm', compact('data'));
    }

    public function finish(Request $request)
    {
        $user = new \App\Contact;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->title = $request->title;
        $user->body = $request->body;
        $user->save();

        $dataArray = $request->all();

        Mail::send(array('text' => 'contact.message'), $dataArray, function ($message) use ($dataArray) {
            $message->to($dataArray["email"])->subject($dataArray["title"]);
        });

        Mail::send(array('text' => 'contact.to_me'), $dataArray, function ($message) {
            $message->to("kataponess1@gmail.com")->subject("問い合わせがありました。");
        });

        return view('contact.finish');
    }
}
