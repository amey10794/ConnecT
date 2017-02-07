<?php
$eemail=$_POST['eemail'];
$epassword=$_POST['epassword'];
$con=mysqli_connect('localhost','root','','connectdb') or die("Error".mysqli_error($con));
    $sql="SELECT * FROM Users WHERE email= '".$eemail."'";
    echo $sql;
    if($con->query($sql)==TRUE){
        echo "succesfully done";
    }
    else{
        echo "Error in selection".$con->error;
    }
    
    $result=mysqli_query($con,$sql);
    echo '<br/>';
    print_r($result);
    $datar[]=array();
    while($row=mysqli_fetch_assoc($result)){
        $datar[]=$row;
    }
    echo '<br/>';
        
    print_r($datar);
    echo $firstname=$datar[1]['firstname'];
    echo $lastname=$datar[1]['lastname'];
    echo $email=$datar[1]['email'];
    echo $password=$datar[1]['password'];
    echo $html=$datar[1]['html'];
    echo $image=$datar[1]['image'];
$con->close();
if($epassword===$password){
    echo "passwords match!";
    $link=$html."?firstname=".$firstname."&lastname=".$lastname."&email=".$email."&image=".$image;
    echo '<br/>';
    echo $link;
    header("Location:http://108.55.6.113/connect/".$link);
}
else{
    echo "wrong password";
      header("Location:http://108.55.6.113/connect/login.html");
    
}


?>