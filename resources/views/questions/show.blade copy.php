
<body>
    <div class="topics center sans-serif">    
        <h1>Question: {{ $question->name }}</h1>
        <p>ID={{ $question->id }}</p></a>
        <p>{{ $question->description }}</p>
        <p>Type: {{ $question->type }}</p>
        
        <form action="{{ url('/question/answer') }}" method="post"> <!-- conent to the answer route -->

            {!! csrf_field() !!}
            @foreach($answers as $answer) 
            
            <button type="submit" name="answer" value="{{ $answer->id}}">{{ $answer->name }}</button>      
            @endforeach
        </form>
        <ol>
        
        </ol>    
    </div>
</body>