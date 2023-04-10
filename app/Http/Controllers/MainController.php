<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("main",[
            'categories'=>Category::take(3)->get(),
            'questionsAll'=>Question::all(),
            'questions'=>Question::getQuestions(5)->get(),
        ]);
    }

    public function about()
    {
        return view("about",[
            'questions'=>Question::all(),
        ]);
    }



}
