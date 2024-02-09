<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

exit;

}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

    exit;
}//require_once "session-session.php";
//if($_SERVER["REQUEST_METHOD"] == "POST"){

    //unset($_SESSION["DATA"]);
    if(isset($_SESSION["lib"])){


        //DO NOTHING TO AVOID LOADING WHAT'S ALREADY BEEN LOADED//

    }else{

//CHECK IF USER HAS LIBRARY AND LOAD ALL THE SOUNDS THERE//

$selects = "SELECT * FROM Library_playlist WHERE UniqueID='$_SESSION[streamID]'";

$libesult = mysqli_query($conn,$selects);

if(mysqli_num_rows($libesult) > 0){

while($sounds = mysqli_fetch_assoc($libesult)){

//FETCH AUDIOS//

$fechSounds = "SELECT * FROM Sound_video_db WHERE TrackID='$sounds[TrackID]'";

$soundResult = mysqli_query($conn,$fechSounds);

if(mysqli_num_rows($soundResult) > 0){


while($music = mysqli_fetch_assoc($soundResult)){


    $_SESSION["lib"] = rand();
    
    if(isset($_SESSION["DATA"])){

        // unset($_SESSION["DATA"]);

         $song  = '
         {
             name: "'.$music["TrackName"].'",
             artist: "'. $music["TrackArtist"].'",
             image: "Images/'.$music["Image_path"].'",
             path: "Audio/'. $music["TrackPath"].'"
         },';

$_SESSION["DATA"] = $song. $_SESSION["DATA"] ;

        }else{


            $song  = '
            {
                name: "'.$music["TrackName"].'",
                artist: "'. $music["TrackArtist"].'",
                image: "Images/'.$music["Image_path"].'",
                path: "Audio/'. $music["TrackPath"].'"
            },';
   


            $_SESSION["DATA"] = $song;

        }




}


}else{


    //DO NOTHING BECAUSE THE SOUND MIGHT HAVE BEEN DELETED//
}


}



}else{


    //USER DOES NOT HAVE LIBRARY AT ALL//
}


    }
//}