<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuizController extends Controller
{
    public function index() {
		$questions = Question::get();
		return view('admin.quiz.index',compact('questions'));
	}
	public function score(Request $request) {
		
		$questions = Question::all();
		$request->validate([
            'answer' => 'required|array|size:'.count($questions),
		],[
			'answer.size' => 'all the question answer is required'
		]);
		$answers = $request->input('answer');
        $results = [];

        $totalCorrect = 0;
		$totalIncorrect = 0;
        foreach ($questions as $question) {
            $correctAnswer = $question->correct_option;
            $userAnswer = array_key_exists($question->id,$answers) ? $answers[$question->id] : '';

            if ($correctAnswer === $userAnswer) {
                $totalCorrect++;
                $isCorrect = true;
            } else {
				$totalIncorrect++;
                $isCorrect = false;
            }

            $results[] = [
                'question' => $question->question_text,
                'user_answer' => $userAnswer,
                'correct_answer' => $correctAnswer,
                'is_correct' => $isCorrect,
            ];
        }

        // Calculate score
        $score['totalCorrect'] = $totalCorrect;
		$score['totalIncorrect'] = $totalIncorrect;

        // Store results in session
        $request->session()->flash('results', $results);
        $request->session()->flash('score', $score);

        return redirect()->route('admin.quiz')->with('success', 'Quiz completed Successfully You got '.$totalCorrect.' score!');
	}
}
