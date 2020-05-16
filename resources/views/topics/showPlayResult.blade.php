
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
                    
                </div >
                
                    <p>{{ $question->description }}</p>
                    <p>{{ $question->type }}</p>
                    <hr>
                    <h2 class="featurette-heading">{{ $question->name }}
                    <span class="text-muted">({{ $question->id }})</span></h2>           
                    
                    @foreach($answers as $answer)            
                    <p class="lead">{{ $answer->name }} @if( $answer_id == $answer->id)
                    <mark>({{ $result }})</mark> @endif</p>
                    @endforeach
                    @if( $next > 0)
                        <a href="{{ route('topics.play',['topic'=>$topic, 'current'=>$next]) }}">Continue</a>
                    @else
                        End of quiz.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection