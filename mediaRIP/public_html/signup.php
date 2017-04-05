<?php require_once("../resources/config.php");?>
<html>
<head>
<link rel="icon" type="image/gif/png" href="../raw/pics/cassette.png" height="16%">
<title>mediaRIP</title>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
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
<a href="http://<?php echo $ip?>/mediaRIP/public_html/signup.php?download"><img src="../raw/pics/mediaRIP(transparent).png" height="15%"></a>
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
<li><a href="http://<?php echo $ip ?>/mediaRIP/public_html/index.php">SIGN IN</a></li>  
<li class="active"><a class="active" href="http://<?php echo $ip ?>/mediaRIP/public_html/signup.php">SIGN UP</a></li>
</ul>
</div>



<div id="signup">
<h1 id="hh">Welcome. Please <span id="hh1">Sign Up!</span></h1>
<form  action="" method="post" enctype="multipart/form-data">


<h2><?php display_message();?></h2>
	

<p><input type="text" name="username" required value="ENTER USERNAME" onBlur="if(this.value=='')this.value='ENTER USERNAME'" onFocus="if(this.value=='ENTER USERNAME')this.value='' "></p>
<p><input type="text" name="email" required value="ENTER EMAIL" onBlur="if(this.value=='')this.value='ENTER EMAIL'" onFocus="if(this.value=='ENTER EMAIL')this.value='' "></p>
<p><input type="password" name="password" required value="ENTER PASSWORD" onBlur="if(this.value=='')this.value='ENTER PASSWORD'" onFocus="if(this.value=='ENTER PASSWORD')this.value='' "></p>
<p><input type="submit" name="submit" value="SIGN UP"></p>

</form>



<?php signup(); 
?>





</div> 



<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    // document.getElementById("search").style.visibility = "hidden";

  document.getElementById("hh").style.fontSize = "small"; 

    // document.getElementById("hh1").style.fontSize = "hh1";      

}else{
  
}

</script>



</body>
</html>