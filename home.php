<?php
session_start();

if(isset($_SESSION["streamID"]) && $_SESSION["userID"]){

    $uniqueID = $_SESSION["streamID"];
    $userID = $_SESSION["userID"];
require_once "Router/connection_db.php";
    
    $select = "SELECT * FROM Register_db WHERE UniqueID='$uniqueID'";

    $Results = mysqli_query($conn,$select);
    $userInfo = mysqli_fetch_assoc($Results);
   

    if($userInfo["First_name"] =="" && $userInfo["Last_name"]=="" && $userInfo["Username"] ==""){


        //UPDATE PROFILE//
require_once "Router/Main/updated-profile-status.php";

    }else{

        //DO NOTHING//

    }

//CHECK FOR GENRE TYPE//

$TYPE = "SELECT * FROM Genre_types WHERE UniqueID='$_SESSION[streamID]'";

$type_result = mysqli_query($conn,$TYPE);

if(mysqli_num_rows($type_result) > 0){



}else{

    //USER HAS NOT SELECTED GENRE TYPE//
    require_once "Router/Others/select-genre-type.php";
}


//LOAD LIBRARY SOUNDS/

require_once "process/library-loader.php";

}else{

    require_once "Router/auth.php";

if(isset($_SESSION["streamID"]) && isset($_SESSION["userID"])){

    $uniqueID = $_SESSION["streamID"];
    $userID = $_SESSION["userID"];
    
require_once "Router/connection_db.php";
    
    $select = "SELECT * FROM Register_db WHERE UniqueID='$uniqueID'";
    
    $Results = mysqli_query($conn,$select);
    $userInfo = mysqli_fetch_assoc($Results);
   // var_dump($userInfo);

    if($userInfo["First_name"] =="" && $userInfo["Last_name"]=="" && $userInfo["Username"] ==""){


        //UPDATE PROFILE//
require_once "Router/Main/updated-profile-status.php";
}


//CHECK FOR GENRE TYPE//

$TYPE = "SELECT * FROM Genre_types WHERE UniqueID='$_SESSION[streamID]'";

$type_result = mysqli_query($conn,$TYPE);

if(mysqli_num_rows($type_result) > 0){



}else{

    //USER HAS NOT SELECTED GENRE TYPE//
    require_once "Router/Others/select-genre-type.php";
}

}

}


if(isset($_SESSION["streamID"])){

    //do not show user cookie banner//
    

//LOAD LIBRARY SOUNDS/

require_once "process/library-loader.php";

}else{
  


}

require_once "Router/main-home-page.php";
require_once "Router/Main/Music-player.php";
require_once "Router/Others/request-loader.php";
require_once "Router/Others/loader-reload.php";
require_once "Router/Others/nonscript-network.php";
exit;