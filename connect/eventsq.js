//function clicker(caller){
    //var id=caller.id;
    //var a=document.getElementById("jumbo");
    //var b=document.createElement("h1")
    //b.innerHTML="";
    //b.innerHTML=id;
    //a.appendChild(b);
    
    $(document).ready(function(){
        
         
   $("#inbtn").click(function(){
      document.getElementById("inbtn").className=document.getElementById("inbtn").className.replace("active","");    
     /*document.getElementById("abbtn").className=document.getElementById("abbtn").className.replace("active","");
    document.getElementById("edbtn").className=document.getElementById("edbtn").className.replace("active","");
    document.getElementById("cebtn").className=document.getElementById("cebtn").className.replace("active","");
    document.getElementById("prbtn").className=document.getElementById("prbtn").className.replace("active","");
    document.getElementById("intbtn").className=document.getElementById("intbtn").className.replace("active","");*/
    document.getElementById("cobtn").className=document.getElementById("cobtn").className.replace("active","");
      
      document.getElementById("inbtn").className+=" active";
        
   });
   
   
    $("#cobtn").click(function(){
   document.getElementById("inbtn").className=document.getElementById("inbtn").className.replace("active","");    
    
      document.getElementById("cobtn").className+=" active";
        
   });
       
});
//}
