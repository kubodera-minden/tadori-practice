<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();
      return $users;
    }

    public function store(Request $request)
    {
    //   $users = new User;
    //   $users->title = $request->title;
    //   $users->content = $request->content;
    //   $users->save();
    //   return redirect('api/users');
    }

    public function show($id)
    {
      $user = User::find($id);
      return $user;
    }

    public function update(Request $request, $id)
    {
      $users = User::find($id);
      $users->name = $request->name;
      $users->save();
      return redirect("api/users/".$id);
    }

    public function destroy($id)
    {
      $users = User::find($id);
      $users->delete();
      return redirect('api/users');
    }
}
