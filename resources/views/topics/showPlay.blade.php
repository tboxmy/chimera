
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="topics center sans-serif">
                <h1>{{ $topic->name }}</h1>
                @php                 
                $question = $questions[$current];                
                @endphp
                <div >
                
                <p>{{ $question->description }}</p>
                <p>{{ $question->type }}</p>
                <hr>
                <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">{{ $question->name }}
            <span class="text-muted">({{ $question->id }})</span></h2>
            {{ Form::open(array('route' => 'topics.storeAnswer', 'method'=>'post')) }}
        {!! Form::token() !!}        
        {{ Form::hidden('question_id',$question->id)}}
        {{ Form::hidden('topic_id', $topic->id) }}
        {{ Form::hidden('current', $current) }}
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
    </div>
</div>
@endsection