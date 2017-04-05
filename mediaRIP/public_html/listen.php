<?php require_once("../resources/config.php");
?>

<head>

</head>

<body bgcolor="black">


<?php
    $query = query(" SELECT * FROM media WHERE media_id = " . escape_string($_GET['id']) . " ");
    
    confirm($query);
      while($row = fetch_array($query)):
      $audio = $row['media_location'];
   endwhile;

?>



<audio controls="controls" autoplay>
  <source src="<?php echo "http://$ip$audio"; ?>" type="audio/mpeg" />
</audio>

</body>