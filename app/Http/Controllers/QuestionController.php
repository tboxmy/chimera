<?php

namespace App\Http\Controllers;

use App\Question;
use App\AnswerMultiplechoice;
use App\AnswerTruefalse;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;


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
        $temp = $question;
        $question = Question::findOrFail($temp->id);
        return view('questions.edit', compact('question'));
    }

    function fetch_image($image_id)
    {
    //  $image = Images::findOrFail($image_id);
        $question = Question::find($image_id);
        $destinationPath = public_path().'/temp/questions/';
        $filename = $question->image;

        $image_file = Image::make($destinationPath.$filename);
        $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Question $question)
    public function update(Request $request, $id)
    {
        // from view http://localhost:81/questions/1/edit 

        $validatedData = $request->validate([
            'question_name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'image1' => 'image|max:2048'
        ]);        

        $question=Question::find($id);
        $question->name = $request->question_name;
              
        $question->description == $request->description;        

        // $image_file = $request->image;
        // $image_file = $request->file('image1');
        if ($request->hasFile('image1')) {
            $somename = basename( $request->file('image1')->getClientOriginalName(), '.'.$request->file('image1')->getClientOriginalExtension());        
            $image_file = $request->file('image1')
            ->move(public_path('temp'),time() .'-'. $request->file('image1')
            ->getClientOriginalName());

        // $image = Question::make($image_file);
        

        }
        if( isset($image_file) ){
            echo "image1 exist";
            $destinationPath = public_path().'/temp/questions/';
            $filename = 'question-'.$question->id . '.' . $request->file('image1')->getClientOriginalExtension();
            $question->image = Image::make($image_file)->encode('jpeg')->save($destinationPath.$filename);
            $makeimage = Image::make($image_file)->encode('jpeg')->save($destinationPath.$filename);
            $question->image = $filename;
        }

        // php artisan storage:link 
        // Response::make($image_file->encode('jpeg'));
        // $image = Image::make( $image_file);
        // $destinationPath = public_path().'/temp/';
        // $filename = $destinationPath . '' . 'aaa' . '.' . $image_file->getClientOriginalExtension();

        // $salt1      = bin2hex(openssl_random_pseudo_bytes(22));
        // $filename = $salt1.'.'.$request->file('image1')->getClientOriginalExtension();
        // $destinationPath = public_path('temp/');
        // $image_file->move($destinationPath, $filename);

        // $var = Image::make($image_file)->encode('jpeg');
        // $filename = time() . '.' . $request->file('image1')->getClientOriginalExtension();
        
        // Image::make($filename)->encode('jpg')->save($destinationPath.$filename);
        // $question->image=null;
        //$question->image= Image::make($image_file->getRealPath())->resize('200','200')->save('temp/'.$filename);
        
        if( isset($request->image1_hide) && $request->image1_hide){
            $question->image = null;
        }


        $question->update();
        
       
        return view('questions.edit', compact('question'));
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
