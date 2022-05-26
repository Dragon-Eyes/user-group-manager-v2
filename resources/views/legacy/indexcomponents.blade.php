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
    Wenn Du Einladungen zu den Stammtischen per Mail erhalten möchtest: <a href="http://eepurl.com/h0Us9f" target="_blank">Anmeldung</a></p>

    <h2 id="eventsFuture">Termine</h2>
    @foreach($eventsFuture as $event)
        <x-event :event="$event"></x-event>
    @endforeach

    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7_dtp.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:600px;}
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup" class="onlyWide">
        <p>Nach unerfreulichen Versuchen mit CleverReach und Sendinblue bleiben wir für unsere Einladungen doch bei Mailchimp.</p>
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
