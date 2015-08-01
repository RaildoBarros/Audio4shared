<?PHP
echo "from file\n";
$tag = id3_get_tag('http://www.4shared.com/download/eSLv9OQ5ce/234_Quarta_300715_Vcios_que_me.mp3?lgfp=3000');
var_dump($tag);

//echo "from resource\n";
//$tag = id3_get_tag(fopen('/home/schst/test.mp3', 'rb'));
//var_dump($tag);
//
//echo "v1.1\n";
//$tag = id3_get_tag('/home/schst/demo.mp3');
//var_dump($tag);
//
//exit();
//
//echo "from nonexistant file\n";
//$tag = id3_get_tag('/home/schst/foo.mp3');
//var_dump($tag);
//
//echo "from int\n";
//$tag = id3_get_tag(452);
//var_dump($tag);
?>
