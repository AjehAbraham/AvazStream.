<?php
session_start();
require_once "Router/session-session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){


if(isset($_POST["router"]) && !empty($_POST["router"])){


$router = htmlspecialchars($_POST["router"]);

if($router == "album"){

//require_once "process/create-album.php";

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

    //require_once "connection_db.php";

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

require_once "process/user-agent-details.php";

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
    




exit;

}elseif($router == "upload"){

require_once "process/upload-sound.php";
exit;

}else{


if($router == "audio"){
    
if(isset($_POST["name"]) && !empty($_POST["name"])){


    $ab_name = htmlspecialchars($_POST["name"]);

    if(empty($ab_name)){

    //ALBUM NAME COULD NOT BE FOUND//

        die("Invalid request type,If error continues please reload page");
        
    }else{


//CHECK FOR ALBUM IN DATABASE AND FETCH ALBUM DEAILS//    

$checker = "SELECT * FROM Albums WHERE HashID='$ab_name' AND UniqueID='$_SESSION[streamID]'";

$checkerResult = mysqli_query($conn,$checker);

if(mysqli_num_rows($checkerResult) > 0){

$Resultss = mysqli_fetch_assoc($checkerResult);

$album_name = $Resultss["Album_name"];

$albumID = $Resultss["HashID"];

$mode = $Resultss["Status_mode"];

}else{


    //INVALID ALBUM HASHID//

    
    die("Invalid request type,If error continues please reload page");
}


    }


}else{


    //ALBUM NAME COULD NOT BE FOUND//
    die("Invalid request type,If error continues please reload page");
}


if(isset($_POST["sound-name"]) && !empty($_POST["sound-name"])){


    $title = htmlspecialchars($_POST["sound-name"]);
    
    if(empty($title)){

        die("Please enter sound title");

    }elseif(strlen($title) <=1){

        die("Title must be at least 2 in charater");

    }else{

        $title = stripslashes($title);
    }


}else{


    die("Please enter audio title");
}


if(isset($_POST["artist"]) && !empty($_POST["artist"])){


    $artists = htmlspecialchars($_POST["artist"]);
    
    if(empty($artists)){

        die("Please enter Artist name(s)");

    }elseif(strlen($artists) <=1){

        die("Artist name must be at least 2 in charater");
    }else{

        $artists = stripslashes($artists);
    }


}else{


    die("Please enter Artist name(s)");
}


//CHECK IF AUDIO ALREADY EXITS TO AVOID UPLOADING IT TWICE//

$soundChecker = "SELECT * FROM Sound_video_db WHERE UniqueID='$_SESSION[streamID]' AND TrackName='$title' AND TrackArtist='$artists'";


$soundResult = mysqli_query($conn,$soundChecker);

if(mysqli_num_rows($soundResult) > 0){


    //AUDIO ALREADY EXIST IN USER RECORDS

    die("Sound/Track already exits");
    
}else{



    //AUDIO/TRACK DOES NOT EXIST SO USER IS GOOD TO GO//


}




//print_r($_FILES);

if(isset($_FILES["imagess"]) &&  $_FILES["imagess"]["size"] > 0){

//IMAGE WASSELECTED SO YOU CAN ADD IMAGE TO MUSCI IMAGE//



$filenamess = $artists ."-$title-" . uniqid();


$finfos = new finfo(FILEINFO_MIME_TYPE);

$mime_types = $finfos -> file($_FILES["imagess"]["tmp_name"]);

// $mime_types =["image/gif", "image/png", "image/jpeg"];

$mime_typess = ["image/jpeg","image/gif","image/png"];

//die($_FILES["imagess"]["type"]);

if(!in_array($_FILES["imagess"]["type"],$mime_typess)){


exit("invalid file type,only jpeg,gif,png is supported for image.");


}
$pathinfos = pathinfo($_FILES["imagess"]["name"]);

$bases = $pathinfos["filename"];

//$base = preg_replace("]", "_", $base);

$filenamess =$filenamess . $bases . "." . $pathinfos["extension"];

$destinations = __DIR__. "/Images/" . $filenamess;

$i = 1;   

while (file_exists($destinations)){

$filenamess =$filenamess . $bases . "($i)." .$pathinfos["extenstion"];

$destinations  = __DIR__ . "/Images/" . $filenamess;

$i++;

} 


if (! move_uploaded_file($_FILES["imagess"]["tmp_name"],$destinations)){

exit("fail to upload Image");

}else{


//Image FILE WAS MOVED SUCCESSFULLY NOW UPLOAD AUDIO AND ADD RECORD TO DATABASE//

$image_path = $filenamess;


}



}else{


    //DO NOTHING AS IMAGE IS UPTIONAL//

$image_path = $Resultss["Image_path"];

}


//CHECK AUDIO FILE//

if(isset($_FILES["audio"]) && $_FILES["audio"]["size"] >= 1){


    //A FILE WAS SELECTED//


    $filename =$artists ."-$title-" .rand(). uniqid();


    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $mime_type = $finfo -> file($_FILES["audio"]["tmp_name"]);

   // $mime_types =["image/gif", "image/png", "image/jpeg"];

    $mime_types = ["audio/mp3","audio/ogg","audio/wav","audio/mpeg"];

   // die($_FILES["audio"]["type"]);
    
    if(!in_array($_FILES["audio"]["type"],$mime_types)){
    
    
    exit("invalid file type,only Mp3,Ogg,Wav and mpeg is supported.");
    
    
    }
    $pathinfo = pathinfo($_FILES["audio"]["name"]);
    
    $base = $pathinfo["filename"];
    
    //$base = preg_replace("]", "_", $base);
    
    $filename =$filename. $base . "." . $pathinfo["extension"];
    
    $destination = __DIR__. "/Audio/" . $filename;
    
    $i = 1;   
    
    while (file_exists($destination)){
    
    $filename =$filename. $base . "($i)." .$pathinfo["extenstion"];
    
    $destination  = __DIR__ . "/Audio/" . $filename;
    
    $i++;
    
    } 
    
    
    if (! move_uploaded_file($_FILES["audio"]["tmp_name"],$destination)){
    
    exit("fail to upload Audio");
    
    }else{
    
$trackId = uniqid().rand(8790,12945);

$album_name = $Resultss["Album_name"];

$albumID = $Resultss["HashID"];

$mode = $Resultss["Status_mode"];
$file_type = "audio";
require_once "process/user-agent-details.php";

//AUDIO FILE WAS MOVED SUCCESSFULLY NOW UPLOAD AUDIO AND ADD RECORD TO DATABASE//

$insertData = "INSERT INTO Sound_video_db(
UniqueID,TrackID,TrackPath,TrackName,TrackArtist,Album_name,AlbumID,Status_mode,
File_type,Image_path,Ip,User_agent	
)
VALUES('$_SESSION[streamID]','$trackId','$filename','$title','$artists',
 '$album_name','$albumID',
'$mode','$file_type','$image_path','$ip','$user_agent')
";


if(mysqli_query($conn,$insertData)){


    die("success");

}else{


    die("Error occured");
}


    }

}else{


    die("Please select audio file");
}


   // die("upload-audio");
    exit;
}


}


}else{


    //RETURN NOTHING//
    exit;
}


}else{


    //RETURN NOTHING//
    exit;
}