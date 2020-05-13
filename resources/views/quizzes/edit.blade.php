@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Quiz</div>

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

      <form method="post" action="{{ route('quizzes.updatePost', $quiz->id) }}">
          @csrf
          
          <div class="form-group">    
              <label for="name">Quiz Name:</label>
              <input type="text" class="form-control" name="name"
              value="{{ $quiz->name}}" />
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"
              value="{{ $quiz->description }}"/>
          </div>
          <div class="form-group">          
              <label for="name">Publish:</label>
          <div class="checkbox form-control">
              <label for="published">No:</label>
              <input type="radio"  name="published"
              value="no" @if($quiz->publish_start == null) checked 
              @endif
              />
              <label for="published">Yes:</label>
              <input type="radio" name="published"
              value="yes" @if($quiz->publish_start != null) checked 
              @endif
              />              
          </div>
          </div>
          <div class="form-group">
              <label for="publish_date">Date</label>
              <input type="date" name="publish_date" placeholder="Publish date" class="form-control" 
              @if($quiz->publish_start == null)
              value=""
              @else
              value="{{ $quiz->publish_start->format('Y-m-d') }}"
              @endif
              >
          </div>

          <button type="submit" class="btn btn-primary-outline">Update quiz</button>
      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection