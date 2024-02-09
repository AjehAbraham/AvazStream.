<?php
require_once "session-session.php"; 

?>
<div class="general-request-overlay-container">
<div  class="setting-overlay-container">
  <h1><i class="fa fa-close" id="closeSettingBtn"></i></h1>

  <p><button id="oepnPassword" ><i class="fa fa-key"></i> Change password</button></p>

  <p><button onclick="alert('Unavailable,please try again later.')"><i class="fa fa-user-times"></i> De-activate account</button></p>
</div>


<div class="change-password-form">
  <i class="fa fa-close" id="closeBox"></i>
  <p>Change password</p>
  <form class="data-data-password">
  <label><b>Old password</b></label>
  <input type="text"name="" placeholder="your old password">
  
  <label><b>New password</b></label>
  
  <input type="text"name="" placeholder="create new password">
  <label><b>Confirm password</b></label>
  
  <input type="text"name="" placeholder="Re-enter new password">
  <br>
  <button><i class="fa fa-key"></i> Change password</button>
  </form>
</div>
</div>








    