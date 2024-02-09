<?php
require_once "session-session.php"; 

?>



<div class="general-request-overlay-container">

<i class="fa fa-close" id="close-page"></i>

<div class="case-overlay-option">
  <p><i class="fa fa-close" id="closeCasebtn"></i></p>
  <div class="container-container-response">
    <form class="create-create">
      <input type='hidden' name='router' value='album'>
      <label><b>Album name</b></label>
      <input type="text" name="abname" placeholder="Untitle Album...">
      <label><b>Genre</b></label>
      <select name="genre">
        <option></option>
        <option>Afro beat</option>
        <option>Blues</option>
        <option>Gospel</option>
        <option>Hip hop</option>
        <option>Amapiano</option>
        <option>Raggae</option>
        <option>Others</option>
      </select>
      <label><b>Abulm Mode</b></label>
      <select name="status">
        <option></option>
        <option>Public</option>
        <option>Private</option>
      </select>
      <label><b>Album Image</b></label>
      <input type="file" accept="image" name="item-image">
      <button><i class="fa fa-plus"></i> create Album</button>
    </form>
  </div>
</div>

<div class="container-fluid-option">
  <br>
  <button id="OpenCasebtn"><i class="fa fa-plus"></i> Create  Album</button>
<br>
  <form class="AlbData"><input type="hidden" name="router" value="manage-album"><button><i class="fa fa-database"></i>
     Manage Album</button></form>
<br>
     <span class="response-type-one"></span>
     <br>
     <span class="response-type-two"></span>


</div>
</div>