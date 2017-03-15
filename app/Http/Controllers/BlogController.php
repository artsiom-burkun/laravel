<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Comment;

class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::orderby('id', 'desc')->paginate(5);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();

        $allposts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $categories = Category::all();

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        $comments = Comment::all();

        return view('blog.single')->withPost($post)->withTags($tags2)->withAllposts($allposts)->withCategories($categories)->withComments($comments);
    }
}
