<?php

//print_r($_POST);

    if(isset($_POST["abname"]) && !empty("abname")){


        $album = htmlspecialchars($_POST["abname"]);

        if(empty($album)){

            die("Album name cannot be blank");
        }elseif(strlen($album) <=1){

            die("Album name must be at least two charaters in length");

        }else{

            $album = stripslashes($album);
        }

    }else{

        die("Please select Album name");
    }

    if(isset($_POST["genre"]) && !empty("genre")){


        $genre = htmlspecialchars($_POST["genre"]);

        if(empty($genre)){


            die("Please select a Genre");

        }

if($genre != "Afro beat" && $genre != "Amapiano" && $genre != "Gospel" && 
$genre != "Hip hop" && $genre != "Rap" && $genre != "Blues" &&
 $genre != "Raggae" && $genre != "Others"){


    die("Invalid Genre");


}else{

   // die("fine");
}



    }else{

        die("Please select Genre");
    }



    if(isset($_POST["status"]) && !empty($_POST["status"])){


        $status = htmlspecialchars($_POST["status"]);

        if(empty($status)){

            die("Please select Album Mode");
        }else{

//CHECK IF STATUS MATCH//

if($status == "Public"){


    $status = "Public_mode";

}elseif($status == "Private"){


    $status = "Private_mode";

}else{


    die("Invalid Album Mode");

}


        }


    }else{


        die("Select Album Mode");
    }


    if(($_FILES["item-image"]["size"]) <= 0 or !isset($_FILES)){


        die("Please select an image for Album");

    }else{


        //PROCCESSD//
        //die("go");
    }


    //CHECK IF ALBUM ALREADY EXITS//

    require_once "connection_db.php";

    $album = stripslashes($album);

$select = "SELECT * FROM Albums WHERE Album_name='$album' AND UniqueID='$_SESSION[streamID]'";

$Result = mysqli_query($conn,$select);

if(mysqli_num_rows($Result) > 0){


    die("Album name already exits,please pick another name");
    

}else{


    //ALBUM DOES NOT EXITS//
}


    $filename ="($album)" .rand(). uniqid();


    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $mime_type = $finfo -> file($_FILES["item-image"]["tmp_name"]);

    $mime_types =["image/gif", "image/png", "image/jpeg"];
    

    
    if(!in_array($_FILES["item-image"]["type"],$mime_types)){
    
    
    exit("invalid file type,only gif,png,jpeg is supported.");
    
    
    }
    $pathinfo = pathinfo($_FILES["item-image"]["name"]);
    
    $base = $pathinfo["filename"];
    
    //$base = preg_replace("]", "_", $base);
    
    $filename =$filename. $base . "." . $pathinfo["extension"];
    
    $destination = __DIR__. "/Images/" . $filename;
    
    $i = 1;   
    
    while (file_exists($destination)){
    
    $filename =$filename. $base . "($i)." .$pathinfo["extenstion"];
    
    $destination  = __DIR__ . "/Images/" . $filename;
    
    $i++;
    
    } 
    
    
    if (! move_uploaded_file($_FILES["item-image"]["tmp_name"],$destination)){
    
    exit("fail to upload Image");
    
    }else{
    
//CREATE USER ALBUM AND ADD ALL DETAILS//

$hashID = uniqid(). rand(8942,1098);

require_once "user-agent-details.php";

$insert = "INSERT INTO Albums(
UniqueID,HashID,Album_name,Genre,Status_mode,Image_path,Ip,User_agent
)
VALUES('$_SESSION[streamID]','$hashID','$album','$genre',
'$status','$filename','$ip','$user_agent')
";
if(mysqli_query($conn,$insert)){

    die("success");


}else{

    die("Error occured creating Album please try again");

}


    
    }
    


