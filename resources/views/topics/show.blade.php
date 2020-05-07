
<body>
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
</body>