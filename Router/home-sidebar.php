<?php
session_start();

if($_SERVER["REQUEST_METHOD"]== "POST"){

    if(isset($_POST["router"]) && !empty($_POST["router"])){

        $router = htmlspecialchars($_POST["router"]);
//CHECK THE REQUEST TYPE TO FIND WHAT TO DISPLAY//

if($router == "sound"){


    require_once "Main/mysound.php";
    
    exit;
}elseif($router == "library"){

    require_once "Main/library.php";

exit;
}else{

if($router == "settings"){

    require_once "Main/settings.php";
    exit;
}elseif($router == "login"){


    require_once "Main/sign-in-page.php";
    exit;
}else{


    if($router == "logout"){

session_destroy();

if(isset($_COOKIE["streamID"]) && isset($_COOKIE["password"])){
$cookieName = "streamID";
$cookie_name_two = "password";

setcookie($cookieName,"", time() - 86400 * 14, "/");

setcookie($cookie_name_two,"", time() - 86400 * 14, "/");

}

die("success");

    }elseif($router == "sign-up"){

        require_once "Main/sign-up-page.php";
        exit;
    }
}


}


    }else{

//INVALID REQUEST TYPE//

        die("Error");
    }


}