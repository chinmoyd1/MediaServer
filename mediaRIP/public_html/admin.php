<?php require_once("../resources/config.php");?>
<html>
<head>
<style>
table {
    width:95%;
    margin-top: 1.6%;
    margin-left: 2%;
}
table, th, td {
    border: none;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
    color: grey;
    font-family: sans-serif;
}
td {
	font-size: 14px;
	padding-top: 1%;
}
th{
	background-color: black;
    color: grey;

}
#users li{
	float:left;
	margin-right: 4%;
	padding: 1%;
	cursor: pointer;
	 border-radius: 1em;

}
</style>
</head>
<body>


<?php

if (isset($_POST['active'])){
	//echo 'in';

	$key = $_POST['id'];
	//echo "UPDATE users SET user_level=1 WHERE user_id=$key";
	$query = query("UPDATE users SET user_level=1 WHERE user_id=$key");
	confirm($query);
}
elseif (isset($_POST['admin'])){
	//echo 'in';

	$key = $_POST['id'];
	//echo "UPDATE users SET user_level=1 WHERE user_id=$key";
	$query = query("UPDATE users SET user_level=99 WHERE user_id=$key");
	confirm($query);
}
elseif (isset($_POST['deactive'])){
	//echo 'in';

	$key = $_POST['id'];
	//echo "UPDATE users SET user_level=1 WHERE user_id=$key";
	$query = query("UPDATE users SET user_level=0 WHERE user_id=$key");
	confirm($query);
}

?>

<h1 style='font-family: sans-serif;font-size: 21px;color: #CFCFCF;padding-top: 1.6%;padding-left: 2%;'>User Management</h1>

<div id="users" >
    
<table>
  <tr>
    <th>Id</th>
    <th>Username</th> 
    <th>Email</th>
  	<th>Status</th>
  </tr>

<?php

	$query = query(" SELECT * FROM users;");
	confirm($query);

	while($row = fetch_array($query)){
		 $pro= <<<_END

      
   <tr>
    <td>{$row['user_id']}</td>
    <td>{$row['username']}</td>
    <td>{$row['email']}</td>
    <td>
_END;
       
       echo $pro;


    if($row['user_level']==0){
    	echo '<ul><li style="background-color:red;float:left;color:black">Deactive</li>';
    	echo '<li><form method="post" action=""><input type="hidden" name="id" value="'.$row['user_id'].'"><input type="submit" name="active" value="Active" style="background-color:#0D0D0D;color:grey; border: none;cursor:pointer;"></form></li>';
    	echo '<li><form method="post" action=""><input type="hidden" name="id" value="'.$row['user_id'].'"><input type="submit" name="admin" value="Admin" style="background-color:#0D0D0D;color:grey; border: none;cursor:pointer;"></form></li></ul>';
    }
    elseif($row['user_level']==99){
    	echo '<ul><li><form method="post" action=""><input type="hidden" name="id" value="'.$row['user_id'].'"><input type="submit" name="deactive" value="Dective" style="background-color:#0D0D0D;color:grey; border: none;cursor:pointer;"></form></li>';
    	echo '<li><form method="post" action=""><input type="hidden" name="id" value="'.$row['user_id'].'"><input type="submit" name="active" value="Active" style="background-color:#0D0D0D;color:grey; border: none;cursor:pointer;"></form></li>';
    	echo '<li style="background-color:#02FA02;;color:black;">Admin</li></ul>';
    }
    else{
    	echo '<ul><li><form method="post" action=""><input type="hidden" name="id" value="'.$row['user_id'].'"><input type="submit" name="deactive" value="Dective" style="background-color:#0D0D0D;color:grey; border: none;cursor:pointer;"></form></li>';
    	echo '<li style="background-color:yellow;color:black;">Active</li>';
    	echo '<li><form method="post" action=""><input type="hidden" name="id" value="'.$row['user_id'].'"><input type="submit" name="admin" value="Admin" style="background-color:#0D0D0D;color:grey; border: none;cursor:pointer;"></form></li></ul>';
    }

echo    '</td></tr>';

     
   
  
   
    
    
       
       

   }
?>

</table> </div>


</body>
</html>