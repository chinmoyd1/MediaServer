<?php require_once("../resources/config.php");
if(isset($_GET['destination'])){
  
 $url=$_GET['destination'];
 $url = str_replace("323","://","$url");
 $url = str_replace("999",".","$url");
 $url = str_replace("626","/","$url");
 $url = str_replace("$2$","&","$url");

//echo "$url";

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
  //  echo "/".$value;
      $a[$i] = $value;
      $i++;
  }
}


   $x1 = null;
                    foreach ($a as $x) {
                      $x1 .= '/'.$x;
                    }

//echo $x1;


}
$explode = explode('/', $x1);
$type = array_pop($explode);

//echo $type;
?>

<head>

 <link rel="icon" type="image/gif/png" href="../../mediaRIP/raw/pics/cassette.png" height="13%">
<title>mediaRIP</title>
<link href="../../mediaRIP/raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
<style>

#FImage{height: 100%;
position:fixed;
top: 0;
left:0;
z-index: -3;
-webkit-filter: blur(7px);
filter: blur(7px);
}
#FileImage{
  z-index: 6;
  padding-left: 15px;
  padding-top: 24px;
}
#vid{
  width:580px;
  height:200px;
     background-color:rgba(0,0,0,0.2); 
}
#alm{
  
  position: absolute;
}
#det{
  
  position: absolute;
  padding-left:172px;
  padding-top: 24px;
  
}
#det p{
  text-align: left;
   font-family:'Open Sans', sans-serif;
   font-weight: 600;
   color:#EDEDED;
}
#audacity{
  padding-left: 120px;
  padding-top: 142px;
}
</style>
 <!--<script src="S2xWVQ9r.js"></script>-->
</head>

<body>




<center><div id="vid" style="margin-top: 3.6%;">




<?php
require_once('getID3-1.9.12/getid3/getid3.php');
$getID3 = new getID3;

$file="/var/www/html".$x1;
  
 set_time_limit(30);
    $ThisFileInfo = $getID3->analyze($file);
    getid3_lib::CopyTagsToComments($ThisFileInfo);
  
   //echo 'File name: '.$ThisFileInfo['filenamepath'].'<br>';
  $Artist=(!empty($ThisFileInfo['comments_html']['artist']) ? implode('<BR>', $ThisFileInfo['comments_html']['artist']) : '&nbsp;');
if($Artist == "&nbsp;"){
  $Artist=$type;
}

  $Title=(!empty($ThisFileInfo['comments_html']['title']) ? implode('<BR>', $ThisFileInfo['comments_html']['title'])  : '&nbsp;');
  $Bitrate=(!empty($ThisFileInfo['audio']['bitrate']) ? round($ThisFileInfo['audio']['bitrate'] / 1000).' kbps'   : '&nbsp;');
  $Play_time=(!empty($ThisFileInfo['playtime_string']) ? $ThisFileInfo['playtime_string']                          : '&nbsp;');
if($Title == "&nbsp;"){
  $Title=null;
}

  $OldThisFileInfo = $getID3->analyze($file);
  if(isset($OldThisFileInfo['comments']['picture'][0])){
     $Image='data:'.$OldThisFileInfo['comments']['picture'][0]['image_mime'].';charset=utf-8;base64,'.base64_encode($OldThisFileInfo['comments']['picture'][0]['data']);
   //  echo "image = ".$Image;
    

  }
  else{
  $Image="../resources/images/music.jpg";
}




  ?>

<div id="alm">
  <img id="FileImage" width="150" src="<?php echo @$Image;?>" height="150">
</div>
  
 <div id="det">
<p><?php echo $Artist ?></p>
<p><?php echo $Title ?></p>
<p><?php echo $Bitrate ?></p>

</div>

<div id="audacity">
<audio controls="controls" autoplay loop>
  <source src="<?php echo "$url"; ?>" type="audio/mpeg" />
</audio>

</div>

 

<img id="FImage" width="100%" src="<?php echo @$Image;?>" height="150">


</div></center>






</body>