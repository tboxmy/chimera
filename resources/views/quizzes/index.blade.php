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
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div>
                    @endif
    <div class="quizzes center sans-serif">
    
        <h1><a href="/">Quizzes</a></h1>
        <div class="links">
            <a href="/topics">ListTopics</a> 
            <a href="/quizzes/create">Add Quizzes</a>  
        </div>
        @foreach($quizzes as $quiz)
            <div >
                <h2><a href="{{route('quizzes.show',$quiz)}}">{{ $quiz->id }}. 
                {{$quiz->name }}</a></h2>
                @if ($quiz->publish_start != null)
                <div>
                Publish: {{ $quiz->publish_start->format('d-m-Y') }}
                </div>
                @endif  
                
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