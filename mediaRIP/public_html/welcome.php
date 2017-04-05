<?php require_once("../resources/config.php");?>

<?php 
$username = get_user();

//session_destroy();
if(!$username){

  redirect("index.php");
}


?>
<?php

/* get disk space free (in bytes) */
$df = disk_free_space("/var/www");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www");
/* now we calculate the disk space used (in bytes) */
$du = $dt - $df;
/* percentage of disk used - this will be used to also set the width % of the progress bar */
$dp = sprintf('%.0f',($du / $dt) * 100);

/* and we formate the size from bytes to MB, GB, etc. */
$df = formatSize($df);
$du = formatSize($du);
$dt = formatSize($dt);

function formatSize( $bytes )
{
        $types = array( 'B', 'KB', 'MB', 'GB', 'TB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $types ) -1 ); $bytes /= 1024, $i++ );
                return( round( $bytes, 2 ) . " " . $types[$i] );
}

?>
<html>
<head>
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/gif/png" href="../raw/pics/cassette.png" height="13%">
<title>mediaRIP</title>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
<script src="../raw/js/jquery-2.2.0.js"></script>
<script>
var x=0;
var y=0;
var z=0;
var g=0;
var h=0;

var point=null;


function _(el){
    return document.getElementById(el);
}

function uploadFile(){
    var file = _("video").files[0];
     //   alert(file.name);
    var formdata = new FormData();
    formdata.append("video", file);
    var ajax = new XMLHttpRequest ();



    ajax.upload.addEventListener("progress", progressHandler, false) ;
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("load", errorHandler, false);
    ajax.addEventListener("load", abortHandler, false);

    ajax.open("POST" , "../resources/upload.php?username=<?php echo $username ?>" ,true);
    ajax.send(formdata);
}
function progressHandler(event){
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML =Math.round(percent)+"% UPLOADED";
}
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status").innerHTML = "Checking uploaded file";
}




</script>
<script>
var a=0;
document.cookie = "a=0";
var screenWidth = window.outerWidth;
if (screenWidth<1000){
  a = 1;
document.cookie = "a=1";
  }
</script>
  

<?php
//echo 'a';
 $b = $_COOKIE["a"];
  // echo $b;
   if($b==0){
    echo '<style>#mp3{
   
    margin:1% 0% 3% 2%;

}</style>
</head>
<body>
<div id="tab" >
';
   }
   else{
     echo '<style>#mp3{
   
     margin:6% 0% 8% 2%;

}</style>

</head>
<body><center><div id="gear" style="position:fixed;top:25%;right:40%;z-index: -1;visibility: visible;"><img src="../raw/pics/gears.gif" height=50%></div></center><div id="tab" >
';
     
   }
?>






<script type="text/javascript">

var screenWidth = window.outerWidth;
if(screenWidth<1000){
  document.getElementById('tab').classList.add('hideAll'); 
}

</script>

<?php
if(isset($_GET['addlibrary'])){
$uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$plode=explode('&', $uri);
$x0 = $plode[0].'&'.$plode[1];

echo "<div id='library'>

<div id='addl'>
  <div id='skybar'>
  <h3><img src='../raw/pics/library1.png' style='height:25px;'><span>Add</span><span1>Library</span1></h3>
  <h6><a href='".$x0."' style='text-decoration:none;color:black;'>&times;</a></h6>
  </div>
  
    <div id='sidebar'>
    <ul>
      <li><img src='../raw/pics/lib1.png' style='height:20px;' id='dim'/><h4>Select Type</h4></li>
      <li><img src='../raw/pics/cat.png' style='height:20px;' id='gl'/><h5>Add Folder</h5></li>
    </ul>  
    </div>
    <div id='maincontent0'>



        <form method='post' name='multiU' action='' enctype='multipart/form-data'> 
     
<h2>Select your media type</h2>
<div id=movie >
<input type='radio' class='radio_item' value='1' name='product_category_id' id='radio'>
<label class='label_item' for='radio'> 
<img id='Movie' src='../raw/pics/light/movie.png' height='20%' onmouseover='changeImage11()' onmouseout='changeBack11()' onclick='fixImage11();changeBack111();changeBack211();changeBack311();changeBack411();glower();movie();'/><center><h5>Movies</h5></center>
</label>
</div>
<div id=tv style='padding-left:18px'>
<input type='radio' class='radio_item' value='2' name='product_category_id' id='radio1'>
<label class='label_item' for='radio1'> 
<img id='TV' src='../raw/pics/light/tv.png' height='20%' onmouseover='changeImage111()' onmouseout='changeBack111()' onclick='fixImage111();changeBack11();changeBack211();changeBack311();changeBack411();glower();tv();'><center><h5>TV Series</h5></center>
</label>
</div>
<div id=music style='padding-left:18px'>
<input type='radio' class='radio_item' value='3' name='product_category_id' id='radio2'>
<label class='label_item' for='radio2'> 
<img id='Music' src='../raw/pics/light/music.png' height='20%' onmouseover='changeImage211()' onmouseout='changeBack211()' onclick='fixImage211();changeBack11();changeBack111();changeBack311();changeBack411();glower();music();'><center><h5>Music</h5></center>
</label>
</div>
<div id=camera style='padding-left:18px'>
<input type='radio' class='radio_item' value='4' name='product_category_id' id='radio3'>
<label class='label_item' for='radio3'> 
<img id='Camera' src='../raw/pics/light/camera.png' height='16%' onmouseover='changeImage311()' onmouseout='changeBack311()' onclick='fixImage311();changeBack11();changeBack111();changeBack211();changeBack411();glower();camera();' style='margin-top:-5px !important;z-index:99;'><center><h5 style='position:absolute;top:31%;left:69.5%;z-index:-5;'>Images</h5></center>
</label>
</div>
<div id=homevideo style='padding-left:18px'>
<input type='radio' class='radio_item' value='5' name='product_category_id' id='radio4'>
<label class='label_item' for='radio4'> 
<img id='Homevideo' src='../raw/pics/light/homevideo.png' height='21%' onmouseover='changeImage411()' onmouseout='changeBack411()' onclick='fixImage411();changeBack11();changeBack111();changeBack211();changeBack311();glower();homevideo();'><center><h5>Home Video</h5></center>
</label>
</div>
<div id='pol'>
 <input type='text' name='movieN' placeholder='Browse your media folder' id='mob'>
 <a onclick='bWindow();' id='mob1'>BROWSE</a>
</div>
</form>

  </div>
  
  <div id='foot'>

  <div id='bt'> <a href='".$x0."' style='text-decoration:none;color:black;'><input type='submit'  id='uploadSubmit' name='upload' value='CANCEL'></a></div> 
  <div id='bt' style='padding-right:0px'> <input type='submit'  id='uploadSubmit' name='upload' value='NEXT'></div> 

  </div>
</div>
<div id='mono'>
  
</div>

</div>";

}

$uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>


<script>
function movie(){
 point = "mo";
}
function tv(){
 point = "t";
}
function music(){
point = "mu";
}
function camera(){
 point = "c";
}
function homevideo(){
point = "h";

}



function bWindow(){
  if(point == null){
    alert('You have to select Media type.');
    return;
  }
//alert(point);
var addr = "Xplorer.php?"+point;
//alert(addr);
   document.getElementById("mono").innerHTML="<iframe id='fr' src='' height='80%' width='100%'></mono>";
    document.getElementById("fr").src = addr;
   
}
function glower(){
    
    document.getElementById("dim").src = "../raw/pics/lib.png";
     document.getElementById("gl").src = "../raw/pics/cat1.png";
   
}
</script>
<!--#171717-->
<div id="topbar">
<?php
if(isset($_GET['addlibrary'])){

echo "<div id='library'>
</div>";

}
  ?>
<div id="logo1">
<ul>
<div id="l1"><li><a href="welcome.php?movies&username=<?php echo $username?>"><img src="../raw/pics/1.png" id='core' > <!--<p>MEDIA<span>RIP</span></p>--></a></li></div>




<li style="float:right; margin-top: 1%;margin-left: 2%;" id='unu'><a href="index.php"><img src="../raw/pics/user1.png" style="height:15px;" id='un'><button id="myBtn1"><?php echo $username;  ?>!</button></a></li>


<li style="float:right; margin-top: 1%;"><a id="myBtn" href="#"><img src="../raw/pics/upload1.png" style="height:15px;" id='u'><button id="myBtn">Upload</button></a></li>

<li style="float:right; margin-top: 1%;padding-right: 27px"><a id="myBtn1" href="<?php echo $uri ?>&addlibrary"><img src="../raw/pics/library.png" style="height:15px;" id='sl'><button id="myBtn1">Scan Library</button></a></li>






<div id="search" style="visibility:hidden;">
<li style="float:right;margin-right: 2%;margin-top: -0.1%;">
<section class="webdesigntuts-workshop">
    <form method='post' name='search6' action='view.php?username=<?php echo $username;?>' enctype='multipart/form-data'>          
       <!--- <input type="text" placeholder="What are you looking for?">   -->
        <input id="ico" style="text-indent:7%;" type="text" placeholder="What are you looking for?" />
                  
        
    </form>
</section></li>
</div>




</div>

</ul>



</div>

<div id="verticalnav">
<ul>
<?php
 $query = query("SELECT * FROM users WHERE username = '{$username}'");
   confirm($query);

  while($row = fetch_array($query)){
    if ($row['user_level']==99) {

echo '<li><a id="h"';

if(isset($_GET['admin'])){

$show= <<<_END
     class="active1"
_END;
       
       echo $show;


}

  echo ' href="welcome.php?admin&username='.$username.'" style="padding: 9% 10%;"><img src="../raw/pics/admin.png" style="height:3.5%;padding-right: 7%;">Admin</a></li>';


}}

?>


  <li><a id="i"

<?php

if(isset($_GET['movies'])){

$show= <<<_END
     class="active1"
_END;
       
       echo $show;

}
?>
   href="welcome.php?movies&username=<?php echo $username ?>" style="padding: 10% 10%;"><img src="../raw/pics/movie.png" style="height:3%;padding-right: 7%;">Movies</a></li>

  <li><a id="j"

<?php
if(isset($_GET['tvseries'])){
$show= <<<_END
     class="active1"
_END;
       
       echo $show;

}
?>

  href="welcome.php?tvseries&username=<?php echo $username ?>" style="padding: 10% 10%;"><img src="../raw/pics/tv.png" style="height:3%;padding-right: 8%;">TV Series</a></li>


  <li><a id="k"

<?php
if(isset($_GET['music'])){
$show= <<<_END
     class="active1"
_END;
       
       echo $show;

}
?>

  href="welcome.php?music&username=<?php echo $username ?>" style="padding: 10% 10%;"><img src="../raw/pics/music.png" style="height:3%;padding-right: 8%;">Music</a></li>


  <li><a id="l"

  <?php
if(isset($_GET['images'])){
$show= <<<_END
     class="active1"
_END;
       
       echo $show;

}
?>

  href="welcome.php?images&username=<?php echo $username ?>" style="padding: 10% 10%;"><img src="../raw/pics/camera.png" style="height:2.6%;padding-right: 6%;">Images</a></li>


   <li><a id="m"

 <?php
if(isset($_GET['homevideo'])){
$show= <<<_END
     class="active1"
_END;
       
       echo $show;

}
?>

  href="welcome.php?homevideo&username=<?php echo $username ?>" style="padding: 10% 6%;"><img src="../raw/pics/homevideo.png" style="height:4%;padding-right: 1%;">Home Video</a></li>





 <li><a id="n"

<?php

if(isset($_GET['ext'])){

$show= <<<_END
     class="active1"
_END;
       
       echo $show;

}
?>
   href="welcome.php?ext&username=<?php echo $username ?>" style="padding: 10% 10%;"><img src="../raw/pics/hdd.png" style="height:3%;padding-right: 7%;">Ext. Devices</a></li>






<li style="padding-top:12%;padding-bottom: 750%">
<center><div class="chart" id="graph" data-percent="<?php echo $dp; ?>"></div></center>
</li>

</ul>

<script>

var screenWidth = window.outerWidth;

if (screenWidth<1000){

var el = document.getElementById('graph'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: el.getAttribute('data-size') || 83,
    lineWidth: el.getAttribute('data-line') || 3,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var myelement = document.createElement('myelement');
myelement.textContent = options.percent + '%';
    
if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(myelement);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

//imd = ctx.getImageData(0, 0, 240, 240);
var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
    percent = Math.min(Math.max(0, percent || 1), 1);
    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
    ctx.strokeStyle = color;
        ctx.lineCap = 'round'; // butt, round or square
    ctx.lineWidth = lineWidth
    ctx.stroke();
};

drawCircle('#000000', options.lineWidth, 100 / 100);
drawCircle('#05FA05', options.lineWidth, options.percent / 100);
}else{
  var el = document.getElementById('graph'); // get canvas

var options = {
    percent:  el.getAttribute('data-percent') || 25,
    size: el.getAttribute('data-size') || 130,
    lineWidth: el.getAttribute('data-line') || 5,
    rotate: el.getAttribute('data-rotate') || 0
}

var canvas = document.createElement('canvas');
var myelement = document.createElement('myelement');
myelement.textContent = options.percent + '%';
    
if (typeof(G_vmlCanvasManager) !== 'undefined') {
    G_vmlCanvasManager.initElement(canvas);
}

var ctx = canvas.getContext('2d');
canvas.width = canvas.height = options.size;

el.appendChild(myelement);
el.appendChild(canvas);

ctx.translate(options.size / 2, options.size / 2); // change center
ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

//imd = ctx.getImageData(0, 0, 240, 240);
var radius = (options.size - options.lineWidth) / 2;

var drawCircle = function(color, lineWidth, percent) {
    percent = Math.min(Math.max(0, percent || 1), 1);
    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
    ctx.strokeStyle = color;
        ctx.lineCap = 'round'; // butt, round or square
    ctx.lineWidth = lineWidth
    ctx.stroke();
};

drawCircle('#000000', options.lineWidth, 100 / 100);
drawCircle('#05FA05', options.lineWidth, options.percent / 100);
}
</script>

</div>


<div id="content" >



<?php  

if(isset($_GET['movies'])){
include 'browse.php';
}

elseif(isset($_GET['tvseries'])){
include 'browse_tv.php';

}
elseif(isset($_GET['music'])){
include 'browse_mp3.php';
    
}
elseif(isset($_GET['images'])){
include 'browse_image.php';
    
}
elseif(isset($_GET['homevideo'])){
include 'browse_homevideo.php';
    
}
elseif(isset($_GET['ext'])){
include 'browse_external_device.php';
}

$query = query("SELECT * FROM users WHERE username = '{$username}'");
   confirm($query);

  while($row = fetch_array($query)){
    if ($row['user_level']==99) {

if(isset($_GET['admin'])){
include 'admin.php';
}
}}

?>



</div>
<!-- The Modal -->


<div id="myModal" class="modal">


<img src='../raw/pics/gears.gif' id='gif' style='z-index:99;position:absolute;top:40%;left:40%;display: block; margin: 0 auto; width: 150px;visibility:hidden;'>


  <!-- Modal content -->
  <div class="modal-content" id="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>+ Add Media</h2>

     

    </div>





    <div class="modal-body" id="modal-body">
      



<form method='post' name='Form' action='upload.php?username=<?php echo $username;?>' enctype='multipart/form-data'> 
     <!--action='upload.php?username=<?php //echo $username; ?>'-->

<h2>Select your media type</h2>
<div id=movie>
<input type="radio" class="radio_item" value="1" name="product_category_id" id="radio">
<label class="label_item" for="radio"> 
<img id="Movie" src="../raw/pics/movie.png" height="15%" onmouseover="changeImage()" onmouseout="changeBack()" onclick="fixImage();changeBack1();changeBack2();changeBack3();changeBack4();searchMovie();"/><center><p>Movies</p></center>
</label>
</div>
<div id=tv>
<input type="radio" class="radio_item" value="2" name="product_category_id" id="radio1">
<label class="label_item" for="radio1"> 
<img id="TV" src="../raw/pics/tv.png" height="15%" onmouseover="changeImage1()" onmouseout="changeBack1()" onclick="fixImage1();changeBack();changeBack2();changeBack3();changeBack4();hideMovie();searchTv();"><center><p>TV Series</p></center>
</label>
</div>
<div id=music>
<input type="radio" class="radio_item" value="3" name="product_category_id" id="radio2">
<label class="label_item" for="radio2"> 
<img id="Music" src="../raw/pics/music.png" height="15%" onmouseover="changeImage2()" onmouseout="changeBack2()" onclick="fixImage2();changeBack();changeBack1();changeBack3();changeBack4();hideMovie();"><center><p>Music</p></center>
</label>
</div>
<div id=camera>
<input type="radio" class="radio_item" value="4" name="product_category_id" id="radio3">
<label class="label_item" for="radio3"> 
<img id="Camera" src="../raw/pics/camera.png" height="12%" onmouseover="changeImage3()" onmouseout="changeBack3()" onclick="fixImage3();changeBack();changeBack1();changeBack2();changeBack4();hideMovie();"><center><p>Images</p></center>
</label>
</div>
<div id=homevideo>
<input type="radio" class="radio_item" value="5" name="product_category_id" id="radio4">
<label class="label_item" for="radio4"> 
<img id="Homevideo" src="../raw/pics/homevideo.png" height="15.5%" onmouseover="changeImage4()" onmouseout="changeBack4()" onclick="fixImage4();changeBack();changeBack1();changeBack2();changeBack3();hideMovie();"><center><p>Home Video</p></center>
</label>
</div>

<div id="sel"><p>Select Media</p></div>
<div id="file"><input type='file' name='video' id="video">
</div>



<script>
function myFun(){

var input = document.getElementById("video");
var file = input.value.split("\\");
var fileName = file[file.length-1];
document.getElementById("letserch").value = fileName;

}

</script>



<div id="title"><p id="mTitle">Media Title</p></div>
<div id="tot">
<input type="text" name="product_title" id="letserch" required value="Edit media name..." onBlur="if(this.value=='')this.value='Edit media name...'" onFocus="if(this.value=='Edit media name...')this.value='' ">

</div>






  <div class="modal-footer" id="modal-footer">


     <div id="bt"> <input type='submit'  id='uploadSubmit' name='upload' value='UPLOAD' onclick='uploadFile()'></div>           <!--name='publish'-->

<div id="pbar"><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></div>
<center><h3 id="status" ></h3></center>

      </form>


      <div id="lol">
     
</div>


    </div>

<div id="backg" style='position:fixed;top:0;right:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5);z-index: 98;visibility:hidden;'>
</div>

<script>
function searchMovie(){
    document.getElementById("lol").style.visibility = "visible";
    document.getElementById("lol").innerHTML="<form method='post' action='' id='login_form' enctype='multipart/form-data'> <input type='text' name='movieN' placeholder='Enter the name of movie you want to upload'><input type='submit' name='searchmovie' value='SEARCH POSTER '>"
    document.getElementById("sel").style.visibility = "hidden";
     document.getElementById("tot").style.visibility = "hidden";
      document.getElementById("file").style.visibility = "hidden";
       document.getElementById("title").style.visibility = "hidden";
       document.getElementById("uploadSubmit").disabled = true;
        document.getElementById("uploadSubmit").style.visibility = "hidden";

          var screenWidth = window.outerWidth;
if (screenWidth<1000){
  
               document.getElementById("lol").style.left = '10%';
             
                }
    $('#login_form').submit(function() {
    $('#gif').css('visibility', 'visible');
    $('#backg').css('visibility', 'visible');
});
}
function hideMovie(){
    document.getElementById("lol").style.visibility = "hidden";
    document.getElementById("sel").style.visibility = "visible";
     document.getElementById("tot").style.visibility = "visible";
      document.getElementById("file").style.visibility = "visible";
       document.getElementById("title").style.visibility = "visible";
       document.getElementById("uploadSubmit").disabled = false;
        document.getElementById("uploadSubmit").style.visibility = "visible";
}
function searchTv(){
    document.getElementById("lol").style.visibility = "visible";
    document.getElementById("lol").innerHTML="<form method='post' action='' id='login_form' enctype='multipart/form-data'> <input type='text' name='movieN' placeholder='Enter the name of TV Series you want to upload'><input type='submit' name='searchTV' value='SEARCH POSTER '>"
    document.getElementById("sel").style.visibility = "hidden";
     document.getElementById("tot").style.visibility = "hidden";
      document.getElementById("file").style.visibility = "hidden";
       document.getElementById("title").style.visibility = "hidden";
       document.getElementById("uploadSubmit").disabled = true;
        document.getElementById("uploadSubmit").style.visibility = "hidden";
        if (screenWidth<1000){
  
               document.getElementById("lol").style.left = '10%';
             
                }

    $('#login_form').submit(function() {
    $('#gif').css('visibility', 'visible');
    $('#backg').css('visibility', 'visible');
});
}

</script>
    

<script>
 function changeImage() {

            document.getElementById("Movie").src = "../raw/pics/movie1.png";
       
    }
 function changeBack() {
    //window.alert(x);
    if(x==0){
            document.getElementById("Movie").src = "../raw/pics/movie.png";}
        
    }
 function fixImage(){
            x=1;
            document.getElementById("Movie").src = "../raw/pics/movie1.png";
            y=0;
            z=0;
            g=0;
            h=0;
    }
    function changeImage1() {

            document.getElementById("TV").src = "../raw/pics/tv1.png";
       
    }
 function changeBack1() {
    if(y==0){
            document.getElementById("TV").src = "../raw/pics/tv.png";}
        
    }
 function fixImage1(){
            y=1;
            document.getElementById("TV").src = "../raw/pics/tv1.png";
            x=0;
            z=0;
            g=0;
            h=0;
        
    }
    function changeImage2() {

            document.getElementById("Music").src = "../raw/pics/music1.png";
       
    }
 function changeBack2() {
    if(z==0){
            document.getElementById("Music").src = "../raw/pics/music.png";}
        
    }
 function fixImage2(){
            z=1;
            document.getElementById("Music").src = "../raw/pics/music1.png";
            x=0;
            y=0;
            g=0;
            h=0;
        
    }
    function changeImage3() {

            document.getElementById("Camera").src = "../raw/pics/camera1.png";
       
    }
 function changeBack3() {
    if(g==0){
            document.getElementById("Camera").src = "../raw/pics/camera.png";}
        
    }
 function fixImage3(){
            g=1;
            document.getElementById("Camera").src = "../raw/pics/camera1.png";
            x=0;
            y=0;
            z=0;
            h=0;
        
    }
    function changeImage4() {

            document.getElementById("Homevideo").src = "../raw/pics/homevideo1.png";
       
    }
 function changeBack4() {
    if(h==0){
            document.getElementById("Homevideo").src = "../raw/pics/homevideo.png";}
        
    }
 function fixImage4(){
            h=1;
            document.getElementById("Homevideo").src = "../raw/pics/homevideo1.png";
            x=0;
            y=0;
            z=0;
            g=0;
        
    }
</script>
<script>
 function changeImage11() {

            document.getElementById("Movie").src = "../raw/pics/light/movie1.png";
       
    }
 function changeBack11() {
    //window.alert(x);
    if(x==0){
            document.getElementById("Movie").src = "../raw/pics/light/movie.png";}
        
    }
 function fixImage11(){
            x=1;
            document.getElementById("Movie").src = "../raw/pics/light/movie1.png";
            y=0;
            z=0;
            g=0;
            h=0;
    }
    function changeImage111() {

            document.getElementById("TV").src = "../raw/pics/light/tv1.png";
       
    }
 function changeBack111() {
    if(y==0){
            document.getElementById("TV").src = "../raw/pics/light/tv.png";}
        
    }
 function fixImage111(){
            y=1;
            document.getElementById("TV").src = "../raw/pics/light/tv1.png";
            x=0;
            z=0;
            g=0;
            h=0;
        
    }
    function changeImage211() {

            document.getElementById("Music").src = "../raw/pics/light/music1.png";
       
    }
 function changeBack211() {
    if(z==0){
            document.getElementById("Music").src = "../raw/pics/light/music.png";}
        
    }
 function fixImage211(){
            z=1;
            document.getElementById("Music").src = "../raw/pics/light/music1.png";
            x=0;
            y=0;
            g=0;
            h=0;
        
    }
    function changeImage311() {

            document.getElementById("Camera").src = "../raw/pics/light/camera1.png";
       
    }
 function changeBack311() {
    if(g==0){
            document.getElementById("Camera").src = "../raw/pics/light/camera.png";}
        
    }
 function fixImage311(){
            g=1;
            document.getElementById("Camera").src = "../raw/pics/light/camera1.png";
            x=0;
            y=0;
            z=0;
            h=0;
        
    }
    function changeImage411() {

            document.getElementById("Homevideo").src = "../raw/pics/light/homevideo1.png";
       
    }
 function changeBack411() {
    if(h==0){
            document.getElementById("Homevideo").src = "../raw/pics/light/homevideo.png";}
        
    }
 function fixImage411(){
            h=1;
            document.getElementById("Homevideo").src = "../raw/pics/light/homevideo1.png";
            x=0;
            y=0;
            z=0;
            g=0;
        
    }
</script>



</body>
</html>



    <?php 


    add_media();


     ?>


    </div>

    
  </div>

</div>

<script>



// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

btn.onclick = function() {
    modal.style.display = "block";

     var screenWidth = window.outerWidth;
if (screenWidth<1000){
     document.getElementById("modal-content").style.width = '70%';
               document.getElementById("modal-content").style.left = '15%';
                document.getElementById("sel").style.marginTop = "20%";
                document.getElementById("pbar").style.marginLeft = "15%";
                document.getElementById("modal-footer").style.top = "99%";
             }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>


  </div>

<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    // document.getElementById("search").style.visibility = "hidden";

     document.getElementById("topbar").style.height = '8%';
     document.getElementById("core").src="../raw/pics/mediaRIP.png";
     document.getElementById("core").style.height = '90%';
     document.getElementById("verticalnav").style.top = '9%';
     document.getElementById("un").style.height = '30%';
     document.getElementById("u").style.height = '30%';
     document.getElementById("sl").style.height = '30%';
      //document.getElementById("h").style.fontSize = "x-small";
       document.getElementById("n").style.fontSize = "small"; 
       document.getElementById("i").style.fontSize = "small";
        document.getElementById("j").style.fontSize = "small"; 
        document.getElementById("k").style.fontSize = "small"; 
        document.getElementById("l").style.fontSize = "small";
         document.getElementById("m").style.fontSize = "small";
          document.getElementById("unu").style.marginRight = "4%";
         document.getElementById("content").style.paddingTop = "1%";
         document.getElementsByTagName("myelement").paddingLeft="0%";


         document.getElementById("dim").style.height = '10px';
         document.getElementById("gl").style.height = '10px';
         document.getElementById("addl").style.width = '90%';
             document.getElementById("addl").style.left = '5%';

             document.getElementById("mob").style.visibility = "hidden";
             document.getElementById("mob1").style.left = "50%";
             document.getElementById("mob1").style.marginTop = "15px";
             // document.getElementById("mono").style.height = '80%';


        

}else{
  document.getElementById("search").style.visibility = "visible";
}

</script>

<script>
if (screenWidth<1000){
 document.getElementById("h").style.fontSize = "small";
}
</script>

<script>
    $(window).load(function () {
      $("#gear").css("visibility", "hidden");
        $("#tab").removeClass("hideAll");
    });
</script>


</body>
</html>










