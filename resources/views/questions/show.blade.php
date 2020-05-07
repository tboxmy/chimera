

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a quiz</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="topics center sans-serif">    
        <h1>Question: {{ $question->name }}</h1>
        <p>ID={{ $question->id }}</p>
        <p>{{ $question->description }}</p>
        <p>Type: {{ $question->type }}</p>
                
        {{ Form::open(array('route' => 'questions.storeAnswer', 'method'=>'post')) }}
        {!! Form::token() !!}        
        {{ Form::hidden('question_id',$question->id)}}
        @foreach($answers as $answer)            
            {{ Form::radio('answer_id', $answer->id, false)}}  {{ $answer->name }}
        @endforeach
        <br/>
        {{ Form::submit('Submit') }}
        {{ Form::close() }}
        
    </div>
  </div>
</div>
</div>