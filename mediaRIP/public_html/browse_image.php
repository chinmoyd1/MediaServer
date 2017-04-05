<?php require_once("../resources/config.php");?>


<html><head>
	
<!DOCTYPE html>
<html>
<head>

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
  width:90%;
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
	$query = query(" SELECT * FROM media WHERE media_category_id = 4");
	confirm($query);


//echo $ip;

if(isset($_GET['username'])){
  $admin=escape_string($_GET['username']) ;
while($row = fetch_array($query)){
$ex = $row['media_location'];
$explode = explode('/',$ex);
$ex1 = $explode[1];



if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){

//echo $ex;
$exist = '../..'.$ex;
	if(file_exists($exist)){
		$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="viewImage.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.{$row['media_location']}" height="130px">
 					  
 					  </a>
 					  </div>
_END;
       		echo $pro;
	}
	else 
	{	
		 $pic = $row['media_location'];
   	     //echo $pic.'<br>';
         $ex = $row['media_location'];
         $explode = explode('/',$ex);
         $ex1 = $explode[1];
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
	$xxx = '/external'.$x1;
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="viewImage.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.$xxx" height="130px">
 					  
 					  </a>
 					  </div>
_END;
       		echo $pro;         }
         else if(file_exists($exist1)){
         //	echo $exist1."exists";
         	//echo $row['media_location'].'<br>';
         	$xxx = '/external1'.$x1;
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="viewImage.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.$xxx" height="130px">
 					  
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist2)){
         //	echo $exist2."exists";
         	$xxx = '/external2'.$x1;
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="viewImage.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.$xxx" height="130px">
 					  
 					  </a>
 					  </div>
_END;
       		echo $pro;
         }
         else if(file_exists($exist3)){
         //	echo $exist3."exists";
      	$xxx = '/external3'.$x1;
         	$pro= <<<_END
    				  <div id="item" style="float:left">
     				  <a href="viewImage.php?id={$row['media_id']}&username=$admin">
 	   				  <img src="http://{$ip}.$xxx" height="130px">
 					  
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
      <a href="viewImage.php?id={$row['media_id']}&username=$admin">
 	    <img src="http://{$ip}.{$row['media_location']}" height="130px">
 	
 		
 		</a>
 		
 	  
  	    </div>
_END;
       
       echo $pro;
    }
	}

}


else{
	while($row = fetch_array($query)){
		$pro= <<<_END
      <div id="item" style="float:left">
      <a href="viewImage.php?id={$row['media_id']}">
      <img src="http://{$ip}.{$row['media_location']}" height="130px">
 		
 		</a>
 		
  	    </div>

_END;
       
       echo $pro;
	}}



?>
</body>
</html>