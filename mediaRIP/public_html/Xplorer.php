<?php require_once("../resources/config.php");?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>


<div id="skybar" style="position: fixed;height: 10%;" >
 <h3><img src='../raw/pics/library1.png' style='height:25px;'><span>Select</span><span1 style="margin-left: 15px">Folder</span1></h3>
  <a href='<?php echo "http://".$ip."/mediaRIP/public_html/welcome.php?movies&username=".$username ?>' target='_parent';><h6 style="color:#383838;">&times;</h6></a>
</div>

<?php

require_once("save_external.php");

?>


</body>
</html>
 