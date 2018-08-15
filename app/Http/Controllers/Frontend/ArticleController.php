<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.list');
    }

    public function show(Article $article,Request $request)
    {
        return view('frontend.info');
    }
}
