<?php include './conexao.php'; ?>
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

        ?>
        <?php
        foreach ($contents as $nomedoarquivo) {   
            echo $nomedoarquivo;
        ?>
        <br>
        <audio 
            src="ftp://raildo.barros@gmail.com:29069218raildo@ftp.4shared.com/Pregações/<?php echo $nomedoarquivo; ?>" 
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
