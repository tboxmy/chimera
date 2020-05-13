
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
        <p>{{ $quiz->description }}</p>
        <p>{{ $quiz->updated_at }}</p> 
        
        <form action="{{ route('quizzes.updateTopic', $quiz) }}" method="post"> <!-- conent to the answer route -->

            {!! csrf_field() !!}
            @foreach($topics as $topic) 
            <p><button type="submit" name="topic" value="{{ $topic->id}}">{{ $topic->name }}</button>
            {{ $topic->description }}</p>
            @endforeach
        </form>
        <ol>
        
        </ol>    
    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
