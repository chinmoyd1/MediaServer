<?php require_once("../resources/config.php");

$username = get_user();
if(!$username){

  redirect("index.php");
}
?>

<head>

<link rel="icon" type="image/gif/png" href="../raw/pics/cassette.png" height="13%">
<title>mediaRIP</title>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body bgcolor="black">

<div id="fullSC">

<div id="topbar">

<div id="logo1">
<ul>




<li id="full1"  style="position:fixed;top:15;right:80;">

    <form method='post'  action='' enctype='multipart/form-data'>   
     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
       <input type='image' src='../raw/pics/fullscreen.png' name='fullscreen' id= 'full' style='height:2.5%;padding-top: 40%;'  value=''>
    </form>
</li>








<div id="l1"><li><a href="welcome.php?movies&username=<?php echo $username?>"><img src="../raw/pics/1.png" id="core"> <!--<p>MEDIA<span>RIP</span></p>--></li></a></div>




<li style="float:right; margin-top: 0.8%;margin-left: 2%;" id='unu'><a href="index.php"><img src="../raw/pics/user1.png" style="height:3%;" id='un'><button id="myBtn1"><?php echo $username;  ?>!</button></a></li>

<li style="float:right;margin-right: 2%;margin-top: -0.1%;">

    <form method='post'  action='' enctype='multipart/form-data'>   
     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
       <input type='image' src='../raw/pics/delete.png' name='delete' id= 'dwn' style='height:3.3%;padding-top: 40%;'  value=''>
    </form>
</li>


<?php $Id=escape_string($_GET['id']) ?>
<a href="<?php echo '/mediaRIP/public_html/view_homevideo.php?id='.$Id.'&username='.$username.'&download';?>"> <div id='del'>


     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
      <img  src='../raw/pics/download.png' id='del1' style='height:18px;;z-index:16;position:fixed;top:3.2%;right:14.8%;'  value=''> 
   
</div></a> 

<?php

if(isset($_POST['delete_x'])){

     $Id = escape_string($_GET['id']);
    // echo $Id;

     $query = query(" SELECT * FROM media WHERE media_id = $Id ");
    confirm($query);
      while($row = fetch_array($query)):
      $file = $row['media_location'];
       $ex = $row['media_location'];
       $explode = explode('/',$ex);
       $ex1 = $explode[1];

   // echo $ex1;
    if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){

    }else{
    
        $cli = "rm -rf /var/www/html'$file'";
       // echo $cli;
        exec($cli);

    }


    endwhile;     
     
     $query = query(" DELETE FROM media WHERE media_id = $Id ");
    
    confirm($query);


    $det1='welcome.php?homevideo&username='.$username;
    header("Refresh:0; url=$det1");

}
else{
   // echo 'no luck';
}
?>

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

</ul>



</div>



<?php
    $query = query(" SELECT * FROM media WHERE media_id = " . escape_string($_GET['id']) . " ");
    
    confirm($query);
      while($row = fetch_array($query)):
      $video = $row['media_location'];

      echo $video.'<br>';
$ex = $row['media_location'];
$explode = explode('/',$ex);
$ex1 = $explode[1];



if($ex1 == 'external' || $ex1 == 'external1' || $ex1 == 'external2' || $ex1 == 'external3'){

  
  $exist = '../..'.$ex;
     if(file_exists($exist)){
      //echo 'exists';
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
         // echo $exist0."exists";
           $video = '/external'.$x1;
         }
         else if(file_exists($exist1)){
         // echo $exist1."exists";

          $video = '/external1'.$x1;

         }
         else if(file_exists($exist2)){
         // echo $exist2."exists";
           $video = '/external2'.$x1;
         }
         else if(file_exists($exist3)){
         // echo $exist3."exists";
            $video = '/external3'.$x1;
         }
       

  }
  }
   endwhile;

?>

<center><div id="vid" style="margin-top: 3.6%;">

<video width="80%" height="75%" autoplay controls>
  <source src="<?php echo "http://$ip$video"; ?>" type="video/mp4">

</video>
</div></center>



<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    // document.getElementById("search").style.visibility = "hidden";

     document.getElementById("topbar").style.height = '8%';
     document.getElementById("core").src="../raw/pics/mediaRIP.png";
     document.getElementById("core").style.height = '90%';
     document.getElementById("dwn").style.top = '9%';
     document.getElementById("dwn").style.height = '40%';
    
    document.getElementById("un").style.height = '40%';
          document.getElementById("unu").style.marginRight = "2%";
          document.getElementById("myBtn1").style.cssFloat = "right";
          document.getElementById("myBtn1").style.marginTop= "3";
      
      document.getElementById("del1").style.top= "2%";
      document.getElementById("del1").style.right= "28%";
        document.getElementById("del1").style.height = '3.8%';

}else{
  document.getElementById("search").style.visibility = "visible";
}

</script>

<?php 

//download('/var/www/html/mediaRIP/uploads/312634852.mp3');
if(isset($_GET['download'])){

$Id = escape_string($_GET['id']);
    // echo $Id;

    $query = query(" SELECT * FROM media WHERE media_id = $Id ");
    confirm($query);
      while($row = fetch_array($query)):
      $locate = $row['media_location'];
       $ex = $row['media_location'];
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

</div>
<?php

if(isset($_POST['fullscreen_x'])){

  echo '<script>document.getElementById("fullSC").style.visibility = "hidden";
              document.getElementById("search").style.visibility = "hidden";</script>';

  echo '<div id="vdo" style="position:fixed;top:0;width:100%;overflow:hidden;"><video  width="100%" height="100%" controls="controls" autoplay>
  <source src="http://'.$ip.$video.'" type="video/mp4" />
</video></div>';



}
else{
   // echo 'no luck';
}
?>


<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
    // document.getElementById("search").style.visibility = "hidden";

     document.getElementById("full1").style.right = '25px';
     document.getElementById("full1").style.top = '7px';

        

}else{
  
}

</script>





</body>