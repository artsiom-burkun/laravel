<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Post;


class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = 'Artsiom';
        $second = 'Burkun';

        $fullname = $first . " " . $second;
        $email = "fartunastar_artem@mail.ru";
        $data = [];
        $data['fullname'] = $fullname;
        $data['email'] = $email;

        return view('pages.about')->withData($data);
        //return view('pages.about')->withFullname($fullname)->withEmail($email);
        //return view('pages.about')->with("fullname", $full);
    }

    public function getContact() {
        return view('pages.kontakty');
    }

    public function postContact(Request $request) {

        // validate
        $this ->validate($request, array (
            "name" => 'required',
            "email" => 'required|email',
            "message" => 'required',
        ));

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'subject' => 'Сообщение с сайта',
            'bodymessage' => $request->message
        ];

        Mail::send('emails.kontakty', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('artsiom.burkun@gmail.com');
            $message->subject($data['subject']);

        } );





        //return
        Session::flash('success', 'Сообщение успешно отправлено');
        return back()->withInput();
    }
}
