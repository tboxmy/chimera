
@extends('layouts.app')

@section('content')
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


    <div class="topics center sans-serif">    
        <h1>{{$quiz->name}}({{ $quiz->id }})</h1>
    @if(Auth::user()->isAdmin() )
        <table><tr><td>        
        {{ Form::open(array('route' => array('quizzes.index'), 'method'=>'get')) }}        
        {!! Form::token() !!}               
        
        {{ Form::button('<span class="glyphicon glyphicon-search">Back</span>',
    array(
        'class'=>'btn btn-warning', 
        'value'=>'quizzes',
        'type'=>'submit')) }}        
        {{ Form::close() }}
        </td><td>
        {{ Form::open(array('route' => array('quizzes.destroy',$quiz), 'method'=>'delete')) }}        
        {!! Form::token() !!}               
        {{ Form::hidden('delete','true')}} 
        {{ Form::button('<span class="glyphicon glyphicon-search">Delete</span>',
    array(
        'class'=>'btn btn-warning', 
        'value'=>'delete',
        'type'=>'submit')) }}        
        {{ Form::close() }}        
        </td></tr>
        </table>
        
        <p>{{ $quiz->description }}</p>
        @if ($quiz->publish_start != null)
            Publish: {{ $quiz->publish_start->format('d-m-Y') }}
        @endif
        <p>{{ $quiz->update_at }}</p> 
        <a href="{{ route('quizzes.edit', $quiz) }}">Edit</a> |
        <a href="{{ route('quizzes.showTopic',$quiz) }}">Assign Topic</a> 
    @endif  
        @if(count($topics) < 1)
            <p>No Topic selected.</p>
        @else
      
        @foreach( $topics as $topic)
        <p><a href="{{ route('topics.show',$topic) }}">{{ $topic->name  }}</a> - {{ $topic->description }}
        <a href="{{ route('topics.play',['quiz_id'=>$quiz->id, 'topic'=>$topic, 'current'=>0]) }}">Play</a>
        @if(Auth::user()->isAdmin() )
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
        @endif
        </p>
        @endforeach
        @endif
    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection