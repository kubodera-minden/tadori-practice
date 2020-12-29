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
      // 各articleの作られた時間を日付だけのフォーマットに変換する。
      foreach ($articles as $article) {
        $date = date_create($article->date);
        $date = date_format($article->created_at , 'Y-m-d');
        $article->date = $date; 
      }
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
      return $article->id;
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

    // editor.jsからAPIで画像が送られてきたときの処理
    public function image_store(Request $request)
    {
      $path = $request->file('image')->store('public/article_img'); //例 http://localhost/public/article_img/sample.jpg
      $path_to_storage = str_replace("public","storage",$path); //publicのままだと参照できないのでstorageを参照するようにpathを書き換える  例 http://localhost/storage/article_img/sample.jpg
      $json = array('success'=>1, 'file'=>array('url'=>$path_to_storage));
      return json_encode($json);
    }

    public function thumbnail_store(Request $request,$id)
    {
      $path = $request->file('image')->store('public/thumbnail');
      $article = Article::find($id);
      $article->thumbnail_path = basename($path); //そのままだと、フルパスがDBに格納されてしまうのでbasenameでファイル名を取り出してから格納。
      $article->save();
      return response()->json(['success' => 'ユーザー画像がDBに格納されました']);
    }
}
