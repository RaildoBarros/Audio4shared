<?php
include './conexao.php';
include './id3.class.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Audio Player: Responsive &amp; Touch-Friendly</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Responsive &amp; Touch-Friendly Audio Player" />
        <meta name="author" content="Osvaldas Valutis, www.osvaldas.info" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700" />
        <link rel="stylesheet" href="/AudioPlayer/css/reset.css" />
        <link rel="stylesheet" href="/AudioPlayer/css/demo.css" />
        <link rel="stylesheet" href="/AudioPlayer/css/audioplayer.css" />
        <script>
            /*
             VIEWPORT BUG FIX
             iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
             */
            (function (doc) {
                var addEvent = 'addEventListener', type = 'gesturestart', qsa = 'querySelectorAll', scales = [1, 1], meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];
                function fix() {
                    meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
                    doc.removeEventListener(type, fix, true);
                }
                if ((meta = meta[meta.length - 1]) && addEvent in doc) {
                    fix();
                    scales = [.25, 1.6];
                    doc[addEvent](type, fix, true);
                }
            }(document));
        </script>
        <title></title>
    </head>
    <body>
        <?php
        // tenta mudar para algumDiretorio
        if (ftp_chdir($conn_id, "Pregações")) {
            //echo "O diretório atual agora é: " . ftp_pwd($conn_id) . "\n";
        } else {
            echo "Não foi possível mudar o diretório\n";
        }

        //Pega o conteúdo do diretório atual
        $contents = ftp_nlist($conn_id, ".");
        ?>


        Tema: Como Jesus nos vê?<br><br>
        Pregador: Pr. Jean Jerley<br><br>
        <div id="wrapper">
            <audio preload="auto" controls>
                <source src="ftp://raildo.barros@gmail.com:29069218raildo@ftp.4shared.com/Pregações/<?php echo $contents[0]?>">
            </audio>
            <script src="AudioPlayer/js/jquery.js"></script>
            <script src="AudioPlayer/js/audioplayer.js"></script>
            <script>$(function () {
                        $('audio').audioPlayer();
                    });</script>

            <div class="attribution">
                <div xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/" about="http://freemusicarchive.org/music/Blue_Ducks/Six/">

                </div>
            </div>
        </div>

       <!-- LOOP -->
        <?php
        foreach ($contents as $nomedoarquivo) {
            echo "O diretório atual agora é: " . ftp_pwd($conn_id) . "\n";

            $arquivo = 'ftp://raildo.barros@gmail.com:29069218raildo@ftp.4shared.com/Pregações/' . $nomedoarquivo;
            require('error.inc.php');
            $myId3 = new ID3($arquivo);
            if ($myId3->getInfo()) {
                echo $myId3->getTrack() . '<br>';
                echo $myId3->getTitle() . '<br>';
                echo $myId3->getArtist() . '<br>';
                echo $myId3->getAlbum() . '<br>';
                echo $myId3->getYear() . '<br>';
            } else {
                echo($errors[$myId3->last_error_num]);
            }
            ?>
            <br>
            <!-- PLAYER -->
            <audio 
                src="<?php echo $arquivo; ?>" 
                controls="controls" loop preload="preload" 
                title="Quermesse - O Teatro Mágico"> 
                <a href="<?php echo $contents[0] ?>">
                    <?php echo $contents[0] ?>
                </a> 
            </audio>
            <br>
            <?php
        }
        ?>

    </body>
</html>
