<?php

$serverName = "localhost";
$serverUsername = "root";
$serverPassword = "";
$serverDatabase ="AvazStream";

$conn = mysqli_connect($serverName,$serverUsername,$serverPassword,$serverDatabase);

if(!$conn){


    die("Failed connecting to Database");

}else{

   // die("connected");
}