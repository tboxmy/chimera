
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

                    <table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 <!-- accordian start -->
 <div id="accordion">
 @foreach ($data as $key => $user)
 <tr>
    <td>    
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        {{ ++$i }}. {{ $user->name }}
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  </tr>
 @endforeach
</table>

 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td><!--
      if(!empty($user->getRoleNames()))
        foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{-- { $v } --}</label>
        endforeach
      endif-->
      @foreach($user->roles() as $role)
        {{ $role->name }}
      $endforeach
    </td>
    <td>
       <!-- <a class="btn btn-info" href="{--{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{--{ route('users.edit',$user->id) }}">Edit</a> 
        {--!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {--!! Form::close() !!}
        -->
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection