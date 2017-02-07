<?php

print_r($_GET);
$remail=$_GET["remail"];
$semail=$_GET["semail"];
$search=$_GET["search"];
$page=$_GET["page"];
$base="http://108.55.6.113/connect/";
echo $semail;
$ogfile="home.html";
$filename="home1.html";
$file = @fopen($filename, 'r');

$userfile = @fopen($page, 'w');
$output ='';

while (($line = fgets($file)) !== FALSE) {
    
    $output .= str_replace('<h2 id="updates"></h2>', '<a id="acceptlink"><h5 class="alert alert-info" id="updates">You have got a request from<strong id="semail">'.$semail.'</strong><button id="acceptbutton">Accept!</button></h5></a>', $line);
}
fclose($file);
//write the new file
$result = file_put_contents($filename, $output);
$html = file_get_contents($filename);
fwrite($userfile,$html);
$oghtml=file_get_contents($ogfile);
$filew = @fopen($filename, 'w');
fwrite($filew,$oghtml);

$doc=new DomDocument();
@$doc->loadHTML($html);
header("Location:http://108.55.6.113/connect/search.php?search=".$search."&semail=".$semail);

?>