<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $res = false;

//        dd($request->all());

        if($request->all()!=null){

                $res = Question::create([
                    'user_id' => auth()->id(),
                    'status_id' => 1,
                    'question' => $request->question,
                ]);
        }
        return $res ? back()->with(['success' => 'Вопрос успешно задан!']) :
            back()->withErrors(['error' => 'Не удалось задать вопрос :(']);
    }


}
