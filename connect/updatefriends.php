<?php 
print_r($_GET);
echo '<br/>';
$recemail= $_GET["recemail"];
echo '<br/>';
$senemail= $_GET["senemail"];
print_r( $sen=preg_split("/[\s@]/",$senemail));
print_r($rec=preg_split("/[\s@]/",$recemail));
$filename=$rec[0].".php";
$conn=mysqli_connect('localhost','root','','connectdb');

$sql = "INSERT INTO friends".$sen[0]." (email)
VALUES ('$recemail')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO friends".$rec[0]." (email)
VALUES ('$senemail')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
$html=file_get_contents("home.html");
$file=fopen($filename,'w');
fwrite($file,$html);
header("location:javascript://history.go(-1)");

?>