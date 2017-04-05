<?php require_once("../resources/config.php");?>


<html><head>
	
<style>
#item a{
  text-decoration: none;

}
#item{
padding-left: 0.3%;
}
#name{
  font-family: sans-serif;
  font-size: 13px;
  color:#CFCFCF;
  width:86px;
  word-wrap: break-word;
    overflow:hidden;
    height:24px;
    padding-top: 3%;
    padding-bottom: 5%;
}
</style>

<script type="text/javascript">
  document.cookie = "b=0";
    var screenWidth = window.outerWidth;
if (screenWidth<1000){
               document.cookie = "b=1";
             
                }

<?php
//echo 'a';
 $b = $_COOKIE["b"];
  // echo $b;
   if($b==1){
    $base = '35%';
   }
   else{
    $base = '40%';
     
   }
?>
</script>
	
</head>
<body>


<?php
	$query = query(" SELECT * FROM tvSeries ;");
	confirm($query);


//echo $ip;

if(isset($_GET['username'])){
  $admin=escape_string($_GET['username']) ;
while($row = fetch_array($query)){
		

$ex = $row['media_location'];
$explode = explode('/',$ex);
$ex1 = $explode[1];

//echo $ex1;

if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){

//echo $ex;
$exist = '../../'.$ex;
	if(file_exists($exist)){
		$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="eplist.php?id={$row['uniqueId']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['poster']}" height=$base>
 					  <div id="name">{$row['title']}</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
	}
	else 
	{	
		unset($explode[1]);
		

		$x1 = null;
                    foreach ($explode as $x) {
                      $x1 .= '/'.$x;
                    }
        // echo $x1;

         $exist0 = '../../external'.$x1;
         $exist1 = '../../external1'.$x1;
         $exist2 = '../../external2'.$x1;
         $exist3 = '../../external3'.$x1;
         if(file_exists($exist0)){
         	//echo $exist0."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="eplist.php?id={$row['uniqueId']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['poster']}" height=$base>
 					  <div id="name">{$row['title']}</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist1)){
         //	echo $exist1."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="eplist.php?id={$row['uniqueId']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['poster']}" height=$base>
 					  <div id="name">{$row['title']}</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist2)){
         //	echo $exist2."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="eplist.php?id={$row['uniqueId']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['poster']}" height=$base>
 					  <div id="name">{$row['title']}</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist3)){
         //	echo $exist3."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="eplist.php?id={$row['uniqueId']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['poster']}" height=$base>
 					  <div id="name">{$row['title']}</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else{

         }

	}

}
else{
		
      	$pro= <<<_END
      <div id="item" style="float:left">
      <a href="eplist.php?id={$row['uniqueId']}&username=$admin">
 	    <img src="http://{$ip}.{$row['poster']}" height=$base>
 		<div id="name">{$row['title']}</div>
 		
 		</a>
 		
 	  
  	    </div>
_END;
       
       echo $pro;

    }
	}

}




?>
</body>
</html>