<?php
require_once("../resources/config.php");
$username = get_user();
session_start();
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




function remoteFileData($f) {
    $h = get_headers($f, 1);
    if (stristr($h[0], '200')) {
        foreach($h as $k=>$v) {
            if(strtolower(trim($k))=="last-modified") return $v;
        }
    }
}


?>
<?php

$uri = $_GET['destination'];

if(strpos($uri, 'external3')){
 // echo "in2";
  /* get disk space free (in bytes) */
$df = disk_free_space("/var/www/external3");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/external3");
}
else if(strpos($uri, 'external2')){
 // echo "in2";
  /* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external2");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external2");
}
else if(strpos($uri, 'external1')){
 // echo "in1";
  /* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external1");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external1");
}
else if(strpos($uri, 'external')){
 // echo "in0";
  /* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external");
}
else{
 // echo "out";
/* get disk space free (in bytes) */
$df = disk_free_space("/var/www");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www");
}
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

<!DOCTYPE html>
<html>
<head>
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
  .progress {
        margin-top: 1.5%;
        background-color:#2E2E2E;
         border: none;
          border-radius: 5em;
        height: 24px;
        width: 540px;
       
}
.progress .prgbar {
        background: #02FA02;
         border-radius: 5em;
        width: <?php echo $dp; ?>%;
        position: relative;
        height: 24px;
        z-index: 999;
}
.progress .prgtext {
        color: black;
        text-align: center;
        font-size: 13px;
        font-family:'Open Sans', sans-serif;
        padding: 5px 0;
        width: 540px;
        position: absolute;
        z-index: 1000;
}
.progress .prginfo {
        margin: 1px 0;
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
  
  </style>
  <!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>!-->

<script type="text/javascript">
  document.cookie = "check=0";
    var screenWidth = window.outerWidth;
if (screenWidth<1000){
               document.cookie = "check=1";
             
                }

<?php
//echo 'a';
 $check = $_COOKIE["check"];
  // echo $b;
   if($check==1){
    $base = '20px';
    $base1 = '10px';
    $fold = '50px';
    $hgt = '80px';
    $recon ="style='margin-top: -50px;'";
    $recon1 ="style='margin-top: -10px;'";
    $rolo ="";
   }
   else{
    $base = '80px';
     $base1 = '30px';
      $fold = '100px';
      $hgt = '200px';
      $recon ="";
      $recon1 ="";
       $rolo ="";
   }
?>
</script>

  <script type="text/javascript">
  $(document).ready(function () {

  $("ul").on("contextmenu",'li',function(e){
           //prevent default context menu for right click
           e.preventDefault();

          //  alert(this.id);
          // alert(this.a);


           var menu = $(".menu"); 

           //hide menu if already shown
           menu.hide(); 
           
           //get x and y values of the click event
           var pageX = e.pageX;
           var pageY = e.pageY;

           //position menu div near mouse cliked area
           menu.css({top: pageY , left: pageX});

           var mwidth = menu.width();
           var mheight = menu.height();
           var screenWidth = $(window).width();
           var screenHeight = $(window).height();

           //if window is scrolled
           var scrTop = $(window).scrollTop();

           //if the menu is close to right edge of the window
           if(pageX+mwidth > screenWidth){
            menu.css({left:pageX-mwidth});
           }

           //if the menu is close to bottom edge of the window
           if(pageY+mheight > screenHeight+scrTop){
            menu.css({top:pageY-mheight});
           }


           document.getElementById("details").href =  this.id;

           document.getElementById("download").href =  this.id+"&download";

           document.getElementById("delete").href =  this.id+"&delete";

           document.getElementById("rename").href =  this.id+"&rename";

            document.getElementById("copy").href =  this.id+"&copy";
            <?php
            if($_SESSION['copy']){
            echo 'document.getElementById("paste").href =  this.id+"&paste";';
            }
            ?>

           //finally show the menu
           menu.show();
    }); 
    
    $("html").on("click", function(){
      $(".menu").hide();
    });
  });


$(document).ready(function () {
  $("li").on("contextmenu",'a',function(e){
           //prevent default context menu for right click
           e.preventDefault();

          //  alert(this.id);
          //alert(this.href);


           var menu = $(".menu"); 

           //hide menu if already shown
           menu.hide(); 
           
           //get x and y values of the click event
           var pageX = e.pageX;
           var pageY = e.pageY;

           //position menu div near mouse cliked area
           menu.css({top: pageY , left: pageX});

           var mwidth = menu.width();
           var mheight = menu.height();
           var screenWidth = $(window).width();
           var screenHeight = $(window).height();

           //if window is scrolled
           var scrTop = $(window).scrollTop();

           //if the menu is close to right edge of the window
           if(pageX+mwidth > screenWidth){
            menu.css({left:pageX-mwidth});
           }

           //if the menu is close to bottom edge of the window
           if(pageY+mheight > screenHeight+scrTop){
            menu.css({top:pageY-mheight});
           }

           document.getElementById("open").href =  this.href;

           //finally show the menu
           menu.show();
    }); 
    
    $("html").on("click", function(){
      $(".menu").hide();
    });
  });
  </script>
  
</head>
<body>
<!-- Menu div initially hidden -->
<div class="menu" id="main">
  <ul>
    <a id="open"><li><img src="../resources/images/open.png" height="15px" style="padding-right: 5%;"> Open</li></a>
    <a id="download"><li><img src="../resources/images/download.png" height="15px" style="padding-right: 3%;"> Download</li></a>
<?php
if($_SESSION['copy']){
  echo '<a id="paste"><li><img src="../resources/images/copy.png" height="15px" style="padding-right: 5%;"> Paste</li></a>';
  }
?>


    <a id="copy"><li><img src="../resources/images/copy.png" height="15px" style="padding-right: 5%;"> Copy</li></a>
    <a id="rename"><li><img src="../resources/images/rename.png" height="15px" style="padding-right: 5%;"> Rename</li></a>
    <a id="delete"><li><img src="../resources/images/delete.png" height="15px" style="padding-right: 5%;"> Delete</li></a>
    <a id="details"><li><img src="../resources/images/details.png" height="15px" style="padding-right: 5%;"> Details</li></a>
    
  </ul>
</div>







<div id="topbar">

<div id="logo1">
<ul>
<div id="l1"><li><a href="../../mediaRIP/public_html/welcome.php?movies&username=<?php echo $username;  ?>"><img src="../../mediaRIP/raw/pics/1.png" id="core"> <!--<p>MEDIA<span>RIP</span></p>--></li></div>




<li style="float:right; margin-top: 0.8%;margin-left: 2%;"><a href="../../mediaRIP/public_html/index.php"><img src="../../mediaRIP/raw/pics/user1.png" style="height:20px;"><button id="myBtn1" style=" background-color: #141414;border: none;color: #02FA02; text-align: center;text-decoration: none;display: inline-block;font-size: 60%;cursor: pointer;"><?php echo $username;  ?>!</button></a></li>


<?php $uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<li style="float:right; margin-top: 0.8%;margin-left: 2%;"><a href="<?php echo $uri; ?>&mkdir"><img src="../resources/images/newfolder.png" style="height:20px;"><button id="myBtn1" style=" background-color: #141414;border: none;color: #02FA02; text-align: center;text-decoration: none;display: inline-block;font-size: 60%;cursor: pointer;">New Folder!</button></a></li>

<li style="float:right; margin-top: 0.8%;margin-left: 2%;"><a href="<?php echo $uri; ?>&uload"><img src="../../mediaRIP/raw/pics/upload1.png" style="height:18px;"><button id="myBtn1" style=" background-color: #141414;border: none;color: #02FA02; text-align: center;text-decoration: none;display: inline-block;font-size: 60%;cursor: pointer;">Upload here</button></a></li>


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
</li>

</div>

</ul>



</div>

<?php 
$copy=null;
if (isset($_GET['copy'])){

 $detail=$_GET['detail'];
 $detail = str_replace(" ","%20","$detail");

echo $detail;
if(strpos($detail, '/')){
$fName=trim($detail, '/');
$fName = explode('/', $fName);
$fName = array_pop($fName);
$fName = str_replace("%20"," ","$fName");
$fName = str_replace("$2$","&","$fName");
$copy=$url.$fName;

//echo $copy;

$xplode = explode('/',$copy);
unset($xplode[0]);
unset($xplode [1]);
unset($xplode [2]);

 $x1 = null;
                    foreach ($xplode as $x) {
                      $x1 .= '/'.$x;
                    }
 $copy = $x1;
//echo $copy;  
  $_SESSION['copy']=$copy;  
 // echo $_SESSION['copy'];
  $_SESSION['cFlag']=1; 
  }
else{
$fName=trim($detail, '/');
$fName = explode('/', $fName);
$fName = array_pop($fName);
$fName = str_replace("%20"," ","$fName");
$fName = str_replace("$2$","&","$fName");
$copy=$url.$fName;

//echo $copy;

$xplode = explode('/',$copy);
unset($xplode[0]);
unset($xplode [1]);
unset($xplode [2]);

 $x1 = null;
                    foreach ($xplode as $x) {
                      $x1 .= '/'.$x;
                    }
 $copy = $x1;
//echo $copy;  
  $_SESSION['copy']=$copy;  
 // echo $_SESSION['copy'];
   $_SESSION['cFlag']=0; 
}
}else{
  $copy=null;
 }     

?>
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
 echo "href=http://".$ip."/browser/public_html/index.php?username=".$username."&destination=".$url1."00900";
    }


?>
><img id="back" src="../resources/images/arrow3.png" height="14" style="padding-right: 0.5%;padding-left: 1%;margin-right: 0.5%;" onmouseover="change()" onmouseout="change1()"></a>

<a href="http://<?php echo $ip; ?>/browser/public_html/index.php?username=<?php echo $username ?>&destination=<?php echo $url1; ?>&reset"><img id="reload" src="../resources/images/reload.png" height="14" style="padding-right: 1%;padding-left: 0.5%;" onmouseover="change0()" onmouseout="change00()" ></a>

<?php
if(isset($_GET['reset'])){

   $cd1 ="rm -rf trash/";
   exec($cd1);

   $query = query("DELETE FROM browser_thumbnails");
   confirm($query);
     
   redirect("http://$ip/browser/public_html/index.php?username=$username&destination=$url1");   

}
?>
<script>
function change(){
   document.getElementById("back").src = "../resources/images/arrow2.png";
}
function change1(){
   document.getElementById("back").src = "../resources/images/arrow3.png";
}
function change0(){
   document.getElementById("reload").src = "../resources/images/reload1.png";
}
function change00(){
   document.getElementById("reload").src = "../resources/images/reload.png";
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


<div class="confined" id="convict">

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
          echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$nextFold1."&destination=".$url1."'><div id='confined'><a href='http://".$ip."/browser/public_html/index.php?username=".$username."&destination=".$url1.$nextFold."'> <div id='packet'>  <center> <img src='../resources/images/folder.png' height='$fold'></center><div id='tag'><center>".$folder. "</center></div></div></div> </a></li>" ;

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

       

         $query = query("SELECT * FROM browser_thumbnails WHERE vedio_name = '{$mName6}'");
         confirm($query);

           if(mysqli_num_rows($query) == 1 ){
           //echo "in";

            while($row = fetch_array($query)){
             echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$nName."&destination=".$url1."'><div id='confined'><a href='http://".$ip."/browser/public_html/vids.php?destination=".$url1.$nName."'><div id='packet' class='blur pic'><center><img src='trash/{$row['thumbnail']}' height='$fold'></center>
          
          
               <div id='tag' class='tasks-overflow'><center>".$mName."</center></div></div></div></a></li>" ;
            }

         }
          
         else 
          {    //echo "out";



           $ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
           $videoLocation = $items->item($i)->nodeValue;
           $getFromSecond = 130;
           $size = "200x100";
           $random_name = rand();
           $imageFile = $random_name.".jpg";

           mkdir("trash");

          
           $videoLocation = str_replace(" ","%20",$videoLocation);
            $videoLocation = str_replace("'","'\''",$videoLocation);
             $url6 = str_replace("'","'\''",$url);

            // echo $videoLocation;
            //echo "$ffmpeg -ss $getFromSecond -i '$url$videoLocation' -an -s $size trash/$imageFile 2>&1";
  
           $cmd = "$ffmpeg -ss $getFromSecond -i '$url6$videoLocation' -an -s $size trash/$imageFile 2>&1";
        //   exec($cmd); 

        $result = exec($cmd); 
          if ($result == "Output file is empty, nothing was encoded (check -ss / -t / -frames parameters if used)"){
           // echo "in";
            $getFromSecond = 10;
            $cmd = "$ffmpeg -ss $getFromSecond -i '$url6$videoLocation' -an -s $size trash/$imageFile 2>&1";
            exec($cmd); 


          }
         
          


            echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$items->item($i)->nodeValue."&destination=".$url1."'><div id='confined'><a href='http://".$ip."/browser/public_html/vids.php?destination=".$url1.$nName."'><div id='packet' class='blur pic'><center><img src='trash/$imageFile' height='$fold'></center>


            <div id='tag' class='tasks-overflow'><center>".$items->item($i)->nodeValue."</center></div></div></div></a></li>" ;


                   $mediaName = explode('/', $url.$videoLocation);
                   $mediaName = array_pop($mediaName);
                   $mediaName = str_replace("'\''","''",$mediaName);
                  // echo "Name: ". $mediaName;
          
                   
                   // echo $x1;
          
                    //  ini_set('display_errors', 1);
                    //  error_reporting(E_ALL); 
          
                     $mediaName = str_replace("%20"," ","$mediaName");
                  //   echo "Name: ". $mediaName;

                $x1 = str_replace("'","''",$x1);
                     
                    $query = query("INSERT INTO browser_thumbnails(directory,vedio_name,thumbnail) VALUES('{$x1}','{$mediaName}','{$imageFile}')");
            
                    confirm($query);
                  

          }

        }
        elseif($type == "mp3" || $type == "octet-stream"){



                  $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= '/'.$x;
                  }

                 // echo $x1;

                  $explode = explode('/', $x1);
                  $type = array_pop($explode);


                  require_once('getID3-1.9.12/getid3/getid3.php');
                  $getID3 = new getID3;


                $file="/var/www/html".$x1."/".$mName;
                
                $file = str_replace("&apos;", "'", $file);

                  set_time_limit(30);
                  $ThisFileInfo = $getID3->analyze($file);
                  getid3_lib::CopyTagsToComments($ThisFileInfo);
                //  echo 'File name: '.$ThisFileInfo['filenamepath'].'<br>';


                  $OldThisFileInfo = $getID3->analyze($file);
                  if(isset($OldThisFileInfo['comments']['picture'][0])){
                  $Image='data:'.$OldThisFileInfo['comments']['picture'][0]['image_mime'].';charset=utf-8;base64,'.base64_encode($OldThisFileInfo['comments']['picture'][0]['data']);
    

                  }else{
                  $Image="../resources/images/mp3.png";
                  }             


  echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$nName."&destination=".$url1."'><div id='confined'><a href='http://".$ip."/browser/public_html/audis.php?destination=".$url1.$nName."'><div id='packet'> <center><img src='".@$Image."' height='$fold'></center><div id='tag'><center>".$mName. "</center></div></div></div></a></li>" ;          

        }
       
        elseif($type == "jpg" || $type == "jpeg" || $type == "png" || $type == "ico" || $type == "gif" ){

          echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$items->item($i)->nodeValue."&destination=".$url1."'><div id='confined'><a href='".$url.$items->item($i)->nodeValue."'><div id='packet' class='blur pic'><center><img src='".$url.$items->item($i)->nodeValue."' height='$fold'></center><div id='tag'><center>".$items->item($i)->nodeValue. "</center></div> </div></div></a></li>" ;          

        }
        else{

          echo "<li id='http://".$ip."/browser/public_html/index.php?username=".$username."&detail=".$items->item($i)->nodeValue."&destination=".$url1."'><div id='confined'><a href='".$url.$items->item($i)->nodeValue."'><div id='packet' class='blur pic'><center><img src='../resources/images/document.png' height='$fold'></center><div id='tag'><center>".$items->item($i)->nodeValue. "</center></div></div></div></a></li>";
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


<?php
if(isset($_GET['uload'])){

$uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$det = explode("&",$uri);

if(strpos($det[1], 'etail') ){

  $det1 = $det[2];

  $det1 = str_replace("destination=","","$det1");
 // echo 'detail';
}else{
   $det1 = $det[1];
   $det1 = str_replace("destination=","","$det1");
   //  echo 'norm';
}


echo '<div id="myModal" class="modal" style="display:block;">


<div id="backg" style="visibility:hidden;"></div><img src="../../miniBrowser/resources/images/gears.gif" id="gif" style="z-index:99;position:absolute;top:18%;left:40%;display: block; margin: 0 auto; width: 150px;visibility:hidden;">

  <div class="modal-content" style="top:25%;">
    <div class="modal-header">
     <a href="http://'.$ip.'/browser/public_html/index.php?username='.$username.'&destination='.$det1.'"> <span class="close">&times;</span></a>
      <h2>+ Upload Media</h2>

     

    </div>

      <div class="modal-body" id="modal-body">
      <form method="post" name="renameFile" action="" enctype="multipart/form-data" id="u_form"> 


      <form method="post" name="Form" action="" enctype="multipart/form-data"> 
        <div id="sel" style="margin-top:20px;"><p>Select Media</p></div>
        <div id="file" style="margin-bottom:20px;"><input type="file" name="video" id="video"></div>
     

      </div>

        <div class="modal-footer">


         <div id="bt"> <input type="submit"  id="rename" name="uload" value="UPLOAD"></div>       


         </form>


      </div>

     
  </div>

 </div>';




if(isset($_POST['uload'])){

  if(isset($_FILES['video'])){
      $tmp = $_FILES['video']['tmp_name'];


        $vName = $_FILES["video"]["name"];
        echo "<br>Upload: " . $_FILES["video"]["name"] . "<br>";
        $type = $_FILES["video"]["type"] ;
        echo "Type: " . $_FILES["video"]["type"] . "<br>";
        echo "Size: " . number_format((float)($_FILES["video"]["size"] / 1048576), 2, '.', '') . " MB<br>";



                $detail=$_GET['destination'];

                $url22 = str_replace("%20"," ","$url");
                $url22 = str_replace("%26","&","$url22");
                $url22 = str_replace("'","'\''","$url22");
                $ar = explode('/', $url22);

                //$last = $ar[1];
                $x1 = null;
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
                          // echo "$value";
                          $x1 .= $value.'/';
                          $a[$i] = $value;
                          $i++;
                        }
                    }

                    echo $ufile = '/var/www/html/'.$x1.$_FILES["video"]["name"];
    
        move_uploaded_file($tmp, $ufile);


          $det1 = 'http://'.$ip.'/browser/public_html/index.php?username='.$username.'&destination='.$det1;
           header("Refresh:0; url=$det1");        

  }

}





}
?>


<script>
$('#u_form').submit(function() {
    $('#gif').css('visibility', 'visible');
    $('#backg').css('visibility', 'visible');
});
</script>



<?php
if(isset($_GET['mkdir'])){



 $detail=$_GET['destination'];

$url22 = str_replace("%20"," ","$url");
$url22 = str_replace("%26","&","$url22");
$url22 = str_replace("'","'\''","$url22");
$ar = explode('/', $url22);

//$last = $ar[1];
$x1 = null;
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
   // echo "$value";
      $x1 .= '/'.$value;
      $a[$i] = $value;
      $i++;
  }
}

//echo $x1;

$exe = "mkdir '/var/www/html$x1/Untitled_Folder'";
//echo $exe;
exec($exe,$return);


if (!$return) {
$uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$det = explode("&",$uri);

if(strpos($det[1], 'etail') ){
  $det1 = $det[0]."&".$det[2];
 // echo 'detail';
}else{
   $det1 = $det[0]."&".$det[1];
   //  echo 'norm';
}

 header("Refresh:0; url=$det1");
}


}
?>





<?php
if(isset($_GET['paste'])){
  session_start();
// echo 'copy:'.$_SESSION['copy'].'<br>';

$explode =explode('/',$_SESSION['copy']);
$nm = array_pop($explode);
//echo '++++'.$nm.'<br>';

 $detail=$_GET['detail'];
 $detail = str_replace(" ","%20","$detail");


$fName=trim($detail, '/');
$fName = explode('/', $fName);
$fName = array_pop($fName);
$fName = str_replace("%20"," ","$fName");
$fName = str_replace("$2$","&","$fName");
$copy=$url.$fName;

$xplode = explode('/',$copy);
unset($xplode[0]);
unset($xplode [1]);
unset($xplode [2]);

 $x1 = null;
                    foreach ($xplode as $x) {
                      $x1 .= '/'.$x;
                    }
 $paste = $x1;

$copy = $_SESSION['copy'];
$copy = str_replace("%20"," ","$copy");


  //echo 'paste:'.$paste.'<br>';
$copy = str_replace("'","'\''",$copy);
$paste = str_replace("'","'\''",$paste);
$nm = str_replace("'","'\''",$nm);
$paste = str_replace("%20"," ","$paste");
 //$exe = "cp '/var/www/html$copy' '/var/www/html$paste/$nm'";

if($_SESSION['cFlag']==0){$exe = "cp  '/var/www/html$copy' '/var/www/html$paste/$nm'";}
else{$exe = "cp -a '/var/www/html$copy' '/var/www/html$paste/'";}

//echo $exe;

exec($exe,$return);

//echo $uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$det = explode("&",$uri);
$det1 = $det[0]."&".$det[2];
//echo $det1;

if (!$return) {
  // header("Refresh:0; url=$det1");
}

}
?>




<?php
if(isset($_GET['download'])){

$detail=$_GET['detail'];
$detail = str_replace(" ","%20","$detail");
$detail1 = str_replace("%20"," ","$detail");
$detail1 = str_replace("$2$","&","$detail1");

 $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= $x.'/';
                    }
 $file = "/var/www/html/".$x1.$detail1;
//echo $file;

$name = explode('.', $detail1);
$extension = array_pop($name);

if(strpos($extension, '/')){

}



else{
  
download($file);
 
}
//header('Content-disposition: attachment; filename="'.$detail1.'"');
//readfile($FileName);



}

?>

<?php
if(isset($_GET['rename'])){
 
$det = explode("&",$uri);
$det1 = $det[0]."&".$det[2];
$det1=trim($det1, "&");
//echo $det1;


$detail=$_GET['detail'];
$detail = str_replace(" ","%20","$detail");
$detail1 = str_replace("%20"," ","$detail");
$detail1 = str_replace("$2$","&","$detail1");
$detail1=trim($detail1, "/");
 $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= $x.'/';
                    }
$file1 = $x1.$detail1;

$file = $detail1;

echo '<div id="myModal" class="modal" style="display:block;">

  <div class="modal-content" style="top:25%;">
    <div class="modal-header">
     <a href="http://'.$ip.'/browser/public_html/index.php?username='.$username.'&destination='.$det1.'"> <span class="close">&times;</span></a>
      <h2>Rename</h2>

     

    </div>





      <div class="modal-body" id="modal-body">
      <form method="post" name="renameFile" action="" enctype="multipart/form-data"> 


      <div id="title"><p id="mTitle">Rename To</p></div>
<div id="tot" '.$recon.'>
<input type="text" name="rename_to" id="letserch" required  value="'.$file.'">

</div>
      </div>






      <div class="modal-footer">


         <div id="bt"> <input type="submit"  id="rename" name="rename" value="RENAME"></div>       

         </form>


      </div>

     
  </div>

 </div>';



}

if(isset($_POST['rename'])){

$rename_to = escape_string($_POST['rename_to']);

$x1 = str_replace("'","'\''",$x1);
$file = str_replace("'","'\''",$file);
$rename_to = str_replace("\'","'\''",$rename_to);
$commd = "mv /var/www/html/'$x1$file' /var/www/html/'$x1$rename_to'";

exec($commd,$return); 

 $det1 = str_replace("+", "%2B", $det1);  

if (!$return) {
  header("Refresh:0; url=http://$ip/browser/public_html/index.php?username=$username&destination=$det1");
}
}

?>


<?php
if(isset($_GET['delete'])){

$detail=$_GET['detail'];
$detail = str_replace(" ","%20","$detail");
$detail1 = str_replace("%20"," ","$detail");
$detail1 = str_replace("$2$","&","$detail1");



 
$det = explode("&",$uri);
$det1 = $det[0]."&".$det[2];
$det1=trim($det1, "&");
//echo $det1;



echo '<div id="myModal" class="modal" style="display:block;">

  <div class="modal-content" style="top:25%;">
    <div class="modal-header">
     <a href="http://'.$ip.'/browser/public_html/index.php?username='.$username.'&destination='.$det1.'"> <span class="close">&times;</span></a>
      <h2>Delete</h2>

     

    </div>





      <div class="modal-body" id="modal-body">
      <form method="post" name="renameFile" action="" enctype="multipart/form-data"> 


      <div id="title" style="width:auto;"><p id="mTitle" style="clear:both">You sure you want to delete:</p></div>
<div id="tot" '.$recon1.'>
<br><br>
<p '.$rolo.'>"'.$detail1.'"</p>

</div>
      </div>






      <div class="modal-footer">

          <div id="bt"> <input type="submit"  id="rename" name="dell" value="DELETE"></div>  
           <div id="bt"> <input type="submit"  id="rename" name="cant" value="CANCEL"></div>       

         </form>


      </div>

     
  </div>

 </div>';


if(isset($_POST['dell'])){

$detail1 = str_replace("'","'\''","$detail1");

 $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= $x.'/';
                    }
$file = $x1.$detail1;

$cli = "rm -rf /var/www/html/'$file'";

exec($cli,$return);

//echo "sudo -u root -S rm -rf /var/www/html/$file < /var/www/html/adminPriv.secret";

$uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$det = explode("&",$uri);
$det1 = $det[0]."&".$det[2];


if (!$return) {
   header("Refresh:0; url=$det1");
}
}elseif(isset($_POST['cant'])){
  $uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$det = explode("&",$uri);
$det1 = $det[0]."&".$det[2];
  header("Refresh:0; url=$det1");
}


}

?>

<div id="widget">

<?php
if(isset($_GET['detail'])){
  
 $detail=$_GET['detail'];
 $detail = str_replace(" ","%20","$detail");
//echo $url.$detail;

//$arr = explode('/', $url);
//$dd = $arr[3];
//echo $dd;


$x1 = null;
  foreach ($a as $x) {
                $x1 .= $x.'/';
                     }

//echo "x1 = ".$x1 ;

//echo $detail;


 //$length = strlen(file_get_contents($url.$detail));

// echo $length;

$fName=trim($detail, '/');
$fName = explode('/', $fName);
$fName = array_pop($fName);
$fName = str_replace("%20"," ","$fName");
$fName = str_replace("$2$","&","$fName");



$name = explode('.', $detail);
$extension = array_pop($name);

if(strpos($extension, '/')){

//echo "/var/www/html/browser/resources/images/folder.png";

echo "<img src='../resources/images/folder.png' height='$fold' style='padding-top:".$base1.";padding-left:".$base.";'>";

echo "<h3>Name<span>".$fName."</span></h3>";
//echo "in";

$detail1 = str_replace("%20"," ","$detail");
$detail1 = str_replace("$2$","&","$detail1");
$terminal = 'du -sh "/var/www/html/'.$x1.$detail1.'"';

 $fSize= exec($terminal);

$fSize = explode('/', $fSize);
$fSize = $fSize[0];


if(strpos($fSize, 'K')){
$fSize = explode('K', $fSize);
$fSize = $fSize[0];
echo "<h3>Size <span>".$fSize . "KB<span></h3>";
}
elseif(strpos($fSize, 'M')){
$fSize = explode('M', $fSize);
$fSize = $fSize[0];
echo "<h3>Size <span>". $fSize . "MB<span></h3>";
}
elseif(strpos($fSize, 'G')){
$fSize = explode('G', $fSize);
$fSize = $fSize[0];
echo "<h3>Size <span>". $fSize . "GB<span></h3>";
}


else{
  echo "<h3>Size <span> 0 Bytes<span></h3>";

}



}

else{

$detail1 = str_replace("%20"," ","$detail");
$detail1 = str_replace("$2$","&","$detail1");
$detail6 = str_replace("'","''","$detail1");
//echo $detail6;


if($extension == "mp3" || $extension == "octet-stream"){

echo "<img src='../resources/images/mp3.png' height='$fold' style='padding-top:".$base1.";padding-left:".$base.";' >";
}
elseif($extension == "mp4" || $extension == "mkv" || $extension == "avi" || $extension == "wmv" || $extension == "MP4"){

  $query = query("SELECT * FROM browser_thumbnails WHERE vedio_name = '{$detail6}'");
         confirm($query);
         if(mysqli_num_rows($query) == 1 ){
          //echo "in";
         
           while($row = fetch_array($query)){
          
               echo "<img src='trash/{$row['thumbnail']}' height='$fold' style='padding-top:".$base1.";padding-left:".$base.";'>";
            }



  }

else{

  }
}
elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif"){

//echo $ip;

echo "<center><img src='http://".$ip."/".$x1.$detail6."' height='".$hgt."' style='padding-top:5px;'></center>";
}
else{

echo "<img src='../resources/images/document.png' height='$fold' style='padding-top:".$base1.";padding-left:".$base.";'>";
}

//echo "<br>".$detail1."<br>";

echo "<h3 style='padding-top:20px;'>Name<span>".$fName."<span></h3>";

    
    $terminal = 'du -sh "/var/www/html/'.$x1.$detail1.'"';

 $fSize= exec($terminal);


$fSize = explode('/', $fSize);
$fSize = $fSize[0];

if(strpos($fSize, 'K')){
$fSize = explode('K', $fSize);
$fSize = $fSize[0];
echo "<h3>Size <span>".$fSize . "KB<span></h3>";
}
elseif(strpos($fSize, 'M')){
$fSize = explode('M', $fSize);
$fSize = $fSize[0];
echo "<h3>Size <span>". $fSize . "MB<span></h3>";
}
elseif(strpos($fSize, 'G')){
$fSize = explode('G', $fSize);
$fSize = $fSize[0];
echo "<h3>Size <span>". $fSize . "GB<span></h3>";
}


else{
  echo "<h3>Size <span> 0 Bytes<span></h3>";

}

 
 }


if(strpos($extension, '/')){
  echo "<h3>Type <span> Folder<span></h3>";
}

else
 {echo "<h3>Type <span>".$extension . "<span></h3>";
   $lastModified = remoteFileData($url.$detail);
   $lastModified = explode('G', $lastModified);
   $lastModified = $lastModified[0];
   if($lastModified == null){
    $lastModified = "unknown";
   }
 echo "<h3>Last Modified<span>".$lastModified."<span></h3>";
}



 if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
  list($width, $height) = getimagesize($url.$detail);
  echo "<h3>Width<span>" . $width . "<span></h3>";
  echo "<h3>Height<span>" .  $height . "<span></h3>";
 }

 elseif($extension == "mp4" || $extension == "mkv" || $extension == "avi" || $extension == "wmv"){
              $ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
 $cli = "$ffmpeg -i '$url$detail' 2>&1 | grep -oP 'Stream .*, \K[0-9]+x[0-9]+'";
 echo "<h3>Resolution<span>".exec($cli)."<span></h3>"; 
}



}

else{
  $pro= <<<_END

<div id="drive">
<img src="../resources/images/HDD1.png" id="drive1" height="90%">
</div>

<p>Hot Drive enables users to acess remote harddrive,cd,other usb devices connected to the server.</p>
<p>It also supports hot plugin.</p>
<p>This feature can be used for downloading or acessing remote files from the server to any device.</p>

_END;
       
       echo $pro;

}
?>

<center><div class="chart" id="graph" data-percent="<?php echo $dp; ?>" style="padding-top: 15%;"></div></center>


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

        <div class='prgtext'><p><?php echo $dp; ?>% Disk Used</p></div>
       
        <div class='prginfo'>
              <p><?php echo "$du of $dt used"; ?></p>
                <p><?php echo "$df of $dt free"; ?></p>
                
        </div>









<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    // document.getElementById("search").style.visibility = "hidden";

     document.getElementById("topbar").style.height = '8%';
     document.getElementById("core").src="../../mediaRIP/raw/pics/mediaRIP.png";
     document.getElementById("core").style.height = '25px';
      document.getElementById("sBar").style.top = '32px';
   
       document.getElementById("drive1").height= '0px';

       document.getElementById("mp").style.paddingLeft='20px';
        

}else{
  document.getElementById("search").style.visibility = "visible";
}

</script>






</body>
</html>
