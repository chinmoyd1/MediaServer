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
  width:150px;
  word-wrap: break-word;
    overflow:hidden;
    height:35px;
    padding-top: 3%;
    padding-bottom: 5%;
}
</style>

</head>

<body id="bg">

<div id="topbar">

<div id="logo1">
<ul>
<div id="l1"><li><a href="welcome.php?movies&username=<?php echo $username?>"><img src="../raw/pics/1.png" id="core"> <!--<p>MEDIA<span>RIP</span></p>--></li></a></div>




<li style="float:right; margin-top: 0.8%;margin-left: 2%;" id='unu'><a href="index.php"><img src="../raw/pics/user1.png" style="height:3%;" id='un'><button id="myBtn1"><?php echo $username;  ?>!</button></a></li>

<li style="float:right;margin-right: 2%;margin-top: -0.1%;">

    <form method='post'  action='' enctype='multipart/form-data'>   
     <!--welcome.php?movies&username=<?php //echo $username;?>-->       
       <!--- <input type="text" placeholder="What are you looking for?">   -->
       <input type='image' src='../raw/pics/delete.png' name='delete' id= 'dwn' style='height:3.3%;padding-top: 40%;'  value=''>
    </form>
</li>


<?php

if(isset($_POST['delete_x'])){

     $Id = escape_string($_GET['id']);
    // echo $Id;


       $query = query(" SELECT * FROM episodes WHERE id = $Id ");
    confirm($query);
      while($row = fetch_array($query)):
       $file = $row['episode_location'];
       $ex = $row['episode_location'];
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



      $query = query(" DELETE FROM tvSeries WHERE uniqueId = $Id ");
    
     confirm($query);

      $query = query(" DELETE FROM episodes WHERE id = $Id ");
    
    confirm($query);

     $det1='welcome.php?tvseries&username='.$username;
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

<div id="episodeContainer">


<div id="seriesPoster">

<?php
$Id = escape_string($_GET['id']);
	$query = query(" SELECT * FROM tvSeries WHERE uniqueId = $Id ;");
	confirm($query);


//echo $ip;


 
while($row = fetch_array($query)){
		$pro= <<<_END
		
     
 	    <img src="http://{$ip}.{$row['poster']}" height="60%">
 		

 		
 		
 		
 	  
  	   
_END;
       
       echo $pro;
    $title = $row['title'];   
    $year = $row['year'];
    $rated = $row['rated']; 
    $released = $row['released'];
    $runtime = $row['runtime'];
    $genre = $row['genre'];
    $director = $row['director'];
    $writer = $row['writer'];
    $actor = $row['actor'];
    $plot = $row['plot'];
    $language = $row['language'];
    $country = $row['country'];
    $awards = $row['awards'];	
    $totalseason = $row['totalseason'];


	}
?>


<div id="details">


<h1><?php echo $title;?></h1>
    <p ><span>Year</span><?php echo $year;?></p>
   <h2>Plot</h2>
   <p><?php echo $plot;?></p>
    
    
   
  </div>




</div>

<div id ="episodeList">
<?php

	$Id = escape_string($_GET['id']);
	$query = query(" SELECT * FROM episodes WHERE id = $Id ;");
	confirm($query);


//echo $ip;

if(isset($_GET['username'])){
  $season=null;
  $admin=escape_string($_GET['username']) ;


while($row = fetch_array($query)){
   
  $season = $row['season'];
if($season1 == $season){
  
}else{
  echo'<div id="season" style="clear:both;color:#02FA02;padding-top:10px"><h4 style="font-weight:600;font-family:sans-serif;">Season '.$season.'</h4></div><br>';
 
}

    $caption = $row['episode_location'];
    $explode = explode('/',$caption);
    $caption = array_pop($explode);

    $load = explode('.',$caption);
    array_pop($load);
    $x1 = null;
                    foreach ($load as $x) {
                      $x1 .= $x;
                    }
                    
    $caption = $x1;

		$pro= <<<_END
      <div id="item" style="float:left">
      <a href="view_tv.php?id={$row['eid']}&username=$admin">
 	    <img src="http://{$ip}.{$row['episode_pic']}" height="20%">
 		<div id="name">$caption</div>
 		
 		</a>
 		
 	  
  	    </div>
_END;
       $season1 = $season;
       echo $pro;
	}




  }


else{
	while($row = fetch_array($query)){
		$pro= <<<_END
      <div id="item" style="float:left">
      <a href="view_tv.php?id={$row['eid']}">
 	    <img src="http://{$ip}.{$row['episode_pic']}" height="20%">
 		<div id="name">{$row['season']}</div>
 		
 		</a>
 		
 	  
  	    </div>

_END;
       
       echo $pro;
	}
}



?>
</div>
</div>



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
          document.getElementById("myBtn1").style.marginTop= "2";
      
      document.getElementById("del1").style.top= "2%";
      document.getElementById("del1").style.right= "28%";
        document.getElementById("del1").style.height = '3.8%';

}else{
  document.getElementById("search").style.visibility = "visible";
}

</script>



</body>
</html>