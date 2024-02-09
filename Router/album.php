<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["router"]) && !empty($_POST["router"])){

$router = htmlspecialchars($_POST["router"]);

if($router == "manage-album"){


    require_once "Main/manage-album-page.php";
    exit;
    
}elseif($router == "album"){
//CHECK FOR ALBUM NAME/TITLE //
require_once "Main/album-page-items.php";
exit;

}else{



}


    }else{

        die("Error occured");
    }


}