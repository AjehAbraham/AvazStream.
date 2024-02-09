<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

exit;

}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

    exit;
}

?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="Css/home.css">
    <link rel="stylesheet" href="Css/music.css">
    <link rel="stylesheet" href="Css/sign-up.css">
    <link rel="stylesheet" href="Css/sign-in.css">
    <?php if(isset($_SESSION["streamID"])): ?>
    <link rel="stylesheet" href="Css/sound.css">
    <link rel="stylesheet" href="Css/profile.css">
    <link rel="stylesheet" href="Css/library.css">
    <link rel="stylesheet" href="Css/setting.css">
    <?php endif; ?>
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>AvazStream||Home</title>

<link rel="icon" type="image/jpg" href="Images/logo-image.jpg"/>
<!-- ajax and jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src= "https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- end of ajax link -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Montserrat:ital,wght@1,300&family=Poppins:wght@300&family=Tilt+Prism&display=swap" rel="stylesheet">

      </head>
      <body>


<div class="header-container-fluid">
  <b><i class="fa fa-bars" id="openBtn"></i></b>
 
<?php if(isset($_SESSION["streamID"]) && isset($_SESSION["userID"])): ?>
  <b><form class="pfDataform">
    <input type='hidden' name='router' value='profile'>
    <button><i class="fa fa-user-circle"></i></button></form></b>
    <?php endif;?>

  <b class="search-box"><i class="fa fa-search" id="searchbtn"></i></b>

</div>


<div class="sidebar-container-fluid">
<?php if(isset($_SESSION["streamID"]) && isset($_SESSION["userID"])): ?>
<form class="mysound"><input type="hidden" name="router" value="sound">
  <b><button><i class="fa fa-music"></i> Mysound</button></b></form>
  
<form class="library"><input type="hidden" name="router" value="library">
  <b><button><i class="fa fa-bank"></i> Library</button></b></form>
  
<form class="settings"><input type="hidden" name="router" value="settings">
  <b><button><i class="fa fa-cogs"></i> Settings</button></b></form>
  
<form class="router-main"><input type="hidden" name="router" value="logout">
  <b><button><i class="fa fa-power-off"></i> Logout</button></b></form>

  <?php endif; ?>

  
<?php if(!isset($_SESSION["streamID"]) && !isset($_SESSION["userID"])): ?>
<form class="router-main"><input type="hidden" name="router" value="login">
  <b><button><i class="fa fa-user"></i> Sign-in</button></b></form>
  
<form class="router-main"><input type="hidden" name="router" value="sign-up">
  <b><button><i class="fa fa-user-plus"></i> Sign-up</button></b></form>
<?php endif;?>

  <br>
  <b><i class="fa fa-close" id="closeBtn"></i></b>

</div>

<div class="search-bar-overlay">
  <b><form id="search" onsubmit="return false"><input type="search" name="query"
  placeholder="search for songs,Album,videos,sounds...."  oninput="search(event)"></form></b>

  <b class="search-response"></b>
<div class="search-response-case-close">
</div>
<b class="option-error-message"></b>

</div>

<br><br>

<p class="general-response-message"></p>


<script src="Js/main.js"></script>
<script src="Js/search-search.js"></script>
<?php if(isset($_SESSION["streamID"]) && isset($_SESSION["userID"])): ?>
  
<script src="Js/new-library.js"></script>
<script src="Js/setting.js"></script>
<script src="Js/profile.js"></script>
<script src="Js/sound.js"></script>
<!--script src="Js/library.js"></script-->
<script src="Js/finish.js"></script>
<?php else: ?>
<script src="Js/login.js"></script>
<?php endif;?>
 
</body>
</html>