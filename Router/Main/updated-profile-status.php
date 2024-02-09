<?php
require_once "session-session.php"; 

?>
<style>
    
  .setting-profile-container-overlay{
  background-color: black;
  overflow-y: scroll;
  transition: 0.1s;
  position: fixed;
  z-index: 4;
  bottom: 0%;
  right: 0;
  left: 0%;
  top: 0%;
width: 100%;
z-index: 5;
}
.form-container-just-now{
  margin: auto;
  display: block;
}
.form-container-just-now input{
  padding: 8px 8px;
  border-radius: 2rem;
  margin: auto;
  display: block;
  border: 2px solid white;
  font-size: 18px;
  width: 80%;
  outline: 2px solid rgb(0,120,100);
}
.form-container-just-now button{
  padding: 8px 8px;
  border-radius: 2rem;
  margin: auto;
  display: block;
  border: none;
  cursor: pointer;
  font-size: 15px;
  width: 60%;
  background-color: rgb(0,120,100);
  color: white;
  
}
.form-container-just-now label{
  margin: auto;
  display: block;
  text-align: center;
}
.form-container-just-now p{
  text-align: center;
  font-size: 18px;
  color: white;
}
.form-container-just-now p b{
  color: red;
}
@media screen and (min-width: 600px){
  .form-container-just-now input{
    width: 60%;
    font-size: 13px;
  }
  .form-container-just-now button{
    width: 30%;
  }
}
.error_message{
  color: red;
}
    </style>
<div class="setting-profile-container-overlay">

<div class="form-container-just-now">
  <p>Finish setting profile(<b>fill the appropriate details</b>)</p>
  <p class="error_message"></p>
  <form class="profile-data">
  <label><b>First name</b></label>
  <input type="text"  name="fname" placeholder="your first name...">
  
  <label><b>Last name</b></label>
  <input type="text"name="lname" placeholder="your last name...">
  
  <label><b>Stage name/Nickname</b></label>
  <input type="text" name="username" placeholder="your stage name...">
  <br>
  <button><i class="fa fa-send"></i> Submit</button>
  </form>
</div>
</div>