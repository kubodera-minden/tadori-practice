<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interviewer;
use App\Http\Requests\InterviewerRequest;

class InterviewerController extends Controller
{
    public function index()
    {
      $interviewers = Interviewer::all();
      return $interviewers;
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
      $interviewer = Interviewer::find($id);
      return $interviewer;
    }

    public function update(Request $request, $id)
    {
      $interviewers = Interviewer::find($id);
      $interviewers->name = $request->name;
      $interviewers->save();
      return redirect("api/interviewers/".$id);
    }

    public function destroy($id)
    {
      $interviewers = Interviewer::find($id);
      $interviewers->delete();
      return redirect('api/interviewers');
    }

    //APIで画像が送られてきたときの処理
    public function image_store(Request $request,$id)
    {
      $path = $request->file('image')->store('public/interviewer_img');
      $interviewer = Interviewer::find($id);
      $interviewer->image_path = basename($path); //そのままだと、フルパスがDBに格納されてしまうのでbasenameでファイル名を取り出してから格納。
      $interviewer->save();
      return response()->json(['success' => 'ユーザー画像がDBに格納されました']);
    }

}
