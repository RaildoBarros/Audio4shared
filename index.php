<?php include './conexao.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <audio 
            src="http://web.htmhelen.com/music/Quermesse.mp3" 
            controls="controls" loop preload="preload" 
            title="Quermesse - O Teatro Mágico"> 
            <a href="http://web.htmhelen.com/music/Quermesse.mp3">
                Quermesse - O Teatro Mágico.mp3
            </a> 
        </audio>
        <?php
        echo "Diretório atual: " . ftp_pwd($conn_id) . "\n";

        // tenta mudar para algumDiretorio
        if (ftp_chdir($conn_id, "Pregações")) {
            echo "O diretório atual agora é: " . ftp_pwd($conn_id) . "\n";
        } else {
            echo "Não foi possível mudar o diretório\n";
        }

        // get contents of the current directory
        $contents = ftp_nlist($conn_id, ".");

        // output $contents
        var_dump($contents);
        var_dump($contents[0]);
        ?>
        <audio 
            src="ftp://ftp.4shared.com/Pregações/<?php echo $contents[0] ?>" 
            controls="controls" loop preload="preload" 
            title="Quermesse - O Teatro Mágico"> 
            <a href="ftp://ftp.4shared.com/Pregações/<?php echo $contents[0] ?>">
                Quermesse - O Teatro Mágico.mp3
            </a> 
        </audio>
        
    </body>
</html>
