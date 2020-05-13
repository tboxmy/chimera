<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Topic;
use Illuminate\Http\Request;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        return view('quizzes.index',compact('quizzes'));
    }

    public function indexPublished()
    {
        //
        $currentDate=Carbon::now(); // Current date
        $quizzes = Quiz::where('publish_start','<=', $currentDate);
        //$questions = Question::all()->groupBy('topic_id');
        return view('quizzes.indexpublished',compact('quizzes'));
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
            'publish_start'=>$request->get('publish_start'),
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
        $tempQuiz = $quiz;
        $quiz = Quiz::findOrFail($tempQuiz->id);
        return view('quizzes.edit', compact('quiz'));
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required'            
        ]);
        $quiz = Quiz::where('id', $id)->first();
        $quiz->name=$request->get('name');
        $quiz->description=$request->get('description');
        $publish_status=$request->get('published');
        echo "before update ".$id;
        
        if($publish_status == "no" && $quiz->publish_start != null){
            //Update if currently is published
            $quiz->publish_start = null;   
         
        } else if($publish_status == "yes"){
            // Update if currently published
            if($request->get('publish_date') == null){
                // do nothing
            } else {
                $quiz->publish_start = $request->get('publish_date');
            }

        // } else {
        //     echo "Nothing to do - ".$publish_status.", ";
        //     // if( $quiz->publish_start == null)
        //     //    $quiz->publish_start=null;
        }

        // Quiz::whereId($id)->update($quiz);
        $quiz->update();      
        return redirect('quizzes')->with('success','Quiz Saved');
        
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
