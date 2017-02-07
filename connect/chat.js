$(document).ready(function() {
    var text=document.getElementById("chatscreen");
       
   $("#chatsubmit").click(function(){
       var chat=$("#chattext").val();
       console.log(chat);
       var para=document.createElement("p");
       para.innerHTML=chat;
       console.log(text);
       
       
   }) ;
    
});