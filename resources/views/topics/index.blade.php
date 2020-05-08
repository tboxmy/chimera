
@extends('layouts.app')

@section('content')
    <div class="topics center sans-serif">
    @php
    $current_topic=-1;
    @endphp 
    
        <h1>Topics</h1>
        @foreach($questions as $topic =>$collection)          
            <div >
                <h2>{{ $topic }}. 
                {{$topics->firstWhere('id', $topic)->name }}</h2>
                @foreach($collection as $question) 
                <p><a href="{{route('questions.show',$question)}}">question({{ $question->id }}) {{ $question->name }}</p></a>
                <p>{{ $question->description }}</p>
                <p>{{ $question->type }}</p>
                <hr>
                @endforeach                
            </div> 
        @endforeach
    </div>
@endsection