<?php require_once("../resources/config.php");?>
<?php 
$username = get_user();

?>

<html><head>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
<style>

#drives{
  padding-top: 4%;
  padding-left: 12%;

}

#drives a{
  text-decoration: none;
  color:#ABABAB;
  font-family:'Open Sans', sans-serif;
  font-size:80%;
}
#drives ul li{
  padding:20px ;
  float:left;
   width: 250px;
   list-style: none;

}
#usb{
  float: left;

}
h6{
  color:#5C5C5C;
  font-size: 12px;
  padding-top: 2px;
}
h1{
  padding-top: 7px;
  font-size: 15px;
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

function formatSize( $bytes )
{
        $types = array( 'B', 'KB', 'MB', 'GB', 'TB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $types ) -1 ); $bytes /= 1024, $i++ );
                return( round( $bytes, 2 ) . " " . $types[$i] );
}


?>
<div id="drives">
<ul>
<li>


<?php
$exist = fileExist('../../external');
if($exist == '1'){
    echo "<a  href='http://".$ip."/miniBrowser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external626'><div id='usb'><img src="; 
  echo "../resources/images/usb1.png height='50px'></div>";
  echo "<h1>USB 0 ( Mass storage )</h1>";



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


 echo "<h6>$du of $dt used</h6>"; 



                
}
else{
    echo "<a href='#'><div id='usb'><img src="; 
  echo "../resources/images/usb.png height='50px'></div>";
  echo "<h1>USB 0 ( Mass storage )</h1>";

  echo "<h6>Disconnected</h6>";

}
?>
 



</a></li>


<li>

<?php
$exist = fileExist('../../external1');
if($exist == '1'){

  echo "<a  href='http://".$ip."/miniBrowser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external1626'><div id='usb'><img src="; 
  echo "../resources/images/usb1.png height='70px'></div>";
  echo "<h1>USB 1 ( Mass storage )</h1>";



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
  echo "../resources/images/usb.png height='50px'></div>";
  echo "<h1>USB 1 ( Mass storage )</h1>";
 
  echo "<h6>Disconnected</h6>";
}
?>

</a></li>

<li>

<?php
$exist = fileExist('../../external2');
if($exist == '1'){
    echo "<a  href='http://".$ip."/miniBrowser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external2626'><div id='usb'><img src="; 
  echo "../resources/images/usb1.png height='50px'></div>";
  echo "<h1>USB 2 ( Mass storage )</h1>";



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
  echo "../resources/images/usb.png height='50px'></div>";
  echo "<h1>USB 2 ( Mass storage )</h1>";

  echo "<h6>Disconnected</h6>";
}
?>

</a></li>

<li>

<?php
$exist = fileExist('../../external3');
if($exist == '1'){
    echo "<a  href='http://".$ip."/miniBrowser/public_html/index.php?username=".$username."&destination=http323".$ip1."626external3626'><div id='usb'><img src="; 
  echo "../resources/images/usb1.png height='50px'></div>";
  echo "<h1>USB 3 ( Mass storage )</h1>";



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
  echo "../resources/images/usb.png height='50px'></div>";
  echo "<h1>USB 3 ( Mass storage )</h1>";
 
  echo "<h6>Disconnected</h6>";
}
?>

</a></li>

</ul>





</div>



</body>
</html>