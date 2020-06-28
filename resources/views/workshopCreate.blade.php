@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create Post</div>
            <div class="card-body">
                {!! Form::open(array( 'route'=>'workshop.store')) !!}
                <div>
                    {{Form::label("title","Title")}}
                    {{Form::text("title","",["class"=>"form-control","placeholder"=>"Title"])}}
                </div>
                <br>
                <div>
                    {{Form::label("description","Description")}}
                    {{Form::textArea("description","",["class"=>"form-control","placeholder"=>"Description"])}}
                </div>
                <br>
                <div style="float: right">
                    {{Form::submit("Submit",["class"=>"btn btn-primary"])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
