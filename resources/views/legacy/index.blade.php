@extends('layouts.legacyapp')

<?php
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

    define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
    define("ROOT_WWW", 'https://' . $_SERVER['HTTP_HOST']);

?>

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

    <?php if(true) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Jetzt anmelden zum virtuellen Stammtisch am <strong>24. März 2021</strong>!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <blockquote>FileMaker ist ein grossartiges Tool um mit geringem Aufwand überzeugende Software-Systeme zu kreieren.<br>
        Im mittlerweile jährlichen Versionsrhythmus stellt Claris Entwicklern neue Möglichkeiten zur Verfügung. Um diese Möglichkeiten zu nutzen und obsolete Praktiken auszumerzen, ist es jedoch unerlässlich permanent an seinen Fähigkeiten zu arbeiten.<br>
        Deshalb haben wir den Zürcher FileMaker Stammtisch, nach mehreren Jahren des Dornröschenschlafes, 2020 wiederauferstehen lassen.</blockquote>
    <p>Für alle FileMaker-Interessierten</p>
    <ul>
        <li>Low Code Neulinge</li>
        <li>Hobby-Programmierer</li>
        <li>Indie Hacker</li>
        <li>Inhouse-Entwickler</li>
        <li>Berater / Agentur-Entwickler</li>
    </ul>
    <p>Fragen, Anregungen o.ä.? <a class="e-l" data-ep1="stammtisch" data-ep2="fmzuerich" data-ep3="ch" href="#">Kontakt</a></p>

    <h2 id="eventsFuture">Treffen</h2>

    <div class="card eventBoxLight" id="event202103">
        <div class="card-body">
            <h3 class="card-title">24.03.2021: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <li>18:30 Uhr - tbd</li>
            </ul>
            <h4>Ort</h4>
            Virtuell: Christian Sedlmeiers <a style="color: red; font-weight: bold;" href="https://meet.sedlmair.ch/FMZuerichStammtisch202103" target="_blank">Jitsi Server</a> @ meet.sedlmair.ch</p>
            <?php if(false) : ?>
            <h4>Anmelden</h4>
            <form id="registrationNew" action="<?php echo ROOT_WWW ?>?action=registration" method="post" style="margin-bottom: 15px;">
                <input type="hidden" name="registration[event]" value="Stammtisch 2021-03">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="registration[participant_name]" placeholder="Name **" required>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-danger">anmelden</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px; margin-left: -6px; padding-left: 0;">
                    <div class="col">
                        <input type="radio" id="virtual" name="registration[presence]" value="virtual" checked>
                        <label for="registration[presence]">virtuell</label>
                        <!--                                    <input type="radio" id="onsite" name="registration[presence]" value="onsite">-->
                        <!--                                    <label for="registration[presence]">vor Ort</label>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="email" class="form-control" name="registration[participant_email]" placeholder="E-Mail Adresse">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <textarea class="form-control" name="registration[comment]" rows="3" placeholder="Bemerkungen, Themenvorschläge etc."></textarea>
                    </div>
                </div>
            </form>
            <!--                    <p><a href="assets/FileMaker_Stammtisch_202011.ics">ics download</a></p>-->
            <?php endif; ?>
            <h4>Bisher angemeldet (<?php echo count($registrations['Stammtisch 2021-03']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2021-03']; ?>
                <?php if($registrationsEvent) {
                foreach ($registrationsEvent as $registrationEvent) { ?>
                <tr>
                    <td>
                        <?php
                            echo hsc($registrationEvent->participant_name);
                        ?>
                    </td>
                    <td class="pl-2">
                        <?php echo nl2br(hsc($registrationEvent->comment)); ?>
                    </td>
                    <td class="pl-3">
                        <?= $registrationEvent->virtual_flag ? 'virtuell' : 'vor&nbsp;Ort'; ?>
                    </td>
                </tr>
                <?php }
                } ?>
            </table>
        </div>
    </div>

@endsection
