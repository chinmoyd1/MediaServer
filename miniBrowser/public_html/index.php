<?php
require_once("../resources/config.php");

$username = get_user();
$jumper=0;
//if (!$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') die('Invalid request');
//$cd1 ="rm -rf trash/";
//exec($cd1);

if(isset($_GET['destination'])){
  
 $url=$_GET['destination'];
 $url = str_replace("323","://","$url");
 $url = str_replace("999",".","$url");
 $url = str_replace("626","/","$url");
 $url = str_replace("00900","../","$url");
 $url = str_replace(" ","%20","$url");
 $url = str_replace("$2$","%26","$url");
 $url1=$_GET['destination'];
}

if (strpos($url, '../') ) {
   // echo 'true';
   $url = str_replace('../', '', $url);

   $url=trim($url, "/");


   $url=substr($url,0,strrpos($url,'/'));

   $url=$url."/";

   //echo $url2;


  $url1 = str_replace('00900', '', $url1);

  $url1=trim($url1, "626");


  $url1=substr($url1,0,strrpos($url1,'626'));

  $url1=$url1."626";

  //echo $url3;
}
 // $explode = explode('/', $items->item($i)->nodeValue);
 // $type = array_pop($explode);






?>



<!DOCTYPE html>
<html>
<head>



<?php $addr = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

$ar = explode('&',$addr);
$arr = $ar[2];
//echo $arr;
?>

  <link rel="icon" type="image/gif/png" href="../../mediaRIP/raw/pics/cassette.png" height="13%">
<title>mediaRIP</title>
<link href="../../mediaRIP/raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
<link href="../resources/css/core.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="../resources/css/base.css" />
<link rel="stylesheet" href="../resources/css/style.css" />
    
<!-- 
<script src="../resources/js/jquery-1.9.1.min.js"></script> -->
<script src="../resources/js/jquery-2.2.0.js"></script>


  <style type="text/css">
  #tag{
   
    color:#C4C4C4;
    font-family:'Open Sans', sans-serif;
  font-size:10px;
  }
#skybar h3 {
    z-index: 18;
    position: absolute;
  
    left: 0%;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    font-size: 18px;
}


#sBar{
  top:42px;
}
  

#rough{
    z-index: 40;
    position:absolute;
    top:38%;
    left:11%;
    color:black;
     font-family:'Open Sans', sans-serif;
    font-weight: 600;
}


#cover{
    z-index: 40;
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:1000%;
    background-color:rgba(0,0,0,0.5);
    overflow-x:hidden;
}
#backg{
   z-index: 42;
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.5);
    overflow-x:hidden;
}
#library{
    z-index: 42;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.5);
    overflow-x:hidden;
}
#addl{

     z-index: 16;
     position:absolute;
    top:15%;
    left:0%;
    width:100%;
    height:68%;
    background-color:black;

}
#skybar{
     z-index: 17;
     position:absolute;
    top:0;
    left:0;
    width:100%;
    height:12%;
    background-color:#02FA02;
}
#skybar h3{
     z-index: 18;
     position:absolute;
    top:15%;
    left:2%;
    font-family:'Open Sans', sans-serif;
    font-weight: 600;
   
}
#skybar span{
     z-index: 18;
     position:absolute;
    top:35%;
    left:140%;
    width: 100%;
    font-family:'Open Sans', sans-serif;
    font-weight: 600;
   
}
#skybar span1{
     z-index: 18;
     position:absolute;
    top:35%;
    left:250%;
    width: 100%;
    font-family:'Open Sans', sans-serif;
    font-weight: 600;
   
}
#skybar h6{
     z-index: 18;
     position:absolute;
    top:20%;
    left:96%;
      font-family:'Open Sans', sans-serif;
      font-weight: 900;
      font-size: 150%;
   
}

#skybar h6:hover,
#skybar h6:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
#sidebar{
    z-index: 19;
     position:absolute;
    top:12%;
    left:0%;
    width:15%;
    height:105%;
    background-color:#121212;
}
#sidebar ul li{
font-family:'Open Sans', sans-serif;
font-size: 80%;
font-weight: 600;
color:#8A8A8A;
padding-top: 8%;
padding-left: 8%;
height: 8%;
}
#sidebar img{
float:left;
padding-bottom: 10%;
}
#sidebar h4{
    float:left;
    padding-top: 5%;
    padding-left: 2%;
    padding bottom: 5%;
}
#sidebar h5{
    float:left;
    padding-top: 5%;
    padding-left: 5%;
}
#maincontent0{
    color:#02FA02;
    padding-top: 5%;
    padding-left: 12%;
}
#maincontent0 h2{
    font-family:'Open Sans', sans-serif;
    font-weight: 600;
    margin-bottom: 4%;
    margin-top: 10px;
    margin-left:39px;
}
#maincontent0 h5{
    font-family:'Open Sans', sans-serif;
    font-weight: 600;
        padding-top:10px;


}
#maincontent0 h3{
    font-family:'Open Sans', sans-serif;
    font-weight: 600;
    margin-top: 50px;
}
#foot33{

    background-color:#02FA02;
    z-index: 20;
    position:absolute;
    top:105%;
    left:0%;
    width: 100%;
    height:12%;
}
#pol {
  
 
}
#pol input[type=text], select {

    font-weight: 900;
    width: 480px;
    padding: 1% 5%;
    margin: 30px 0;
    display: inline-block;
    border: none;
   
    box-sizing: border-box;
    background-color:#2E2E2E; 
    color:#02FA02;
    border-radius: 5em;
    margin-left: 10%;

}

#pol a {
   
    position: absolute;
    left:68%;

    font-weight: 900;
 
    padding: 0.8% 7%;
    margin: 30px 0;
    
    border: none;
    font-family:'Open Sans', sans-serif;
    box-sizing: border-box;
    background-color:#02FA02; 
    color:black;
    border-radius: 5em;
    cursor:pointer;
    font-size: 90%;
}


#conf{
  overflow-x:hidden;

}

#gl{
  float:left;
  clear:left;
}

  </style>
  <!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>!-->
  
  
</head>
<body>
<!-- Menu div initially hidden -->

<div id="topbar">


<div id="skybar" style="position: fixed;">
 <h3><img src='../resources/images/library1.png' style='height:25px;padding-left: -50px !important;'><span style="color: black;margin-left: -20px !important;padding-left: -8px !important;margin-top: -5px !important;padding-top: -5px !important;">Select</span><span1 style="color: black;margin-left: -20px !important;padding-left: -20px !important;margin-top: -5px !important;padding-top: -5px !important;">Folder</span1></h3>
  <a href='<?php echo "http://".$ip."/mediaRIP/public_html/welcome.php?movies&username=".$username ?>' target='_parent';><h6 style="color:#383838;">&times;</h6></a>
</div>




</div>


<div id="sBar">
<a 
<?php



$root=$_GET['destination'];

//echo $root."= ".$url1."external62600900";

if($root == $url1."external62600900" || $root == $url1."external162600900" || $root == $url1."external262600900" || $root == $url1."external362600900"){

  $jumper = 1;
echo "href=#";
//include '../../mediaRIP/public_html/browse_external_device.php';

}
else{

$url1 = str_replace(" ","%20","$url1");

$adr = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$t0 = explode('&',$adr);
$tt0 = $t0[2];

 echo "href=http://".$ip."/miniBrowser/public_html/index.php?username=".$username."&destination=".$url1."00900&".$tt0;
    }


?>
><img id="back" src="../resources/images/arrow3.png" height="14" style="padding-right: 0.5%;padding-left: 1%;margin-right: 0.5%;" onmouseover="change()" onmouseout="change1()"></a>



<script>
function change(){
   document.getElementById("back").src = "../resources/images/arrow2.png";
}
function change1(){
   document.getElementById("back").src = "../resources/images/arrow3.png";
}

</script>

<?php
//echo $url;
$url22 = str_replace("%20"," ","$url");
$url22 = str_replace("%26","&","$url22");
$ar = explode('/', $url22);

//$last = $ar[1];
foreach ($ar as $value) {
  if($value == "http:"){
   //  echo "$value";
  }
  elseif($value == $ip) {
   //  echo "$value";
}
elseif($value == "localhost") {
   //  echo "$value";
}
 elseif($value == "") {
   //  echo "$value";
}
  else{
    echo "$value <img src='../resources/images/seperater.png' height='10' style='padding-right: 1%;padding-left: 1%'>";
      $a[$i] = $value;
      $i++;
  }
}

?>
</div>


<div id="conf" class="confined" style="width:100%;padding-left: 0%;">

<?php
if($jumper == 1){
  include 'browse_external_device.php';

}

?>

 <ul>

<?php
//  "http://192.168.1.102/browser/public_html/index.php?destination=http3231929991689991999102626mediaRIP626uploads626"
//  "http://192.168.1.102/browser/public_html/index.php?destination=http3231929991689991999102626external626"



//     :// = 323
//      . = 999
//     / = 626
//    ../ = 00900

//$url ="http://192.168.1.102/mediaRIP/uploads/";

//echo $ip;

$content = file_get_contents($url);

//echo $content;




 
   $DOM = new DOMDocument;
   $DOM->loadHTML($content);

   //get all H1
    if($jumper == 1){
    //echo 'nothing';
    $jumper=0;
   }else{
   $items = $DOM->getElementsByTagName('a');
   $url1 = str_replace("'", "&apos;", $url1);
   $dirContents = null;
  // echo $url1;

   //display all H1 text

   for ($i = 5; $i < $items->length; $i++){

      $explode = explode('.', $items->item($i)->nodeValue);
     
 
      $mName = str_replace("'", "&apos;", $items->item($i)->nodeValue);
     // $mName = str_replace("'", "&apos;", $mName);
     // $mName = str_replace("'", "&apos;", $mName);

       $nName = str_replace("&", "$2$", $items->item($i)->nodeValue);        
       $nName = str_replace("+", "%2B", $nName);      

        $nName = str_replace("'", "&apos;", $nName);

        $url1 = str_replace("+", "%2B", $url1);
 

      if (strpos($items->item($i)->nodeValue, '/') ) {

        //$url1=$_GET['destination'];
        $nextFold = str_replace("&", "$2$", $items->item($i)->nodeValue);        
        $nextFold = str_replace("+", "%2B", $nextFold);  
        $nextFold = str_replace("'", "&apos;", $nextFold);

        $nextFold = str_replace('/', '626', $nextFold);
        // $nextFold = str_replace( "&", '%26', $nextFold);
        $folder=trim($mName, "/");

         
          $nextFold1 = str_replace('626', '/', $nextFold);
          echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$nextFold1."&destination=".$url1."'><div id='confined'><a href='http://".$ip."/miniBrowser/public_html/index.php?username=".$username."&destination=".$url1.$nextFold."&".$arr."'> <div id='packet'>  <center> <img src='../resources/images/folder1.png' height='50px'></center><div id='tag'><center>".$folder. "</center></div></div></div> </a></li>" ;

        }

      else{
        $type = array_pop($explode);
        //$length = strlen(file_get_contents($url.$items->item($i)->nodeValue));
        //echo $length;

       // echo "" ;


        if($type == "mkv" || $type == "mp4" || $type == "avi" || $type == "MP4"){


           $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= $x.'/';
                    }

        // echo $mName;

       //  ini_set('display_errors', 1);
        // error_reporting(E_ALL); 
          
        $mName6 = str_replace("&apos;", "''", $mName);
      //  $mName = str_replace("&", "%26", $mName);
       
     //   echo $mName6;
     // echo "SELECT * FROM browser_thumbnails WHERE vedio_name = '{$mName6}'";

       

       
           //echo "in";

          
             echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$nName."&destination=".$url1."'><div id='confined'><div id='packet' class='blur pic'><center><img src='../resources/images/video.png' height='50px'></center>
          
          
               <div id='tag' class='tasks-overflow'><center>".$mName."</center></div></div></div></li>" ;
           
          
       
         
          


        

        }
        elseif($type == "mp3" || $type == "octet-stream"){



                  $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= '/'.$x;
                  }

                 // echo $x1;

                  $explode = explode('/', $x1);
                  $type = array_pop($explode);

                  $Image="../resources/images/mp3.png";
                            


  echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$nName."&destination=".$url1."'><div id='confined'><div id='packet'> <center><img src='".@$Image."' height='50px'></center><div id='tag'><center>".$mName. "</center></div></div></div></li>" ;          

        }
       
        elseif($type == "jpg" || $type == "jpeg" || $type == "png" || $type == "ico" || $type == "gif" ){

          echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$items->item($i)->nodeValue."&destination=".$url1."'><div id='confined'><div id='packet' class='blur pic'><center><img src='../resources/images/pic.png' height='50px'></center><div id='tag'><center>".$items->item($i)->nodeValue. "</center></div> </div></div></li>" ;          

        }
        else{

          echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$items->item($i)->nodeValue."&destination=".$url1."'><div id='confined'><div id='packet' class='blur pic'><center><img src='../resources/images/document.png' height='50px'></center><div id='tag'><center>".$items->item($i)->nodeValue. "</center></div></div></div></li>";
          }
        }

echo "<script src='../resources/js/jquery-3.1.1.js'>
 var longText = $('.tasks-overflow');
longText.text(longText.text().substr(0, 10));
</script>";
        
   }


}


?>



</ul>





</div>




<div id='foot' style="position: fixed;bottom:0;margin-top: 15px;">



  <div id='bt' onclick='address();'> <input type='submit'  id='uploadSubmit' name='upload' value='SELECT'></div> 
  <div id='bt' style='padding-right:0px'><a href='<?php echo "http://".$ip."/mediaRIP/public_html/welcome.php?movies&username=".$username ?>' target='_parent';><input type='submit'  id='uploadSubmit' name='upload' value='CANCEL'></div> </a>

  </div>
 

<div id="mini"></div>

<script>
function address(){
var url = "<?php echo $adr = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
//alert(url);


<?php
$t = explode('&',$adr);
$tt = $t[2];
$ttt= $t[1];
?>
//alert(url);

<?php
$tot = explode('626',$ttt);
array_shift($tot);
$x11 = null;
                    foreach ($tot as $x) {
                      $x11 .= $x.'/';
                    }
$x11=trim($x11, '/');
$x11='/'.$x11.'/';

$x11 = str_replace("%20"," ","$x11");
$x11 = str_replace("%27","\'","$x11");
$x11 = str_replace("$2$","&","$x11");

if (strpos($x11, '00900') ) {
$x11 = str_replace("00900/","","$x11");

$x11=trim($x11, '/');
$x11=explode('/',$x11);
array_pop($x11);

$x22= null;
foreach ($x11 as $x) {
                      $x22 .= $x.'/';
                    }

$x11='/'.$x22;

}

?>



//alert('<?php //echo $x11 ?>');


var dest = '<?php echo $x11 ?>';
var tp = '<?php echo $tt ?>';

/*
if(tp=='c'){
  alert('camera');
}
else if(tp=='mo'){
  alert('movie');
}
else if(tp=='t'){
  alert('tv');
}
else if(tp=='mu'){
  alert('music');
}
else if(tp=='h'){
  alert('homevideo');
}*/


scroll(0,0);

document.getElementById("conf").style.overflow="hidden";

//document.getElementById("mini").innerHTML="<div id='skybar'><h3><img src='../resources/images/library1.png' style='height:25px;'><span>Add</span><span1>Library</span1></h3> <h6>&times;</h6> </div>";

 var screenWidth = window.outerWidth;
if (screenWidth<1000){

   document.getElementById("mini").innerHTML="<div id='library'><div id='backg' style='visibility:hidden;'></div><img src='../resources/images/gears.gif' id='gif' style='z-index:99;position:absolute;top:40%;left:40%;display: block; margin: 0 auto; width: 150px;visibility:hidden;'><div id='addl'><form method='post' name='multiU' action='../resources/multiUP.php' enctype='multipart/form-data' id='login_form'><div id='skybar' style:'height:16%'><h3><img src='../resources/images/library1.png' style='height:25px;'></h3><div id='rough'>Add Library</div> </div><div id='maincontent0' style='padding-left:0;'><h2  style='padding-left:0;margin-left:5px;padding-top:5px;'>Media type</h2><div id=movie ><input type='radio' class='radio_item' value='1' name='product_category_id' id='radio0'><label class='label_item' for='radio'><img id='Movie' src='../resources/images/light/movie.png' height='40px'/><center><h5>Movies</h5></center></label></div><div id=tv style='padding-left:14px'><input type='radio' class='radio_item' value='2' name='product_category_id' id='radio1'><label class='label_item' for='radio1'> <img id='TV' src='../resources/images/light/tv.png' height='40px'><center><h5>TV Series</h5></center></label></div><div id=music style='padding-left:18px'><input type='radio' class='radio_item' value='3' name='product_category_id' id='radio2'><label class='label_item' for='radio2'> <img id='Music' src='../resources/images/light/music.png' height='40px' ><center><h5>Music</h5></center></label></div><div id=camera style='padding-left:18px'><input type='radio' class='radio_item' value='4' name='product_category_id' id='radio3'><label class='label_item' for='radio3'> <img id='Camera' src='../resources/images/light/camera.png' height='35px' style='margin-top:-5px !important;z-index:99;'><center><h5 style=''>Images</h5></center></label></div><div id=homevideo style='padding-left:18px'><input type='radio' class='radio_item' value='5' name='product_category_id' id='radio4'><label class='label_item' for='radio4'> <img id='Homevideo' src='../resources/images/light/homevideo.png' height='40px'><center><h5>Home Video</h5></center></label></div><div id='pol'><input type='text' id='roro' name='movieN' value='' style='width:345px;'></div></div><div id='foot33'><div id='bt'> <input type='submit'  id='uploadSubmit' name='can' value='CANCEL'></div><div id='bt' style='padding-right:0px'> <input type='submit'  id='uploadSubmit' name='multiUpload' value='NEXT'></div></div></div></div><div id='cover'></div>";
     

}else{
 document.getElementById("mini").innerHTML="<div id='library'><div id='backg' style='visibility:hidden;'></div><img src='../resources/images/gears.gif' id='gif' style='z-index:99;position:absolute;top:40%;left:40%;display: block; margin: 0 auto; width: 150px;visibility:hidden;'><div id='addl'><form method='post' name='multiU' action='../resources/multiUP.php' enctype='multipart/form-data' id='login_form'><div id='skybar'><h3><img src='../resources/images/library1.png' style='height:25px;'></h3><div id='rough'>Add Library</div> </div> <div id='sidebar'><ul><li><img src='../resources/images/lib1.png' style='height:18px;' id='dim'/><h4>Select Type</h4></li><li><img src='../resources/images/cat1.png' style='height:20px;' id='gl'/><h5>Add Folder</h5></li></ul>  </div><div id='maincontent0'><h2>Media type</h2><div id=movie ><input type='radio' class='radio_item' value='1' name='product_category_id' id='radio0'><label class='label_item' for='radio'><img id='Movie' src='../resources/images/light/movie.png' height='68px'/><center><h5>Movies</h5></center></label></div><div id=tv style='padding-left:14px'><input type='radio' class='radio_item' value='2' name='product_category_id' id='radio1'><label class='label_item' for='radio1'> <img id='TV' src='../resources/images/light/tv.png' height='68px'><center><h5>TV Series</h5></center></label></div><div id=music style='padding-left:18px'><input type='radio' class='radio_item' value='3' name='product_category_id' id='radio2'><label class='label_item' for='radio2'> <img id='Music' src='../resources/images/light/music.png' height='68px' ><center><h5>Music</h5></center></label></div><div id=camera style='padding-left:18px'><input type='radio' class='radio_item' value='4' name='product_category_id' id='radio3'><label class='label_item' for='radio3'> <img id='Camera' src='../resources/images/light/camera.png' height='60px' style='margin-top:-5px !important;z-index:99;'><center><h5 style=''>Images</h5></center></label></div><div id=homevideo style='padding-left:18px'><input type='radio' class='radio_item' value='5' name='product_category_id' id='radio4'><label class='label_item' for='radio4'> <img id='Homevideo' src='../resources/images/light/homevideo.png' height='70px'><center><h5>Home Video</h5></center></label></div><div id='pol'><input type='text' id='roro' name='movieN' value=''></div></div><div id='foot33'><div id='bt'> <input type='submit'  id='uploadSubmit' name='can' value='CANCEL'></div><div id='bt' style='padding-right:0px'> <input type='submit'  id='uploadSubmit' name='multiUpload' value='NEXT'></div></div></div></div><div id='cover'></div>";
}

$('#login_form').submit(function() {
    $('#gif').css('visibility', 'visible');
    $('#backg').css('visibility', 'visible');
});


if(tp=='mo'){
   document.getElementById("Movie").src = "../resources/images/light/movie1.png";
   document.getElementById("radio0").checked = true;
}

else if(tp=='t'){
  document.getElementById("TV").src = "../resources/images/light/tv1.png";
     document.getElementById("radio1").checked = true;

}
else if(tp=='mu'){
  document.getElementById("Music").src = "../resources/images/light/music1.png";
     document.getElementById("radio2").checked = true;

}
else if(tp=='c'){
  document.getElementById("Camera").src = "../resources/images/light/camera1.png";
     document.getElementById("radio3").checked = true;

}
else if(tp=='h'){
  document.getElementById("Homevideo").src = "../resources/images/light/homevideo1.png";
     document.getElementById("radio4").checked = true;

}


document.getElementById("roro").value = dest;


}



</script>


<?php

require_once('../resources/multiUP.php');


?>





<script type="text/javascript">
  var screenWidth = window.outerWidth;
if (screenWidth<1000){

  
  document.getElementById("foot").style.top = '86%';
   document.getElementById("sBar").style.top = '34px';
     

}

</script>

</body>
</html>