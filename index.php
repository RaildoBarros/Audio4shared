<?php
include './conexao.php';
include './id3.class.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
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

        $file = fopen("ftp://raildo.barros@gmail.com:29069218raildo@ftp.4shared.com/Pregações/" . $contents[0], "r");
        if (!$file) {
            echo "<p>Incapaz de abrir arquivo remoto.\n";
            exit;
        }
        ?>


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
