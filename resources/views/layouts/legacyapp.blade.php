<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="robots" content="index, follow">
    <title>Claris Stammtisch</title>
    <meta name="description" content="Forum und Stammtisch zum Austausch unter Claris-Entwicklern / FileMaker-Entwicklern im Grossraum Zürich mit regelmässigen Treffen zum Austausch und zur Anregung."/>

    <?php
    use JetBrains\PhpStorm\Pure;
    $page = $_SERVER['REQUEST_URI'] === '/' ? 'index' : substr($_SERVER['REQUEST_URI'], 1);
//    define("ROOT_FILE", substr(__DIR__, 0, strpos(__DIR__, '/private')));
//    define("ROOT_WWW", 'http://' . $_SERVER['HTTP_HOST']);
    ?>
    <meta property="og:url" content="https://claris-stammtisch.ch<?= $page == 'index' ? '' : '/' . $page; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Claris Entwickler Stammtisch Zürich">
    <meta property="og:description" content="Der neue FileMaker / Claris Stammtisch in / um Zürich. Jede / jeder FileMaker-Interessierte ist willkommen; die Neulinge bringen interessante Fragen und neue Ideen und die alten Hasen können mal zeigen, was sie (noch) können.">
    <!-- 600x314 -->
{{--    <meta property="og:image" content="https://cxo.ch/fmzurich_legacy_files/assets/fmzuerich_600x314_pic_2.png">--}}
{{--    <meta property="og:image" content="https://cxo.ch/fmzurich_legacy_files/assets/fmzuerich_600x314.png">--}}

    <link rel="canonical" href="https://claris-stammtisch.ch<?= $page == 'index' ? '' : '/' . $page; ?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styles/bootstrap.min.css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="styles/fmzuerich_bsoverride.css">-->
    <!--    <link rel="stylesheet" href="styles/fmzuerich.css">-->
{{--    <link rel="stylesheet" href="https://cxo.ch/fmzurich_legacy_files/styles/fmzurich.css">--}}
    <link rel="stylesheet" href="{{ asset('css/fmzurich.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}">
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('assets/favicons/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('assets/favicons/favicon-192.png') }}">
    <link rel="icon" type="image/png" sizes="160x160" href="{{ asset('assets/favicons/favicon-160.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicons/favicon-96.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('assets/favicons/favicon-64.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicons/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicons/favicon-16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/favicons/favicon-57.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicons/favicon-114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicons/favicon-72.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicons/favicon-144.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicons/favicon-60.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicons/favicon-120.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicons/favicon-76.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicons/favicon-152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/favicon-180.png') }}">


    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
    />
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/124f92db94f3241542ea4942e/aeb4fca55c490992a439208d2.js");</script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    @livewireStyles
</head>
<?php
// log
#[Pure] function get_ip_address() :string {
/*    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }*/
}
//$log = new Log(['event'=>'pageview','note'=>$page.','.get_ip_address()]);
//$log->save();
//$log = \App\Http\Controllers\LogLegacyController::write('pageview', $page . ',' . get_ip_address());
$log = \App\Http\Controllers\LogLegacyController::write('pageview', $page);
?>

<body>
<div class="pagecontainer">
    <div class="pagecontainerheader">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container">
                <a class="navbar-brand" href="<?= ROOT_WWW ?>">Claris Stammtisch</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stammtisch</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= ROOT_WWW ?>">Zukünftige</a>
                                <a class="dropdown-item" href="<?= ROOT_WWW ?>/pastevents">Rückblick</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Newsletter mit Stammtisch-Ankündigungen etc.">
{{--                            <a class="nav-link" href="http://eepurl.com/gIw6zf" target="_blank">Newsletter</a>--}}
                            <a class="nav-link" href="http://eepurl.com/h0Us9f" target="_blank">Newsletter</a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Geschlossenes Forum für regelmässige Teilnehmer">
                            <a class="nav-link" href="<?= ROOT_WWW ?>/forum">Forum</a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Präsentationen, Demodateien etc.">
                            <a class="nav-link" href="https://gasser2.diskstation.me:5011" target="_blank">Ressourcen</a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Rest API">
                            <a class="nav-link" href="<?= ROOT_WWW ?>/api/info" target="_blank">API</a>
                        </li> -->
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Admin Login">
                            <a class="nav-link" href="<?= ROOT_WWW ?>/admin" target="_blank">Orga</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>    </div>
    <div class="pagecontainercontent">
        <div class="container">

            @yield('content')

        </div> <!-- end bootstrap container -->
    </div> <!-- end pagecontainercontent -->
    <div class="pagecontainerfooter">
        <div class="container mt-4">
            <p>Claris Stammtisch Zürich / FileMaker Stammtisch Zürich ist <strong>kein</strong> offizieller Kommunikationskanal von Claris Inc., sondern eine nicht kommerzielle Initiative von FileMaker-Benutzern / Claris-Programmierern.<br>
                Techniksponsor (Web-Applikation, URLs, Mailservice etc.): DragonEyes Software<br>
                Organisation: Christoph Dunkake</p>
        </div>
    </div>
</div> <!-- end pagecontainer -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
{{--<script src="https://cxo.ch/fmzurich_legacy_files/scripts/bootstrap.bundle.js"></script>--}}
{{--<script src="https://cxo.ch/fmzurich_legacy_files/scripts/functions.js"></script>--}}
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
@livewireScripts
</body>
</html>
