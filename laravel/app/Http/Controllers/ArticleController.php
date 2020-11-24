<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('article/index', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
  
        return view('article/edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect("/article");
    }
}
