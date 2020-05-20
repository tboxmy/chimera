@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Question</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <!-- <form method="post" action="{--{ route('quizzes.updatePost', $quiz->id) }}"> -->
      <form method="post" action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">    
              <label for="question_name">Question:</label>
              <input type="text" class="form-control" name="question_name"
              value="{{ $question->name}}" />
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"
              value="{{ $question->description }}"/>
          </div>
          <div class="form-group">          
              <label for="type">Type: (cannot be changed)</label>
          <div class="checkbox form-control">
              <label for="type">Multiple choice:</label>
              <input type="radio"  name="type"
              value="default" @if($question->type == null || $question->type == "default" ) checked 
              @endif disabled
              />
              <label for="published">True false:</label>
              <input type="radio" name="type"
              value="truefalse" @if($question->type != null && $question->type == "truefalse" ) checked 
              @endif
              />              
          </div>
          </div>

          <div class="form-group">
            <label for="image1">Image</label>
            <input type="file" name="image1" class="form-control"
            />
            @if( $question->image != null )
            <img src="/questions/fetch_image/{{ $question->id }}"  class="img-thumbnail" width="75" />
            <label for="image1_hide">delete:</label>
            <input type="checkbox" name="image1_hide" id="image1_hide" value="1" >
            @endif
          </div>
          <div class="form-group">
              <label for="updated_at">Date</label>
              <input type="date" name="updated_at" placeholder="update_at" class="form-control" 
              @if($question->updated_at == null)
              value=""
              @else
              value="{{ $question->updated_at->format('Y-m-d') }}"
              @endif
              >
          </div>

          <button type="submit" class="btn btn-primary-outline">Update question</button>
      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection