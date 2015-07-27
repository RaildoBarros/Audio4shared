<?php 
// Connect to firewall
$conn_id = ftp_connect("ftp.4shared.com"); 

// Open a session to an external ftp site
$login_result = ftp_login ($conn_id, "raildo.barros@gmail.com", "29069218raildo"); 

// Check open
if ((!$conn_id) || (!$login_result)) { 
        echo "Ftp-connect Falhou!"; die; 
    } else {
        echo "Conectado.";
    }

// turn on passive mode transfers
ftp_pasv ($conn_id, true);

?>