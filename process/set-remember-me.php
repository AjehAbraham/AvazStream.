<?php
if(isset($_SESSION["streamID"])){

$cookieName = "streamID";
$cookieValue = $_SESSION["streamID"];
$cookie_name_two = "password";
$cookie_two_value = uniqid() . rand(). uniqid();

setcookie($cookieName,$cookieValue, time() + 86400 * 14, "/");

setcookie($cookie_name_two,$cookie_two_value, time() + 86400 * 14, "/");

$hashCookie = password_hash($cookie_two_value,PASSWORD_DEFAULT);

$authInsert = "INSERT INTO Auth(UniqueID,HashID)
VALUES('$cookieValue','$hashCookie')
";

if(mysqli_query($conn,$authInsert)){

//DO NOTHING//

}else{


    //DO NOTHING
}

}