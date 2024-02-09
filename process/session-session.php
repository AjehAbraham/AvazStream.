<?php
session_start();

if(isset($_SESSION["streamID"]) && isset($_SESSION["userID"])){
   //FETCH USER DETAILS//
   require_once "connection_db.php";
   $streamID = $_SESSION["streamID"];
   $select = "SELECT * FROM Register_db WHERE UniqueID='$streamID'";
   $Results = mysqli_query($conn,$select);
   $userInfo = mysqli_fetch_assoc($Results);


}else{

    die("Please login");
}