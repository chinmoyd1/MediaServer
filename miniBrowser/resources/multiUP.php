<?php
require_once("config.php");

$username = get_user();

$media_category_id = $_POST['product_category_id'];
//echo $media_category_id;
session_start();
$_SESSION['ID'] = null;
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  
  </style>
</head>
<body style="color: grey;">



<?php

//<center><img src='images/loading.gif' width='60%'></center>

if(isset($_POST['multiUpload']))
  {


echo "<h1 style='color:#02FA02;height:20px;padding-left:2%;padding-bottom:3%;'>Media Uploaded</h1>";
echo "<a style='text-decoration:none;' href='http://".$ip."/mediaRIP/public_html/welcome.php?movies&username=".$username."' target='_top'><div style='z-index:101;position:fixed;top:15%;right:12%;background-color:#02FA02;padding-right:5%;padding-left:5%;'><h1 style='color:black;height:30px;padding-left:2%;'>OK</h1></div></a>";

$media_title = escape_string($_POST['movieN']);


//echo $media_title;
//echo $media_category_id;

if($media_category_id == 5)
  {
  //  echo "out";
  //echo $media_title;
  $media_title = str_replace("\\","",$media_title);
    call('/var/www/html'.$media_title);
  }
else if($media_category_id == 4){
  //echo "in";
  $media_title = str_replace("\\","",$media_title);
    call1('/var/www/html'.$media_title);
  }
else if($media_category_id == 3){
  //echo "in";
  $media_title = str_replace("\\","",$media_title);
    call2('/var/www/html'.$media_title);
  }
else if($media_category_id == 1){
  //echo "in";
  $media_title = str_replace("\\","",$media_title);
    call3('/var/www/html'.$media_title);
  }
else if($media_category_id == 2){
  //echo "in";
  $media_title = str_replace("\\","",$media_title);
    call4('/var/www/html'.$media_title);
  }
}

if(isset($_POST['can'])){
  echo "<h1 style='font-size:30px;color:grey;padding-left:1%;'>Seems like You have cancelled Uploading.</h1>";
echo"<a style='text-decoration:none;' href='http://".$ip."/mediaRIP/public_html/welcome.php?movies&username=".$username."' target='_top'><h1 style='color:#02FA02;padding-left:5%;cursor:pointer;'>OK</h1></a>";
echo "<img src='images/think.png' height='300px;' style='float:right;padding-right:2%;'>";
}


function multiScan($dest) {
   // echo "<hr>$dest <hr><br>";
  $media_category_id = $_POST['product_category_id'];
  //echo $media_category_id;
  $dest = str_replace("//","/","$dest");
    $ar = explode('.',$dest);
    $type = array_pop((array_slice($ar, -1)));

   // echo "TYPE: ".$type;

    if($type == 'mp4' || $type == 'mkv' || $type == 'MP4'){
      //echo $dest."<br>";


$cmd1 = "hostname -I";
$ip5 = exec($cmd1);
$arr2 = explode(" ", $ip5);
//echo $ip5;
$ip = $arr2[0];
//echo $ip;

         $ar1 = explode('/',$dest);
         $arr1 = $ar1[6];
         $arr1 = array_pop((array_slice($ar1, -1)));
       echo $arr1."<br>";
       $arr1 = str_replace("'","''",$arr1);

           $ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
           $videoLocation = $dest;

           $videoLocation = str_replace("/var/www/html","",$videoLocation);
          // echo "<hr>".$videoLocation."<hr>";

           $getFromSecond = 130;
           $size = "250x150";
           $random_name = rand();
           $imageFile = $random_name.".jpg";

          
            $videoLocation = str_replace(" ","%20",$videoLocation);
            $videoLocation = str_replace("'","'\''",$videoLocation);
            

            // echo $videoLocation;
            //echo "$ffmpeg -ss $getFromSecond -i '$url$videoLocation' -an -s $size trash/$imageFile 2>&1";
          //  echo "$ffmpeg -ss $getFromSecond -i 'http://$ip:80$videoLocation' -an -s $size ../../mediaRIP/uploads/thumbnails/$imageFile 2>&1";
            $cmd = "$ffmpeg -ss $getFromSecond -i 'http://$ip:80$videoLocation' -an -s $size ../../mediaRIP/uploads/thumbnails/$imageFile 2>&1";
            //   exec($cmd); 

            $result = exec($cmd); 


            if ($result == "Output file is empty, nothing was encoded (check -ss / -t / -frames parameters if used)"){
            // echo "in";
            $getFromSecond = 10;
            $cmd = "$ffmpeg -ss $getFromSecond -i 'http://$ip:80$videoLocation' -an -s $size ../../mediaRIP/uploads/thumbnails/$imageFile 2>&1";
            exec($cmd); 
            } 

            $videoLocation = str_replace("%20"," ",$videoLocation);
            $videoLocation = str_replace("'\''","''",$videoLocation);
      //  echo $arr1;
            $media_image = '/mediaRIP/uploads/thumbnails/'.$imageFile;

           //  ini_set('display_errors', 1);
           //  error_reporting(E_ALL); 

           //  echo "INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$arr1}','{$media_category_id}','{$media_image}','{$videoLocation}')";

            $query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$arr1}','{$media_category_id}','{$media_image}','{$videoLocation}')");
  
            confirm($query);




    }

    $video_array = scandir($dest);

unset($video_array[0]);
unset($video_array[1]);

//echo "<pre>";
//print_r($video_array);
//echo "</pre>";

foreach ( $video_array as $filename) {
   // echo $filename."<br>";
    multiScan($dest.'/'.$filename);
    } 

}

function multiScan1($dest) {
  // echo "<hr>$dest <hr><br>";
  $media_category_id = $_POST['product_category_id'];
  //echo $media_category_id;
  $dest = str_replace("//","/","$dest");
    $ar = explode('.',$dest);
    $type = array_pop((array_slice($ar, -1)));

   // echo "TYPE: ".$type;

    if($type == 'jpg' || $type == 'jpeg' || $type == 'png' || $type == 'gif' || $type == 'ico' || $type == 'JPEG'){
    //  echo $dest."<br>";
 $ar1 = explode('/',$dest);
         $arr1 = $ar1[6];
         $arr1 = array_pop((array_slice($ar1, -1)));
       echo $arr1."<br>";
       $arr1 = str_replace("'","''",$arr1);

       $media_image = "NULL";
        $videoLocation = $dest;

           $videoLocation = str_replace("/var/www/html","",$videoLocation);

            $videoLocation = str_replace("'","''",$videoLocation);
       // echo $videoLocation.'<br>';

   $query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$arr1}','{$media_category_id}','{$media_image}','{$videoLocation}')");
  
    confirm($query);




    }

    $video_array = scandir($dest);

unset($video_array[0]);
unset($video_array[1]);

//echo "<pre>";
//print_r($video_array);
//echo "</pre>";

foreach ( $video_array as $filename) {
   // echo $filename."<br>";
    multiScan1($dest.'/'.$filename);
    }

}
function multiScan2($dest) {
  // echo "<hr>$dest <hr><br>";
  $media_category_id = $_POST['product_category_id'];
  //echo $media_category_id;
  $dest = str_replace("//","/","$dest");
    $ar = explode('.',$dest);
    $type = array_pop((array_slice($ar, -1)));

   // echo "TYPE: ".$type;

    if($type == 'mp3' || $type == 'm4a'){

        $ar1 = explode('/',$dest);
      $arr1 = $ar1[6];
      $arr1 = array_pop((array_slice($ar1, -1)));
    echo $arr1."<br>";

    require_once('../../browser/public_html/getID3-1.9.12/getid3/getid3.php');
        $getID3 = new getID3;


        $file=$dest;
                
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
            $tracktitle = $arr1;
          //  echo $tracktitle.'.jpg<br>';
            file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$tracktitle .".jpg",$rawImage);
            $media_image = "/mediaRIP/uploads/posters/".$tracktitle .".jpg"; 

          }else{
          //  echo "Error Getting Albumart from URL.";
            $media_image = "/mediaRIP/uploads/posters/music.jpg";
          }
             // echo '<img src="'.$Image.'">';

        }
        else{

         $musicName=$arr1;
                $shreds = explode('.',$musicName);
                array_pop($shreds);

                $x222= null;
          foreach ($shreds as $x) {
                $x222 .= $x;
                }
                $musicName = $x222;

                  
        $musicName1 = $musicName;
            //    echo $musicName;
        $musicName = str_replace(" ","+","$musicName");
        $url ="https://itunes.apple.com/search?term=$musicName&limit=1";

        $content = file_get_contents($url);
          $str = trim($content);
        $temp = explode('":',$str);
        $temp2 = explode(',',$temp[1]);


        if($temp2[0] == '0'){
          //echo 'in';
            $explode = explode('(',$musicName1);
          $explode1 = explode(')',$explode[1]);
              
          $musicName = $explode[0].$explode1[1];
          //  echo $musicName;
            $musicName = str_replace(" ","+","$musicName");
            $url ="https://itunes.apple.com/search?term=$musicName&limit=1";

            $content = file_get_contents($url);
          //  echo $content;

          $str = trim($content);
          $temp = explode('":',$str);
          $temp2 = explode(',',$temp[1]);
        
          if($temp2[0] == '0'){
              //echo 'in';
          }

        }

        $temp = explode('", "',$str);
        $temp2 = explode('":"',$temp[2]);
        $artist = $temp2[1];
        $temp3 = explode('":"',$temp[6]);
        $tracktitle = $temp3[1];

        $temp4 = explode('":"',$temp[12]);
        $albumart = $temp4[1];

        $albumart30 = str_replace("30","300","$albumart");
        $albumart60 = str_replace("60","300","$albumart30");
        $albumart300 = str_replace("100","300","$albumart60");

        $temp7 = explode('":"',$temp[16]);
        $country = $temp7[1];
        $temp5 = explode('":"',$temp[18]);
        $genre = $temp5[1];
        $temp6 = explode('":"',$temp[19]);
        $rating = $temp6[1];

        $Image=$albumart300;

         // echo '<img src="'.$Image.'">';

        if($albumart300 != NULL){

          $url6 = $albumart300;
          @$rawImage = file_get_contents($url6);
          if($rawImage){
            file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$tracktitle .".jpg",$rawImage);
            $media_image = "/mediaRIP/uploads/posters/".$tracktitle .".jpg";
          }else{
            //echo "Error Getting Albumart from URL.";
            $media_image = "/mediaRIP/uploads/posters/music.jpg";
          }

        }

        else{
          //echo "<br>Albumart not available.<br>" ;
            $tracktitle = $arr1;
          //  echo '-----------'.$tracktitle.'---------<br>';
          $media_image = "/mediaRIP/uploads/posters/music.jpg";
        }


            }

    $videoLocation = $dest;
    $videoLocation = str_replace("/var/www/html","",$videoLocation);
    $videoLocation = str_replace("'","''",$videoLocation);
          
      // echo $videoLocation.'<br>';
            
        $tracktitle = str_replace("'","''",$tracktitle);
        $media_image = str_replace("'","''",$media_image);
    $query = query("INSERT INTO music(track_name,singer,country,rating,genre,album_art,music_location) VALUES('{$tracktitle}','{$artist}','{$country}','{$rating}','{$genre}','{$media_image}','{$videoLocation}')");
  
      confirm($query);          

    
    }

    $video_array = scandir($dest);

unset($video_array[0]);
unset($video_array[1]);

//echo "<pre>";
//print_r($video_array);
//echo "</pre>";

foreach ( $video_array as $filename) {
   // echo $filename."<br>";
    multiScan2($dest.'/'.$filename);
    }

}
function multiScan3($dest) {
  // echo "<hr>$dest <hr><br>";
  $media_category_id = $_POST['product_category_id'];
  //echo $media_category_id;
  $dest = str_replace("//","/","$dest");
    $ar = explode('.',$dest);
    $type = array_pop((array_slice($ar, -1)));

   // echo "TYPE: ".$type;

    if($type == 'mp4' || $type == 'mkv' || $type == 'MP4'){

        $ar1 = explode('/',$dest);
      $arr1 = $ar1[6];
      $arr1 = array_pop((array_slice($ar1, -1)));
    //echo $arr1."<br>";
    //echo "<hr>$dest <hr><br>";
    $length = filesize($dest)/1000000;
    //echo $length;

    if(1){
    
     $explode = explode('(',$arr1);
     $explode1 = explode(')',$explode[1]);
              
     $movieName = $explode[0].$explode1[1];

     $explode = explode('[',$movieName);
     $explode1 = explode(']',$explode[1]);
              
     $movieName = $explode[0].$explode1[1];

     $explode = explode('.',$movieName);
     $movieName = array_pop($explode);

     $re = "/^(?=(?:.*[a-zA-Z]){0})(?=(?:.*[0-9]){4})\\w+$/m"; 

      $x1 = null;
                    foreach ($explode as $x) {
                      //echo'<br>++++'.$x.'<br>';
                      if(preg_match($re, $x)){
                         goto someLine;
                      }
                      else{
                          $x1 .=$x.' ';
                      }
                    }

          someLine: $movieName = $x1;

      

 //  echo $movieName.'<br>';   





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

echo $title.'<br>';

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


//ini_set('display_errors', 1);
//error_reporting(E_ALL); 


if($poster != NULL){

//echo '<img src=" ' . $poster .'" style="width:300px;" >' ;

$url6 = $poster;
//echo $url6;

@$rawImage = file_get_contents($url6);
if($rawImage){

  file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$title .".jpg",$rawImage);
  //echo "Image Saved!";


    $videoLocation = $dest;
    $videoLocation = str_replace("/var/www/html","",$videoLocation);
    $videoLocation = str_replace("'","''",$videoLocation);
          
      // echo $videoLocation.'<br>';
            

        $media_image = "/mediaRIP/uploads/posters/".$title .".jpg";
        $title = str_replace("'","''",$title);
        $media_image = str_replace("'","''",$media_image);

$query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$title}','{$media_category_id}','{$media_image}','{$videoLocation}')");
            global $connection;
            $Id = $connection->insert_id;
            //echo $Id;

               $rated = str_replace("'","''",$rated);
              $released = str_replace("'","''",$released);
               $genre = str_replace("'","''",$genre);
                $writer = str_replace("'","''",$writer);
                 $director = str_replace("'","''",$director);
                  $actor = str_replace("'","''",$actor);
                  $plot = str_replace("'","''",$plot);
                    $language = str_replace("'","''",$language);
                     $country = str_replace("'","''",$country);
                      $awards = str_replace("'","''",$awards);

            $query3 = query("INSERT INTO movies(movie_id,title,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,poster) VALUES('{$Id}','{$title}','{$year}','{$rated}','{$released}','{$runtime}','{$genre}','{$director}','{$writer}','{$actor}','{$plot}','{$language}','{$country}','{$awards}','{$media_image}')");

            confirm($query3);



}else{
  echo "Error Getting Image from URL";
}

}


}



    
    }

    $video_array = scandir($dest);

unset($video_array[0]);
unset($video_array[1]);

//echo "<pre>";
//print_r($video_array);
//echo "</pre>";

foreach ( $video_array as $filename) {
   // echo $filename."<br>";
    multiScan3($dest.'/'.$filename);
    }

}

function multiScan4($dest,$flag) {
  //echo "<hr>$dest <hr><br>";

if($flag==0){
    $media_title = escape_string($_POST['movieN']);

  //echo $media_title.'<br>';

    $media_title=trim($media_title, "/");
    $TVseries = $media_title;
   // echo $media_title.'<br>';
  $xplode = explode('/',$media_title);

  $media_title = array_pop($xplode);
  echo $media_title.'<br>';

        $movieName = str_replace(" ","%20","$media_title");
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

            if($poster != NULL){
              //echo '<img src=" ' . $poster .'" style="width:300px;" >' ;
              $url6 = $poster;
              //echo $url6;
              @$rawImage = file_get_contents($url6);
              if($rawImage){
                  file_put_contents("/var/www/html/mediaRIP/uploads/posters/".$title .".jpg",$rawImage);
                  //echo "Image Saved!";
                  $videoLocation = $dest;
                  $videoLocation = str_replace("/var/www/html","",$videoLocation);
                  $videoLocation = str_replace("'","''",$videoLocation);
                  // echo $videoLocation.'<br>';
                  $media_image = "/mediaRIP/uploads/posters/".$title .".jpg";
                  $title = str_replace("'","''",$title);
                  $media_image = str_replace("'","''",$media_image);


                   $media_location = escape_string($_POST['movieN']);

             $rated = str_replace("'","''",$rated);
              $released = str_replace("'","''",$released);
               $genre = str_replace("'","''",$genre);
                $writer = str_replace("'","''",$writer);
                 $director = str_replace("'","''",$director);
                  $actor = str_replace("'","''",$actor);
                  $plot = str_replace("'","''",$plot);
                    $language = str_replace("'","''",$language);
                     $country = str_replace("'","''",$country);
                      $awards = str_replace("'","''",$awards);
                  // echo "INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason,media_location) VALUES('{$media_title}','{$media_image}','{$year}','{$rated}','{$released}','{$runtime}','{$genre}','{$director}','{$writer}','{$actor}','{$plot}','{$language}','{$country}','{$awards}','{$totalseason}','{$media_location}')";

                  $query3 = query("INSERT INTO tvSeries(title,poster,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,totalseason,media_location) VALUES('{$media_title}','{$media_image}','{$year}','{$rated}','{$released}','{$runtime}','{$genre}','{$director}','{$writer}','{$actor}','{$plot}','{$language}','{$country}','{$awards}','{$totalseason}','{$media_location}')");

                   global $connection;
            $Id = $connection->insert_id;
            $_SESSION['ID'] = $Id;

           /*   $query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$title}','{$media_category_id}','{$media_image}','{$videoLocation}')");
            global $connection;
            $Id = $connection->insert_id;
            //echo $Id;


            $query3 = query("INSERT INTO movies(movie_id,title,year,rated,released,runtime,genre,director,writer,actor,plot,language,country,awards,poster) VALUES('{$Id}','{$title}','{$year}','{$rated}','{$released}','{$runtime}','{$genre}','{$director}','{$writer}','{$actor}','{$plot}','{$language}','{$country}','{$awards}','{$media_image}')");

            confirm($query3); */



}else{
  echo "Error Getting Image from URL";
}

// echo $Id;

} 

  //echo $Id;
  $flag=1;
  
}


// echo "<hr>$dest <hr><br>";
  $media_category_id = $_POST['product_category_id'];
  //echo $media_category_id;
  $dest = str_replace("//","/","$dest");
    $ar = explode('.',$dest);
    $type = array_pop((array_slice($ar, -1)));

   // echo "TYPE: ".$type;

    if($type == 'mp4' || $type == 'mkv' || $type == 'MP4'){

     $Id = $_SESSION['ID'];

     $cmd1 = "hostname -I";
$ip5 = exec($cmd1);
$arr2 = explode(" ", $ip5);
//echo $ip5;
$ip = $arr2[0];
//echo $ip;

      $ar1 = explode('/',$dest);
      $arr1 = $ar1[6];
      $arr1 = array_pop((array_slice($ar1, -1)));
      echo $arr1."<br>";
     // echo "<hr>$dest <hr><br>";

      $season = explode('/',$dest);
      $x1 = null;
                    foreach ($season as $x) {

                      if(strpos($x, 'eason') ){
                      $x1 .= $x;}
                    }
                    $season = intval(preg_replace('/[^0-9]+/', '', $x1), 10);
                   // echo "SEASON:".$season;

           $ffmpeg = "/home/pi/x264/ffmpeg/ffmpeg";
           $videoLocation = $dest;

           $videoLocation = str_replace("/var/www/html","",$videoLocation);
          // echo "<hr>".$videoLocation."<hr>";

           $getFromSecond = 130;
           $size = "250x150";
           $random_name = rand();
           $imageFile = $random_name.".jpg";

          
            $videoLocation = str_replace(" ","%20",$videoLocation);
            $videoLocation = str_replace("'","'\''",$videoLocation);
            

            // echo $videoLocation;
            //echo "$ffmpeg -ss $getFromSecond -i '$url$videoLocation' -an -s $size trash/$imageFile 2>&1";
  
           // echo "$ffmpeg -ss $getFromSecond -i 'http://$ip:80$videoLocation' -an -s $size ../../mediaRIP/uploads/thumbnails/$imageFile 2>&1";
            $cmd = "$ffmpeg -ss $getFromSecond -i 'http://$ip:80$videoLocation' -an -s $size ../../mediaRIP/uploads/thumbnails/$imageFile 2>&1";
            //   exec($cmd); 

            $result = exec($cmd); 


            if ($result == "Output file is empty, nothing was encoded (check -ss / -t / -frames parameters if used)"){
            // echo "in";
            $getFromSecond = 10;
            $cmd = "$ffmpeg -ss $getFromSecond -i 'http://$ip:80$videoLocation' -an -s $size var/www/html/mediaRIP/uploads/thumbnails/$imageFile 2>&1";
            exec($cmd); 
            } 

            $videoLocation = str_replace("%20"," ",$videoLocation);
            $videoLocation = str_replace("'\''","''",$videoLocation);
      //  echo $arr1;
            $media_image = '/mediaRIP/uploads/thumbnails/'.$imageFile;

           //  ini_set('display_errors', 1);
           //  error_reporting(E_ALL); 

           //  echo "INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$arr1}','{$media_category_id}','{$media_image}','{$videoLocation}')";

              $query = query("INSERT INTO episodes(id,episode_location,episode_pic,season) VALUES('{$Id}','{$videoLocation}','{$media_image}','{$season}')");


          //  $query = query("INSERT INTO media(media_title,media_category_id,media_image,media_location) VALUES('{$arr1}','{$media_category_id}','{$media_image}','{$videoLocation}')");
  
            confirm($query); 




}

    $video_array = scandir($dest);

unset($video_array[0]);
unset($video_array[1]);

//echo "<pre>";
//print_r($video_array);
//echo "</pre>";

foreach ( $video_array as $filename) {
   // echo $filename."<br>";
    $falg=1;
    multiScan4($dest.'/'.$filename,$falg);
    }


}


  function call($a)
{//$a = '/var/www/html';
//echo 'in0';
multiScan($a);}

function call1($a)
{//$a = '/var/www/html';
//echo 'ini';
multiScan1($a);}
function call2($a)
{//$a = '/var/www/html';
//echo 'ini';
multiScan2($a);}
function call3($a)
{//$a = '/var/www/html';
//echo 'ini';
multiScan3($a);}
function call4($a)
{//$a = '/var/www/html';
//echo 'ini';
$flag=0;
multiScan4($a,$flag);}
?>
