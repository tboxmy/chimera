<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Quiz;
use App\Question;
use App\AnswerMultiplechoice;
use App\AnswerTruefalse;
use App\User;
use Auth;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $topics = Topic::all();
        $questions = Question::all()->groupBy('topic_id');
        return view('topics/index',compact('topics','questions'));
    }

    public function api_index()
    {
        //
        $topics = Topic::all();
        return response($topics, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeAnswer(Request $request)
    {

        // Do Laravel validation process if data fails.
        $validatedData = $request->validate([
            'answer_id' => 'required',
        ]);        
        
        $question=Question::find($request->get('question_id'));
        $answer_id=$request->get('answer_id');
        if( $question->type == 'truefalse' )
            $answer=AnswerTruefalse::find($answer_id);
        else        // default
            $answer=AnswerMultiplechoice::find($answer_id);
        if($answer->is_answer == 1)
            $result = "Correct";
        else
            $result = "Wrong";        
        $topic = Topic::find($request->get('topic_id'));
        if($question->type == 'truefalse'){
            $answers=AnswerTruefalse::where('question_id','=',$question->id)->get();
        } else{
            // Default question type is multiple choice.
            $answers=AnswerMultiplechoice::where('question_id','=',$question->id)->get();
        }
        $questions = Question::where('topic_id','=',$topic->id)->get(); 
        $current = $request->get('current');
        $quiz_id = $request->get('quiz_id');
        if( $questions != null){
            if ($current+1 < count($questions) ){
            $next = ($request->get('current')) + 1;
            } else {
            $next = -1; //end of quiz;
            }   
        }

        $this->updateUserResults(Auth::user()->id, $quiz_id, $question->id, $answer->is_answer);
        return view('topics.showPlayResult', compact('quiz_id', 'question', 'answers', 'result', 
        'topic','answer_id','next'));
    }

    public function updateUserResults($user, $quiz, $question, $result){
        // Save to database table.

        echo "User=".$user;
        echo "Quiz=".$quiz;
        echo "Question=".$question;
        echo "Result=".$result;
        $user = User::find($user);

        try {
            echo "-User=".$user->id;
            $user->quizzes()->attach($quiz, ['question_id'=> $question, 'result'=>$result]);
            
        } catch (\Illuminate\Database\QueryException $exception) {
            echo "Catch=".$exception->getMessage();
            // $quiz= Quiz::find($quiz);
            $user->quizzes()->wherePivot('question_id', $question)->updateExistingPivot( 
                $quiz, ['result'=>$result]);
            
            // $user->quizzes()->attach($quiz, ['question_id'=> $question, 'result'=>$result]);
            // $user->quizzes()->sync($quiz, ['question_id'=>$question, 'result'=>$result]);
        }
        
        
        // $user->save();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
        $questions = Question::where('topic_id','=',$topic->id)->get();             
        return view('topics.show',compact('topic','questions'));        
    }
    public function showPlay($quiz_id, Topic $topic, $current)
    {
        //
        $questions = Question::where('topic_id','=',$topic->id)->get();
        $question = $questions[$current];
        if($question->type == 'truefalse'){
            $answers=AnswerTruefalse::where('question_id','=',$question->id)->get();
        } else{
            // Default question type is multiple choice.
            $answers=AnswerMultiplechoice::where('question_id','=',$question->id)->get();
        }
        // return view('topics.show',compact('topic','questions'));
        $quiz = Quiz::find($quiz_id);
        return view('topics.showPlay',compact('quiz', 'topic','questions','answers','current'));
    }
       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
