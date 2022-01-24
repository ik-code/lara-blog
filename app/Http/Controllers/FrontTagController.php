<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class FrontTagController extends Controller
{
    public function index($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->orderBy('id','desc')->paginate(2);
        return view('front.tags.index', compact('tag', 'posts'));

    }
}
