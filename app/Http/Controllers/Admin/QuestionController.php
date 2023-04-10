<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Status;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
//        $statuses = Status::statusesQuestion()->get();
//        dd($statuses);
        return view("admins.questions.index",[
            'questions'=>Question::all(),
            'statuses'=>Status::statusesQuestion()->get(),
        ]);
    }

    public function edit(Question $question)
    {
        return view('admins.questions.update', [
            'question'=>$question,
            'statuses'=>Status::statusesQuestion()->get(),
        ]);
    }
    public function update(Request $request, Question $question)
    {
        $res = $question->update($request->all());

        return $res ? to_route('admin.question.index')->with(['success' => 'Успешно обновлено!']) :
            to_route('admin.question.index')->withErrors(['error' => 'Не удалось обновить!']);
    }

    public function filter(Request $request)
    {
        $question = Question::all();
//        dd($request->all());
        if ($request->status != 'all'){
            $question = $question->where('status_id', $request->status);
        }
//        dd($request->all() + ['question' => $question]);
        return back()->withInput($request->all() + ['questions' => $question]);
    }

    //ф-ция на отклонение вопроса
    public function rejectSatus(Question $question)
    {
    //отклоненный статус
        $res = $question->update(['status_id'=>5]);

        return $res ? to_route('admin.question.index')->with(['success' => 'Успешно отклонен!']) :
            to_route('admin.question.index')->withErrors(['error' => 'Не удалось отклонить!']);
    }

    public function destroy($id)
    {
        $res = Question::find($id)->delete();
        return $res ? to_route('admin.question.index')->with(['success' => 'Успешно удалено!']) :
            to_route('admin.question.index')->withErrors(['error' => 'Не удалось удалить!']);
    }

}
