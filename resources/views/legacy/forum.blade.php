@extends('layouts.legacyapp')

<?php
    define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
    define("ROOT_WWW", 'http://' . $_SERVER['HTTP_HOST']);
?>

@section('content')

    {!! $content->forum !!}

{{--    <h2 class="mb-5 mt-5">FileMaker Zürich Forum</h2>--}}
{{--    <p>Auf mehrheitlichen Wunsch der Teilnehmer ist das Forum nur für aktive Teilnehmer zugänglich.</p>--}}
{{--    <p>Einladungen zum Projekt "<a href="https://iqambu.com/6qkiwd" target="_blank">FileMaker Zürich Forum</a>" werden direkt vom System "<strong>Iqambu</strong>" verschickt.<br>--}}
{{--        Der Einladungslink führt Dich zu einer Passwort-Eingabe-Maske.<br>--}}
{{--        Der spätere Login erfolgt mit E-Mail-Adresse und Passwort.</p>--}}
{{--    <p>Neben den üblichen Funktionen, ist das einzig erklärungsbedürftige vielleicht die Benachrichtigungsfunktionalität:</p>--}}
{{--    <ul>--}}
{{--        <li>Wenn dies aktiviert ist (default), bekommst Du eine <strong>Benachrichtigung per E-Mail</strong>, wenn ein neuer Beitrag veröffnetlicht wurde.<br>--}}
{{--            Dies kannst Du mit dem Lautsprecherknopf rechts neben der Titelzeile an-/abschalten.</li>--}}
{{--        <li>Wenn dies aktiviert ist (default wenn die Benachrichtigung für neue Beiträge aktiv ist), bekommst Du eine Benachrichtigung per E-Mail, wenn ein neuer Kommentar veröffentlicht wurde.<br>--}}
{{--            Dies kannst Du mit dem Lautsprecherknopf rechts neben dem Beitragstitel, pro Beitrag an-/abschalten.</li>--}}
{{--    </ul>--}}
{{--    <p>Wenn Du einem Beitrag Bildschirmfotos o.ä. hinzufügen möchtest, musst Du dafür jeweils einen Kommentar anlegen (nur Foto oder Text und Foto).</p>--}}
{{--    <p>Wer den Zugang nicht wünscht, kann einfach die Einladungsmail ignorieren.</p>--}}
{{--    <p>Sollten wir vergessen jemanden einzuladen, kontaktiert uns bitte.<br><strong>Es ist nicht möglich dem Forum selbstständig / ohne Einladung beizutreten.</strong></p>--}}
{{--    <p>Für die Nutzung benötigst Du eine halbwegs modernen Browser und nein, der Internet Exporer war schon vor 6 Jahren, als Microsoft die Weiterentwicklung eingestellt hat, kein moderner Browser mehr.<!--<br>--}}
{{--        Wer es ganz genau wissen will, <a href="https://caniuse.com/?search=fetch" target="_blank">CanIuse</a> für eine vom System stark verwendete Funktion bzw. API.--></p>--}}

@endsection
