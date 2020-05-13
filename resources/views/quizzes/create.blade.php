@extends('layouts.app')

@section('content')
<<<<<<< HEAD
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
=======
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a quiz</h1>
  <div>
>>>>>>> 1f51a1505299efe80039361bac86d926dd1a1349
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('quizzes.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Quiz Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <input type="hidden" class="form-control" name="publish_date"/>

          <button type="submit" class="btn btn-primary-outline">Add quiz</button>
      </form>

                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
</div>
>>>>>>> 1f51a1505299efe80039361bac86d926dd1a1349
@endsection