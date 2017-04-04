<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Purifier;
use Session;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // validate
        $this ->validate($request, array (
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            //'slug' => 'required'
        ));


        //store

        $post = new Post;
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        ($request->slug == '') ? $post->slug = str_slug($request->title) : $post->slug = $request->slug;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }



        $post -> save();

        $post -> tags() -> sync($request->tags, false);

        Session::flash('success', 'Статья успешно добавлена');
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

        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
                'body' => 'required',
                'category_id' => 'required'
            ));
        }else {
            $this ->validate($request, array (
                'title' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:25|unique:posts,slug',
                'body' => 'required',
                'category_id' => 'required'
            ));
        }


        //сохраним данные
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->category_id = $request->input('category_id');

        ($request->slug == '') ? $post->slug = str_slug($request->title) : $post->slug = $request->slug;
        $post -> save();
        if (isset($request->tags)) {
            $post -> tags() -> sync($request->tags);
        } else {
            $post -> tags() -> sync([]);
        }



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
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'Статья успешно удалена');
        return redirect()->route('posts.index');
    }
}

