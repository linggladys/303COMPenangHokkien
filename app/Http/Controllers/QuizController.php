<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\QuizAnswer;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use App\Models\PhraseCategory;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $phraseCategories = PhraseCategory::get();

        return view('games.quiz.quiz_index', [
            'phraseCategories' => $phraseCategories,

        ]);
    }

    public function quizStatistics()
    {
        $data['lineChart'] = QuizResult::select(DB::raw("points"), DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as quiz_taken_date"))
            ->where('user_id', auth()->user()->id)
            ->orderBy('quiz_taken_date')
            ->get();

        $latestScore = QuizResult::select(
            DB::raw('points'),
            DB::raw('phrase_categories.phrase_category_name')
            )
            ->leftJoin('phrase_categories', 'quiz_results.phrase_category_id','=','phrase_categories.id')
            ->orderBy('quiz_results.id','desc')
            ->where('user_id',auth()->user()->id)
            ->take(4)
            ->get();

            // dd($latestScore);
        return view('games.quiz.quiz_statistics_info', [
            'latestScore' => $latestScore,
            'lineChartResults' => $data['lineChart']

        ]);
    }

    public function quizInfo($phraseCategoryId)
    {
        $phraseCategory = PhraseCategory::where('id', $phraseCategoryId)->with('userResult')->first();
        $quizResultsInfo = QuizResult::select(
            DB::raw('correct_answers as correct'),
            DB::raw('wrong_answers as wrong')
        )
            ->where('phrase_category_id', $phraseCategoryId)
            ->orderBy('quiz_results.id', 'desc')
            ->limit(1)
            ->get();
        $data = "";
        foreach ($quizResultsInfo as $quizResult) {
            $data .= " ['Wrong Answers',    " . $quizResult->wrong . "],
            ['Correct Answers',    " . $quizResult->correct . "] ";
        }

        $quizResultData = $data;
        return view('games.quiz.quiz_show', [
            'phraseCategory' => $phraseCategory,
            'quizResultData' => $quizResultData
        ]);
    }

    public function startQuiz($phraseCategoryId)
    {
        $phraseCategory = PhraseCategory::where('id', $phraseCategoryId)->with('questions')->first();

        return view('games.quiz.quiz_start', [
            'phraseCategory' => $phraseCategory
        ]);
    }

    public function quizReview($phraseCategoryId)
    {
        $phraseCategory = PhraseCategory::with('questions.user_answer')->where('id', $phraseCategoryId)->first();
        $latestScoredPoints = QuizResult::orderBy('id', 'desc')->first()->points;

        if ($phraseCategory->userResult) {
            return view('games.quiz.quiz_review', [
                'phraseCategory' => $phraseCategory,
                'latestScoredPoints' => $latestScoredPoints
            ]);
        } else {
            abort(404);
        }
    }

    public function quizResult(Request $request, $phraseCategoryId)
    {
        $phraseCategory = PhraseCategory::with('questions')->where('id', $phraseCategoryId)->first();
        $correct_answers = 0;
        foreach ($phraseCategory->questions as $question) {
            echo $question->id . '-' . $question->correct_answer . '/' . $request->post($question->id) . '<br>';
            QuizAnswer::create([
                'user_id' => auth()->user()->id,
                'quiz_question_id' => $question->id,
                'answer' => $request->post($question->id),
            ]);

            if ($question->correct_answer === $request->post($question->id)) {
                $correct_answers += 1;
            }
        }

        $points = round((100 / count($phraseCategory->questions)) * $correct_answers);
        $wrong_answers = count($phraseCategory->questions) - $correct_answers;
        //    dd($wrong_answers);
        QuizResult::create([
            'user_id' => auth()->user()->id,
            'phrase_category_id' =>  $phraseCategory->id,
            'points' => $points,
            'correct_answers' => $correct_answers,
            'wrong_answers' => $wrong_answers
        ]);

        return redirect(route('quiz.quizInfo', $phraseCategoryId))->withSuccess('You have done your quiz! Total points: ' . $points);
    }
}
