<?php
session_start();
require_once "session-session.php";
if($userInfo["Image_path"] == ""){

  $imagePath = "Upload/Null-image.png";
}else{

  $imagePath = "Upload/".$userInfo["Image_path"];
}

?>

<div class="profile-page-container-overlay">
<div class="profile-container">
  <p><i class="fa fa-close" id="pfBtn"></i></p>
  <p>Hi <?php echo $userInfo["Username"]; ?>!</p>
  
<img src="<?php echo $imagePath; ?>"  id="output">

<form class="data-pf">
<input type="file" name="item-image" onchange="loadFile(event)"
style="display:none;" id="file">
    
<p><label for="file" onclick="upload(event)" style="cursor: pointer;"> select image</p>
<button><i class="fa fa-upload"></i> Upload</button>
</form>

<label><b>Name</b></label>
<input type="text" value='<?php echo $userInfo["First_name"]. " ". $userInfo["Last_name"]; ?>'>

  <label><b>E-mail</b></label>
  <input type="text" readonly value='<?php echo $userInfo["Email"]; ?>'>

  <form class="data-pf">
  <input type='hidden' name='router' value='username'>
  <button><i class="fa fa-user"></i> Change Username</button></form>
  
  <form class="data-pf">
    <input type='hidden' name='router' value='verify'>
  <button><i class="fa fa-user-times"></i> Verify Account</button>
  </form>
  
  <form class="data-pf">
  <input type='hidden' name='router' value='manage-sub'>
  <button><i class="fa fa-money"></i> Manage subscription</button>
  </form>
  


  <p class="error_message"></p>
</div>
</div>
