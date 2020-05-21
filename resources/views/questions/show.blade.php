@extends('layouts.apptheme1')

@section('content')
<div class='container-fluid'>
  <div class="row">
    <div class="col-sm-8 offset-sm-2">    
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
    @endif 
    </div>

  </div>
  <div class="row">
  <div class="col-lg-2 col-md-1 col-sm-3 ">
  </div>
  <div class="col-lg-4 col-md-5 col-sm-3">
  @if( $question->embed_link )   
      <p><iframe height="300"
      width="400" src="{{ $question->embed_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </p>
  @endif
  </div>
  <div class="col-lg-4 col-md-5 col-sm-3">
    <div class="card card-cascade narrower">
    <!-- Card image -->
    <div class="view view-cascade overlay">
    @if( $question->image != null )
      <img class="card-img-top mx-auto" src="/questions/fetch_image/{{ $question->id }}" 
       data-src="holder.js/500x500/auto" alt="Card image cap"/>
    @endif
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
    <!-- Card content -->
    <div class="card-body card-body-cascade">
      <!-- Label -->
      <h5 class="pink-text pb-2 pt-1"><i class="fas fa-utensils"></i>{{$question->id}}</h5>
      <!-- Title -->
      <h4 class="font-weight-bold card-title">{{ $question->name }}</h4>
      <!-- Text -->
      {{ Form::open(array('route' => 'questions.storeAnswer', 'method'=>'post')) }}
          {!! Form::token() !!}        
          {{ Form::hidden('question_id',$question->id)}}
          @foreach($answers as $answer)            
          <p class="card-text">{{ Form::radio('answer_id', $answer->id, false)}}  {{ $answer->name }}</p>
          @endforeach
          <br/>     
      
      <!-- Button -->
          {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
  </div>
  <div class="col-lg-2 col-md-1 col-sm-3">
  </div>
  </div>
  </div>
</div>
@endsection