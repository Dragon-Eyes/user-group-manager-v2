@extends('layouts.legacyapp')

<?php
    define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
    define("ROOT_WWW", 'http://' . $_SERVER['HTTP_HOST']);
?>

@section('content')

    <h2>Past Events</h2>
    <pre>
        <?php print_r($registrations); ?>
    </pre>

@endsection
