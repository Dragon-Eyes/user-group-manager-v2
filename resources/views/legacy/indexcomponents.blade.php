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
            <h1 class="display-4 animate__animated animate__rubberBand">FileMaker Zürich</h1>
{{--            <h1 class="display-4 animate__animated animate__swing">FileMaker Zürich</h1>--}}
{{--            <h1 class="display-4 animate__animated animate__flip">FileMaker Zürich</h1>--}}
{{--            <h1 class="display-4 animate__animated animate__heartBeat">FileMaker Zürich</h1>--}}
            <p>Entwickler-Community<br>Der neue Stammtisch</p>
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
    <p>Fragen, Anregungen o.ä.? <a class="e-l" data-ep1="stammtisch" data-ep2="fmzuerich" data-ep3="ch" href="#">Kontakt</a></p>

    <h2 id="eventsFuture">Treffen</h2>
    @foreach($eventsFuture as $event)
        <x-event :event="$event"></x-event>
    @endforeach

    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>

    <div id="mc_embed_signup" class="mt-4">
        <form action="https://fmzuerich.us5.list-manage.com/subscribe/post?u=124f92db94f3241542ea4942e&amp;id=733ebf3b0f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
                <label for="mce-EMAIL">Stammtisch-Einladungen</label>
                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Adresse" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_124f92db94f3241542ea4942e_733ebf3b0f" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="abonnieren" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
    </div>

    <!--End mc_embed_signup-->

    <p class="mt-3"><a href="<?= ROOT_WWW ?>/statistics">Site-Statistiken</a></p>
@endsection
