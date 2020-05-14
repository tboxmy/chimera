@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Quiz</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">{{ $question->name }}
            <span class="text-muted">({{ $question->id }})</span></h2>
            {{ Form::open(array('route' => 'questions.storeAnswer', 'method'=>'post')) }}
        {!! Form::token() !!}        
        {{ Form::hidden('question_id',$question->id)}}
        @foreach($answers as $answer)            
        <p class="lead">{{ Form::radio('answer_id', $answer->id, false)}}  {{ $answer->name }}</p>
        @endforeach
        <br/>
        {{ Form::submit('Submit') }}
        {{ Form::close() }}
          </div>
          <div class="col-md-5">
          
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image"
            src="{{ asset('images/a-brain-7.jpg') }}">
          </div>
    </div>


  </div>
</div>
</div>
@endsection