<?php

namespace App\Http\Controllers;

use App\Models\Category;

class FrontCategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id','desc')->paginate(2);
        return view('front.categories.index', compact('category', 'posts'));

    }
}
