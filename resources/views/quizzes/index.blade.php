
@extends('layouts.app')

@section('content')
    <div class="quizzes center sans-serif">
        <h1>Quizzes</h1>
        <div class="links">
            <a href="/topics">ListTopics</a> 
            <a href="/quizzes/create">Add Quizzes</a>  
        </div>
        @foreach($quizzes as $quiz)
            <div >
                <h2><a href="{{route('quizzes.show',$quiz)}}">{{ $quiz->id }}. 
                {{$quiz->name }}</a></h2>
                <div> {{ $quiz->description }}</div>
            </div> 
        @endforeach
    </div>
@endsection