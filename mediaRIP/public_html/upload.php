<?php require_once("../resources/config.php");?>

<?php if(isset($_GET['username'])){
  $username = get_user();
}
?>

<html>
<head>
<link rel="icon" type="image/gif/png" href="../raw/pics/cassette.png" height="13%">
<title>mediaRIP</title>
<link href="../raw/CSS/styles.css" rel="stylesheet" type="text/css" media="screen">
<style>
/* The Modal (background) */
.modal1 {
     display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content1 {
    position: fixed;
   top: 10%;
    left:20%;
    background-color: black;
    width: 60%;
    
}

/* The Close Button */
.close1 {
   color: black;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header1 {
     padding: 1% 2%;
    background-color: #02FA02;
    color: black;
     font-weight: 900;
      font-family:'Open Sans', sans-serif;
}

.modal-body1 {padding: 1% 2%;color: #02FA02;   font-weight: 600;
  font-family:'Open Sans', sans-serif;}


.modal-footer1 {
    
     padding:2% 0px;
    position:absolute;
    top:95%;
    left:0%;
    width:100%;
    background-color: #02FA02;
    color: black;
   
}


</style>
<script>
function _(el){
    return document.getElementById(el);
}

function uploadFile(){
    var file = _("video").files[0];
     //   alert(file.name);
    var formdata = new FormData();
    formdata.append("video", file);
    var ajax = new XMLHttpRequest ();



    ajax.upload.addEventListener("progress", progressHandler, false) ;
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("load", errorHandler, false);
    ajax.addEventListener("load", abortHandler, false);

    ajax.open("POST" , "../resources/upload.php?username=<?php echo $username ?>" ,true);
    ajax.send(formdata);
}
function progressHandler(event){
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML =Math.round(percent)+"% UPLOADED";
}
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status").innerHTML = "Checking uploaded file";
}




</script>

</head>
<body>


<script>var i=1;
</script>

<button id="myBtn1"></button>

<!-- Trigger/Open The Modal -->











<!-- The Modal -->
<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1" id="modal-content1">
    <div class="modal-header1">
      <span class="close1">&times;</span>
      <h2>+ Add Media</h2>
    </div>
    <div class="modal-body1" style="padding-bottom: 4%;">
      
    


 <?php 


    
    moviePoster();
   // tvSeriesPoster();
    add_media();
    episodeSeason();
    upload2();
    episodeSeason2();
     ?>
    </div>
    <div class="modal-footer1">
      
    </div>
  </div>

</div>

</form>


</body>
</html>



   


    

<script>

// Get the modal
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 

if (i==1){
modal1.style.display = "block";}

btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
      window.location = 'welcome.php?movies&username=<?php echo $username; ?>';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
        window.location = 'welcome.php?movies&username=<?php echo $username; ?>';
    }
}


</script>
<script>
      var screenWidth = window.outerWidth;
if (screenWidth<1000){
  
               document.getElementById("modal-content1").style.width = '80%';
               document.getElementById("modal-content1").style.left = '10%';
               document.getElementById("modal-content1").style.top = '2%';
             
                }
</script>

</body>
</html>
