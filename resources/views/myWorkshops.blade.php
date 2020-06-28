@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::user()->type ==1)
            <div class="card">
                <div class="card-header">My workshops</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <th>Title</th>
                        <th>Key</th>
                        <th>...</th>
                        </thead>
                        <tbody>
                        @foreach($workshops as $workshop)
                            @if($workshop->creatorId == auth()->user()->id)
                                <tr>
                                    <td>{{$workshop->title}}</td>
                                    <td>{{$workshop->key}}</td>
                                    <td>
                                        <form action="/myWorkshops/ideas" method="GET">
                                            <input type="hidden" name="workshopId" value= {{$workshop->id}}>
                                            <input type="submit" class="btn btn-info" value="Show Ideas"></form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header"> Your submitted Ideas</div>
                <div class="card">
                    @foreach($ideas as $idea)
                        @foreach($workshops as $workshop)
                            @if($idea->userId == auth()->user()->id && $idea->workshopId==$workshop->id && $idea->owner==1)
                                <div style="margin: 20px">
                                    Submission: {{$idea->content}} <br>
                                    Workshop: {{$workshop->title}} <br>
                                    Rating: {{$idea->rate}}
                                <hr>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection
