<?php
include_once './soap4shared.php';
?>
<script>
    //var audiosDestronandoMamon = <?php //echo json_encode($audiosDestronandoMamom);    ?>;
    //var mp3InfosDestronandoMamom = <?php //echo json_encode($mp3InfosDestronandoMamom);    ?>;
</script>

<html>
    <head>
        <title>Áudios</title>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>

        <?php
        //var_dump($audiosDestronandoMamom);
        //var_dump($mp3InfosDestronandoMamom);
        ?>

        <div class="list-group" style="width: 50%; margin: auto;">
            <a href="#" class="list-group-item active">
                Destronando Mamon
            </a>
            <?php
            for ($i = 0; $i < count($audiosDestronandoMamom->item); $i++) {
                $id = $audiosDestronandoMamom->item[$i]->id;
                $tituloAudio = $mp3InfosDestronandoMamom->item[$i]->title;
                $nomeDoAudio = $audiosDestronandoMamom->item[$i]->name;
                $linkPageDownload = $audiosDestronandoMamom->item[$i]->downloadLink;
                $codigoDoAudio = substr($linkPageDownload, 28, 10);
                $linkBase = substr($linkPageDownload, 0, 24) . 'download' . substr($linkPageDownload, 27, 42);
                $linkDireto = $linkBase . '.mp3?sbsr=' . $id . '&lgfp=3000';

                echo '<a href="#" class="list-group-item">
            ' . $tituloAudio . '
                <iframe src="https://www.4shared.com/web/embed/audio/file/' . $codigoDoAudio . '?type=MINI&widgetWidth=530&lightTheme=true&playlistHeight=0&widgetRid=483615608576"
            style="overflow:hidden;height:60px;width:530px;border: 0;margin:0;"></iframe>
                <a href="' . $linkPageDownload . '"> Download Normal </a> |
                <a href="' . $linkDireto . '"> Download Direto </a>
            <div>
            
            </div>
            </a>';
            }
            ?>
        </div>

    </body>
    <!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>

