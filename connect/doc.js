$(document).ready(function(){
            //firstname,lastname,email,imgsrc variables have been imported from the php file
        
    $("title").text("My Website-"+firstname+"  "+lastname);
    $(".name").text(firstname+" "+lastname);
    $(".email").text(email);
    $(".profilepic").attr("src","http://108.55.6.113/connect/uploads/"+imgsrc)
    
    
    
    
    
})
