@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <?php
                $key = $_GET["keyEntry"];
                //$activeWorkshop = Workshop::find($key);
                foreach ($workshops as $workshop) {
                    if ($workshop->key == $key) {
                        $activeWorkshop = $workshop;
                    }
//@endif
                }
                //@endforeach
                $flag = 0;
                foreach ($ideas as $idea) {
                    if (($idea->userId == auth()->user()->id) && ($idea->workshopId == $activeWorkshop->id)) {
                        $flag = 1;
                    }
                }
                if ($flag == 1) {
                    echo "This is <b>" . $activeWorkshop["title"] . "</b> workshop:";
                    echo "<br> You have entered your idea before in this workshop";
                }

                ?>
                @if($flag ==0)
                        This is <b>{{$activeWorkshop["title"]}}</b> workshop inset your idea down:
                    <hr>
                    {!! Form::open(array( 'route'=>'ideaSubmit.store')) !!}
                    <div>
                        {{Form::label("youridea","Your Idea: ")}}
                        {{Form::text("youridea","",["class"=>"form-control","placeholder"=>"Enter your idea here"])}}
                    </div>
                    {{ Form::hidden('workshopId', $activeWorkshop['id']) }}
                    <br>
                    <span style="float: right;">
                    {{Form::submit("Submit",["class"=>"btn btn-primary"])}}
                    </span>
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endsection
