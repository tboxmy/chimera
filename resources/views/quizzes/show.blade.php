
<body>
    <div class="topics center sans-serif">    
        <h1>{{$quiz->name}}({{ $quiz->id }})</h1>
        <p>{{ $quiz->description }}</p>
        <p>{{ $quiz->update_at }}</p> 
        Edit | <a href="{{route('quizzes.showTopic',$quiz)}}">Assign Topic</a>
        @if(count($topics) < 1)
            <p>No Topic selected.</p>
        @else
        
        @foreach( $topics as $topic)
        <p><a href="{{route('topics.show',$topic)}}">{{ $topic->name  }}</a>
        {{ Form::open(array('route' => array('quizzes.updateTopic',$quiz), 'method'=>'post')) }}
        {!! Form::token() !!} 
        {{ Form::hidden('topic_id',$topic->id)}}            
        {{ Form::hidden('delete','true')}} 
            {{ Form::button('<span class="glyphicon glyphicon-search">Delete</span>',
    array(
        'class'=>'btn btn-warning', 
        'value'=>'delete',
        'type'=>'submit')) }}        
        {{ Form::close() }}
        </p>
        @endforeach
        @endif
    </div>
</body>