<?php
if(isset($_COOKIE["streamID"]) && isset($_COOKIE["password"])){


    if(!empty($_COOKIE["streamID"]) && !empty($_COOKIE["password"])){

$streamID = htmlspecialchars($_COOKIE["streamID"]);
$pass_key = htmlspecialchars($_COOKIE["password"]);
$streamID = trim($streamID);
$streamID = stripslashes($streamID);
$pass_key = trim($pass_key);
$pass_key = stripslashes($pass_key);

//CHECK IF COOKIE IS VALID//

require_once "connection_db.php";

$checker = "SELECT * FROM  Auth WHERE UniqueID='$streamID' AND NOW() <= DATE_ADD(Date_added, INTERVAL 2 WEEK) ORDER BY id DESC LIMIT 1";

$Result = mysqli_query($conn,$checker);

if(mysqli_num_rows($Result) > 0){

    $cookieResult = mysqli_fetch_assoc($Result);

    if(password_verify($pass_key,$cookieResult["HashID"]) == "password_hash"){

        //FETCH USER DETAILS//
        $select = "SELECT * FROM Register_db WHERE UniqueID='$streamID'";
        $Results = mysqli_query($conn,$select);
        $userInfo = mysqli_fetch_assoc($Results);

        session_regenerate_id();
        $_SESSION["streamID"] = $userInfo["UniqueID"];
        $_SESSION["userID"] = $userInfo["id"];

        //die("cookie is valid");

    }else{

       // die("Invalid cookie");

       
$cookieName = "streamID";
$cookie_name_two = "password";

setcookie($cookieName,"", time() - 86400 * 14, "/");

setcookie($cookie_name_two,"", time() - 86400 * 14, "/");
    }


}else{


    $cookieName = "streamID";
    $cookie_name_two = "password";
    
    setcookie($cookieName,"", time() - 86400 * 14, "/");
    
    setcookie($cookie_name_two,"", time() - 86400 * 14, "/");
    //die("cookie cannot be found");
}


    }
}