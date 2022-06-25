<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * question store function
     * param Request $request
     */
    public function store(Request $request)
    {
        $questions = new Question();
        $questions->personality1 = $request->personality1;
        $questions->personality2 = $request->personality2;
        $questions->hobby1 = $request->hobby1;
        $questions->hobby2 = $request->hobby2;
        $questions->mindset1 = $request->mindset1;
        $questions->mindset2 = $request->mindset2;
        $questions->user_id = Auth::id();
        if ($questions->save()) {
            return view('counsellor.profile');
        }
    }
}
