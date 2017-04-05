<?php
//helper functions


$cmd1 = "hostname -I";
$ip5 = exec($cmd1);
$arr2 = explode(" ", $ip5);
//echo $ip5;
$ip = $arr2[0];
if($ip == null){
	$ip = "localhost";
}
//echo $arr[2];

function get_user(){
 // $username=escape_string($_GET['username']) ;
  //return $username;
	//session_start();
	/*if($_SESSION['username']){
		echo $_SESSION['username'];
	}else{
		echo "lolo";
	}
	*/
	return $_SESSION['username'];

}

function download($file){
	 if (file_exists($file)) {
  //echo"eeeeeeeeeeeeee";
  header("X-Sendfile: $file");
header("Content-type: application/octet-stream");
header('Content-Disposition: attachment; filename="' . basename($file) . '"');

   // echo"<script>alert('$file');</script>";

    exit;

    //echo $file;

   	}
}

function fileExist($file)
{
    $open = $file;

    if ($files = glob($open . "/*")) {
        return '1';
       // print_r($files);
    } else {
        return '0';
    }
}











function set_message($msg){

if(!empty($msg)) {

	$_SESSION['message'] = $msg;

} else {

$msg = "";

	   }

}

function display_message(){

	if(isset($_SESSION['message'])){

		echo $_SESSION['message'];
		unset($_SESSION['message']); 
	}

}




function redirect($location){
	header("Location: $location");
}

function query($sql){

	global $connection;
	return mysqli_query($connection, $sql);
}

function confirm($result){
	global $connection;
	if(!$result){
		die("QUERY FAILED". mysqli_error($connection));
		echo "failed";
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){
 return mysqli_fetch_array($result);
}



function add_media()
{

	if(isset($_POST['upload']))
	{

		//$ip = "http://192.168.1.102";

		$cmd2 = "hostname -I";
		$ip6 = exec($cmd2);
		$arr3 = explode(" ", $ip6);
		//echo $ip5;
		$ip1 = $arr3[0];


		//if(isset($_POST['publish'])) {


		if(isset($_FILES['video'])){

	
			if (!isset($_POST['product_category_id']) || !$_FILES["video"]["name"] || $_POST['product_title'] == "Edit media name...")
			{
				echo '<p style="padding-bottom:2%;">'."Upload Failed!".'</p>';
    		    echo '<p style="padding-bottom:5%;">'."Please fill all the fields".'</p>';
    			echo '<img src="../raw/pics/failed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';


    			if(!isset($_POST['product_category_id']) ){
    	    	echo '<div style="width:100%"><img src="../raw/pics/wrong.png" height="10%">'."Media Type".'</div>';
    			}
   				if(isset($_POST['product_category_id'])){
    	 		echo '<div style="width:100%"><img src="../raw/pics/right.png" height="10%" >'."Media Type".'</div>';
    			}
    
   				if($_FILES["video"]["size"] <= 0){
    	 		echo '<div style="width:100%"><img src="../raw/pics/wrong.png" height="10%" style="clear:left;">'."Media File".'</div>';
    			}
   				if($_FILES["video"]["size"] > 0){
    	 		echo '<div style="width:100%"><img src="../raw/pics/right.png" height="10%" style="clear:left;">'."Media File".'</div>';
    			}
   				if($_POST['product_title'] == "Edit media name..."){
    	 		echo '<div style="width:100%;padding-bottom:5%;"><img src="../raw/pics/wrong.png" height="10%" style="clear:left;">'."Media Name".'</div>';
    			}
   				if($_POST['product_title'] != "Edit media name..."){
    	 		echo '<div style="width:100%;padding-bottom:4%;"><img src="../raw/pics/right.png" height="10%" style="clear:left;">'."Media Name".'</div>';
    			}


				return;
			}
			else{
					

					$media_title = escape_string($_POST['product_title']);
	    			$media_category_id = escape_string($_POST['product_category_id']);
	    
					//	echo $name;
					//	echo $type;

					
				


					if($media_category_id == 1)
					{	$tmp = $_FILES['video']['tmp_name'];
					     $random_name = rand();

					     $message = "Sucessfully Uploaded!";

		  			echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

					echo "<br>$message";
					echo "<br>Upload: " . $_FILES["video"]["name"] . "<br>";
					$type = $_FILES["video"]["type"] ;
        			echo "Type: " . $_FILES["video"]["type"] . "<br>";
        			echo "Size: " . number_format((float)($_FILES["video"]["size"] / 1048576), 2, '.', '') . " MB<br>";

        			echo '<div style="padding-bottom:5%;"></div>';


        			$volume = $_FILES["video"]["size"];

        			$arr = explode("/", $type);
					$last = $arr[1];
					//echo $last;

	
					move_uploaded_file($tmp, '../uploads/'.$random_name.".".$last);

	    			$media_location = "/mediaRIP/uploads/".$random_name.".".$last;




						$media_image = "/mediaRIP/uploads/posters/".$media_title.".jpg";

						$year1 = escape_string($_POST['year']);
						$rated1 = escape_string($_POST['rated']);
						$released1 = escape_string($_POST['released']);
						$runtime1 = escape_string($_POST['runtime']);
						$genre1 = escape_string($_POST['genre']);
						$director1 = escape_string($_POST['director']);
						$writer1 = escape_string($_POST['writer']);
						$actor1 = escape_string($_POST['actor']);
						$plot1 = escape_string($_POST['plot']);
						$language1 = escape_string($_POST['language']);
						$country1 = escape_string($_POST['country']);
						$awards1 = escape_string($_POST['awards']);


						$query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$media_title}','{$media_category_id}','{$media_image}','{$media_location}')");
						global $connection;
						$Id = $connection->insert_id;
						//echo $Id;


						  $rated1 = str_replace("'","''",$rated1);
              $released1 = str_replace("'","''",$released1);
               $genre1 = str_replace("'","''",$genre1);
                $writer1 = str_replace("'","''",$writer1);
                 $director1 = str_replace("'","''",$director1);
                  $actor1 = str_replace("'","''",$actor1);
                  $plot1 = str_replace("'","''",$plot1);
                    $language1 = str_replace("'","''",$language1);
                     $country1 = str_replace("'","''",$country1);
                      $awards1 = str_replace("'","''",$awards1);

						$query3 = query("INSERT INTO movies(movie_id,title,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,poster) VALUES('{$Id}','{$media_title}','{$year1}','{$rated1}','{$released1}','{$runtime1}','{$genre1}','{$director1}','{$writer1}','{$actor1}','{$plot1}','{$language1}','{$country1}','{$awards1}','{$media_image}')");

						confirm($query3);
					}

					elseif($media_category_id == 2)
					{	

						ini_set('display_errors', 1);
						error_reporting(E_ALL); 

						
	    				
	    				$season = escape_string($_POST['season']);


						$media_poster = "/mediaRIP/uploads/posters/".$media_title.".jpg";

						$year1 = escape_string($_POST['year']);
						$rated1 = escape_string($_POST['rated']);
						$released1 = escape_string($_POST['released']);
						$runtime1 = escape_string($_POST['runtime']);
						$genre1 = escape_string($_POST['genre']);
						$director1 = escape_string($_POST['director']);
						$writer1 = escape_string($_POST['writer']);
						$actor1 = escape_string($_POST['actor']);
						$plot1 = escape_string($_POST['plot']);
						$language1 = escape_string($_POST['language']);
						$country1 = escape_string($_POST['country']);
						$awards1 = escape_string($_POST['awards']);
						$totalseason = escape_string($_POST['totalseason']);


						//echo "INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason) VALUES('{$media_title}','{$media_poster}','{$year1}','{$rated1}','{$released1}','{$runtime1}','{$genre1}','{$director1}','{$writer1}','{$actor1}','{$plot1}','{$language1}','{$country1}','{$awards1}','{$totalseason}')";


						//query("INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason) VALUES('ccc','pop','4545','10','2014','1102','ac','jj','jhjnj','kmkm','jhj','enk','oo','kjk','8')");

						
						  $rated1 = str_replace("'","''",$rated1);
              $released1 = str_replace("'","''",$released1);
               $genre1 = str_replace("'","''",$genre1);
                $writer1 = str_replace("'","''",$writer1);
                 $director1 = str_replace("'","''",$director1);
                  $actor1 = str_replace("'","''",$actor1);
                  $plot1 = str_replace("'","''",$plot1);
                    $language1 = str_replace("'","''",$language1);
                     $country1 = str_replace("'","''",$country1);
                      $awards1 = str_replace("'","''",$awards1);

						$query3 = query("INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason,media_location) VALUES('{$media_title}','{$media_poster}','{$year1}','{$rated1}','{$released1}','{$runtime1}','{$genre1}','{$director1}','{$writer1}','{$actor1}','{$plot1}','{$language1}','{$country1}','{$awards1}','{$totalseason}','null')");

						global $connection;
						$Id = $connection->insert_id;


						for($i=0; $i<count($_FILES['video']['name']); $i++) {

						$tmp = $_FILES['video']['tmp_name'][$i];
						
						//echo "from276";

						$epName = $_FILES['video']['name'][$i];

						$epName = str_replace(" ",".","$epName");

						$random_name = rand();
	    
						//	echo $name;
						//	echo $type;

						$message = "Sucessfully Uploaded!";

		  				echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

						echo "<br>$message";
						


        				$volume = $_FILES["video"]["size"][$i];

        				

	
						move_uploaded_file($tmp, '../uploads/'.$epName);

	    				$media_location = "/mediaRIP/uploads/".$epName;
				


	    				$ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
						//$name1 = $_FILES["video"]["name"];
						$imageFile = $random_name.".jpg";
						$size = "250x150";

						if($volume<31457280)
						{
							$getFromSecond = 20;
						}
						else{
							$getFromSecond = 120;
						}

						//echo $getFromSecond;
 						$cmd = "$ffmpeg -ss $getFromSecond -i 'http://$ip1:80/mediaRIP/uploads/$epName' -an -s $size ../uploads/thumbnails/$imageFile 2>&1";


						$media_image = "/mediaRIP/uploads/thumbnails/".$imageFile;


						exec($cmd); 



						




						$query = query("INSERT INTO episodes(id,episode_location,episode_pic,season) VALUES('{$Id}','{$media_location}','{$media_image}','{$season}')");
						
						//echo $Id;
					    }

						
					}



					elseif($media_category_id == 5)
					{	$tmp = $_FILES['video']['tmp_name'];
					     $random_name = rand();

					     $message = "Sucessfully Uploaded!";

		  			echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

					echo "<br>$message";
					echo "<br>Upload: " . $_FILES["video"]["name"] . "<br>";
					$type = $_FILES["video"]["type"] ;
        			echo "Type: " . $_FILES["video"]["type"] . "<br>";
        			echo "Size: " . number_format((float)($_FILES["video"]["size"] / 1048576), 2, '.', '') . " MB<br>";

        			echo '<div style="padding-bottom:5%;"></div>';


        			$volume = $_FILES["video"]["size"];

        			$arr = explode("/", $type);
					$last = $arr[1];
					//echo $last;

	
					move_uploaded_file($tmp, '../uploads/'.$random_name.".".$last);

	    			$media_location = "/mediaRIP/uploads/".$random_name.".".$last;





	    				$ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
						//$name1 = $_FILES["video"]["name"];
						$imageFile = $random_name.".jpg";
						$size = "250x150";

						if($volume<10485760){
							$getFromSecond = 3;
						}

						elseif($volume<31457280)
						{
							$getFromSecond = 20;
						}
						else{
							$getFromSecond = 120;
						}

						//echo $getFromSecond;
 						$cmd = "$ffmpeg -ss $getFromSecond -i 'http://$ip1:80/mediaRIP/uploads/$random_name.$last' -an -s $size ../uploads/thumbnails/$imageFile 2>&1";


						$media_image = "/mediaRIP/uploads/thumbnails/".$imageFile;


						exec($cmd); 

						$query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$media_title}','{$media_category_id}','{$media_image}','{$media_location}')");
	
						confirm($query);
					}


					elseif ($media_category_id == 3) 
					{	$tmp = $_FILES['video']['tmp_name'];
					     $random_name = rand();

					     $message = "Sucessfully Uploaded!";

		  			echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

					echo "<br>$message";
					echo "<br>Upload: " . $_FILES["video"]["name"] . "<br>";
					$type = $_FILES["video"]["type"] ;
        			echo "Type: " . $_FILES["video"]["type"] . "<br>";
        			echo "Size: " . number_format((float)($_FILES["video"]["size"] / 1048576), 2, '.', '') . " MB<br>";

        			echo '<div style="padding-bottom:5%;"></div>';


        			$volume = $_FILES["video"]["size"];

        			$arr = explode("/", $type);
					$last = $arr[1];
					//echo $last;

	
					move_uploaded_file($tmp, '../uploads/'.$random_name.".".$last);

	    			$media_location = "/mediaRIP/uploads/".$random_name.".".$last;



require_once('../../browser/public_html/getID3-1.9.12/getid3/getid3.php');
        $getID3 = new getID3;
$file='../../'.$media_location;
$file = str_replace("&apos;", "'", $file);

 $ThisFileInfo = $getID3->analyze($file);
        getid3_lib::CopyTagsToComments($ThisFileInfo);
        //  echo 'File name: '.$ThisFileInfo['filenamepath'].'<br>';
         $artist = (!empty($ThisFileInfo['comments_html']['artist']) ? $ThisFileInfo['comments_html']['artist'] : '');

          $x1 = null;
                    foreach ($artist as $x) {
                      $x1 .= $x;
                    }
                    $artist = $x1;

    // echo $artist;


         $title = (!empty($ThisFileInfo['comments_html']['title']) ?  $ThisFileInfo['comments_html']['title'] : '');
      //   echo $title;

        $OldThisFileInfo = $getID3->analyze($file);
if(isset($OldThisFileInfo['comments']['picture'][0])){

        	$Image='data:'.$OldThisFileInfo['comments']['picture'][0]['image_mime'].';charset=utf-8;base64,'.base64_encode($OldThisFileInfo['comments']['picture'][0]['data']);
    
        	$url6 = $Image;
					@$rawImage = file_get_contents($url6);
					if($rawImage){
						$tracktitle = $media_title;
					//	echo $tracktitle.'.jpg<br>';
						file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$tracktitle .".jpg",$rawImage);
						$media_image = "/mediaRIP/uploads/posters/".$tracktitle .".jpg"; 

					}

}else{

										$musicName=$media_title;
										$musicName = str_replace(" ","+","$musicName");
										$url ="https://itunes.apple.com/search?term=$musicName&limit=1";
										//echo $url;
										$content = file_get_contents($url);
										//echo $content;
										$str = trim($content);
										//echo '<br/>';
										$temp = explode('", "',$str);
										//artist
										$temp2 = explode('":"',$temp[2]);
										$artist = $temp2[1];
										//echo $artist;
										//tracktitle
										$temp3 = explode('":"',$temp[6]);
										$tracktitle = $temp3[1];
										//echo $tracktitle;
										//albumart
										$temp4 = explode('":"',$temp[12]);
										$albumart = $temp4[1];
										//echo $albumart;
										$albumart30 = str_replace("30","300","$albumart");
										$albumart60 = str_replace("60","300","$albumart30");
										$albumart300 = str_replace("100","300","$albumart60");
										//echo $albumart300;
										//country
										$temp7 = explode('":"',$temp[16]);
										$country = $temp7[1];
										//echo $country;
										//genre
										$temp5 = explode('":"',$temp[18]);
										$genre = $temp5[1];
										//echo $genre;
										//rating
									    $temp6 = explode('":"',$temp[19]);
										$rating = $temp6[1];
										//echo $rating;



											if($albumart300 != NULL){

												$url6 = $albumart300;
												//echo $url6;

												@$rawImage = file_get_contents($url6);
													if($rawImage){

												file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$tracktitle .".jpg",$rawImage);
												//echo "Image Saved!";
												$media_image = "/mediaRIP/uploads/posters/".$tracktitle .".jpg";
													}else{
												echo "Error Getting Albumart from URL.";
												$media_image = "/mediaRIP/uploads/posters/music.jpg";
												}

											}else{
												echo "Albumart not available." ;
 												$tracktitle = $media_title;
 												$media_image = "/mediaRIP/uploads/posters/music.jpg";
											}
}



	



					$tracktitle = str_replace("'","''",$tracktitle);	
					$artist = str_replace("'","''",$artist);	
					$media_image = str_replace("'","''",$media_image);	
					$media_location = str_replace("'","''",$media_location);	



						echo "INSERT INTO music(track_name,singer,country,rating,genre,album_art,music_location) VALUES('{$tracktitle}','{$artist}','{$country}','{$rating}','{$genre}','{$media_image}','{$media_location}')";

						$query = query("INSERT INTO music(track_name,singer,country,rating,genre,album_art,music_location) VALUES('{$tracktitle}','{$artist}','{$country}','{$rating}','{$genre}','{$media_image}','{$media_location}')");
	
						confirm($query);

	
					}
					elseif ($media_category_id == 4) {
						$tmp = $_FILES['video']['tmp_name'];
					     $random_name = rand();

					     $message = "Sucessfully Uploaded!";

		  			echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

					echo "<br>$message";
					echo "<br>Upload: " . $_FILES["video"]["name"] . "<br>";
					$type = $_FILES["video"]["type"] ;
        			echo "Type: " . $_FILES["video"]["type"] . "<br>";
        			echo "Size: " . number_format((float)($_FILES["video"]["size"] / 1048576), 2, '.', '') . " MB<br>";

        			echo '<div style="padding-bottom:5%;"></div>';


        			$volume = $_FILES["video"]["size"];

        			$arr = explode("/", $type);
					$last = $arr[1];
					//echo $last;

	
					move_uploaded_file($tmp, '../uploads/'.$random_name.".".$last);

	    			$media_location = "/mediaRIP/uploads/".$random_name.".".$last;




					$media_image = "NULL";

					$query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$media_title}','{$media_category_id}','{$media_image}','{$media_location}')");
	
					confirm($query);

	
					}





				}

		}
	}
}


function login_user(){

	if(isset($_POST['submit'])){
     
     $username = escape_string($_POST['username']);
	 $password = escape_string($_POST['password']);

	 $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
	 confirm($query);

   

	 if(mysqli_num_rows($query) == 0){

	 echo '<div style="width:100%;height:100%;z-index: 98;position:absolute;top:0;left:0;background-color:rgba(0,0,0,0.6);"></div>';	

	 echo '<div style="z-index:99;position:absolute;top:23%;left:30%;background-color:rgba(5,250,5,0.4);width:40%;height:45%;border: 6px solid black;"><div style="float:left"><p style="font-weight:900;font-size:100px;font-family:sans-serif;padding-left:25%;">XXXXX</p></div><h6 style="padding-top:20%;font-size:40px;font-family:sans-serif;padding-left:10%;">Password or Username is </h6><h5 style="font-size:40px;font-family:sans-serif;font-weight:900;padding-left:30%;">WRONG!</h5>

<a href="index.php"><div style="padding-left:2%;padding-top:5%;"><input type="submit" value="OK" style=" font-weight: 900;
    width: 98%;
    cursor:pointer;
    color:#02FA02;
    padding: 15px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    background-color:black; "></div></a>
	 </div>';
	 	

	 }else{

	 while($row = fetch_array($query)){

	 	if ($row['user_level']==99) {
	 		session_start();
	 		$_SESSION['username']=$username;
	 		redirect("welcome.php?admin&username=$username");
	 	}
	 	elseif($row['user_level']==1){
	 		//session_set_cookie_params(3600*24*7);
	 		session_start();
	 		$_SESSION['username']=$username;
	 		redirect("welcome.php?movies&username=$username");

	 		
	 	}
	 	else{

	 		 echo '<div style="width:100%;height:100%;z-index: 98;position:absolute;top:0;left:0;background-color:rgba(0,0,0,0.6);"></div>';	

	 echo '<div style="z-index:99;position:absolute;top:23%;left:30%;background-color:rgba(5,250,5,0.4);width:40%;height:45%;border: 6px solid black;"><div style="float:left"><p style="font-weight:900;font-size:100px;font-family:sans-serif;padding-left:25%;">XXXXX</p></div><h6 style="padding-top:20%;font-size:40px;font-family:sans-serif;padding-left:3%;">Admin still hasn\'t verified you</h6><h5 style="font-size:40px;font-family:sans-serif;font-weight:900;padding-left:30%;">SORRY!</h5>

<a href="index.php"><div style="padding-left:2%;padding-top:5%;"><input type="submit" value="OK" style=" font-weight: 900;
    width: 98%;
    cursor:pointer;
    color:#02FA02;
    padding: 15px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    background-color:black; "></div></a>
	 </div>';
	 	

	 	}
	 	
	 }
	 }

	}
	

}

function signup(){

	if(isset($_POST['submit'])){
     
     $username = escape_string($_POST['username']);
     $email = escape_string($_POST['email']);
	 $password = escape_string($_POST['password']);

	$query = query("INSERT INTO users(username,email,password) VALUES('{$username}','{$email}','{$password}')");
	
	confirm($query);
	set_message("Registered");
	redirect("index.php");

	}

}







function moviePoster(){

	if(isset($_POST['searchmovie'])){
     
    
	 
	$cmd9 = "hostname -I";
$ip9 = exec($cmd9);
$arr9 = explode(" ", $ip9);
$ip10 = $arr9[0];

//echo $ip10;



	$movieName = escape_string($_POST['movieN']);

	//echo $movieName;


$movieName = str_replace(" ","%20","$movieName");

$url ="http://www.omdbapi.com/?t=$movieName";

//echo $url;

$content = file_get_contents($url);

//echo $content;

$str = trim($content);



$temp = explode('","',$str);



//title

$temp1 = explode('":"',$temp[0]);

$title = $temp1[1];

//echo $title;

//poster

$temp14 = explode('":"',$temp[13]);

$poster = $temp14[1];

//echo $poster;

//year

$temp2 = explode('":"',$temp[1]);

$year = $temp2[1];

//echo $year;

//rated

$temp3 = explode('":"',$temp[2]);

$rated = $temp3[1];

//echo $rated;

//released

$temp4 = explode('":"',$temp[3]);

$released = $temp4[1];

//echo $released;


//runtime

$temp5 = explode('":"',$temp[4]);

$runtime = $temp5[1];

//echo $runtime;

//genre

$temp6 = explode('":"',$temp[5]);

$genre = $temp6[1];

//echo $genre;

//director

$temp7 = explode('":"',$temp[6]);

$director = $temp7[1];

//echo $director;

//writer

$temp8 = explode('":"',$temp[7]);

$writer = $temp8[1];

//echo $writer;

//actor

$temp9 = explode('":"',$temp[8]);

$actor= $temp9[1];

//echo $actor;

//plot

$temp10 = explode('":"',$temp[9]);

$plot = $temp10[1];

//echo $plot;

//language

$temp11 = explode('":"',$temp[10]);

$language = $temp11[1];

//echo $language;

//country

$temp12 = explode('":"',$temp[11]);

$country = $temp12[1];

//echo $country;

//awards

$temp13 = explode('":"',$temp[12]);

$awards = $temp13[1];

//echo $awards;


//rating

$temp15 = explode('":"',$temp[15]);

$imdbrating = $temp15[1];

//echo $imdbrating;


ini_set('display_errors', 1);
error_reporting(E_ALL); 


if($poster != NULL){

echo '<img id ="pos" src=" ' . $poster .'" style="width:300px;">' ;

echo '<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("pos").style.width= "40%";
}
</script>';

$url6 = $poster;
//echo $url6;

@$rawImage = file_get_contents($url6);
if($rawImage){

	file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$title .".jpg",$rawImage);
	//echo "Image Saved!";
}else{
	echo "Error Getting Image from URL";
}

}

else

{echo "Poster not available" ;}






if(isset($_GET['username'])){
  $username6=escape_string($_GET['username']) ;
}

$moviepart2= <<<_END



<div style="position:absolute;top:16%;left:58%;"><img id="Movie" src="../raw/pics/movie1.png" height="15%"/></div>

<form method='post' name='Form' action='upload.php?username=$username6' enctype='multipart/form-data'> 


<input type="radio" class="radio_item" value="1" name="product_category_id" id="radio" checked>

<div style="position:absolute;top:46%;left:60%;"><p>Select Movie</p></div>
<div style="position:absolute;top:50%;left:55%;"><input type='file' name='video' id="video">
</div>


<div style="position:absolute;top:63%;left:61%;"><p>Movie Title</p></div>
<div style="position:absolute;top:68%;left:50%;">
<input type="text" name="product_title" required value="$title" readonly="readonly"
style=" font-weight: 900;width: 20em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" >


<input type="hidden" name="year" value="$year">
<input type="hidden" name="rated" value="$rated">
<input type="hidden" name="released" value="$released">
<input type="hidden" name="runtime" value="$runtime">
<input type="hidden" name="genre" value="$genre">
<input type="hidden" name="director" value="$director">
<input type="hidden" name="writer" value="$writer">
<input type="hidden" name="actor" value="$actor">
<input type="hidden" name="plot" value="$plot">
<input type="hidden" name="language" value="$language">
<input type="hidden" name="country" value="$country">
<input type="hidden" name="awards" value="$awards">




</div>

<div id="bt"  style="position:absolute;top:94.4%;left:84%;z-index:4"> <input type='submit'  name='upload' value='UPLOAD' onclick='uploadFile()'></div>           

<div id="pbar" style="position:absolute;top:95.8%;left:4%;z-index:4"><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></div>
<center><h3 id="status" ></h3></center>

<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("pbar").style.width= "120px";
	document.getElementById("pbar").style.left= "-25%";
}
</script>

</form>

_END;
       
       echo $moviepart2;






	}


	elseif(isset($_POST['searchTV'])){
     
    
	 
	$cmd9 = "hostname -I";
$ip9 = exec($cmd9);
$arr9 = explode(" ", $ip9);
$ip10 = $arr9[0];

//echo $ip10;



	$movieName = escape_string($_POST['movieN']);

	//echo $movieName;


$movieName = str_replace(" ","%20","$movieName");

$url ="http://www.omdbapi.com/?t=$movieName";

//echo $url;

$content = file_get_contents($url);

//echo $content;

$str = trim($content);



$temp = explode('","',$str);



//title

$temp1 = explode('":"',$temp[0]);

$title = $temp1[1];

//echo $title;

//poster

$temp14 = explode('":"',$temp[13]);

$poster = $temp14[1];

//echo $poster;

//year

$temp2 = explode('":"',$temp[1]);

$year = $temp2[1];

$year = str_replace("–","-","$year");

//echo $year;

//rated

$temp3 = explode('":"',$temp[2]);

$rated = $temp3[1];

//echo $rated;

//released

$temp4 = explode('":"',$temp[3]);

$released = $temp4[1];

//echo $released;


//runtime

$temp5 = explode('":"',$temp[4]);

$runtime = $temp5[1];

//echo $runtime;

//genre

$temp6 = explode('":"',$temp[5]);

$genre = $temp6[1];

//echo $genre;

//director

$temp7 = explode('":"',$temp[6]);

$director = $temp7[1];

//echo $director;

//writer

$temp8 = explode('":"',$temp[7]);

$writer = $temp8[1];

//echo $writer;

//actor

$temp9 = explode('":"',$temp[8]);

$actor= $temp9[1];

//echo $actor;

//plot

$temp10 = explode('":"',$temp[9]);

$plot = $temp10[1];

//echo $plot;

//language

$temp11 = explode('":"',$temp[10]);

$language = $temp11[1];

//echo $language;

//country

$temp12 = explode('":"',$temp[11]);

$country = $temp12[1];

//echo $country;

//awards

$temp13 = explode('":"',$temp[12]);

$awards = $temp13[1];

//echo $awards;


//rating

$temp15 = explode('":"',$temp[15]);

$imdbrating = $temp15[1];

//echo $imdbrating;

//totalseason

$temp16 = explode('":"',$temp[19]);

$totalseason = $temp16[1];



ini_set('display_errors', 1);
error_reporting(E_ALL); 


if($poster != NULL){

echo '<img id ="pos" src=" ' . $poster .'" style="width:300px;" >' ;

echo '<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("pos").style.width= "40%";
}
</script>';

$url6 = $poster;
//echo $url6;

@$rawImage = file_get_contents($url6);
if($rawImage){

	file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$title .".jpg",$rawImage);
	//echo "Image Saved!";
}else{
	echo "Error Getting Image from URL";
}

}

else

{echo "Poster not available" ;}






if(isset($_GET['username'])){
  $username6=escape_string($_GET['username']) ;
}

$moviepart2= <<<_END



<div style="position:absolute;top:16%;left:60%;"><img id="Movie" src="../raw/pics/tv1.png" height="15%"/></div>

<form method='post' name='Form' action='upload.php?username=$username6' enctype='multipart/form-data'> 


<input type="radio" class="radio_item" value="2" name="product_category_id" id="radio" checked>




<div style="position:absolute;top:40%;left:60%;"><p>Enter Season</p></div>
<div style="position:absolute;top:43%;left:62%;"><input type="text" name="season" required style=" font-weight: 900;width: 5em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" ></div>


<div style="position:absolute;top:58%;left:60%;"><p>Select Episodes</p></div>
<div style="position:absolute;top:62%;left:56%;"><input type='file' id='video' name='video[]'  multiple='multiple' >
</div>




<div style="position:absolute;top:74%;left:62%;"><p>TV series </p></div>
<div style="position:absolute;top:78%;left:51%;">
<input type="text" name="product_title" required value="$title" readonly="readonly"
style=" font-weight: 900;width: 20em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" >

<input type="hidden" name="title" value="$title">
<input type="hidden" name="year" value="$year">
<input type="hidden" name="rated" value="$rated">
<input type="hidden" name="released" value="$released">
<input type="hidden" name="runtime" value="$runtime">
<input type="hidden" name="genre" value="$genre">
<input type="hidden" name="director" value="$director">
<input type="hidden" name="writer" value="$writer">
<input type="hidden" name="actor" value="$actor">
<input type="hidden" name="plot" value="$plot">
<input type="hidden" name="language" value="$language">
<input type="hidden" name="country" value="$country">
<input type="hidden" name="awards" value="$awards">
<input type="hidden" name="totalseason" value="$totalseason">



</div>

<div id="bt"  style="position:absolute;top:94.4%;left:84%;z-index:4"> <input type='submit'  name='upload' value='UPLOAD' onclick='uploadFile()'></div>           

<div id="pbar" style="position:absolute;top:95.8%;left:4%;z-index:4"><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></div>
<center><h3 id="status" ></h3></center>

<div id="bt11"  style="position:absolute;top:94.4%;left:60%;z-index:4"> <input type='submit'  name='uploadSeason' value='UPLOAD ANOTHER SEASON' onclick='uploadFile()'></div>    


<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("progressBar").style.width= "200px";
	document.getElementById("pbar").style.left= "-25%";

	document.getElementById("bt11").style.left= "52%";
}
</script>

			
</form>

_END;
       
       echo $moviepart2;





}
	

}


function episodeSeason(){

	if(isset($_POST['uploadSeason'])){






			//$ip = "http://192.168.1.102";

		$cmd2 = "hostname -I";
		$ip6 = exec($cmd2);
		$arr3 = explode(" ", $ip6);
		//echo $ip5;
		$ip1 = $arr3[0];

		$media_title = escape_string($_POST['product_title']);
	    $media_category_id = escape_string($_POST['product_category_id']);
	    $media_poster = "/mediaRIP/uploads/posters/".$media_title.".jpg";

		//if(isset($_POST['publish'])) {


		if(isset($_FILES['video'])){



				


	    		if($media_category_id == 2)
					{	

					//	ini_set('display_errors', 1);
					//	error_reporting(E_ALL); 

						
	    				
	    				$season = escape_string($_POST['season']);


						

						$year1 = escape_string($_POST['year']);
						$rated1 = escape_string($_POST['rated']);
						$released1 = escape_string($_POST['released']);
						$runtime1 = escape_string($_POST['runtime']);
						$genre1 = escape_string($_POST['genre']);
						$director1 = escape_string($_POST['director']);
						$writer1 = escape_string($_POST['writer']);
						$actor1 = escape_string($_POST['actor']);
						$plot1 = escape_string($_POST['plot']);
						$language1 = escape_string($_POST['language']);
						$country1 = escape_string($_POST['country']);
						$awards1 = escape_string($_POST['awards']);
						$totalseason = escape_string($_POST['totalseason']);


						//echo $year1;
						//echo $country1;

						//echo "INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason) VALUES('{$media_title}','{$media_poster}','{$year1}','{$rated1}','{$released1}','{$runtime1}','{$genre1}','{$director1}','{$writer1}','{$actor1}','{$plot1}','{$language1}','{$country1}','{$awards1}','{$totalseason}')";


						$query3 = query("INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason,media_location) VALUES('{$media_title}','{$media_poster}','{$year1}','{$rated1}','{$released1}','{$runtime1}','{$genre1}','{$director1}','{$writer1}','{$actor1}','{$plot1}','{$language1}','{$country1}','{$awards1}','{$totalseason}','null')");

						global $connection;
						$Id = $connection->insert_id;


						for($i=0; $i<count($_FILES['video']['name']); $i++) {

						$tmp = $_FILES['video']['tmp_name'][$i];
						
						//echo "from1334";

						$epName = $_FILES['video']['name'][$i];

						$epName = str_replace(" ",".","$epName");

						$random_name = rand();
	    
						//	echo $name;
						//	echo $type;

						$message = "Sucessfully Uploaded!";

		  				//echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

						//echo "<br>$message";
						


        				$volume = $_FILES["video"]["size"][$i];

        				

	
						move_uploaded_file($tmp, '../uploads/'.$epName);

	    				$media_location = "/mediaRIP/uploads/".$epName;
				


	    				$ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
						//$name1 = $_FILES["video"]["name"];
						$imageFile = $random_name.".jpg";
						$size = "250x150";

						if($volume<31457280)
						{
							$getFromSecond = 20;
						}
						else{
							$getFromSecond = 120;
						}

						//echo $getFromSecond;
 						$cmd = "$ffmpeg -i 'http://$ip1:80/mediaRIP/uploads/$epName' -an -ss $getFromSecond -s $size ../uploads/thumbnails/$imageFile 2>&1";


						$media_image = "/mediaRIP/uploads/thumbnails/".$imageFile;


						exec($cmd); 



						




						$query = query("INSERT INTO episodes(id,episode_location,episode_pic,season) VALUES('{$Id}','{$media_location}','{$media_image}','{$season}')");
						
						//echo $Id;
					    }






echo '<img id ="pos" src=" ' . $media_poster .'" style="width:300px;" >' ;
		
		echo '<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("pos").style.width= "40%";
}
</script>';


if(isset($_GET['username'])){
  $username6=escape_string($_GET['username']) ;
}

$moviepart2= <<<_END



<div style="position:absolute;top:16%;left:60%;"><img id="Movie" src="../raw/pics/tv1.png" height="15%"/></div>

<form method='post' name='Form' action='upload.php?username=$username6' enctype='multipart/form-data'> 


<input type="radio" class="radio_item" value="2" name="product_category_id" id="radio" checked>




<div style="position:absolute;top:40%;left:60%;"><p>Enter Season</p></div>
<div style="position:absolute;top:43%;left:62%;"><input type="text" name="season" required style=" font-weight: 900;width: 5em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" ></div>


<div style="position:absolute;top:58%;left:60%;"><p>Select Episodes</p></div>
<div style="position:absolute;top:62%;left:56%;"><input type='file' id='video'name='video[]'  multiple='multiple' >
</div>




<div style="position:absolute;top:74%;left:62%;"><p>TV series </p></div>
<div style="position:absolute;top:78%;left:51%;">
<input type="text" name="product_title" required value="$media_title" readonly="readonly"
style=" font-weight: 900;width: 20em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" >





</div>

<div id="bt"  style="position:absolute;top:94.4%;left:84%;z-index:4"> <input type='submit'  name='upload16' value='UPLOAD' onclick='uploadFile()'></div>           

<div id="pbar" style="position:absolute;top:95.8%;left:4%;z-index:4"><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></div>
<center><h3 id="status" ></h3></center>

<div id="bt11"  style="position:absolute;top:94.4%;left:60%;z-index:4"> <input type='submit'  name='uploadSeason1' value='UPLOAD ANOTHER SEASON' onclick='uploadFile()'></div>    


<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("progressBar").style.width= "200px";
	document.getElementById("pbar").style.left= "-25%";

	document.getElementById("bt11").style.left= "52%";
}
</script>	
</form>

_END;
       
       echo $moviepart2;


			}



		}




	
	}
}
     
   
function upload2(){   

if(isset($_POST['upload16'])){






			//$ip = "http://192.168.1.102";

		$cmd2 = "hostname -I";
		$ip6 = exec($cmd2);
		$arr3 = explode(" ", $ip6);
		//echo $ip5;
		$ip1 = $arr3[0];

		
		$media_title = escape_string($_POST['product_title']);
	   


if(isset($_FILES['video'])){



				
	    		
						

						ini_set('display_errors', 1);
						error_reporting(E_ALL); 

						
	    				
	    				$season = escape_string($_POST['season']);


						

					
	$query = query(" SELECT * FROM tvSeries WHERE title = '$media_title' ");
						confirm($query);


						while($row = fetch_array($query)){
    							
    							$Id = $row['uniqueId'];
    							//echo $Id;
    						}

						
						



						for($i=0; $i<count($_FILES['video']['name']); $i++) {

						$tmp = $_FILES['video']['tmp_name'][$i];
						
						//echo "from1538";

						$epName = $_FILES['video']['name'][$i];

						$epName = str_replace(" ",".","$epName");

						$random_name = rand();
	    
						//	echo $name;
						//	echo $type;

						$message = "Sucessfully Uploaded!";

		  				echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

						echo "<br>$message";
						


        				$volume = $_FILES["video"]["size"][$i];

        				

	
						move_uploaded_file($tmp, '../uploads/'.$epName);

	    				$media_location = "/mediaRIP/uploads/".$epName;
				


	    				$ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
						//$name1 = $_FILES["video"]["name"];
						$imageFile = $random_name.".jpg";
						$size = "250x150";

						if($volume<31457280)
						{
							$getFromSecond = 20;
						}
						else{
							$getFromSecond = 120;
						}

						//echo $getFromSecond;
 						$cmd = "$ffmpeg -i 'http://$ip1:80/mediaRIP/uploads/$epName' -an -ss $getFromSecond -s $size ../uploads/thumbnails/$imageFile 2>&1";


						$media_image = "/mediaRIP/uploads/thumbnails/".$imageFile;


						exec($cmd); 



						




						$query = query("INSERT INTO episodes(id,episode_location,episode_pic,season) VALUES('{$Id}','{$media_location}','{$media_image}','{$season}')");
						
						//echo $Id;
					    }

						
					



		}

		
	}
}







function episodeSeason2(){   

if(isset($_POST['uploadSeason1'])){



//echo "inside uploadSeason1";


			//$ip = "http://192.168.1.102";

		$cmd2 = "hostname -I";
		$ip6 = exec($cmd2);
		$arr3 = explode(" ", $ip6);
		//echo $ip5;
		$ip1 = $arr3[0];


		
		$media_title = escape_string($_POST['product_title']);
	   

	    $media_category_id = escape_string($_POST['product_category_id']);
	    $media_poster = "/mediaRIP/uploads/posters/".$media_title.".jpg";

if(isset($_FILES['video'])){



				

						//echo $media_title;
	    		
						

						ini_set('display_errors', 1);
						error_reporting(E_ALL); 

						
	    				
	    				$season = escape_string($_POST['season']);


						

					
	$query = query(" SELECT * FROM tvSeries WHERE title = '$media_title' ");
						confirm($query);


						while($row = fetch_array($query)){
    							
    							$Id = $row['uniqueId'];
    							//echo $Id;
    						}

						
						



						for($i=0; $i<count($_FILES['video']['name']); $i++) {

						$tmp = $_FILES['video']['tmp_name'][$i];
						
						//echo "from1684";

						$epName = $_FILES['video']['name'][$i];

						$epName = str_replace(" ",".","$epName");

						$random_name = rand();
	    
						//	echo $name;
						//	echo $type;

						//$message = "Sucessfully Uploaded!";

		  				//echo '<img src="../raw/pics/passed.png" height="118%" style="float:right;position:absolute;top:-5%;right:8%;z-index:3;">';

						//echo "<br>$message";
						


        				$volume = $_FILES["video"]["size"][$i];

        				

	
						move_uploaded_file($tmp, '../uploads/'.$epName);

	    				$media_location = "/mediaRIP/uploads/".$epName;
				


	    				$ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
						//$name1 = $_FILES["video"]["name"];
						$imageFile = $random_name.".jpg";
						$size = "250x150";

						if($volume<31457280)
						{
							$getFromSecond = 20;
						}
						else{
							$getFromSecond = 120;
						}

						//echo $getFromSecond;
 						$cmd = "$ffmpeg -i 'http://$ip1:80/mediaRIP/uploads/$epName' -an -ss $getFromSecond -s $size ../uploads/thumbnails/$imageFile 2>&1";


						$media_image = "/mediaRIP/uploads/thumbnails/".$imageFile;


						exec($cmd); 



						




						$query = query("INSERT INTO episodes(id,episode_location,episode_pic,season) VALUES('{$Id}','{$media_location}','{$media_image}','{$season}')");
						
						//echo $Id;
					    }

						
					



		}






echo '<img id ="pos" src=" ' . $media_poster .'" style="width:300px;" >' ;
		
		echo '<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("pos").style.width= "40%";
}
</script>';


if(isset($_GET['username'])){
  $username6=escape_string($_GET['username']) ;
}

$moviepart2= <<<_END



<div style="position:absolute;top:16%;left:60%;"><img id="Movie" src="../raw/pics/tv1.png" height="15%"/></div>

<form method='post' name='Form' action='upload.php?username=$username6' enctype='multipart/form-data'> 


<input type="radio" class="radio_item" value="2" name="product_category_id" id="radio" checked>




<div style="position:absolute;top:40%;left:60%;"><p>Enter Season</p></div>
<div style="position:absolute;top:43%;left:62%;"><input type="text" name="season" required style=" font-weight: 900;width: 5em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" ></div>


<div style="position:absolute;top:58%;left:60%;"><p>Select Episodes</p></div>
<div style="position:absolute;top:62%;left:56%;"><input type='file' id='video'name='video[]'  multiple='multiple' >
</div>




<div style="position:absolute;top:74%;left:62%;"><p>TV series </p></div>
<div style="position:absolute;top:78%;left:51%;">
<input type="text" name="product_title" required value="$media_title" readonly="readonly"
style=" font-weight: 900;width: 20em;padding: 4% 5%;margin: 8px 0;display: inline-block;border: none;border-radius: 4px;box-sizing: border-box;background-color:#02FA02; color:black;border-radius: 10%;" >





</div>

<div id="bt"  style="position:absolute;top:94.4%;left:84%;z-index:4"> <input type='submit'  name='upload16' value='UPLOAD' onclick='uploadFile()'></div>           

<div id="pbar" style="position:absolute;top:95.8%;left:4%;z-index:4"><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></div>
<center><h3 id="status" ></h3></center>

<div id="bt11"  style="position:absolute;top:94.4%;left:60%;z-index:4"> <input type='submit'  name='uploadSeason1' value='UPLOAD ANOTHER SEASON' onclick='uploadFile()'></div>    


<script>
var screenWidth = window.outerWidth;
if (screenWidth<1000){
	document.getElementById("progressBar").style.width= "200px";
	document.getElementById("pbar").style.left= "-25%";

	document.getElementById("bt11").style.left= "52%";
}
</script>
			
</form>

_END;
       
       echo $moviepart2;






















		
	}
}
?>
