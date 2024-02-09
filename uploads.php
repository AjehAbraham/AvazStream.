<?php
session_start();
require_once "Router/session-session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST['router']) && !empty($_POST["router"])){

    $router = htmlspecialchars($_POST["router"]);
    
    if($router == "manage-sub"){

        die("Subscription is unavilable at the moment");

    }else if($router == "username"){

        die("You cannot change your username");
        
    }else{

        if($router == "verify"){

            die("Verification will be ready shortly");
        }
    }


}

if(empty($_FILES["item-image"])){


    die("Please select an image");
}



if($_FILES["item-image"]["size"] <= 0){

    die("Please select Image");
}


    $filename ="(". $_SESSION["streamID"].")" .rand(). uniqid();


    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $mime_type = $finfo -> file($_FILES["item-image"]["tmp_name"]);

    $mime_types =["image/gif", "image/png", "image/jpeg"];
    

    
    if(!in_array($_FILES["item-image"]["type"],$mime_types)){
    
    
    exit("invalid file type");
    
    
    }
    $pathinfo = pathinfo($_FILES["item-image"]["name"]);
    
    $base = $pathinfo["filename"];
    
    //$base = preg_replace("]", "_", $base);
    
    $filename =$filename. $base . "." . $pathinfo["extension"];
    
    $destination = __DIR__. "/Upload/" . $filename;
    
    $i = 1;   
    
    while (file_exists($destination)){
    
    $filename =$filename. $base . "($i)." .$pathinfo["extenstion"];
    
    $destination  = __DIR__ . "/Upload/" . $filename;
    
    $i++;
    
    } 
    
    
    if (! move_uploaded_file($_FILES["item-image"]["tmp_name"],$destination)){
    
    exit("fail to upload file");
    
    }else{
    

//ADD  USER PROFILE PICS//
$update = "UPDATE Register_db SET Image_path='$filename' WHERE UniqueID='$_SESSION[streamID]'";


if(mysqli_query($conn,$update)){



    die("success");
}else{


    die("Failed to upload profile picture");
}

    
    }
    



}else{


    header("Location: Error");
    exit;
}
