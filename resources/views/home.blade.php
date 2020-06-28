@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::user()->type==0)
            <div class="card">
                {!! Form::open(array( 'route'=>'admin.edit')) !!}
                <div class="card-header">Activate selected users</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Select</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->activated==0 && $user->id!=2)
                                <tr>
                                    <td>{{$user->id}} </td>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}} </td>
                                    <td>{{$user->type}}</td>
                                    <td> {{Form::checkbox("activate[]",$user->id)}} </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{Form::submit("Activate",["class"=>"btn btn-primary"])}}
                {!! Form::close() !!}
            </div>
            <br>
            <br>
            <div class="card">
                {!! Form::open(array( 'route'=>'admin.edit')) !!}
                <div class="card-header">Change selected users to monitors</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Select</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->type==2 && $user->id!=2)
                                <tr>
                                    <td>{{$user->id}} </td>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}} </td>
                                    <td>{{$user->type}}</td>
                                    <td> {{Form::checkbox("changeRole[]",$user->id)}} </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{Form::submit("change",["class"=>"btn btn-primary"])}}
                {!! Form::close() !!}
            </div>
            <br>
            <div class="card">
                {!! Form::open(array( 'route'=>'admin.edit')) !!}
                <div class="card-header">Auto Activation
                    <span style="margin-left: 20px">
                        @if($act == 0)
                            {{Form::checkbox("onOffActivate",$user->id, false)}}
                        @else
                            {{Form::checkbox("onOffActivate",$user->id, true)}}
                        @endif
                    </span>
                    <span style="margin-left: 20px">
                        {{Form::submit("Submit",["class"=>"btn btn-success"])}}
                        {!! Form::close() !!}
                </span>
                </div>
            </div>
        @else
            <div class="normal" style="margin-left: 400px">
                <form action="/ideaSubmit/create" method="GET">
                    <label for="keyEntry" style="display: inline-block">Enter key to enroll into workshop: </label>
                    <input type="text" name="keyEntry" class="form-control" style="width: 300px;display: inline-block">
                    <input type="submit" class="btn btn-primary" value="Go">
                </form>
            </div>
        @endif
    </div>
@endsection
