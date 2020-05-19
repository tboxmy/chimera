
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

                    
 <!-- accordian start -->
 <div id="accordion">
@foreach ($data as $key => $user)
@php
    $rowname = "collapse".++$i;
@endphp
    
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#{{ $rowname}}" aria-expanded="true" aria-controls="collapseOne">
        {{ ++$i }}. {{ $user->name }}
        </button>
        <div class="row-actions">
        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>, 
        <!-- <a class="btn btn-info" href="{--{ route('users.show',$user->id) }}">Show</a>
        -->       
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        
        </div>
      </h5>
    </div>

    <div id={{ $rowname }} class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
            
      Email:{{ $user->email }}<br/>
      Role:
      @foreach($user->roles as $role)
        @if( isset($role) && $role != null )
        {{ $role->name }}, 
        @endif
      @endforeach
      
      
      </div>
    </div>

  </div>
 
 @endforeach
 </div>



{!! $data->render() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection