<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::all();
      return $products;
    }

    public function store(Request $request)
    {
      $product = new Product;
      $product->name = $request->name;
      $product->content = $request->content;
      $product->price = $request->price;
      $product->save();
      return redirect('api/products');
    }

    public function show($id)
    {
      $product = Product::find($id);
      return $product;
    }

    public function update(Request $request, $id)
    {
      $product = Product::find($id);
      $product->name = $request->name;
      $product->content = $request->content;
    //   $path = $request->file('image')->store('public/thumbnail');
    //   $product->thumbnail_path = basename($path);
      $product->save();
      return redirect("api/products/".$id);
    }

    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete();
      return redirect('api/products');
    }

    // editor.jsからAPIで画像が送られてきたときの処理
    public function image_store(Request $request)
    {
      $path = $request->file('image')->store('public/product_img'); //例 http://localhost/public/product_img/sample.jpg
      $path_to_storage = str_replace("public","storage",$path); //publicのままだと参照できないのでstorageを参照するようにpathを書き換える  例 http://localhost/storage/article_img/sample.jpg
      $json = array('success'=>1, 'file'=>array('url'=>$path_to_storage));
      return json_encode($json);
    }
}