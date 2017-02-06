<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view
        $posts = Post::orderby('id', 'desc')->paginate(5);
        Carbon::setLocale('ru');
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this ->validate($request, array (
            'title' => 'required',
            'body' => 'required',
            //'slug' => 'required'
        ));


        //store

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        ($request->slug == '') ? $post->slug = str_slug($request->title) : $post->slug = $request->slug;


        Session::flash('success', 'Статья успешно добавлена');

        $post -> save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Найти запись в бд
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this ->validate($request, array (
                'title' => 'required',
                'body' => 'required'
            ));
        }else {
            $this ->validate($request, array (
                'title' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:25|unique:posts,slug',
                'body' => 'required'
            ));
        }


        //сохраним данные
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        ($request->slug == '') ? $post->slug = str_slug($request->title) : $post->slug = $request->slug;
        $post -> save();


        Session::flash('success', 'Статья успешно отредактирована');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Статья успешно удалена');
        return redirect()->route('posts.index');
    }
}
