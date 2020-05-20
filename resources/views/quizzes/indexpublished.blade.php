@extends('layouts.apptheme1')

@section('content')

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">A Warm Welcome!</h1>
      <p class="lead">Project Objective: Identify a framework for a flexible quiz management</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-2 col-md-4 mb-4">
        <div class="card h-100">
          
          <div class="card-body">
            <h4 class="card-title">{{ Auth::user()->name }}</h4>
            <p class="card-text">User details</p>
          </div>
        </div>
      </div>

      <div class="col-lg-5 col-md-8 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">News</h4>
            <p class="card-text">The latest project happenings.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-5 col-md-12 mb-4">
        <div class="card h-100">          
          <div class="card-body">
            <h4 class="card-title">List of available quizzes</h4>
            <p class="card-text">List open quizzes here.</p>
			<div class="links">
            
            @if(Auth::user()->hasRole('teacher'))
            <a href="/topics">ListTopics</a> 
            <a href="{{route('quizzes.index') }}">Edit Quizzes</a>
            @endif                      
           </div>
        
        
        @foreach($quizzes as $quiz)
            <div >            
            <p class="card-text"><a href="{{route('quizzes.show',$quiz)}}">{{ $quiz->id }}. 
                {{$quiz->name }}</a>
            <br/> {{ $quiz->description }}</p>
            </div> 
        @endforeach
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find More!</a>
          </div>
        </div>
      </div>

     

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

@endsection
