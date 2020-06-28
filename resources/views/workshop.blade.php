@extends('layouts.app')

@section('content')

    <?php
    $key = $_GET["keyEntry"];
    foreach ($workshops as $workshop) {
        if ($workshop->key == $key) {
            $activeWorkshop = $workshop;
        }
    }

    echo "this is " . $activeWorkshop["title"] . " workshop";
    ?>
    <br>
    <h3>add your idea:</h3>
    <div class="normal">
        <form action="/home" method="GET">
            <Textarea name="idea"></Textarea>
            <input type="submit" value="sendIdea" name="Send Idea">
        </form>
    </div>

@endsection
