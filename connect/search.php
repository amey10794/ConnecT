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
    <script src="search.js"></script>
    <script>
    var html; 
    var href=Array();
    var fname=Array();
    var lname=Array();
    var email=Array();
    var dob=Array();
    var htmlpage=Array();
    var image=Array();
    var end=Array();
    var base="http://108.55.6.113/connect/"
    
    
        $(document).ready(function(){
        html="";
    $(".nose").text("Retrieved "+nos1+" Search Results for  '" +query+"'");
    for(i=1;i<nos1;i++){
        fname[i]=datar[i]['firstname'];
        lname[i]=datar[i]['lastname'];
        email[i]=datar[i]['email'];
        dob[i]=datar[i]['dob'];
        htmlpage[i]=datar[i]['html'];
        image[i]=datar[i]['image'];
        
        end[i]="?firstname="+fname[i]+"&lastname="+lname[i]+"&email="+email[i]+"&image="+image[i];
        href[i]=base+htmlpage[i]+end[i];
        html=html+"<div style='display:flex'><div style='padding:10px'><img src="+base+"uploads/"+image[i]+" height='100px' width='100px'></div><div><a href="+href[i]+">"+"<h3>"+fname[i]+" "+lname[i]+"</h3></a>"+"<p><strong>Email:</strong>"+email[i]+"  <br/><strong>D.O.B</strong> "+dob[i]+"</p>"+"<input type='button' onclick='send(this)' id='sa"+i+"' value='Add+'><br/><p class='sa"+i+"'></p></div></div>";
    }
    
    $("#results").html(html);
    
    
});
        function send(element){
        var id=element.id;
        var class1="."+id;
        window.alert(class1);
        $(class1).html("<p class='alert alert-success'>'Your Request has been sent'</p>");
        var index=id.split('a');    
        var fname1=fname[index[1]];
        var lname1=lname[index[1]];
        var email1=email[index[1]];
        var htmlpage1=htmlpage[index[1]];
        var image1=image[index[1]];
        var string="http://108.55.6.113/connect/searchplugin.php?remail="+email1+"&semail="+sender+"&search="+query+"&page="+htmlpage1;   
        window.location.href=string;
            
            
        /*$.get('home1.html',function(data){
           
        
        var x=data.split(">n<");    
        console.log(x[0]+">Hello You have a friend request from "+sender+"<"+x[1]);    
        var hello=new XMLHttpRequest();
        var hi=hello.OpenTextFile("http://www")
        });
        
        /*var rawfile=new  XMLHttpRequest();
        var allText;
        rawfile.onreadystatechange=function()
        {
            if(rawfile.readyState==4)
                {
                    if(rawfile.status==200||rawfile.status==0)
                        {
                            allText=rawfile.responseText;
                        }
                    
                }
            
            
        }
        rawfile.open("GET","http://108.55.6.113/connect/home.html",false);
        rawfile.send();*/
        
        }
        
        
        
        </script>
    </head>
    <body>
        <div class="container" style="width:100%">
            <div class="row" style="backgound-color:lightblue;color:black;width:80%;margin:auto">
                <p class="nose alert alert-info" ></p>
            
            </div>
        </div>
        <div class="container" style="min-height:500px;width:100%">
            <div class="row" style="width:80%;margin:auto">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    People
                    
                    </div>
                    <div class="panel-body">
                <div class="col-xs-12" id="results">
                    <h1>Hello</h1>
                </div>
                </div>
                </div>
            </div>
        
        </div>
    <?php
    
    print_r($_GET);
    echo $sender=$_GET['semail'];
    echo $receiver=$_GET['remail'];
    echo $text=$_GET['search'];
    $con=mysqli_connect('localhost','root','','connectdb') or die("Error".mysqli_error($con));
    $sql="SELECT * FROM Users WHERE firstname= '".$text."'";
    
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
    echo '<br/>';
    echo '<br/>';
    echo $nos=count($datar);
    echo '<script>';
    echo 'var sender='.json_encode($sender).';';
    echo 'var nos1='.json_encode($nos).';';
    echo 'var query='.json_encode($text).';';
print_r( 'var datar='.json_encode($datar).';');
    echo '</script>';
    
    $con->close();
    

    ?>
    
    </body>
</html>
    