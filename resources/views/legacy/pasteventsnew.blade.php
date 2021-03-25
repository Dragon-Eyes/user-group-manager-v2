@extends('layouts.legacyapp')

<?php
define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
define("ROOT_WWW", 'http://' . $_SERVER['HTTP_HOST']);
?>

@section('content')
    <h2>Frühere Treffen</h2>
    @foreach($eventsPast as $event)
        <div class="card eventBoxLight">
            <div class="card-body">
                <h3>{{$event->dateText}}: {{$event->title}}</h3>
                {!!$event->description!!}
                <h4>Teilnehmer</h4>
                <table>
                    @foreach($event->registrations as $registration)
                        <tr>
                            <td>{{$registration->name}}</td>
                            <td>{{$registration->comment}}</td>
                        </tr>
                    @endforeach
                </table>
                @foreach($event->attachments as $attachment)
                    <img src="{{$attachment->url}}" style="max-width: 100%; margin-top: 25px;">
                    <p>{{$attachment->caption}}</p>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection

