@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <?php
            $id = $workshopIdd;
            foreach ($workshops as $workshop) {
                if ($workshop->id == $id) {
                    $activeWorkshop = $workshop;
                }
            }
            ?>
            <?php
            echo "<form>";
            echo "<div class='card-header'>Workshop: " . $activeWorkshop["title"] . "</div><br>";
            echo "<div style='margin-left: 30px'>Submitted ideas:</div><br><hr>";


            //            <div class="card-body"></div>

            $i = 1;


            foreach ($ideas as $idea) {
                if (($idea["workshopId"] == $id) && ($idea["owner"] == 1)) {
                    $user = getUser($idea["userId"], $users);
                    echo "<div style='margin-left: 30px'>";
                    echo $idea["content"];
                    echo "<br>";
                    echo "<br>";
                    echo "Created by: " . $user["name"];
                    echo "<br> Rate:  " . $idea["rate"];
                    echo "</div>";
                    echo "<hr>";
                    $i++;
                }

            }
            function getUser($id, $useres)
            {
                foreach ($useres as $user) {
                    if ($user["id"] == $id) {
                        return $user;
                    }
                }
            }
            echo "</form>";
            ?>

            {!! Form::open(array( 'route'=>'shuffle.shuffle')) !!}
                @if($ratesNb ==0)
                    @if($i>7)
                        {{ Form::hidden('workshopId', $activeWorkshop['id']) }}
                        {{ Form::submit("Shuffle",["class"=>"btn btn-primary"])}}
                    @else
                        <div style="padding: 30px">Not enough ideas to shuffle</div>
                    @endif
                @else
                    <div style="padding: 30px">Cannot shuffle now not all users have submitted their ratings yet!</div>
                @endif
            {!! Form::close() !!}
        </div>
    </div>
@endsection
