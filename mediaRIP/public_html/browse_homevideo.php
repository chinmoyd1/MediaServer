<?php require_once("../resources/config.php");?>


<html><head>
	
<style>
#item a{
	text-decoration: none;

}
#item{
padding-left: 1%;
}
#name{
	font-family: sans-serif;
	font-size: 13px;
	color:#CFCFCF;
	width:200px;
	word-wrap: break-word;
    overflow:hidden;
    height:24px;
    padding-top: 3%;
    padding-bottom: 5%;
}
</style>
	
</head>
<body>


<?php
	$query = query(" SELECT * FROM media WHERE media_category_id = 5");
	confirm($query);


//echo $ip;

if(isset($_GET['username'])){
  $admin=escape_string($_GET['username']) ;
while($row = fetch_array($query)){

$ex = $row['media_location'];
$explode = explode('/',$ex);
$ex1 = $explode[1];



if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){

$caption = $row['media_title'];
    $plode = explode('/',$caption);
    $caption = array_pop($plode);

    $load = explode('.',$caption);
    array_pop($load);
    $x0 = null;
                    foreach ($load as $x00) {
                      $x0 .= $x00;
                    }
                    
    $caption = $x0;

//echo $ex;
$exist = '../..'.$ex;
	if(file_exists($exist)){
		$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="view_homevideo.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['media_image']}" width="100%">
 					  <div id="name">$caption</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
	}
	else 
	{	
		unset($explode[0]);
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
     				  <a href="view_homevideo.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['media_image']}" width="100%">
 					  <div id="name">$caption</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist1)){
         //	echo $exist1."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="view_homevideo.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['media_image']}" width="100%">
 					  <div id="name">$caption</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist2)){
         //	echo $exist2."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="view_homevideo.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['media_image']}" width="100%">
 					  <div id="name">$caption</div>
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist3)){
         //	echo $exist3."exists";
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="view_homevideo.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['media_image']}" width="100%">
 					  <div id="name">$caption</div>
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
      <a href="view_homevideo.php?id={$row['media_id']}&username=$admin">
 	    <img id="hvid" src="http://{$ip}.{$row['media_image']}" width="100%">
 		<div id="name">{$row['media_title']}</div>
 		
 		</a>
 		
 	  
  	    </div>
_END;
       
       echo $pro;
    }
	}

}




?>

<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    //document.getElementById("hvid").style.width = '50%';
}
</script>

</body>
</html>