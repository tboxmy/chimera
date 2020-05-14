
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
                @foreach($questions as $question)          
                <div >                                
                <p><a href="{{route('questions.show',$question)}}">question({{ $question->id }}) {{ $question->name }}</p></a>
                <p>{{ $question->description }}</p>
                <p>{{ $question->type }}</p>
                <hr>
                         
                </div> 
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection