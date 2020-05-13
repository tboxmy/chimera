
@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Quiz</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


=======
>>>>>>> 1f51a1505299efe80039361bac86d926dd1a1349
    <div class="topics center sans-serif">    
        <h1>{{$quiz->name}}({{ $quiz->id }})</h1>
        <p>{{ $quiz->description }}</p>
        @if ($quiz->publish_start != null)
            Publish: {{ $quiz->publish_start->format('d-m-Y') }}
        @endif
        <p>{{ $quiz->update_at }}</p> 
        <a href="{{ route('quizzes.edit', $quiz) }}">Edit</a> |
        <a href="{{ route('quizzes.showTopic',$quiz) }}">Assign Topic</a>
        @if(count($topics) < 1)
            <p>No Topic selected.</p>
        @else
        
        @foreach( $topics as $topic)
        <p><a href="{{ route('topics.show',$topic) }}">{{ $topic->name  }}</a> - {{ $topic->description }}
        {{ Form::open(array('route' => array('quizzes.updateTopic',$quiz), 'method'=>'post')) }}
        {!! Form::token() !!} 
        {{ Form::hidden('topic_id',$topic->id)}}            
        {{ Form::hidden('delete','true')}} 
            {{ Form::button('<span class="glyphicon glyphicon-search">Delete</span>',
    array(
        'class'=>'btn btn-warning', 
        'value'=>'delete',
        'type'=>'submit')) }}        
        {{ Form::close() }}
        </p>
        @endforeach
        @endif
    </div>
<<<<<<< HEAD


                </div>
            </div>
        </div>
    </div>
</div>
=======
>>>>>>> 1f51a1505299efe80039361bac86d926dd1a1349
@endsection