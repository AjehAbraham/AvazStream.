<?php
session_start();
require_once "session-session.php"; 

$fetch = "SELECT * FROM Albums WHERE UniqueID='$_SESSION[streamID]' ORDER BY id DESC";

$Abresult = mysqli_query($conn,$fetch);

if(mysqli_num_rows($Abresult) > 0){

    while($albums = mysqli_fetch_assoc($Abresult)){

echo "

<div class='manage-container-fluid'>
<form class='Albdata-2'><input type='hidden' name='router' value='album'>
<input type='hidden' name='name' value='$albums[HashID]'>
<button><i  class='fa fa-music' style='color: red;'></i>  " . strtoupper($albums["Album_name"]) . "</button></form>
</div>

";




    }


    
    exit;

}else{


    die("<p style='text-align: center;'>You do not have any Album</p>");
}


?>
