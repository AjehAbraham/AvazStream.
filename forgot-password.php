<?php

/*if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

exit;

}else*/if ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

    exit;
}
?>

<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="Css/">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>AvazStream||Forgot password</title>

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


<style>
   body{
    font-size: 15px;
    margin: 0;
    background-color: black;
    color: white;
  }
    .form-container-register{
  margin: auto;
  display: block;
  width: 90%;
  margin-bottom: 7px;
  font-size: 13px;
    }
 
    @media  screen and (min-width: 600px) {
      .form-container-register{
        width: 50%;

border-radius: 2rem;
background-color: black;
box-shadow: 0px 16px 8px 0px rgba(0,0,0,0.6);
padding: 10px 10px;
      }
      
    }

    .form-container-register input[type=email],input[type=password],input[type=text]{
  padding: 10px 10px;
  width: 92%;
  border-radius: 2rem;
  border: 2px solid #ccc;
  font-size: 18px;
  margin: auto;
  display: block;
  outline: 2px solid rgb(0,120,100);
    }
    @media screen and (min-width: 600px){

      .form-container-register input[type=email],input[type=password],input[type=text]{
        font-size: 13px;;
      }
    }
    .form-container-register button{
      font-size: 15px;
      margin: auto;
      display: block;
      cursor: pointer;
      padding: 8px 8px;
      width: 92%;
      border-radius: 2rem;
      color: white;
      background-color:  rgb(0,102,100);
      border: none;
      margin-bottom: 8px;
    }
   
  .error_message{
    color: red;
  }
</style>

    <div class="form-container-register">
    
      <h1>Forgot password</h1>
      <p class="error_message"></p>
      
      <form  class="FormData">
      
        <label><b>Email:</b></label>
        
        <input type="email"  name="email" autofocus="off" size="25" autocomplete="on"  placeholder="Enter mail...">
        
        
        <br>
            <button><i class="fa fa-user-cogs"></i> Confirm</button>
</form>


</div>

<script>
       
$(document).ready(function (e) {

$(".FormData").on('submit', (function(e){


  e.preventDefault();
  
// document.querySelector(".loader-container-overlay").style.display= "block";

   $.ajax({
 
    url: 'process/reset-password-link',
type : 'POST',
data: new FormData(this),
cache: false,
contentType: false,
processData: false,
    success:function(Data){

  //    document.querySelector(".loader-container-overlay").style.display= "none";

  document.querySelector(".error_message").innerHTML =Data;
     

    if(Data == "success" || Data =="\r\nsuccess"){

        document.querySelector(".FormData").reset();
        document.querySelector(".error_message").innerHTML ="";

        alert("Reset link has been sent to your email");
    }
    

    },
    error:function(Data){
    //  document.querySelector(".loader-container-overlay").style.display= "none";
    alert("Your request could not be completed")

    }
  
   });



}));



});
</script>