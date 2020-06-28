@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Ideas assigned for you to rate it</div>
            <div class="card-body">
                @if(count($rates)==0)
                    <br>No ideas to rate
                @endif
                @foreach($rates as $rate)
                    @foreach($ideas as $idea)
                        @if($rate->ideaSourceId == $idea->id)
                            {!! Form::open(array( 'route'=>'shuffle.rate')) !!}
                            {{$idea->content}}
                            <br>
                            <span style="display: inline-block">
                                    {{Form::text("rating","",["class"=>"form-control", "placeholder"=>"rate"])}}</span>
                            {{ Form::hidden('idea', $idea['id']) }}
                            {{ Form::hidden('rate', $rate['id']) }}
                            {{Form::submit("rate",["class"=>"btn btn-primary"])}}
                            {!! form::close() !!}
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
