<?php require_once("../resources/config.php");?>
<?php 
$username = get_user();
?>

<html><head>

<style>

#drives{
  padding-top: 2%;
  padding-left: 2%;
}

#drives a{
  text-decoration: none;
  color:#ABABAB;
  font-family:'Open Sans', sans-serif;
  font-size:80%;
}
#drives ul li{
  padding:50px ;
  float:left;
   width: 250px;

}
#usb{
  float: left;

}
h6{
  color:#5C5C5C;
}
h1{
  padding-top: 7px;
}
a:hover h1{
  color: #00FF04;
}
</style>
	
</head>
<body>

<?php 
    
$drv= "sh /var/www/html/mntDrv.sh";
exec($drv);


$drv1= "sh /var/www/html/mntDrv1.sh";
exec($drv1);

$drv2= "sh /var/www/html/mntDrv2.sh";
exec($drv2);



$ip1 = str_replace("://","323","$ip");
$ip1 = str_replace(".","999","$ip1");
$ip1 = str_replace("/","626","$ip1");

//echo $ip1;




?>
<div id="drives">
<ul>
<li id="a1">

<?php
$exist = fileExist('../../external');
if($exist == '1'){
    echo "<a  href='http://".$ip."/browser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external626'><div id='usb'><img src="; 
  echo "../raw/pics/usb1.png height='70px'></div>";
  echo "<h1>USB 0 ( Mass storage )</h1>";
  echo "<br>";


/* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external");
/* now we calculate the disk space used (in bytes) */
$du = $dt - $df;
/* percentage of disk used - this will be used to also set the width % of the progress bar */
$dp = sprintf('%.0f',($du / $dt) * 100);

/* and we formate the size from bytes to MB, GB, etc. */
$df = formatSize($df);
$du = formatSize($du);
$dt = formatSize($dt);

 echo "<h6>Disk Used $dp%</h6>";
 echo "<h6>$du of $dt used</h6>"; 
 echo "<h6>$df of $dt free</h6>"; 


                
}
else{
    echo "<a href='#'><div id='usb'><img src="; 
  echo "../raw/pics/usb.png height='70px'></div>";
  echo "<h1>USB 0 ( Mass storage )</h1>";
  echo "<br>";
  echo "<h6>Disconnected</h6>";

}
?>
 



</a></li>


<li id="a2">


<?php
$exist = fileExist('../../external1');
if($exist == '1'){

  echo "<a href='http://".$ip."/browser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external1626'><div id='usb'><img src="; 
  echo "../raw/pics/usb1.png height='70px'></div>";
  echo "<h1>USB 1 ( Mass storage )</h1>";
  echo "<br>";


/* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external1");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external1");
/* now we calculate the disk space used (in bytes) */
$du = $dt - $df;
/* percentage of disk used - this will be used to also set the width % of the progress bar */
$dp = sprintf('%.0f',($du / $dt) * 100);

/* and we formate the size from bytes to MB, GB, etc. */
$df = formatSize($df);
$du = formatSize($du);
$dt = formatSize($dt);

 echo "<h6>Disk Used $dp%</h6>";
 echo "<h6>$du of $dt used</h6>"; 
 echo "<h6>$df of $dt free</h6>"; 

                
}
else{
    echo "<a href='#'><div id='usb'><img src="; 
  echo "../raw/pics/usb.png height='70px'></div>";
  echo "<h1>USB 1 ( Mass storage )</h1>";
  echo "<br>";
  echo "<h6>Disconnected</h6>";
}
?>

</a></li>

<li id="a3">


<?php
$exist = fileExist('../../external2');
if($exist == '1'){
    echo "<a  href='http://".$ip."/browser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external2626'><div id='usb'><img src="; 
  echo "../raw/pics/usb1.png height='70px'></div>";
  echo "<h1>USB 2 ( Mass storage )</h1>";
  echo "<br>";


/* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external2");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external2");
/* now we calculate the disk space used (in bytes) */
$du = $dt - $df;
/* percentage of disk used - this will be used to also set the width % of the progress bar */
$dp = sprintf('%.0f',($du / $dt) * 100);

/* and we formate the size from bytes to MB, GB, etc. */
$df = formatSize($df);
$du = formatSize($du);
$dt = formatSize($dt);

 echo "<h6>Disk Used $dp%</h6>";
 echo "<h6>$du of $dt used</h6>"; 
 echo "<h6>$df of $dt free</h6>"; 

                
}
else{
    echo "<a href='#'><div id='usb'><img src="; 
  echo "../raw/pics/usb.png height='70px'></div>";
  echo "<h1>USB 2 ( Mass storage )</h1>";
  echo "<br>";
  echo "<h6>Disconnected</h6>";
}
?>

</a></li>

<li id="a4">


<?php
$exist = fileExist('../../external3');
if($exist == '1'){
    echo "<a  href='http://".$ip."/browser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external3626'><div id='usb'><img src="; 
  echo "../raw/pics/usb1.png height='70px'></div>";
  echo "<h1>USB 3 ( Mass storage )</h1>";
  echo "<br>";


/* get disk space free (in bytes) */
$df = disk_free_space("/var/www/html/external3");
/* and get disk space total (in bytes)  */
$dt = disk_total_space("/var/www/html/external3");
/* now we calculate the disk space used (in bytes) */
$du = $dt - $df;
/* percentage of disk used - this will be used to also set the width % of the progress bar */
$dp = sprintf('%.0f',($du / $dt) * 100);

/* and we formate the size from bytes to MB, GB, etc. */
$df = formatSize($df);
$du = formatSize($du);
$dt = formatSize($dt);

 echo "<h6>Disk Used $dp%</h6>";
 echo "<h6>$du of $dt used</h6>"; 
 echo "<h6>$df of $dt free</h6>"; 

                
}
else{
    echo "<a href='#'><div id='usb'><img src="; 
  echo "../raw/pics/usb.png height='70px'></div>";
  echo "<h1>USB 3 ( Mass storage )</h1>";
  echo "<br>";
  echo "<h6>Disconnected</h6>";
}
?>

</a></li>

</ul>





</div>

<script type="text/javascript">
var screenWidth = window.outerWidth;
if (screenWidth<1000){
  
document.getElementById("a1").style.paddingTop = "12px";
          document.getElementById("a1").style.paddingBottom="60px";
          document.getElementById("a1").style.paddingRight="0px";
           document.getElementById("a1").style.paddingLeft="0px";

           document.getElementById("a2").style.paddingTop = "12px";
          document.getElementById("a2").style.paddingBottom="60px";
          document.getElementById("a2").style.paddingRight="0px";
           document.getElementById("a2").style.paddingLeft="0px";

             document.getElementById("a3").style.paddingTop = "8px";
          document.getElementById("a3").style.paddingBottom="60px";
          document.getElementById("a3").style.paddingRight="0px";
           document.getElementById("a3").style.paddingLeft="0px";

             document.getElementById("a4").style.paddingTop = "8px";
          document.getElementById("a4").style.paddingBottom="60px";
          document.getElementById("a4").style.paddingRight="0px";
           document.getElementById("a4").style.paddingLeft="0px";
      
}
</script>



</body>
</html>