<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

exit;

}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

    exit;
}
?>
<style>
.genre-class-container-overlay{
  background-color: black;
  overflow-y: ;
  transition: 0.1s;
  position: fixed;
  bottom: 0%;
  right: 0;
  left: 0%;
  top: 0%;
z-index: 7;
width: 100%;
color: white;
text-align: center;
}
 .genre-class-container-overlay ul {
    padding: 0;
    margin: 0;
    clear: both;
  }
  
  .genre-class-container-overlay li{
    list-style-type: none;
    list-style-position: outside;
    padding: 10px;
    float: left;
    
  }
  
  .genre-class-container-overlay input[type="checkbox"]:not(:checked), 
  .genre-class-container-overlay input[type="checkbox"]:checked {
    position: absolute;
    left: -9999%;
  }
  
  .genre-class-container-overlay input[type="checkbox"] + label {
    display: inline-block;
    padding: 10px;
    cursor: pointer;
    border: 1px solid black;
    color: black;
    background-color: white;
    margin-bottom: 10px;
    border-radius: 2rem;
    margin: auto;
    display: block;
  }
  
  .genre-class-container-overlay input[type="checkbox"]:checked + label {
    border: 1px solid  rgb(0,120,100);
    color: white;
    background-color: rgb(0,120,100);
  }
  .genre-class-container-overlay button{
    margin: auto;
    display: block;
    background-color: rgb(0,120,100);
    color: white;
    border-radius: 2rem;
    font-size: 15px;
    width: 62%;
    padding: 7px 7px;
    cursor: pointer;
    
    margin-top: 18%;
  }
  @media screen and (min-width:600px) {
    
    .genre-class-container-overlay button{
      width: 44%;
      margin-top: 7%;
    }
  }
  .genre-class-container-overlay p{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
  }
  </style>


<div class="genre-class-container-overlay">
  <p>Choose your prefered Genre</p>

  <form class="type-type" onsubmit="return false">
    <ul>
      <li>
        <input type="checkbox" id="check_1" name="check_1" value="Afro-beat">
        <label for="check_1">Afro Beat</label>
      </li>
      <li>
        <input type="checkbox" id="check_2" name="check_2" value="hip-hop">
        <label for="check_2">Hip Hop</label>
      </li>
      <li>
        <input type="checkbox" id="check_3" name="check_3" value="r-b">
        <label for="check_3">R & B</label>
      </li>
      <li>
        <input type="checkbox" id="check_4" name="check_4" value="raggae">
        <label for="check_4">Raggae</label>
      </li>
      <li>
        <input type="checkbox" id="check_5" name="check_5" value="Amapiano">
        <label for="check_5">Amapiano</label>
      </li>
      <li>
        <input type="checkbox" id="check_6" name="check_6" value="gospel">
        <label for="check_6">Gospel</label>
      </li>
      <li>
        <input type="checkbox" id="check_7" name="check_7" value="fuji">
        <label for="check_7">Juju/Fuji</label>
      </li>
      
      <li>
        <input type="checkbox" id="check_8" name="check_8" value="high-life">
        <label for="check_8">High Life</label>
      </li>
      <br><br>
<button><i class="fa fa-check"></i> submit</button>
  </form>
  </div>

