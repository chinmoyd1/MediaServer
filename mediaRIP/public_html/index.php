<?php require_once("../resources/config.php");


session_destroy();


?>

<html>
<head>
<link rel="icon" type="image/gif/png" href="../raw/pics/cassette.png" height="16%">
<title>mediaRIP</title>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="all">
<script>
var a=0;
document.cookie = "a=0";
var screenWidth = window.outerWidth;
if (screenWidth<1000){
  a = 1;
document.cookie = "a=1";
  }
</script>

</head>
<body style="overflow-y:hidden;">


<div id="myvid">


<?php


$b = $_COOKIE["a"];
  // echo $b;
   if($b==0){
   	echo '<div class="background">
<video id="myVideo" width="100%" autoplay loop muted onmouseover="playVid();" >
  <source src="../raw/video_stuff/myVideo2.mp4" type="video/mp4">
</video>
</div>';
   }
   else{
    echo '<div class="background">
<img src="../raw/video_stuff/output.gif">
</div>';
     
   }


?>

</div>

<script>
var vid = document.getElementById("myVideo");
function playVid() {
    vid.play();
}

</script>

<div id="logo">
<a href="http://<?php echo $ip?>/mediaRIP/public_html/index.php?download"><img src="../raw/pics/mediaRIP(transparent).png" height="15%"></a>
</div>





<?php
$file="/var/www/html/mediaRIP[hotspot].apk";
if(isset($_GET['download'])){
     header("X-Sendfile: ".$file);
   header("Content-type: application/octet-stream");
  header('Content-Disposition: attachment; filename="' . basename($file) . '"');

}
?>


<div id="navbar" class="navbar">
<ul id="nav">
<li class="active"><a class="active" href="http://<?php echo $ip ?>/mediaRIP/public_html/index.php">SIGN IN</a></li>	
<li><a href="http://<?php echo $ip ?>/mediaRIP/public_html/signup.php">SIGN UP</a></li>
</ul>
</div>

<div id="login">
<h1> Welcome. Please  <span> Log IN!</span></h1>
<form  action="" method="post" enctype="multipart/form-data">


<h2><?php display_message();?></h2>
  

<p><input type="text" name="username" required value="USERNAME" onBlur="if(this.value=='')this.value='USERNAME'" onFocus="if(this.value=='USERNAME')this.value='' "></p>
<p><input type="password" name="password" required value="PASSWORD" onBlur="if(this.value=='')this.value='PASSWORD'" onFocus="if(this.value=='PASSWORD')this.value='' "></p>
<p><a href="#">Forgot Password?</a></p>
<p><input type="submit" name="submit" value="LOGIN"></p>

</form>
</div>



<?php login_user(); 
?>


<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    document.getElementById("login").style.padding = "10px";


        

}else{

}

</script>

</body>
</html>
