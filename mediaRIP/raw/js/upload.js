var x=0;
var y=0;
var z=0;
var g=0;
var h=0;



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



function searchMovie(){
    document.getElementById("lol").style.visibility = "visible";
    document.getElementById("lol").innerHTML="<form method='post' action='' enctype='multipart/form-data'> <input type='text' name='movieN' placeholder='Enter the name of movie you want to upload'><input type='submit' name='searchmovie' value='SEARCH POSTER '></form>"
    document.getElementById("sel").style.visibility = "hidden";
     document.getElementById("tot").style.visibility = "hidden";
      document.getElementById("file").style.visibility = "hidden";
       document.getElementById("title").style.visibility = "hidden";

}
function hideMovie(){
    document.getElementById("lol").style.visibility = "hidden";
    document.getElementById("sel").style.visibility = "visible";
     document.getElementById("tot").style.visibility = "visible";
      document.getElementById("file").style.visibility = "visible";
       document.getElementById("title").style.visibility = "visible";
}
function changeImage() {

            document.getElementById("Movie").src = "../raw/pics/movie1.png";
       
    }
 function changeBack() {
    //window.alert(x);
    if(x==0){
            document.getElementById("Movie").src = "../raw/pics/movie.png";}
        
    }
 function fixImage(){
            x=1;
            document.getElementById("Movie").src = "../raw/pics/movie1.png";
            y=0;
            z=0;
            g=0;
            h=0;
    }
    function changeImage1() {

            document.getElementById("TV").src = "../raw/pics/tv1.png";
       
    }
 function changeBack1() {
    if(y==0){
            document.getElementById("TV").src = "../raw/pics/tv.png";}
        
    }
 function fixImage1(){
            y=1;
            document.getElementById("TV").src = "../raw/pics/tv1.png";
            x=0;
            z=0;
            g=0;
            h=0;
        
    }
    function changeImage2() {

            document.getElementById("Music").src = "../raw/pics/music1.png";
       
    }
 function changeBack2() {
    if(z==0){
            document.getElementById("Music").src = "../raw/pics/music.png";}
        
    }
 function fixImage2(){
            z=1;
            document.getElementById("Music").src = "../raw/pics/music1.png";
            x=0;
            y=0;
            g=0;
            h=0;
        
    }
    function changeImage3() {

            document.getElementById("Camera").src = "../raw/pics/camera1.png";
       
    }
 function changeBack3() {
    if(g==0){
            document.getElementById("Camera").src = "../raw/pics/camera.png";}
        
    }
 function fixImage3(){
            g=1;
            document.getElementById("Camera").src = "../raw/pics/camera1.png";
            x=0;
            y=0;
            z=0;
            h=0;
        
    }
    function changeImage4() {

            document.getElementById("Homevideo").src = "../raw/pics/homevideo1.png";
       
    }
 function changeBack4() {
    if(h==0){
            document.getElementById("Homevideo").src = "../raw/pics/homevideo.png";}
        
    }
 function fixImage4(){
            h=1;
            document.getElementById("Homevideo").src = "../raw/pics/homevideo1.png";
            x=0;
            y=0;
            z=0;
            g=0;
        
    }
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


