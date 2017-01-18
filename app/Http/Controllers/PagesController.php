<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
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
}
