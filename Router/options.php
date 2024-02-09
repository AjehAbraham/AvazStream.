<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["router"]) && !empty($_POST["router"])){

$router = htmlspecialchars($_POST["router"]);

//print_r($_POST);

if($router == "options"){

//CHECK FOR MUSCI OR ALBUM HASH/ID//

if(isset($_POST["query"]) && !empty($_POST["query"])){

$query = htmlspecialchars($_POST["query"]);

$query = trim($query);


//CHECK IS QUERY IS VALID//
require_once "connection_db.php";

$autoChecker = "SELECT * FROM Sound_video_db WHERE TrackID='$query'";

$auto_result = mysqli_query($conn,$autoChecker);

if(mysqli_num_rows($auto_result) > 0){

$id = mysqli_fetch_assoc($auto_result);


$sound_query = "<input type='hidden' name='query' value='$query'>";


if(isset($_SESSION["streamID"])){

if($id["UniqueID"] == $_SESSION["streamID"]){


$report_banner = "";
    
}else{

$report_banner = '
    
<p><form class="Data-form-option"><input type="hidden" name="CMD" value="report">
'.$sound_query.'
<button><i class="	fa fa-ban"></i>  Report sound</button></form></p>
';

}

}else{

    $report_banner = '
    
    <p><form class="Data-form-option"><input type="hidden" name="CMD" value="report">
    '.$sound_query.'
    <button><i class="	fa fa-ban"></i>  Report sound</button></form></p>
    ';
    


}

}else{

//RETURN NOTHING AS MUSIC/VIDEO HASH IS NOT VALID//
    die();
}


}else{


    //RETURN NOTHING//
    die();
}


if(isset($_SESSION["streamID"])){

    if($_SESSION["streamID"] == $id["UniqueID"]){

    $delete = '
    <p><form class="Data-form-option"><input type="hidden" name="CMD" value="delete">
    '.$sound_query.'
    <button style="background-color: red;">
    <i class="fa fa-close"></i> Delete song</button></form></p>

';
    }else{

        $delete = "";
    }

$play_list_checker = "SELECT * FROM Library_playlist WHERE TrackID='$query'";

$playResult = mysqli_query($conn,$play_list_checker);

if(mysqli_num_rows($playResult) > 0){

    $play_btn = "style='background-color: red;'";
    $play_text = " Remove song";

    $form = "value='rm-lib'";

}else{


    $play_btn = "";
    $play_text = "Add to Library";

    $form = "value='lib'";

}



}else{
    
    $play_btn = "";
    $play_text = "Add to Library";

    $form = "value='lib'";

    $delete = "";
}


//CHECK IF USER IS PLAYING FROM THEIR LIBRARY/PLAYLIST//

if(isset($_POST["type"]) && !empty($_POST["type"])){

$type=htmlspecialchars($_POST["type"]);

if(isset($_SESSION["streamID"])){

$type = "<input type='hidden' name='type=' value='play-lib'>";

}else{

$type = "";



}

}else{
$type = "";


}


$closeOption = "document.querySelector('.options-container-overlay').
style.display= 'none';";

echo '
<div class="options-container-overlay">

<p><i class="fa fa-close" id="closeOption" onclick="'.$closeOption.'" ></i></p>
    <p><form class="Data-form-option">'. $type.'<input type="hidden" name="CMD" value="play">
    '.$sound_query.'<button><i class="fa fa-play"></i> 
    Play song</button></form></p>
    
    
    <p><form class="Data-form-option">'. $type.'<input type="hidden" name="CMD" value="play-next">
    '.$sound_query.'
    <button><i class="fa fa-toggle-right"></i> Play Last </button></form></p>



    <p><form class="Data-form-option"><input type="hidden" name="CMD" value="like">
    '.$sound_query.
    '<button><i class="	fa fa-thumbs-up"></i> Like Song </button></form></p> 
    
    
     <p><form class="Data-form-option"><input type="hidden" name="CMD" value="dis-like">
     '.$sound_query.'
     <button>
     <i class="fa fa-thumbs-down"></i> Dislike Song </button></form></p>



    <p><form class="Data-form-option"><input type="hidden" name="CMD"'. $form.'>
    '.$sound_query.'
    <button '. $play_btn.'><i class="fa fa-plus-circle"></i>'.$play_text.'</button></form></p>
  
    
'.$delete.'
'.$report_banner.'
    
    
  </div>

';

    exit;


}elseif($router = "option-two"){



}else{


    if($router == "process"){




    }
}


}else{


    //RETRUN NOTHING//
}


}