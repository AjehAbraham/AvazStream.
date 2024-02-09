<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //print_r($_POST);

if(isset($_POST["router"]) && !empty($_POST["router"])){

$router = $_POST["router"];

if($router == "profile"){

require_once "Main/profile.php";
exit;

}


}else{


    die("Error occured");
}


}