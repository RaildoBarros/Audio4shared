<?php
$login = "";
$senha = "";
$destronandoMamon = "https://www.4shared.com/folder/4U7TDJfB/Destronando_Mamom.html";

$wsdl = "http://api.4shared.com/jax2/DesktopApp?wsdl";
$a = new SoapClient($wsdl);

try {
    $idDestronandoMamon = $a->decodeLink($login, $senha, $destronandoMamon);
} catch (SoapFault $e) {
    echo $e->getmessage();
    die();
}

$audiosDestronandoMamom = $a->getItems($login, $senha, $idDestronandoMamon);
var_dump($audiosDestronandoMamom);
$mp3InfosDestronandoMamom = $a->getMp3FileInfos($login, $senha, $idDestronandoMamon);
var_dump($mp3InfosDestronandoMamom);

//$dirLinks = $a->getDirLinkItems($destronandoMamon,$senha );
//var_dump($dirLinks);
//$client = new SoapClient('http://api.4shared.com/servlet/services/DesktopApp?wsdl');
//var_dump($client->__getFunctions());
?>

