<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
      $questions = Question::all();
      return $questions;
    }

    public function store(Request $request)
    {
      $questions = new Question;
      $questions->title = $request->title;
      $questions->content = $request->content;
      $questions->user_id = $request->user_id;
      $questions->save();
      return $questions->id;
    }

    public function show($id)
    {
      $questions = Question::find($id);
      return $questions;
    }

    public function update(Request $request, $id)
    {
      $questions = Question::find($id);
      $questions->title = $request->title;
      $questions->content = $request->content;
      $questions->opening_comment = $request->opening_comment;
      $questions->interviewee_name = $request->interviewee_name;
      $questions->interviewer_comment = $request->interviewer_comment;
      $questions->questioner_comment = $request->questioner_comment;
      $questions->save();
      return redirect("api/questions/".$id);
    }

    public function update_question(Request $request, $id)
    {
      $question = Question::find($id);
      $question->interviewer_id = $request->interviewer_id;
      $question->opening_comment = $request->opening_comment;
      $question->interviewer_comment = $request->interviewer_comment;
      $question->questioner_comment = $request->questioner_comment;
      $question->article_id = $request->article_id;
      $question->save();
      return $id;
    }

    public function destroy($id)
    {
      $questions = Question::find($id);
      $questions->delete();
      return redirect('api/questions');
    }
}
