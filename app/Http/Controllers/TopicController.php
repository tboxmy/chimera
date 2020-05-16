<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Question;
use App\AnswerMultiplechoice;
use App\AnswerTruefalse;
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
        
        if ($current+1 < count($questions) ){
            $next = ($request->get('current')) + 1;
        } else {
            $next = -1; //end of quiz;
        }   
        
        return view('topics.showPlayResult', compact('question', 'answers', 'result', 
        'topic','answer_id','next'));
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
    public function showPlay(Topic $topic, $current)
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
        return view('topics.showPlay',compact('topic','questions','answers','current'));
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
