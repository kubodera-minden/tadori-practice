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

    public function image_store(Request $request,$id)
    {
        $path = $request->file('image')->store('public/product_img');
        $product = Product::find($id);
        $product->image_path = basename($path); //そのままだと、フルパスがDBに格納されてしまうのでbasenameでファイル名を取り出してから格納。
        $product->save();
        return response()->json(['success' => 'ユーザー画像がDBに格納されました']);
    }
}