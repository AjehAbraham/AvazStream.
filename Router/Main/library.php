<?php
require_once "session-session.php";  
$alrt = "alert('Not available,Search coming shortly')";
echo '

<div class="general-request-overlay-container">
<span class="lib-message-data"></span>
<div class="container-container-fluid">

<i class="fa fa-close" id="closeLib"></i>

<form class="lib-data" onsubmit="return false" onkeyup="'.$alrt.'">
<input type="search" placeholder="search library.."></form>

';

$lib = "SELECT * FROM Library_playlist WHERE UniqueID='$_SESSION[streamID]' ORDER BY id DESC";

$lib_Result = mysqli_query($conn,$lib);

if(mysqli_num_rows($lib_Result) > 0){


while($play_list = mysqli_fetch_assoc($lib_Result)){

//USES TRACKID TO FIND ITEMS IN MAIN TABLE//

$ID = $play_list["TrackID"];

$check_2 = "SELECT * FROM Sound_video_db WHERE TrackID='$ID' ORDER BY id DESC";

$data_result = mysqli_query($conn,$check_2);

while($library = mysqli_fetch_assoc($data_result)){

$image_source = "Images/". $library["Image_path"];

$trackID = $library["TrackID"];

echo '
<form class="lib-type">
<p><button class="danger"><img src="'.$image_source.'">'.$library["TrackName"].'<br><b>
'. $library["TrackArtist"].'</b></button>

<input type="hidden" name="router" value="options">
<input type="hidden" name="query" value="'.$trackID.'">
<input type="hidden" name="type" value="lib-play">

<button class="action"><i class="fa fa-ellipsis-h"></i></button>
</p></form>
';


}


}

echo "</div>";

//die();

}else{

echo "<h3 style='color: #ccc;text-align: center;'>Library is empty</h3></div>";
  //die();
  

}


?>
