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

</style>
 <!--<script src="S2xWVQ9r.js"></script>-->
</head>

<body>




<center>

<div id="vid">



<video  width="100%" height="100%" controls="controls" autoplay>
  <source src="<?php echo "$url"; ?>" type="video/mp4" />
</video>



</div>
</center>


<script>
if (screenWidth<1000){
  var screenWidth = window.outerWidth;

}
</script>



</body>