<?php require_once("../resources/config.php");?>

<?php 

?>
<html><head>
</head>
<body>
<div id="fly">
<form method='post'  action='' enctype='multipart/form-data'>   
     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
       <input type='image' id='fly1' src='../raw/pics/delete.png' name='delete' style='height:18px;;z-index:16;position:fixed;top:3.2%;right:5%;'  value=''>
    </form>


</div>
<?php $Id=escape_string($_GET['id']) ?>
<a href="<?php echo 'welcome.php?music&username='.$username.'&id='.$Id.'&download';?>"> <div id='del'>


     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
      <img  src='../raw/pics/download.png' id='del1' style='height:18px;;z-index:16;position:fixed;top:3.2%;right:2%;'  value=''> 
   
</div></a> 
<?php
/*if(isset($_POST['download_x'])){

     $Id = escape_string($_GET['id']);
    // echo $Id;

    $query = query(" SELECT * FROM music WHERE id = $Id ");
    confirm($query);
      while($row = fetch_array($query)):
      $locate = $row['music_location'];
       $ex = $row['music_location'];
       $explode = explode('/',$ex);
       $ex1 = $explode[1];

   // echo $ex1;
    if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){
        $exist = '/var/www/html'.$ex;
       if(file_exists($exist)){
      
        $file='/var/www/html'.$locate;

      } else { 
    unset($explode[0]);
    unset($explode[1]);

    $x1 = null;
                    foreach ($explode as $x) {
                      $x1 .= '/'.$x;
                    }
         $exist0 = '/var/www/html/external'.$x1;
         $exist1 = '/var/www/html/external1'.$x1;
         $exist2 = '/var/www/html/external2'.$x1;
         $exist3 = './var/www/html/external3'.$x1;
         if(file_exists($exist0)){
         // echo $exist0."exists";
           $file = $exist0;
         }
         else if(file_exists($exist1)){
         // echo $exist1."exists";

          $file = $exist1;

         }
         else if(file_exists($exist2)){
         // echo $exist2."exists";
           $file = $exist2;
         }
         else if(file_exists($exist3)){
         // echo $exist3."exists";
            $file = $exist3;
         }
       }

    }else{
 
      $file='/var/www/html'.$locate;
    }


    endwhile;     
//echo"<script>alert('$file');</script>";

//download($file);

    
  }*/


?>
<?php

if(isset($_POST['delete_x'])){

     $Id = escape_string($_GET['id']);
    // echo $Id;

    $query = query(" SELECT * FROM music WHERE id = $Id ");
    confirm($query);
      while($row = fetch_array($query)):
      $file = $row['music_location'];
       $ex = $row['music_location'];
       $explode = explode('/',$ex);
       $ex1 = $explode[1];

   // echo $ex1;
    if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){

    }else{
    
        $cli = "rm -rf /var/www/html'$file'";
      //  echo $cli;
        exec($cli);

    }


    endwhile;     

  $query = query(" DELETE FROM music WHERE id = $Id ");
    
  confirm($query);


    $det1='welcome.php?music&username='.$username;
   header("Refresh:0; url=$det1");

}
else{
   // echo 'no luck';
}
?>


<ul>
<?php
	$query = query(" SELECT * FROM music ");
	confirm($query);


//echo $ip;


  $admin=escape_string($_GET['username']) ;
while($row = fetch_array($query)){

  $ex = $row['music_location'];
  $explode = explode('/',$ex);
  $ex1 = $explode[1];
 // echo $ex1;





if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){
  $exist = '../..'.$ex;

  $song = $row['track_name'];


  if(file_exists($exist)){
      $pro= <<<_END

      <div id="mp3" >
      <li>
      <a href="welcome.php?music&username=$admin&id={$row['id']}">
       <div id="artist">
      <img src="{$row['album_art']}" height="55px">
       </div>
    <h1>$song</h1>
    <p>{$row['singer']}</p>
  
    </a>
    
    
        </div>
        </li>
_END;
       
       echo $pro;
  } else { 
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

      <div id="mp3" >
      <li>
      <a href="welcome.php?music&username=$admin&id={$row['id']}">
       <div id="artist">
      <img src="{$row['album_art']}" height="55px">
       </div>
    <h1>$song</h1>
    <p>{$row['singer']}</p>
  
    </a>
    
    
        </div>
        </li>
_END;
       
       echo $pro;
         }
         else if(file_exists($exist1)){
         // echo $exist1."exists";
          $pro= <<<_END
               <div id="mp3" >
      <li>
      <a href="welcome.php?music&username=$admin&id={$row['id']}">
       <div id="artist">
      <img src="{$row['album_art']}" height="55px">
       </div>
    <h1>$song</h1>
    <p>{$row['singer']}</p>
  
    </a>
    
    
        </div>
        </li>
_END;
          echo $pro;
         }
         else if(file_exists($exist2)){
         // echo $exist2."exists";
          $pro= <<<_END
              <div id="mp3" >
      <li>
      <a href="welcome.php?music&username=$admin&id={$row['id']}">
       <div id="artist">
      <img src="{$row['album_art']}" height="55px">
       </div>
    <h1>$song</h1>
    <p>{$row['singer']}</p>
  
    </a>
    
    
        </div>
        </li>
_END;
          echo $pro;
         }
         else if(file_exists($exist3)){
         // echo $exist3."exists";
          $pro= <<<_END
               <div id="mp3" >
      <li>
      <a href="welcome.php?music&username=$admin&id={$row['id']}">
       <div id="artist">
      <img src="{$row['album_art']}" height="55px">
       </div>
    <h1>$song</h1>
    <p>{$row['singer']}</p>
  
    </a>
    
    
        </div>
        </li>
_END;
          echo $pro;
         }
         else{

         }

  }
}
	else{
    $pro= <<<_END
     <div id="mp3" >
      <li>
      <a href="welcome.php?music&username=$admin&id={$row['id']}">
       <div id="artist">
      <img src="{$row['album_art']}" height="55px">
       </div>
    <h1>{$row['track_name']}</h1>
    <p>{$row['singer']}</p>
  
    </a>
    
    
        </div>
        </li>
_END;
       
       echo $pro;
    }
}









?>
</ul>






<div id="playYard">


<?php
if(isset($_GET['id'])){
    $query = query(" SELECT * FROM music WHERE id = " . escape_string($_GET['id']) . " ");

    $ID = escape_string($_GET['id']);
    
    confirm($query);
      while($row = fetch_array($query)):
      $audio = $row['music_location'];
  	  $albumart = $row['album_art'];

    $track_name = $row['track_name'];
   

    $singer = $row['singer']; 
  
    $ex = $row['music_location'];
    $explode = explode('/',$ex);
    $ex1 = $explode[1];

   // echo $ex1;
    if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){
      $exist = '../..'.$ex;
     if(file_exists($exist)){
      //echo 'exists';
      } else 
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
         // echo $exist0."exists";
           $audio = '/external'.$x1;
         }
         else if(file_exists($exist1)){
         // echo $exist1."exists";

          $audio = '/external1'.$x1;

         }
         else if(file_exists($exist2)){
         // echo $exist2."exists";
           $audio = '/external2'.$x1;
         }
         else if(file_exists($exist3)){
         // echo $exist3."exists";
            $audio = '/external3'.$x1;
         }
       

  }
    }
    
   endwhile;

   $musical= <<<_END
   <img src="$albumart" height="300px" id='pp'>

   <audio id="audioPlayer" controls="controls" autoplay loop>
  <source src="http://$ip$audio" type="audio/mpeg" />
</audio>

<h1>$track_name</h1>
<p>$singer</p>



_END;
       
       echo $musical;

}
else{
	
	$query = query(" SELECT * FROM music WHERE id =  (SELECT MIN(id) FROM music)" );
    
    confirm($query);
      while($row = fetch_array($query)):
      $audio = $row['music_location'];
  	  $albumart = $row['album_art'];

    $track_name = $row['track_name'];
    $singer = $row['singer']; 

   endwhile;

   $musical= <<<_END
   <img src="$albumart"  height="300px" id='pp'>
   
   <audio id="audioPlayer" controls="controls">
  <source src="http://$ip$audio" type="audio/mpeg" />
</audio>
<h1>$track_name</h1>
<p>$singer</p>


_END;
       
       echo $musical;

}


?>

<!--<ul id="playlist">

<?php
/*
$query = query(" SELECT * FROM music ");
	confirm($query);
while($row = fetch_array($query)){

	$audio = $row['music_location'];
	$track_name = $row['track_name'];
	$ID = $row['id'];
	$albumart=	$row['album_art'];
		
$mui= <<<_END
<img src="$albumart">
<li><a href="http://$ip$audio">$track_name</a></li>

_END;

echo $mui;

}
*/
?>


</ul>-->



<script src="../raw/js/jquery-2.2.0.js">
</script>




<script>
var aud = document.getElementById("audioPlayer");
aud.volume = 0.1;




</script>




</div>

<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
  a = 1;
   document.getElementById("pp").style.height = '220px';
   document.getElementById("pp").style.width = '220px';

   var aud = document.getElementById("audioPlayer");
   aud.volume = 0.8;
   aud.style.width="220px";
   document.getElementById("playYard").style.right = '-16%';
    document.getElementById("mp3").style.marginBottom = '5%';

     document.getElementById("fly1").style.right = '8%';
     document.getElementById("del1").style.right = '3%';
     document.getElementById("fly1").style.height = '12px';
      document.getElementById("del1").style.height = '13px';
      document.getElementById("fly1").style.top = '2.5%';
      document.getElementById("del1").style.top = '2.5%';
   
}
</script>


<?php 

//download('/var/www/html/mediaRIP/uploads/312634852.mp3');
if(isset($_GET['download'])){

$Id = escape_string($_GET['id']);
    // echo $Id;

    $query = query(" SELECT * FROM music WHERE id = $Id ");
    confirm($query);
      while($row = fetch_array($query)):
      $locate = $row['music_location'];
       $ex = $row['music_location'];
       $explode = explode('/',$ex);
       $ex1 = $explode[1];

   // echo $ex1;
    if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){
        $exist = '/var/www/html'.$ex;
       if(file_exists($exist)){
      
        $file='/var/www/html'.$locate;

      } else { 
    unset($explode[0]);
    unset($explode[1]);

    $x1 = null;
                    foreach ($explode as $x) {
                      $x1 .= '/'.$x;
                    }
         $exist0 = '/var/www/html/external'.$x1;
         $exist1 = '/var/www/html/external1'.$x1;
         $exist2 = '/var/www/html/external2'.$x1;
         $exist3 = './var/www/html/external3'.$x1;
         if(file_exists($exist0)){
         // echo $exist0."exists";
           $file = $exist0;
         }
         else if(file_exists($exist1)){
         // echo $exist1."exists";

          $file = $exist1;

         }
         else if(file_exists($exist2)){
         // echo $exist2."exists";
           $file = $exist2;
         }
         else if(file_exists($exist3)){
         // echo $exist3."exists";
            $file = $exist3;
         }
       }

    }else{
 
      $file='/var/www/html'.$locate;
    }


    endwhile;     
//echo"<script>alert('$file');</script>";

download($file);






//header('Content-disposition: attachment; filename="'.$detail1.'"');
//readfile($FileName);



}
?>

</body>
</html>