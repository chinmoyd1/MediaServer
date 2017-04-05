<?php require_once("../resources/config.php");
$username = get_user();
?>

<head>
<link rel="icon" type="image/gif/png" href="../raw/pics/cassette.png" height="13%">
<title>mediaRIP</title>
<script type="text/javascript">
  var j=0;
</script>>
</head>

<body bgcolor="black"> 

<div id='sky' style='z-index:20;position:fixed;top:5%;right:0;'>
<ul>
<li style="float:right;margin-right: 2%;margin-top: -0.1%;">

    <form method='post'  action='' enctype='multipart/form-data'>   
     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
       <input type='image' src='../raw/pics/delete.png' name='delete' style='z-index:20;position:fixed;top:2%;right:1%;height:3.3%'  value=''>
    </form>
</li>

<li style="float:right;margin-right: 2%;margin-top: -0.1%;">

    <form method='post'  action='' enctype='multipart/form-data'>   
     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
       <input type='image' src='../raw/pics/rotate.png' name='rotate' style='z-index:20;position:fixed;top:2%;right:9%;height:3.3%'  value=''>
    </form>
</li>

</ul>
</div>

<?php $Id=escape_string($_GET['id']) ?>
<a href="<?php echo '/mediaRIP/public_html/viewImage.php?id='.$Id.'&username='.$username.'&download';?>"> <div id='del'>


     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
      <img  src='../raw/pics/download.png' id='del1' style='height:3.3%;;z-index:16;position:fixed;top:2.3%;right:5%;'  value=''> 
   
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
        echo $cli;
        exec($cli);

    }


    endwhile;     



     $query = query(" DELETE FROM media WHERE media_id = $Id ");
    
    confirm($query);


    $det1='welcome.php?images&username='.$username;
   header("Refresh:0; url=$det1");

}
else{
   // echo 'no luck';
}
?>

<?php
    $query = query(" SELECT * FROM media WHERE media_id = " . escape_string($_GET['id']) . " ");
    
    confirm($query);
      while($row = fetch_array($query)):
      $pic = $row['media_location'];
      echo $pic.'<br>';
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
           $pic = '/external'.$x1;
         }
         else if(file_exists($exist1)){
         // echo $exist1."exists";

          $pic = '/external1'.$x1;

         }
         else if(file_exists($exist2)){
         // echo $exist2."exists";
           $pic = '/external2'.$x1;
         }
         else if(file_exists($exist3)){
         // echo $exist3."exists";
            $pic = '/external3'.$x1;
         }
       

  }
  }
   endwhile;

?>


<?php

$u="http://$ip$pic";

echo $u;
//echo "<script>alert('$u')<script>";

list($width, $height) = getimagesize($u);

echo "Image width " .$width;
echo "<BR>";
echo "Image height " .$height;
echo "<BR>";


?>


 <center> <img id="ImgId" src="<?php echo "http://$ip$pic"; ?>" /></center>

  <script>
var screenWidth = window.outerWidth;
var screenHeight = window.outerHeight;
//window.alert(screenWidth);
//window.alert(screenHeight);



if (screenWidth<screenHeight){
//window.alert("phone");

	

   document.getElementById('ImgId').width=1000;



}
else
	{

   
	
//window.alert(w);

  
  <?php

if(isset($_POST['rotate_x'])){
    echo"if (screenWidth<1000){
      j=1;
}else{
  document.getElementById('ImgId').height= screenHeight;
  document.getElementById('ImgId').width= auto;}";
 

}else{
  echo "document.getElementById('ImgId').width= 1200;";
}
?>


  
  //document.getElementById('ImgId').width= "";
   

	}
</script>







<?php 

//download('/var/www/html/mediaRIP/uploads/312634852.mp3');
if(isset($_GET['download'])){


$Id = escape_string($_GET['id']);
    // echo $Id;



    $query = query(" SELECT * FROM media WHERE media_id = $Id ");
    confirm($query);

    // echo"<script>alert('$Id');</script>";
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




<script>
if (screenWidth<1000){
  if(j==0){
   document.getElementById('ImgId').height= 350;
   document.getElementById('ImgId').width= 600;
 }else{
  document.getElementById('ImgId').height= 350;
  document.getElementById('ImgId').width= auto;
 }

    document.getElementById('del1').height= 15;
}
</script>

</body>