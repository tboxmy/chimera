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
    <div class="quizzes center sans-serif">
    
        <h1>Quizzes</h1>
        @if(Auth::user()->isAdmin() )
        <div class="links">
            <a href="/topics">ListTopics</a> 
            <a href="{{route('quizzes.index') }}">Edit Quizzes</a>  
        </div>
        @endif
        
        @foreach($quizzes as $quiz)
            <div >
                <h2><a href="{{route('quizzes.show',$quiz)}}">{{ $quiz->id }}. 
                {{$quiz->name }}</a></h2>
                <div> {{ $quiz->description }}</div>
            </div> 
        @endforeach
    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection