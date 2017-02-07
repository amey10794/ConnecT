<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Website-Amey Mhaskar</title>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="https://goo.gl/UHdDoA">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/hover-min.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- My javascript files-->
    
    <script src="js/events.js"></script>
    <script src="eventsq.js"></script>
    
    </head>
    <body>
        <h4 id="heading1"></h4>
        
        <div style="width:100%">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                    Friends
                    
                    </div>
                    <div class="panel-body">
                <ul id="friendslist">
                        
                        
                </ul>
                </div>
        
                </div>
        </div>
    </body>

</html>



<?php

$firstname=$_GET["firstname"];
$lastname=$_GET["lastname"];
$emailname=$_GET["email"];
$imagename=$_GET["image"];
$email=preg_split("/[\s@]/",$emailname);
$conn=mysqli_connect('localhost','root','','connectdb');
$sql="SELECT email FROM friends".$email[0];
$result=mysqli_query($conn,$sql);
echo '<br/>';

$datar[]=array();
while($row=mysqli_fetch_assoc($result)){
    $datar[]=$row;
}
echo '<br/>';
print_r($datar);
echo "<script>";
    echo 'var firstname='.json_encode($firstname).';';
    echo 'var lastname='.json_encode($lastname).';';
    
    echo 'var datar='.json_encode($datar).';';
echo "</script>";
?>
<script>
    var html;
    $(document).ready(function(){
        $("#heading1").text(firstname+" "+lastname+"'s ConnecTions");
        html="";
        var x=datar.length;
        for(i=1;i<x;i++){
        html=html+"<div><li><strong>Email:</strong>"+datar[i]["email"]+"</li><div>";
            }
        
        $("#friendslist").html(html);
    });
</script>