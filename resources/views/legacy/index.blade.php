@extends('layouts.legacyapp')

@section('content')

    <div class="jumbotron jumbotron-fluid text-center" style="background-color: <?php echo getBackgroundColor(getRandomNumber(3)) ?>; color: white; margin-top: 10px;">
        <div class="container-fluid">
            <!--                <h1 class="display-4 animate__animated animate__rubberBand">FileMaker Zürich</h1>-->
            <!--                <h1 class="display-4 animate__animated animate__swing">FileMaker Zürich</h1>-->
            <h1 class="display-4 animate__animated animate__flip">FileMaker Zürich</h1>
            <!--                <h1 class="display-4 animate__animated animate__heartBeat">FileMaker Zürich</h1>-->
            <p>Entwickler-Community<br>Der neue Stammtisch</p>
        </div>
    </div>

    <?php
        $participants = $registrations['Stammtisch 2021-02'];
    ?>

        @foreach($participants as $participant)
            <p>{{$participant->$participant_name}}</p>
        @endforeach

@endsection
