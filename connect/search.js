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
            }    



var html="";
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
        html=html+"<div><img src="+base+"uploads/"+image[i]+" height='50px' width='50px'><a href="+href[i]+">"+"<h3>"+fname[i]+" "+lname[i]+"</h3></a>"+"<p><strong>Email:</strong>"+email[i]+"  <br/><strong>D.O.B</strong> "+dob[i]+"</p>"+"<input type='button' onclick='send(this)' id='sa"+i+"' value='Add+'><br/><p class='sa"+i+"'></p></div>";
    }
    
    $("#results").html(html);
    
    
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
        
        
        $(".updates").text("You have a friend request");
