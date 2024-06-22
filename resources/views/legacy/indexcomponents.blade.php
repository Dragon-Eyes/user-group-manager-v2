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
    <div id="indexalert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! $content->alert !!}
        <span id="indexalertcountdown"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {!! $content->intro !!}

    <p>Fragen, Anregungen o.ä.? <a class="e-l" data-ep1="hallo" data-ep2="claris-stammtisch" data-ep3="ch" href="#">Kontakt</a><br>Zusätzlich steht Euch nun auch eine <a href="https://www.linkedin.com/groups/9854383/" target="_blank">LinkedIn-Gruppe</a> zur Verfügung!<br>
    Wenn Du Einladungen zu den Stammtischen per Mail erhalten möchtest: <a href="http://eepurl.com/h0Us9f" target="_blank">Anmeldung</a></p>

    <div style="display: flex; align-items: center; justify-content: space-between">
        <h2 id="eventsFuture">Termine</h2>
        <div id="scopeSwitch">
            <input type="checkbox" id="alltech" name="alltech" value="true" onclick="switchScope()">
            <label style="padding-top: 10px" for="alltech">alle Technologien</label>
        </div>
    </div>


    <div id="events-claris">
        @foreach($eventsFuture as $event)
            @if($event->is_claris == true)
                <x-event :event="$event"></x-event>
            @endif
        @endforeach
    </div>

    <div id="events-all" style="display: none">
        @foreach($eventsFuture as $event)
            <x-event :event="$event"></x-event>
        @endforeach
    </div>

    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7_dtp.css" rel="stylesheet" type="text/css">
    <style>
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:600px;}
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup" class="onlyWide">
        <form action="https://claris-stammtisch.us5.list-manage.com/subscribe/post?u=124f92db94f3241542ea4942e&amp;id=733ebf3b0f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
                <h2>Claris Stammtisch Zürich - Einladungen</h2>
                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                <div class="mc-field-group">
                    <label for="mce-EMAIL">E-Mail Adresse *  <span class="asterisk">*</span>
                    </label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                <div class="mc-field-group">
                    <label for="mce-FNAME">Vorname </label>
                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                </div>
                <div class="mc-field-group">
                    <label for="mce-LNAME">Nachname </label>
                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                </div>
                <div id="mce-responses" class="clear foot">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_124f92db94f3241542ea4942e_733ebf3b0f" tabindex="-1" value=""></div>
                <div class="optionalParent">
                    <div class="clear foot">
                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                        <p class="brandingLogo"><a href="http://eepurl.com/hQkWNb" title="Mailchimp - email marketing made easy and fun"><img src="https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg"></a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const eventBlockClaris = document.getElementById('events-claris');
        const eventBlockAll = document.getElementById('events-all');
        let eventScope = 'claris';

        // document.getElementById('scopeSwitch').addEventListener('click', switchScope);

        function switchScope() {
            if(eventScope === 'claris') {
                eventsShowAll();
                eventScope = 'all';
            } else {
                eventsShowClaris();
                eventScope = 'claris';
            }
        }

        function eventsShowAll() {
            eventBlockClaris.style.display = "none";
            eventBlockAll.style.display = "block";
        }

        function eventsShowClaris() {
            eventBlockClaris.style.display = "block";
            eventBlockAll.style.display = "none";
        }
    </script>

    <script>
        const indexalertcountdown = document.getElementById('indexalertcountdown');
        const countdownTo = "{{$content->countdown}}";
        const countdownToDate = new Date(countdownTo);

        function countdownUpdate() {
            const currentDate = new Date();
            const countdownDiff = countdownToDate - currentDate;

            if (countdownDiff > 0) {
                const countdownDays = Math.floor(countdownDiff / 1000 / 60 / 60 / 24);
                const countdownHours = Math.floor(countdownDiff / 1000 / 60 / 60) % 24;
                const countdownMinutes = Math.floor(countdownDiff / 1000 / 60) % 60;
                const countdownSeconds = Math.floor(countdownDiff / 1000) % 60;
                const countdownText = `
                    <br>
                    <div id="countdown">
                        <span id="countdown-days">${countdownDays}</span> Tage,
                        <span id="countdown-hours">${countdownHours}</span> Stunden,
                        <span id="countdown-minutes">${countdownMinutes}</span> Minuten,
                        <span id="countdown-seconds">${countdownSeconds}</span> Sekunden
                    </div>
                `;
                indexalertcountdown.innerHTML = countdownText;
            } else {
                clearInterval(countdownInterval);
            }
        }

        const countdownInterval = setInterval(countdownUpdate, 1000);
    </script>

    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';/*
 * Translated default messages for the $ validation plugin.
 * Locale: DE
 */
            $.extend($.validator.messages, {
                required: "Dieses Feld ist ein Pflichtfeld.",
                maxlength: $.validator.format("Geben Sie bitte maximal {0} Zeichen ein."),
                minlength: $.validator.format("Geben Sie bitte mindestens {0} Zeichen ein."),
                rangelength: $.validator.format("Geben Sie bitte mindestens {0} und maximal {1} Zeichen ein."),
                email: "Geben Sie bitte eine gültige E-Mail Adresse ein.",
                url: "Geben Sie bitte eine gültige URL ein.",
                date: "Bitte geben Sie ein gültiges Datum ein.",
                number: "Geben Sie bitte eine Nummer ein.",
                digits: "Geben Sie bitte nur Ziffern ein.",
                equalTo: "Bitte denselben Wert wiederholen.",
                range: $.validator.format("Geben Sie bitten einen Wert zwischen {0} und {1}."),
                max: $.validator.format("Geben Sie bitte einen Wert kleiner oder gleich {0} ein."),
                min: $.validator.format("Geben Sie bitte einen Wert größer oder gleich {0} ein."),
                creditcard: "Geben Sie bitte ein gültige Kreditkarten-Nummer ein."
            });}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->

    <p class="mt-3"><a href="<?= ROOT_WWW ?>/statistics">Site-Statistiken</a></p>
@endsection
