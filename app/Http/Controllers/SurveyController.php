<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\SurveyUserInput;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function index(int $id)
    {
        $surveys = $this->surveyQuestions();
        $submissions = SurveyUserInput::with('surveys:id,question')->where('userId', $id)->get()->toArray();
        if (empty($submissions)) {
            return view('surveyQuestions', ['surveys' => $surveys, 'userId' => $id, 'submissions' => false]);
        }
        return view('surveyQuestions', ['surveys' => $surveys, 'userId' => $id, 'submissions' => true]);
    }
    protected function surveyQuestions()
    {
        $surveys = Survey::all();
        return $surveys;
    }
    public function create(Request $request, int $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'answer1' => 'nullable|string',
                'answer2' => 'nullable|string',
                'answer3' => 'nullable|string',
                'answer4' => 'nullable|string',
                'answer5' => 'nullable|string',
                'surveyId'    => 'required|array',
                'userId'    => 'required|integer'
            ]
        );

        $userId = $request->userId;
        $surveys = $this->surveyQuestions();

        if ($validator->fails()) {

            return view('surveyQuestions', ['errors' => $validator->errors()->all(), 'surveys' => $surveys, 'userId' => $userId, 'submissions' => false]);
        }

        if (SurveyUserInput::where('userId', $userId)->exists()) {

            return view('surveyQuestions', ['errors' => ['Your survey has already submitted'], 'surveys' => $surveys, 'userId' => $userId, 'submissions' => true]);
        }
        $surveyIds = $request->surveyId;
        $answers = [
            $request->answer1,
            $request->answer2,
            $request->answer3,
            $request->answer4,
            $request->answer5
        ];
        $user = [];
        foreach ($answers as $key => $answer) {
            if (isset($answer)) {
                $user = SurveyUserInput::create([
                    'surveyId' => $surveyIds[$key],
                    'userId' => $userId,
                    'answer' => $answer
                ]);
            }
        }

        //dd($user);
        if (!empty($user)) {
            return redirect()->route('userProfile', $user['id']);
        }
        return redirect()->route('survey.questions', $userId);
    }

    public function view(int $id)
    {
        $surveys = SurveyUserInput::with('surveys:id,question')->where('userId', $id)->get()->toArray();

        if (empty($surveys)) {
            return view('viewSurvey', ['surveys' => $surveys, 'submissions' => false]);
        }
        return view('viewSurvey', ['surveys' => $surveys, 'submissions' => true]);
    }
}
