<?php
session_start();
require_once "session-session.php"; 

//print_r($_POST);

if(isset($_POST["router"]) && !empty($_POST["router"])){

$router = htmlspecialchars($_POST["router"]);

if($router === "album"){

  //CHECK IF ALBUM HASID IS PRESENT//

  if(isset($_POST["name"]) && !empty($_POST["name"])){

$abName = htmlspecialchars($_POST["name"]);
$abName = stripslashes($abName);
$abName = trim($abName);

$checker = "SELECT * FROM Albums WHERE UniqueID='$_SESSION[streamID]' AND HashID='$abName' LIMIT 1";

$abResult = mysqli_query($conn,$checker);

if(mysqli_num_rows($abResult) > 0){

  $albums = mysqli_fetch_assoc($abResult);

echo '
<b class="option-message"></b>
<div class="album-overlay-container">
<h1 class="title-message"><i  class="fa fa-music" style="color: red;"></i> '. strtoupper ($albums["Album_name"]) .'</h1>

';

$data = "alert('Coming soon shortly,Check back soon.')";
echo '
<h1><button class="upload" id="OpenTwo"><i class="fa fa-upload" ></i> Upload sound/Video</button></h1>


';
//<h1><button class="upload" onclick="'.$data.'" ><i class="fa fa-upload"></i> Move Album to Trash</button></h1>


//';

//FTECH ALBUM CONTETENTS//

$content = "SELECT * FROM Sound_video_db WHERE UniqueID='$_SESSION[streamID]' AND AlbumID='$albums[HashID]'";

$filesResult = mysqli_query($conn,$content);

if(mysqli_num_rows($filesResult) > 0){


while($items = mysqli_fetch_assoc($filesResult)){

  if($items["Image_path"] == ""){

    $file_image = "Images/" . $albums["Image_path"];

  }else{


    $file_image = "Images/". $items["Image_path"];

  }

 //echo $file_image;
 if($items["File_type"] == "audio"){

$iclass = "music";

 }else{

  $iclass= "camera";
 }

 $source = "Audio/".$items["TrackPath"];
$trackID = "<input type='hidden' name='query' value='$items[TrackID]'>";



  echo '
  
<form class="option-form"><p> <button class="danger">
<img src="'. $file_image.'"> <i style="color: red;" class="fa fa-'.$iclass.' "></i> '. $items["TrackName"] .'<br><b>'
 . $items["TrackArtist"] .'</b></button>
 <input type="hidden" name="router" value="options">
 '.$trackID.'
<button class="action"><i class="fa fa-ellipsis-h"></i></button>
</p></form>

  ';


}



}else{

echo '<p style="text-align: center;color: white;background-color: black;">
No content in Album <b><i>'. $albums["Album_name"] .'</i></b></p>';


}





echo '

<div class="option-class-two">

<i class="fa fa-close" id="closeTwo"></i>
<form class="danger-form">
<p>Upload song/sound/Track to <b>'. strtoupper($albums["Album_name"]) . '</b></p>
<p>Note:Adding music/audio image is optional,if you do not add any 
  image for audio/music, the Album image will be used.</p>

<input type="hidden" name="router" value="audio">
<input type="hidden" name="name" value="'. $albums["HashID"]. '">
<label><b>Song/sound title</b></label>
<input type="text" name="sound-name" placeholder="Sound/Audio title..">


<label><b>Artist name(s)</b></label>
<input type="text" name="artist" placeholder="Artist name(s)..">


<label><b>Image(optional)</b></label>
<input type="file" name="imagess">


<label><b>Audio/sound</b></label>
<input type="file" name="audio" >

<button><i class="fa fa-upload"></i> upload</button>
</form>
</div>

</div>

';




}else{


  //NO RESULT FOUND FO ALBUM//


}



  }else{


    //RETURN NOTHING//

  }



}else{


  //RETURN NOTHING//


}


}else{

  //RETURN NOTHING 

}


?>