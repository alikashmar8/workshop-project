@extends('layouts.app')

@section('admin')
    


    <div class="card-header">Welcome Admin</div>

    {!! Form::open(array( 'route'=>'admin.edit')) !!}
    <table class="table table-hover">

    <thead >

        <th>User Id</th>

        <th>Name</th>

        <th>Email</th>

        <th>Type</th>

        <th>Select</th>


    </thead>

    <tbody>
@foreach($users as $user)
    @if($user->activated==0)
        <tr>

          <td>{{$user->id}} </td>

          <td>{{$user->name}} </td>

          <td>{{$user->email}} </td>

          <td>{{$user->type}}</td>

          <td> {{Form::checkbox("activate[]","")}} </td>


        </tr>
    @endif
@endforeach

    </tbody>

</table>
{{Form::submit("Activate",["class"=>"primaryBtn"])}}

{!! Form::close() !!}

{!! Form::open(array( 'route'=>'admin.edit')) !!}
    <table class="table table-hover">

    <thead >

        <th>User Id</th>

        <th>Name</th>

        <th>Email</th>

        <th>Type</th>

        <th>Select</th>


    </thead>

    <tbody>
@foreach($users as $user)
    @if($user->type==3)
        <tr>

          <td>{{$user->id}} </td>

          <td>{{$user->name}} </td>

          <td>{{$user->email}} </td>

          <td>{{$user->type}}</td>

          <td> {{Form::checkbox("changeRole[]","")}} </td>


        </tr>
    @endif
@endforeach

    </tbody>

</table>
{{Form::submit("Change Role",["class"=>"primaryBtn"])}}

{!! Form::close() !!}


@endsection
