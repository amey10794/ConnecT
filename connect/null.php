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
    <script src="doc.js"></script>
    <script src="js/events.js"></script>
    <script src="eventsq.js"></script>
    <script>
         $(document).ready(function(){
             var semail=$("#semail").text();
             $("#acceptlink").attr("href","http://108.55.6.113/connect/updatefriends.php?senemail="+semail+"&recemail="+email);
           $("#acceptbutton").click(function(){
               var semail=$("#semail").text();
               location.reload();
               
               $("#friends").attr("href","http://108.55.6.113/connect/friends.php?firstname="+firstname+"&lastname="+lastname+"&email="+email+"&image="+imgsrc+"&semail="+semail)
               
           }); 
            
            
            
        });
    function hello(){
        $("#searchform").attr("action","http://108.55.6.113/connect/search.php?email="+email);
        $("#search1").attr("value",email);
        
        var search=document.getElementById("search");
        var results=document.getElementById("results");
        var ajax1=new XMLHttpRequest();
        ajax1.onreadystatechange=function(response){
    if(ajax1.readyState==4){
        if(ajax1.status==200){
            var data1=JSON.parse(ajax1.responseText);
            
            data1.forEach(function(item){
                
                var option1=document.createElement('option');
                
                option1.value=item["firstname"];
                
                results.appendChild(option1);
                
            });
            search.placeholder="datalist loaded";
                //lntxt.placeholder="datalist loaded";
                //dpttxt.placeholder="datalist loaded";
                //emtxt.placeholder="datalist loaded";
        }
        else{
            search.placeholder="datalist not loaded";
                //lntxt.placeholder="datalist not loaded";
                //dpttxt.placeholder="datalist not loaded";
                //emtxt.placeholder="datalist not loaded";
        }
    }
    
};
        
ajax1.open('GET', 'http://108.55.6.113/connect/data.json', true);
ajax1.send();
    }
        
        </script>
    </head>
    <body>
        <?php
        
        echo $firstname=$_GET["firstname"];
        echo $lastname=$_GET["lastname"];
        echo $email=$_GET["email"];
        echo $imgsrc=$_GET["image"];
        echo @$semail=$_GET["semail"];
        echo '<script>';
        echo 'var firstname='.json_encode($firstname).';';
        echo 'var lastname='.json_encode($lastname).';';
        echo 'var email='.json_encode($email).';';
        echo 'var imgsrc='.json_encode($imgsrc).';';
        echo '</script>';
        
        $con=mysqli_connect('localhost','root','','connectdb') or die("Error".mysqli_error($con));
        $sql="SELECT firstname FROM Users ORDER BY firstname";
        if($con->query($sql)==TRUE){
            echo "succesfully done";
        }
        else{
            echo "Error in selection".$con->error;
        }

        $result=mysqli_query($con,$sql);

        $datar[]=array();
        while($row=mysqli_fetch_assoc($result)){
            $datar[]=$row;
        }
        json_encode($datar);
        $fp=fopen('data.json','w');
        fwrite($fp,json_encode($datar));
        fclose($fp);
        mysqli_close($con);
    
        ?>
        <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="max-height:50px">
            <div style="width:100%;min-width:300px">
                
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#list" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <img class="navbar-left profilepic" src="suitedup.jpg" height="50px">
                    <a class="navbar-brand name" href="index.html">Amey A.Mhaskar</a>
                    
                </div>
                <div id="list" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active hvr-grow" id="inbtn" ><a href="#jumbo"><i class="fa fa-home" aria-hidden="true"></i>Intro</a></li>
                        <li class="hvr-grow" id="cobtn" ><a id="friends"><i class="fa fa-phone"></i>Friends</a></li>
                    </ul>
                    <form class="form-horizontal" method="get"   role="form" id="searchform">
                    <div align="left" style="display:flex" class="form-group">
                        
                        
                        <input type="text" id="search" class="form-control"  name="search" style="margin:10px" onclick="hello()" list="results" placeholder="Search" >
                        <input type="text" id="search1"  name="semail" style="margin:10px;position:absolute;margin-left:15px;z-index:-200" onclick="hello()" list="results" placeholder="Search" >
                        <input type="submit"  id="searchbutton" >
                        <datalist id="results"></datalist>
                                                
                        <a href="http://108.55.6.113/connect/login.html" style="text-align:center;color:floralwhite"><p style="margin:10px">Logout</p></a>
                    </div>
                    </form>
                    
                    
                </div>
                
            </div>
        </nav>
        </div>
        <header class="jumbotron" id="jumbo">
                    
                
                    <div class="col-xs-12 col-sm-6 ">
                        
                        <h2 align="center" style="padding:50px">
                            <font face="Times New Roman">
                            <em>Hello!!</em><br>
                        I'm <strong class="hvr-underline-from-center" style="color:gold"><h2 class="name">Amey Anil Mhaskar</h2></strong>,<br>
                            pursuing<br>
                        MS in Electrical Engineering<br>
                                  at<br>
                        the <a href="http://www.buffalo.edu"  target="_blank" onmouseover="buffalo()" onmouseout="buffaloout()" ><strong>University at Buffalo</strong></a>                       
                        </font>
                        </h2>
                        
                    </div>
                
            
            
        </header>
        
            <div class="row row-content" id="intro" >
                <div class="col-xs-12 col-sm-12">
                    <p id="head" align="center" >INTRODUCTION<i class="fa fa-angle-double-right hvr-forward"></i></p>
                
                </div>
                <div class="col-xs-12 col-sm-12">
                    <h2 id="updates"></h2>                   
                    
                    <h3>I am a self motivated and passionate graduate student, seeking Research and Development opportunities to progress in my fields of interest and contribute something towards the society we all live in </h3>
                
                </div>
            
            </div>
            <div class="row row-content1" id="about">
                <div class="col-xs-12">
            <p id="head" align="center">ABOUT<i class="fa fa-angle-double-right hvr-forward"></i></p>
                </div>
                <div class="col-xs-12">
                
                    <ul id="content" style="text-align:justify;text-justify:interword">
                    <li>I am a focused, determined(towards reaching my goal) and result   oriented engineer,<br> currently pursuing MS in Electrical Engineering at SUNY Buffalo<br> and actively looking for <strong>internship opportunities for Summer 2017.</strong> <br></li>

                    
                    <li><strong>Programming Skills:</strong> Python, Java, R, C, C++.<br></li>
                    <li><strong>Web Development:</strong> HTML, CSS, JAVASCRIPT, BOOTSTRAP, jQuery<br></li>
                    <li><strong>Network simulation and tracing:</strong> NS2, NS3, Cisco Packet Tracer and Wireshark.<br></li>
                    <li><strong>Android App Development:</strong> Android Studio(both SDK and NDK), Eclipse.<br></li>
                    <li><strong>Data Formats:</strong> XML and JSON.<br></li>
                    <li><strong>Databases:</strong> SQLite<br></li>
                    <li><strong>Other Softwares:</strong    > MATLAB, Octave, LaTeX.<br></li>
                    
                    <li>I have strong inclination towards working in the fields of Signal, Image and Speech Processing,<br> Networking, Machine Learning, Android Programming, Natural Language Processing and related fields.<br></li>
                    
                    <li>Adept in using MATLAB, Python, Java, Android, HTML(as well as other web development tools) for implementing<br>  various image(enhancement, restoration, segmentation, morphology etc.)<br> and speech processing(including speech feature extraction and processing) techniques.<br> Developed an Android App <strong>"SpeEmo"</strong> for emotion recognition from speech(involved concepts of Speech Processing, Machine Learning and Android).</li>
                    
                    <li>Proficient in Using python to access web data, work with databases(SQLite) and parse data.</li>
                        </ul>
                        
                
                </div>
            </div>
            <div class="row row-content" id="education">
                <div class="col-xs-12">
            <p id="head" align="center">EDUCATION<i class="fa fa-angle-double-right hvr-forward"></i></p>
                </div>
                <div class="col-xs-12" id="content">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <img src="ublogo.JPG" width="100%" >
                    </div>
                    <div class="col-sm-9">
                        <h2 style="border-bottom:1px ridge">The State University of New York at Buffalo<p style="font-size:17px;display:inline;padding-left:50px;position:right:0;top:5;float:right">2016-Present</p></h2>
                        <p>Pursuing MS in Electrical Engineering from the University at Buffalo.<br>
                        Specializing in Networking and Signal Processing.
                        </p>
                    </div>
                    <div class="col-sm-3  hidden-xs">
                        <img src="sfitlogo.png" height="50%" >
                    </div>
                    <div class="col-sm-9 ">
                        <h2 style="border-bottom:1px ridge">St. Francis Institute of Technology(University of Mumbai)<p style="font-size:17px;display:inline;position:right:0;top:5;float:right">2013-2016</p></h2>
                        <p>BE in Electronics and Telecommunications Engineering from the University of Mumbai<br>
                        GPA:3.3
                        </p>
                    </div>
                    <div class="col-sm-3  hidden-xs">
                        <!--<img src="sfitlogo.png" height="50%" >-->
                    </div>
                    <div class="col-sm-9 ">
                        <h2 style="border-bottom:1px ridge">Maharashtra State Board of Technical Education<p style="font-size:17px;display:inline;position:right:0;top:5;float:right">2013-2016</p></h2>
                        <p>Diploma in (Associates Degree) Electronics and Telecommunication<br>
                        GPA:3.9
                        </p>
                    </div>
                </div>
            </div>
        </div>
            <div class="row row-content1" id="certifications" onmouseover="click()">
                <div class="col-xs-12">
            <p id="head" align="center">CERTIFICATIONS<i class="fa fa-angle-double-right hvr-forward"></i></p>
                </div>
                <div class="col-xs-12" id="content">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <img src="courseralogo.png" width="100%"  >
                    </div>
                    
                    <div class="col-sm-9" >
                        <h2 style="border-bottom:1px ridge">COURSERA</h2>
                        <h3 >Specialization</h3>
                        <ul>
                            <li>Python For Everybody-a 5 course specialization offered by the University of Michigan on Coursera</li>
                        </ul>
                        <h3 style="border-bottom:1px ridge">Courses</h3>
                        <ul>
                            <li>Capstone:Retrieving,Processing and Visualizing data with Python-offered by the University of Michigan on Coursera</li>
                            <li>HTML,CSS and JavaScript-offered by the Hong Kong University on Coursera</li>
                            <li>Internet History, Technology and Security-offered by the University of Michigan on Coursera</li>
                        </ul>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-sm-3  hidden-xs" >
                        <img src="edxlogo.png" height="80%" >
                    </div>
                    <div class="col-sm-9 " >
                        <h2 style="border-bottom:1px ridge">edX</h2>
                        <h3 >Courses</h3>
                        <ul>
                            <li>Introduction to Python for Data Science-offered jointly by DataCamp and Microsoft</li>
                        </ul>
                    </div>
                </div>
                    
                <div class="row" >
                    <div class="col-sm-3 hidden-xs" >
                        <img src="java.png" height="70%" >
                    </div>
                    <div class="col-sm-9">
                        
                        <h2 style="border-bottom:1px ridge" >External Courses</h2>
                        <ul>
                            <li>Core Java Course-A 2 month long course offered by Prof. Venkat Krishnan</li>
                        </ul>
                    </div>
                </div>
                </div>

            </div>
             <div class="row row-content" id="internship">
                <div class="col-xs-12">
                    <p id="head" align="center">INTERNSHIP<i class="fa fa-angle-double-right hvr-forward"></i></p>
                
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="syseleclog.jpg" height="100%">
                        </div>
                        <div class="col-sm-9">
                            <h2 style="border-bottom:1px ridge"> Syselec Technologies Pvt. Limited</h2>
                            <ul style="font-size:17px">
                                <li>A valuable summer internship at <a href="http://www.syselec.net/">Syselec Technologies</a> in India.Trained in Electrical, Optical and Thermal Imaging systems and their industry applications. Also, included training on SONET's. Increased exposure to the requirements and current trends in the industry.</li>
                            </ul>
                        
                        </div>
                        
                    </div>
                </div>

            </div>
        <div class="row row-content1" id="projects">
                <div class="col-xs-12">
                    <p id="head" align="center">PROJECTS<i class="fa fa-angle-double-right hvr-forward"></i></p>
                
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="music.jpg" height="100%">
                        </div>
                        <div class="col-sm-9">
                            <h2 style="border-bottom:1px ridge black">"MusiEmo"</h2>
                    <p>An Android based Media Player for Emotion Customised Playlist</p>
                            <p></p>
                            <p></p>
                            <h3>This is an ongoing project.</h3>
                            <h3>Summary:</h3>
                            <ul>
                                <li><strong><em>Speech Processing:</em></strong> Including concepts from digital signal processing and speech processing.<br> Extracted Features such as Energy, Pitch, Formants, MFCC etc. to analyse the speech input.<br> Also, techniques to differentiate between the lyrics and music of a song would be used<br> to predict emotion of the songs stored on the user's device</li>
                                <li><strong><em>Machine Learning:</em></strong> 2 Versions of the app will  be made one using the logistic regession classifier<br> and other using the support vector machine(svm) classifier to classify the emotion of the user according<br> to the acquired speech. Developed the classifier code for logistic regression in java without using any libraries.</li>
                                <li><strong><em>Android:</em></strong> Used different android classes like Media Player and Media Recorder to receive input<br> from the mic of a smartphone and analyse it.</li>
                                
                            </ul>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-xs-3 ">
                        
                        </div>
                        <div class="col-xs-9 ">
                            <h2 style="border-bottom:1px ridge black">Image Saliency Detection</h2>
                    <p>An Image Processing based application for reducing excessive usage of bandwidth for non-salient data in images.</p>    
                        </div>
                    
                    </div>-->
                    
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="android1.jpg" height="100%">
                        </div>
                        <div class="col-sm-9">
                            <h2 style="border-bottom:1px ridge black">"SpeEmo"</h2>
                    <p>An Android based app for emotion recognition from speech</p>
                            <p></p>
                            <p></p>
                            <h3>Summary:</h3>
                            <ul>
                                <li><strong><em>Speech Processing:</em></strong> Including concepts from digital signal processing and speech processing.<br> Extracted Features such as Energy, Pitch, Formants, MFCC etc. to analyse the speech input</li>
                                <li><strong><em>Machine Learning:</em></strong> Used a supervised machine learning algorithm called "logistic regression"<br> to classify the emotion of the user according to the acquired speech.<br> Developed the classifier code in java without using any libraries</li>
                                <li><strong><em>Android:</em></strong> Used different android classes like Media Player and Media Recorder to receive input<br> from the mic of a smartphone and analyse it.</li>
                            </ul>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-sm-3  hidden-xs">
                            <img src="logo.png" height="100%">
                        </div>
                        <div class="col-sm-9 ">
                            <h2 style="border-bottom:1px ridge black">"RefBook"</h2>
                    <p>An Android based app for reference book links and syllabus for Mumbai University</p>
                            <h3>Summary:</h3>
                            <ul>
                                <li><strong><em>Android:</em></strong> The App involved usage of basic classes and input elements provided in android to help the user during the exams to get the syllabus and the corresponding reference book links. </li>
                            </ul>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-sm-3  hidden-xs">
                            <img src="micro.JPG" width="100%">
                        </div>
                        <div class="col-sm-9 ">
                            <h2 style="border-bottom:1px ridge black">Intelligent Train Engine System</h2>
                    <p>A Microcontroller based project for Auto driving Train Systems</p>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-sm-3  hidden-xs">
                            <img src="rfid.jpg" height="100%">
                        </div>
                        <div class="col-sm-9 ">
                            <h2 style="border-bottom:1px ridge black">Intelligent Letter Box System</h2>
                    <p>A RFID based Letter Box for faster letter indication.</p>
                        </div>
                    
                    </div>

                </div>
                

            </div>
           
            <div class="row row-content" id="contact">
            <p id="head" align="center">CONTACT<i class="fa fa-angle-double-right hvr-forward"></i></p>
            <div class="col-xs-12 col-sm-12">
                <h2 align="center" >You can reach me at <a href="mailto:ameyanil@buffalo.edu" class="email">ameyanil@buffalo.edu</a> <br>or<br> +1(716)-536-6912</h2> 
                
            </div>
            
        </div>
        <footer class="row-footer">
        <div class="container">
            <div class="row">             
                <div class="col-xs-5 col-xs-offset-1 col-sm-2 col-sm-offset-1">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#jumbo">Intro</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#education">Education</a></li>
                        <li><a href="#certifications">Certifications</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#internship">Internship</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-5">
                    <h5>Address</h5>
                    <address>
		              81 Merrimac Street<br>
		              Buffalo, New York<br>
		              USA<br>
		              <i class="fa fa-phone"></i>: +1(716)-536-6912<br>
		              <i class="fa fa-envelope"></i>: 
                        <a href="mailto:mhaskaramey@gmail.com" class="email">mhaskaramey@gmail.com</a>
		           </address>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="nav navbar-nav" style="padding: 40px 10px;">
                         <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/amey.mhaskar.39" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/in/amey-mhaskar-68370b21" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon" href="mailto:mhaskaramey@gmail.com"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>© Copyright 2016 All Rights Reserved By Amey Anil Mhaskar</p>
                </div>
            </div>
        </div>
    </footer>-->
    
        
    </body>
</html>