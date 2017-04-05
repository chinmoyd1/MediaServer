<?php require_once("../resources/config.php"); ?>

<html>
<head>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
<style>


</style>
</head>
<body>

<script>var y =1;</script>

 
<button onclick="addEpisodes()">+add more episodes</button>

<form method='post' name='me' action='' enctype='multipart/form-data'> 

<input type='submit'  id='uploadSubmit' name='tv' value='UPLOAD' >

<p>Enter Season</p>
<input type="text" name="season" required >



<p>Episode List</p>
<p>
<input type='file' id='video' name='video[]'  multiple='multiple' >
</p>
<script>
function addEpisodes() {
    
    var x = document.createElement("INPUT");
    x.setAttribute("type", "file","id","video","name","vdeo"+y);
    document.body.appendChild(x);
    alert(y);
    y++;

}
</script>
</form>
<?php


if(isset($_POST['tv']))
  {

    //$ip = "http://192.168.1.102";

    $cmd2 = "hostname -I";
    $ip6 = exec($cmd2);
    $arr3 = explode(" ", $ip6);
    //echo $ip5;
    $ip1 = $arr3[0];

    $media_title = escape_string($_POST['season']);

 for($i=0; $i<count($_FILES['video']['name']); $i++) {

 $tmp = $_FILES['video']['tmp_name'][$i];
          $random_name = rand();

          
            
      
          //  echo $name;
          //  echo $type;

          $message = "Sucessfully Uploaded!";

            echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

          echo "<br>$message";
          echo "<br>Upload: " . $_FILES["video"]["name"][$i] . "<br>";
          $type = $_FILES["video"]["type"][$i] ;
              echo "Type: " . $_FILES["video"]["type"][$i] . "<br>";
              echo "Size: " . number_format((float)($_FILES["video"]["size"][$i] / 1048576), 2, '.', '') . " MB<br>";

              echo '<div style="padding-bottom:5%;"></div>';


              $volume = $_FILES["video"]["size"][$i];

              $arr = explode("/", $type);
          $last = $arr[1];
          //echo $last;

  
          move_uploaded_file($tmp, '../uploads/'.$random_name.".".$last);

            
        
}
}



?>







</body>
</html>


