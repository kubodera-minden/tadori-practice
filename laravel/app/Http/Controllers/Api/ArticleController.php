<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
      $articles = Article::all();
      return $articles;
    }

    public function store(Request $request)
    {
      $article = new Article;
      $article->title = $request->title;
      $article->content = $request->content;
    //   $path = $request->file('image')->store('public/thumbnail');  //imageをstorage/public/thumbnailディレクトリに保存。https://qiita.com/10mi8o/items/ce9c875e736c7b1d2498
    //   $article->thumbnail_path = basename($path); //そのままだと、フルパスがDBに格納されてしまうのでbasenameでファイル名を取り出してから格納。
      $article->save();
      return redirect('api/articles');
    }

    public function show($id)
    {
      $article = Article::find($id);
      return $article;
    }

    public function update(Request $request, $id)
    {
      $article = Article::find($id);
      $article->title = $request->title;
      $article->content = $request->content;
    //   $path = $request->file('image')->store('public/thumbnail');
    //   $article->thumbnail_path = basename($path);
      $article->save();
      return redirect("api/articles/".$id);
    }

    public function destroy($id)
    {
      $article = Article::find($id);
      $article->delete();
      return redirect('api/articles');
    }
}
