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