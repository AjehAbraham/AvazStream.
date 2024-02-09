<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_SESSION["token"]) && !empty($_SESSION["token"])){

$token = $_SESSION["token"];


}else{


    die("Failed");

}


}