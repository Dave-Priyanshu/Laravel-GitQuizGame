<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getQuestions(): JsonResponse
    {
        $question = Question::all();
        return response()->json($question);

    }
}
