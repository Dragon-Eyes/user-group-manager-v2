@extends('layouts.legacyapp')

<?php
    define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
    define("ROOT_WWW", 'http://' . $_SERVER['HTTP_HOST']);

    function ue($string = "") {
        return urlencode($string);
    }

    function hsc($string = "") {
        return htmlspecialchars($string);
    }

?>

@section('content')
    <div class="card eventBoxLight" id="event202102">
        <div class="card-body">
            <h3 class="card-title">24.02.2021: FileMaker Stammtisch Zürich</h3>
            <h4>Ort</h4>
            <p>Virtuell: Christian Sedlmeiers Jitsi Server @ meet.sedlmair.ch</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2021-02']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2021-02']; ?>
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


    <div class="card eventNext" id="event202101">
        <div class="card-body">
            <h3 class="card-title">21.01.2021: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <li><span style="">18:30 Uhr (Marcel Moré): Integration TK-Anlage per FM Data API & FM Data API mit fmRESTor ansteuern</span></li>
                <li>19:30 Uhr (Dave Camenisch): Automatischer Update einer in Betrieb befindende FM-Lösung</li>
            </ul>
            <h4>Ort</h4>
            <p>Virtuell: Christian Sedlmeiers Jitsi Server @ meet.sedlmair.ch</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2021-01']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2021-01']; ?>
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

    <div class="card eventFmz">
        <div class="card-body">
            <h3 class="card-title" id="event202011">20.11.2020: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <!--                    <li>18:30 Uhr: (Kurz-Referat Christoph Dunkake) "Hinterlasse eine Applikation immer ein klein wenig besser / aufgeräumter als Du sie vorfindest." oder kontinuierliches Mikro-Refactoring</li>-->
                <li>18:30 Uhr (Paul Merki): Best Practices und Brainstorming zu Stilen</li>
                <li>19:30 Uhr (Markus Spieler): Best Practices und Brainstorming zu Coding Conventions</li>
            </ul>
            <h4>Ort</h4>
            <!--                <p>Virtuell: Medio-Ingenos <a href="https://jitsimeet.medio-ingeno.ch/FMZuerichStammtisch202011" target="_blank">Jitsi Server</a> @ jitsimeet.medio-ingeno.ch<br>-->
            <p>Virtuell: Medio-Ingenos Jitsi Server @ jitsimeet.medio-ingeno.ch</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2020-11']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2020-11']; ?>
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

    <div class="card eventFmz">
        <div class="card-body">
            <h3 class="card-title" id="event202008">14.08.2020: FileMaker Stammtisch Zürich</h3>
            <p><span style="text-decoration: line-through;">Ab 17:30 Uhr machen wir eine "FileMaker Sprechstunde" an selber Stelle für alle Detailfragen, die ausserhalb der "grossen Runde" besprochen werden sollen.</span> [Da an der Sprechstunde niemand teilnehmen möchte, lassen wir diese ausfallen.]</p>
            <h4>Agenda</h4>
            <table>
                <tr>
                    <td style="padding-right: 20px;"><ul><li>18:30 Uhr</li></ul></td>
                    <td>FileMaker Module durch die Re-Usability des WebStack<br>(am Beispiel Navigation im WebViewer)</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Christoph Dunkake</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><a href="https://github.com/ChrisDunko/FileMaker_WebStack_Navigation" target="_blank">Demo-Dateien</a></td>
                </tr>
                <tr>
                    <td style="padding-right: 20px;"><ul><li>ca. 19:15 Uhr</li></ul></td>
                    <td>FileMaker Fehler<br>(wie damit umgehen)</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Martin Schwarz</td>
                </tr>
            </table>
            <h4>Ort</h4>
            <p>Virtuell: Christians Jitsi Server @ meet.sedlmair.ch<br>
                Physisch: CropFactory, <a href="https://www.cropfactory.ch/contact" target="_blank">Alte Bahnhofstrasse 27, 5612 Villmergen</a> (AG)<br>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2020-08']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2020-08']; ?>
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
            <img src="https://filemakerzuerich.rokka.io/dynamic/2e7429018b3d93b90118f8574b31f3c258b972a1.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>7 FileMaker Problem Solvers am physischen Stammtisch im August (keiner in der virtuellen Ergänzung)</p>
        </div>
    </div>

    <div class="card eventNext">
        <div class="card-body">
            <h3 class="card-title" id="event202005">29.05.2020: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <li>18:30 Vortrag "8 FileMaker Geschenke" (Markus Spieler)</li>
                <li>19:30 JavaScript @ FileMaker (Christoph Dunkake)</li>
                <li>20:00 Kreativer Einschub "<a href="https://corona.photo" target="_blank">corona.photo</a>" (Paul Merki)</li>
                <li>20:30 MBS-Highlight(s) (Christian Schmitz)</li>
            </ul>
            <h4>Ort</h4>
            <p>Virtuell: Christophs Jitsi Server @ stayintouch.dragoneyes.software<br>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2020-05']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2020-05']; ?>
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
            <img src="https://filemakerzuerich.rokka.io/dynamic/743d76b55c1ede1d738cd44a70155795a38694c4.png" style="max-width: 100%; margin-top: 25px;">
            <p>11 FileMaker Problem Solvers am virtuellen Stammtisch im Mai</p>
        </div>
    </div>

    <div class="card eventFmz">
        <div class="card-body">
            <h3 class="card-title" id="event202004">17.04.2020: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <li>19:00 "Lass das mal den Server machen" (Christoph Dunkake)</li>
                <li>19:30 User-Access-Manager (Dave Camenisch)</li>
                <li>20:30 Monkeybread-Special (Christian Schmitz)</li>
                <li>21:00 offene Diskussion / spontane Themen</li>
            </ul>
            <h4>Ort</h4>
            <p>Virtuell: Arsins Jitsi Server @ meet.datenbankdesign.ch</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2020-04']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2020-04']; ?>
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

    <div class="card eventNext">
        <div class="card-body">
            <h3 class="card-title" id="event202002">21.02.2020: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <li>19:00 Thema & Diskussion: Container-Farben rechnen (Markus Spieler)</li>
                <li>20:00 Thema & Diskussion: HTML-Mails verschicken ohne Plugin (Christoph Dunkake)</li>
            </ul>
            <h4>Ort</h4>
            <p>Dragon Eyes, <a href="https://dragoneyes.software/niederlassungen.php#au" target="_blank">Alte Landstrasse 15, 8804 Au</a> / Wädenswil (ZH)</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2020-02']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2020-02']; ?>
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
            <img src="https://filemakerzuerich.rokka.io/dynamic/715d588ac247b1798159464c05179f9b07507174.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>8 FileMaker Pros am Stammtisch im Februar</p>
            <img src="https://filemakerzuerich.rokka.io/dynamic/56292893ff505eac73fc72d646f8174338208492.png" style="max-width: 100%; margin-top: 25px;">
            <p>HTML-Mails direkt aus FileMaker 18 / SMTP via InsertFromURL: eigentlich ganz einfach</p>
            <img src="https://filemakerzuerich.rokka.io/dynamic/493e2ea3c53981226473724fa4f90556c7e56f90.jpg" style="max-width: 100%; margin-top: 25px;">
        </div>
    </div>

    <div class="card eventFmz">
        <div class="card-body">
            <h3 class="card-title" id="event202001">24.01.2020: FileMaker Stammtisch Zürich</h3>
            <h4>Agenda</h4>
            <ul>
                <li>18:00 Essen (optional)</li>
                <li>19:00 Thema & Diskussion: Unerwartete Effekte bei Duplicate Record (Markus Spieler)</li>
                <li><span style="text-decoration: line-through; ">20:00 Lösung (10 Minuten!) & Diskussion</span></li>
                <li><span style="text-decoration: line-through; ">Bonus HTML-Mails verschicken ohne Plugin</span></li>
            </ul>
            <h4>Ort</h4>
            <p>Essen: <a href="https://wirtshaus-zur-brauerei.ch" target="_blank">Wirtshaus zur Brauerei</a>, Mattenweg 1, 5612 Villmergen (AG)<br>
                Stammtisch: CropFactory, <a href="https://www.cropfactory.ch/contact" target="_blank">Alte Bahnhofstrasse 27, 5612 Villmergen</a> (AG)</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2020-01']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2020-01']; ?>
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
            <img src="https://filemakerzuerich.rokka.io/dynamic/67eee45a23d0e784d8b8e27ab0b9d4c2f4a74619.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>9 Problem Solvers am ersten Stammtisch in 2020</p>
            <img src="https://filemakerzuerich.rokka.io/dynamic/aaf829282f7cbe7bb771c50fefa5c653d6994e0a.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>Lebhafte Diskussionen unter den Pros</p>
        </div>
    </div>

    <div class="card eventNext">
        <div class="card-body">
            <h3 class="card-title" id="event201912">18.12.2019: FileMaker Zürich Initial-Stammtisch</h3>
            <p class="card-text">Neben den informellen Gesprächen und dem Networking stelle ich mir zwei Themen pro Stammtisch vor.<br>
                Die Götties der Themen müssen nicht zwangsläufig ausgefeilte Präsentationen / Reden vorbereiten und müssen sich auch nicht notwendigerweise Experten in dem Gebiet sein.<br>
                Die Teilnahme ist kostenlos. Für Getränke und ein paar Snacks ist gesorgt.</p>
            <h4>Agenda</h4>
            <ul>
                <li>18:00 Eintreffen</li>
                <li>18:30 Organisatorisches / Diskussion über die zukünftigen Parameter (Treffen, Themen etc.)</li>
                <li>18:50 Thema 1 & Diskussion: Relationship-Graph-Verbindung vs. Execute SQL (Christoph Dunkake)</li>
                <li>19:10 Thema 2 & Diskussion: SQL Abfragen (Arsin Grünig)</li>
                <li>19:30 Open Floor (Fragen, Probleme, Auffälliges...)</li>
                <li>20:00 Feierabend-Bier</li>
            </ul>
            <h4>Ort</h4>
            <p>Dragon Eyes, <a href="https://dragoneyes.software/niederlassungen.php#au" target="_blank">Alte Landstrasse 15, 8804 Au</a> / Wädenswil (ZH)</p>
            <h4>Teilnehmer (<?= count($registrations['Stammtisch 2019-12']); ?>)</h4>
            <table><?php
                // PARTICIPANTS
                $registrationsEvent = $registrations['Stammtisch 2019-12']; ?>
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
            <img src="https://filemakerzuerich.rokka.io/dynamic/cbafd563ddb57ed4f0645345e01870032efd5569.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>7 Problem Solvers am Initial-Stammtisch</p>
            <img src="https://filemakerzuerich.rokka.io/dynamic/09630704a9f5640796c6716126605eac99137e7e.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>Quick Find nicht vergessen..!</p>
            <img src="https://filemakerzuerich.rokka.io/dynamic/b881485a4b0c86b711c3ce067b6ea0d826469f03.jpg" style="max-width: 100%; margin-top: 25px;">
            <p>Gespanntes Zuhören bei Arsins Vortrag</p>
        </div>
    </div>
@endsection
