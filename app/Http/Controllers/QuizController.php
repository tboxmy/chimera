<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Topic;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizzes = Quiz::all();
        //$questions = Question::all()->groupBy('topic_id');
        return view('quizzes/index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $quiz = new Quiz();
        return view('quizzes.create');
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
        $request->validate([
            'name'=>'required',
            'description'=>'required'            
        ]);
        $quiz = new Quiz([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),            
        ]);
        $quiz->save();
        return redirect('/quizzes/')->with('success','Quiz Saved');
    }
    public function storeTopic(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //        
        $topics=$quiz->topics;       
        
        return view('quizzes.show',compact('quiz','topics'));
        // return view('quizzes.show',compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    public function editTopic(Quiz $quiz)
    {
        //
        
        $topics=Topic::whereNotNull('name')->get();
        
        return view('quizzes.show_topic', compact('quiz','topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
        
    }

    public function updateTopic(Request $request, Quiz $quiz)
    {
        //
        if( $request->get('delete') == 'true' )
        { 
            $topic=Topic::find($request->get('topic_id'));
            $quiz->topics()->detach( $topic);
            
        }
        else {        
        $topic=Topic::find($request->get('topic'));
        $quiz->topics()->sync( $topic, false);
        $quiz->save();             
        }
        $topics=$quiz->topics;  
        return view('quizzes.show',compact('quiz','topics'))->with('success','Quiz Saved');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
