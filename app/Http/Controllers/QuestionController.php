<?php

namespace App\Http\Controllers;

use App\Question;
use App\AnswerMultiplechoice;
use App\AnswerTruefalse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        
        // Do Laravel validation process if data fails.
        $validatedData = $request->validate([
            'answer_id' => 'required',
        ]);        

        $question=Question::find($request->get('question_id'));
        if( $question->type == 'truefalse' )
            $answer=AnswerTruefalse::find($request->get('answer_id'));
        else        // default
            $answer=AnswerMultiplechoice::find($request->get('answer_id'));
        if($answer->is_answer == 1)
            $result = "Correct";
        else
            $result = "Wrong";
        $answer_id=$request->get('answer_id');
        return view('questions.showResult', compact('question', 'answer', 'result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        if($question->type == 'truefalse'){
            $answers=AnswerTruefalse::where('question_id','=',$question->id)->get();
        } else{
            // Default question type is multiple choice.
            $answers=AnswerMultiplechoice::where('question_id','=',$question->id)->get();
        }

        return view('questions.show',compact('question', 'answers'));
    }
    

    public function showAnswer(Question $question)
    {        
        if($question->type == 'truefalse'){
            $answers=AnswerTruefalse::where('question_id','=',$question->id)->get();
        } else{
            // Default question type is multiple choice.
            $answers=AnswerMultiplechoice::where('question_id','=',$question->id)->get();
        }

        return view('questions.show',compact('question', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
