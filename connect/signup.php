<?php
    print_r($_POST);
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $target_dir = "uploads/";
    echo '<br/>';
    echo $firstname;
    echo $lastname;
    echo '<br/>';
    echo $email;
    echo $password;
    echo '<br/>';
    echo $dob;
    echo $gender;
    echo '<br/>';
    echo "hello  ";
    print_r($_FILES);
    echo '<br/>';
    @preg_match('/(png)/',$_FILES["image"]["type"] , $matchpng, PREG_OFFSET_CAPTURE);
    @preg_match('/(jpg)/',$_FILES["image"]["type"] , $matchjpg, PREG_OFFSET_CAPTURE);
    @preg_match('/(jpeg)/',$_FILES["image"]["type"] , $matchjpeg, PREG_OFFSET_CAPTURE);
    @preg_match('/(gif)/',$_FILES["image"]["type"] , $matchgif, PREG_OFFSET_CAPTURE);
    @preg_match('/(pdf)/',$_FILES["image"]["type"] , $matchpdf, PREG_OFFSET_CAPTURE);
    echo "png";
    print_r($matchpng);
    echo "jpg";
    print_r($matchjpg);
    echo "jpeg";
    print_r($matchjpeg);
    echo "tif";
    print_r($matchgif);
    
    print_r($matchpdf);
    $ext;
    if (count($matchpng)!=0){
        global $ext;
        $ext=".png";
    }
    if (count($matchjpg)!=0){
        global $ext;
        $ext=".jpg";
    }
    if (count($matchjpeg)!=0){
        global $ext;
        $ext=".jpeg";
    }
    if (count($matchgif)!=0){
        global $ext;
        $ext=".gif";
    }
    if (count($matchpdf)!=0){
        global $ext;
        $ext=".pdf";
    }
    echo $_FILES["image"]["name"]=strtolower($firstname.$lastname.$ext);
    $imgsrc=$_FILES["image"]["name"];
    print_r( $_FILES);
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';

    //Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType!="pdf" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
$html1=preg_split("/[\s@]/",$email);
$userhtml=$html1[0].".php";
$htmlfile=fopen($html1[0].".php",'w');
$html=file_get_contents("http://108.55.6.113/connect/home.html");
fwrite($htmlfile,$html);
$conn=new mysqli('localhost','root','','connectdb');
//mysql_query("INSERT INTO employees1(first_name,last_name,department,email) VALUES('$first_name','$last_name','$department','$email')");
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

$sql1="CREATE DATABASE IF NOT EXISTS connectdb";
if($conn->query($sql1)==TRUE){
    echo"Database created succesfully";
    }
else{
    echo "Error creating database:".$conn->error;
    
}
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(30) NOT NULL,
dob VARCHAR(30) NOT NULL,
image VARCHAR(30) NOT NULL,
html VARCHAR(30) NOT NULL,
friends_id INTEGER,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS friends".$html1[0]." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
uid INTEGER,
email VARCHAR(50) UNIQUE,
reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table friends created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "INSERT INTO Users (firstname, lastname, email, password, dob, image, html)
VALUES ('$firstname', '$lastname', '$email', '$password','$dob','$imgsrc', '$userhtml')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

$link=$userhtml."?firstname=".$firstname."&lastname=".$lastname."&email=".$email."&image=".$imgsrc;
echo $link;
header("Location:http://108.55.6.113/connect/".$link);
?>