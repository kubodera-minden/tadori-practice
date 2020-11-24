<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('article/index', compact('articles'));
    }

    public function create()
    {
        // 空の$articleを渡す
        $article = new Article();
        return view('article/create', compact('article'));
    }
    
    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
    
        return redirect("/article");
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
  
        return view('article/edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect("/article");
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
    
        return redirect("/article");
    }
}
