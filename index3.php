<?php
$login = "";
$senha = "";
$link = "https://www.4shared.com/mp3/g5Ppq-Coce/01_270715_Destronando_Mamom_-_.html?";
$destronandoMamon = "https://www.4shared.com/folder/4U7TDJfB/Destronando_Mamom.html";


$wsdl = "http://api.4shared.com/jax2/DesktopApp?wsdl";
$a = new SoapClient($wsdl);

try {
    $idDestronandoMamon = $a->decodeLink($login, $senha, $destronandoMamon);
} catch (SoapFault $e) {
    echo $e->getmessage();
    die();
}

try {
    $id = $a->decodeLink($login, $senha, $link);
} catch (SoapFault $e) {
    echo $e->getmessage();
    die();
}
echo $id;

$pegarItens = $a->getItems($login, $senha, $idDestronandoMamon);
//var_dump($pegarItens);
echo '-----------------------------------------------------------------------------------------------------------------------';
$mp3Infos = $a->getMp3FileInfos($login, $senha, $idDestronandoMamon);
//var_dump($mp3Infos);

for ($i = 0; $i < count($pegarItens->item); $i++) {
    $linkPageDownload = $pegarItens->item[$i]->downloadLink;
    $fileId = $pegarItens->item[$i]->id;
    var_dump($fileId);
    $linkDireto = $a->getDirectLink($login, $senha, $linkPageDownload);
    var_dump($linkDireto);
    $mp3Info = $mp3Infos->item[$i]->title;
    $nomeDoAudio = $pegarItens->item[$i]->name;
    echo '<h1>' . $mp3Info . '</h1>';
    echo '<a href="' . $linkPageDownload . '"> Link indireto: ' . $linkPageDownload . '</a></br>';
    echo '<a href="' . $linkPageDownload . '"> Link direto: ' . $nomeDoAudio . '</a></br>';
}





//$dirLinks = $a->getDirLinkItems($destronandoMamon,$senha );
//var_dump($dirLinks);
//$client = new SoapClient('http://api.4shared.com/servlet/services/DesktopApp?wsdl');
//var_dump($client->__getFunctions());
?>

<iframe src='https://www.4shared.com/web/embed/audio/file/g5Ppq-Coce?type=MINI&widgetWidth=530&lightTheme=true&playlistHeight=0&widgetRid=394460060416' 
        style='overflow:hidden;height:60px;width:530px;border: 0;margin:0;'></iframe>