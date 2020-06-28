@extends('layouts.app')

@section('content')
    {!! Form::open(array( 'route'=>'shuffle.rate')) !!}
    @foreach($rates as $rate)
        @foreach($ideas as $idea)
            @if($rate->ideaSourceId == $idea->id)

                {{$idea->content}}<br> was assigned to user:
            @endif
        @endforeach
        @foreach($users as $user)
            @if($user->id ==$rate->newUserId)
                {{$user->name}} of email {{$user->email}} <br>
                <hr>
            @endif
        @endforeach

    @endforeach
    {!! Form::close() !!}
@endsection
