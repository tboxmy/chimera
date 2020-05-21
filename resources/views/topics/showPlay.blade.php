
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

                    @php                 
                    $question = $questions[$current];                
                    @endphp

                    @if ( isset($popup) )                
                    <!-- see mymodal.js -->
                    <div class="myModal" id="myModal" tabindex="-1">
                        <div id="myModalview" class="modal-dialog">
                            <div class="modal-content" id="modalforreset">
                                <div class="modal-header">
                                <h5 class="modal-title">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>                
                                </div>
                                <div class="modal-body">
                                <p>Do you want to Reset score before proceeding?</p>
                                <p class="text-secondary"><small>If agree to reset, your score will be lost.</small></p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button id="reset-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="modal">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                    <div class="topics center sans-serif">
                        <h1>{{ $topic->name }}</h1>
                    
                        <p>{{ $question->description }}</p>
                        @if( $question->embed_link )   
                        <p><iframe height="300" width="500" src="{{ $question->embed_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </p>
                        @endif        
                        <hr>
                        <div class="row featurette">
                            <div class="col-md-7">
                                <h2 class="featurette-heading">{{ $question->name }}
                                <span class="text-muted">({{ $question->id }})</span></h2>
                                {{ Form::open(array('route' => 'topics.storeAnswer', 'method'=>'post')) }}
                                {!! Form::token() !!}        
                                {{ Form::hidden('quiz_id',$quiz->id)}}
                                {{ Form::hidden('question_id',$question->id)}}
                                {{ Form::hidden('topic_id', $topic->id) }}
                                {{ Form::hidden('current', $current) }}
                                @foreach($answers as $answer)            
                                <p class="lead">{{ Form::radio('answer_id', $answer->id, false)}}  {{ $answer->name }}</p>
                                @endforeach
                                <br/>
                                {{ Form::submit('Submit') }}
                                {{ Form::close() }}
                            </div>
                            <div class="col-md-5">
                                @if( $question->image != null )
                                <img src="/questions/fetch_image/{{ $question->id }}"  class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" />
                                @else  
                                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image"
                                src="{{ asset('images/a-brain-7.jpg') }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection