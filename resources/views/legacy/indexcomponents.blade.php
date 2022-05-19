@extends('layouts.legacyapp')

<?php
define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
$requestProtocol = $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ? 'http://' : 'https://';
define("ROOT_WWW", $requestProtocol  . $_SERVER['HTTP_HOST']);

function ue($string = "") {
    return urlencode($string);
}

function hsc($string = "") {
    return htmlspecialchars($string);
}

function isBlank($value) {
    return !isset($value) || trim($value) === '';
}

function displayValidationErrors($errors=array()) {
    if(!empty($errors)) {
        $output = '<div class="msgerror">';
        $output .= "Folgende Fehler sind aufgetreten:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . hsc($error) . "</li>";
        }
        $output .= "</ul></div>";
        return $output;
    }
}

function getUid() {
    $uid = md5(uniqid(microtime(), 1));
    return $uid;
}

function getRandomNumber($max) {
    // 1 to max
    return rand(1,$max);
}

function getBackgroundColor($choice) {
    if ($choice == 1) {
        // ZH
        return 'rgb(0,102,204)';
    } elseif ($choice == 2) {
        // SZ
        return 'rgb(225,10,22)';
    } elseif ($choice == 3) {
        // SG
        return 'rgb(1,153,52)';
    } else {
        return 'rgb(0,0,0)';
    }
}
?>

@section('content')
    <div class="jumbotron jumbotron-fluid text-center" style="background-color: <?php echo getBackgroundColor(getRandomNumber(3)) ?>; color: white; margin-top: 10px;">
        <div class="container-fluid">
            <h1 class="display-4 animate__animated animate__rubberBand">Claris Stammtisch Zürich</h1>
{{--            <h1 class="display-4 animate__animated animate__swing">FileMaker Zürich</h1>--}}
{{--            <h1 class="display-4 animate__animated animate__flip">FileMaker Zürich</h1>--}}
{{--            <h1 class="display-4 animate__animated animate__heartBeat">FileMaker Zürich</h1>--}}
            <p>ehemals "FileMaker Zürich"<br>Entwickler-Community</p>
        </div>
    </div>

    @if($content->alert)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! $content->alert !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {!! $content->intro !!}

{{--    <blockquote>FileMaker ist ein grossartiges Tool um mit geringem Aufwand überzeugende Software-Systeme zu erarbeiten.<br>--}}
{{--        Im mittlerweile jährlichen Versionsrhythmus stellt Claris Entwicklern neue Möglichkeiten zur Verfügung. Um diese Möglichkeiten zu nutzen und obsolete Praktiken auszumerzen, ist es jedoch unerlässlich permanent an seinen Fähigkeiten zu arbeiten.<br>--}}
{{--        Deshalb haben wir den Zürcher FileMaker Stammtisch, nach mehreren Jahren des Dornröschenschlafes, 2020 wiederauferstehen lassen.</blockquote>--}}
{{--    <p>Für alle FileMaker-Interessierten</p>--}}
{{--    <ul>--}}
{{--        <li>Low Code Neulinge</li>--}}
{{--        <li>Hobby-Programmierer</li>--}}
{{--        <li>Indie Hacker</li>--}}
{{--        <li>Inhouse-Entwickler</li>--}}
{{--        <li>Berater / Agentur-Entwickler</li>--}}
{{--    </ul>--}}
    <p>Fragen, Anregungen o.ä.? <a class="e-l" data-ep1="hallo" data-ep2="claris-stammtisch" data-ep3="ch" href="#">Kontakt</a><br>
{{--    Wenn Du Einladungen zu den Stammtischen per Mail erhalten möchtest: <a href="https://seu2.cleverreach.com/f/321923-326621/" target="_blank">Anmeldung</a></p>--}}
    Wenn Du Einladungen zu den Stammtischen per Mail erhalten möchtest: <a href="https://7365e0cd.sibforms.com/serve/MUIEACXvVPf1KqAsJb6adG1HOfTcV41WxtYlD6yD_0UN-Q9YlHa-uP18jrn57joHGGbrui_UzyJrxbaSAy7c9eg8Y_ks3AdcMtx0623t4ae4mVaVdqt5ec9xTSmAEUVcC7NGpu46Aq_s-fSUFOoV9VILnwihJ4idRJ2dUlU36_jilaiY3aUVG1S4YaK4CrdIsEHv-qwqF0mi7_3I" target="_blank">Anmeldung</a></p>

    <h2 id="eventsFuture">Termine</h2>
    @foreach($eventsFuture as $event)
        <x-event :event="$event"></x-event>
    @endforeach

    <p class="mt-3"><a href="<?= ROOT_WWW ?>/statistics">Site-Statistiken</a></p>
@endsection
