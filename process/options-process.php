<?php
session_start();

//print_r($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["query"]) && !empty($_POST["query"])){

    $query = trim($_POST["query"]);
    $query = stripslashes($query);
    $query = htmlspecialchars($query);




}else{


    //RETURN NOTHING//
    die();
}


if(isset($_POST["CMD"]) && !empty($_POST["CMD"])){

    $CMD = trim($_POST["CMD"]);
    $CMD = stripslashes($CMD);
    $CMD = htmlspecialchars($CMD);

}else{


    die();
    //RETURN NOTHING//
}


$array = ["play","play-next","like","dis-like","lib","report","rm-lib","delete"];

if(!in_array($CMD,$array)){

   // die("does not macth");
die("Invalid request type");

}else{



    //die("Ready to go");
    //die();
}




//NOW CHECK IF SOUND/ALBUM ID MATCHES//
require_once "connection_db.php";

$autoChecker = "SELECT * FROM Sound_video_db WHERE TrackID='$query'";

$Results = mysqli_query($conn,$autoChecker);

if(mysqli_num_rows($Results) > 0){


$data = mysqli_fetch_assoc($Results);

require_once "user-agent-details.php";

//unset($_SESSION["DATA"]);

if($CMD == "play"){

if(isset($_SESSION["DATA"])){

   // unset($_SESSION["DATA"]);

    $song  = '
    {
        name: "'.$data["TrackName"].'",
        artist: "'. $data["TrackArtist"].'",
        image: "Images/'.$data["Image_path"].'",
        path: "Audio/'. $data["TrackPath"].'"
    },';

    if(isset($_SESSION["streamID"]) && isset($_POST["type"])){

//CHECK IF USER HAS LIBRARY SO YOU CAN CONTIUNE PLAYING FROM USER LIBRARY//



    }else{

        //DO NOTHING//
    }

    if(empty($_SESSION["DATA"])){

$_SESSION["DATA"] = $song;

    }else{


        $_SESSION["DATA"] = $song .$_SESSION["DATA"];

    }


     die("success");
    }elseif(!isset($_SESSION["DATA"])){

        $song  = '
        {
            name: "'.$data["TrackName"].'",
            artist: "'. $data["TrackArtist"].'",
            image: "Images/'.$data["Image_path"].'",
            path: "Audio/'. $data["TrackPath"].'"
        },';
    $_SESSION["DATA"] = $song;

         die("success");

    }
    
    //die($CMD);

}elseif($CMD == "play-next"){

if(isset($_SESSION["DATA"])){
    $song  = '
    {
        name: "'.$data["TrackName"].'",
        artist: "'. $data["TrackArtist"].'",
        image: "Images/'.$data["Image_path"].'",
        path: "Audio/'. $data["TrackPath"].'"
    },';

     $allArray = $_SESSION["DATA"];

     //unset($_SESSION["DATA"]);
     $_SESSION["DATA"] = $_SESSION["DATA"]. $song;

     die("success");

    }elseif(!isset($_SESSION["DATA"])){

       
    $song  = '
    name: "'.$data["TrackName"].'",
    artist: "'. $data["TrackArtist"].'",
    image: "'.$data["Image_path"].'",
    path: "Audio/'. $data["TrackPath"].'"
    ';
    }

    $_SESSION["DATA"] = $song;

    die("success");
    
}else{

if($CMD == "like"){
    if(!isset($_SESSION['streamID'])){

        die("Please login");
    }

    //CHECK IF IT EXITS IN USER LIBRARY//
$typ_chekcer = "SELECT * FROM Like_dislike WHERE UniqueID='$_SESSION[streamID]' AND TrackID='$query'";

$chekerResult = mysqli_query($conn,$typ_chekcer);

if(mysqli_num_rows($chekerResult) > 0){

//USER HAS LIKE STUFF BEFORE//
//UPDATE IT INSTEAD//

$prev_type =mysqli_fetch_assoc($chekerResult);
$type ="LIKE";

$update = "UPDATE Like_dislike SET Status='$type' WHERE UniqueID='$_SESSION[streamID]' AND TrackID='$query'";

if(mysqli_query($conn,$update)){

    die("Thank you!&#128526;&#128519;");

}else{

        die("Failed,Please try again");
}

}else{

    //USER HAS NOT LIKE STUFF BEFORE//

    $type="LIKE";

    $insert = "INSERT INTO Like_dislike(UniqueID,TrackID,Status,Ip,User_agent)
    VALUES('$_SESSION[streamID]','$query','$type','$ip','$user_agent')
    ";
    if(mysqli_query($conn,$insert)){


        die("Thank you!&#128526;&#128519;");
    }else{


        die("Failed,Please try again");
    }

}


}elseif($CMD == "dis-like"){
    
    if(!isset($_SESSION['streamID'])){

        die("Please login");
    }

   
//CHECK IF IT EXITS IN USER LIBRARY//
$typ_chekcer = "SELECT * FROM Like_dislike WHERE UniqueID='$_SESSION[streamID]' AND TrackID='$query'";

$chekerResult = mysqli_query($conn,$typ_chekcer);

if(mysqli_num_rows($chekerResult) > 0){

//USER HAS LIKE STUFF BEFORE//
//UPDATE IT INSTEAD//

$prev_type =mysqli_fetch_assoc($chekerResult);

$type ="DIS_LIKE";

$update = "UPDATE Like_dislike SET Status='$type' WHERE UniqueID='$_SESSION[streamID]' AND TrackID='$query'";

if(mysqli_query($conn,$update)){

    die("Thank you!&#128532; &#128553;");

}else{

        die("Failed,Please try again");
}
}else{
    $type="DIS_LIKE";

    $insert = "INSERT INTO Like_dislike(UniqueID,TrackID,Status,Ip,User_agent)
    VALUES('$_SESSION[streamID]','$query','$type','$ip','$user_agent')
    ";
    if(mysqli_query($conn,$insert)){


        die("Thank you!&#128532; &#128553;");
    }else{


        die("Failed,Please try again");
    }

}


}else{

if($CMD == "lib"){

    if(!isset($_SESSION['streamID'])){

        die("Please login");
    }

//CHECK  USER PLAYLIST/LIBRARY IF ITEM IS FOUND ELSE ADD ITEM//

$lib_checker = "SELECT * FROM Library_playlist WHERE UniqueID='$_SESSION[streamID]' AND TrackID='$query'";


$lib_result = mysqli_query($conn,$lib_checker);

if(mysqli_num_rows($lib_result) > 0){


    //SOUND ALREADY EXITS IN LIBRARY//
    die($data["TrackName"] . " Already exist in Library");
}else{

//ADD SOUND TO LIBRARY//
require_once "user-agent-details.php";

$insert = "INSERT INTO Library_playlist(UniqueID,TrackID,Ip,User_agent)
VALUES('$_SESSION[streamID]','$query','$ip','$user_agent')
";
if(mysqli_query($conn,$insert)){


    die($data["TrackName"]. " Added to library");
}else{


die("Failed to add ".$data["TrackName"] . " to Library");

}


}



}elseif($CMD == "report"){


    die('Please report manually by clicking on help menu');


}else{
    //RETURN NOTHING AS NON OF THE OPTIONS MATCH//

    if($CMD == "delete"){

        die("cannot delete ". $data["TrackName"]." at the moment,please subscribe for more features");
    }
}

if($CMD == "rm-lib"){
$delete = "DELETE FROM Library_playlist WHERE TrackID='$query' AND UniqueID='$_SESSION[streamID]'";
if(mysqli_query($conn,$delete)){

die($data["TrackName"]. " Removed from library");

}else{

die("Failed to remove " .$data["TrackName"]. " from Library");
}


}


}


}



//END OF RESULT FOUND IN DATABASE//
}else{



    //NO RERSULT FOUND//
}

}

