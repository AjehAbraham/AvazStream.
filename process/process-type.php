<?php
require_once "session-session.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST)){


    die("Please select at least one Genre");

}else{

if(isset($_POST["check_1"]) && !empty($_POST["check_1"])){

    $check_1 = stripslashes($_POST["check_1"]);
    $check_1 = trim($check_1);
    $check_1 = htmlspecialchars($check_1);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];

if(in_array($check_1,$array)){

    //die("Pass");

}else{


    die("Check 1 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

//    die("Please reload page");
$check_1 ="";
}



if(isset($_POST["check_2"]) && !empty($_POST["check_2"])){

    $check_2 = stripslashes($_POST["check_2"]);
    $check_2 = trim($check_2);
    $check_2 = htmlspecialchars($check_2);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];

if(in_array($check_2,$array)){



}else{


    die("Check 2 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    //die("Please reload page");
    $check_2 ="";
}




if(isset($_POST["check_3"]) && !empty($_POST["check_3"])){

    $check_3 = stripslashes($_POST["check_3"]);
    $check_3 = trim($check_3);
    $check_3 = htmlspecialchars($check_3);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r-b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];



if(in_array($check_3,$array)){


}else{


    die("Check 3 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    $check_3 ="";
}




if(isset($_POST["check_4"]) && !empty($_POST["check_4"])){

    $check_4 = stripslashes($_POST["check_4"]);
    $check_4 = trim($check_4);
    $check_4 = htmlspecialchars($check_4);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];

if(in_array($check_4,$array)){


}else{


    die("Check 4 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    $check_4 ="";
}



if(isset($_POST["check_5"]) && !empty($_POST["check_5"])){

    $check_5 = stripslashes($_POST["check_5"]);
    $check_5 = trim($check_5);
    $check_5 = htmlspecialchars($check_5);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","Amapiano","hip-hop","gospel"];

if(in_array($check_5,$array)){


}else{


    die("Check 5 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    $check_5 ="";

}



if(isset($_POST["check_6"]) && !empty($_POST["check_6"])){

    $check_6 = stripslashes($_POST["check_6"]);
    $check_6 = trim($check_6);
    $check_6 = htmlspecialchars($check_6);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];

if(in_array($check_6,$array)){


}else{


    die("Check 6 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    $check_6 ="";
}


if(isset($_POST["check_7"]) && !empty($_POST["check_7"])){

    $check_7 = stripslashes($_POST["check_7"]);
    $check_7 = trim($check_7);
    $check_7 = htmlspecialchars($check_7);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];


if(in_array($check_7,$array)){


}else{


    die("Check 7 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    $check_7 ="";
}




if(isset($_POST["check_8"]) && !empty($_POST["check_8"])){

    $check_8 = stripslashes($_POST["check_8"]);
    $check_8 = trim($check_8);
    $check_8 = htmlspecialchars($check_8);

//CHECK IF IT MATCHES ANY OF THE MUSIC CATEGORY//
$array = ["Afro-beat","r&b","raggae","high-life",
"juju","fuji","juj-fuji","amapaino","hip-hop","gospel"];

if(in_array($check_8,$array)){


}else{


    die("Check 8 failed.Please select a valid Genre type,If error continues please reload page.");

}

}else{

    $check_8 ="";
}



//$chekers = $check_1.",".$check_2.",".$check_3.",".$check_4.
//",".$check_5.",".$check_6.",".$check_7.$check_8;


$chekers = $check_1." ".$check_2." ".$check_3." ".$check_4.
" ".$check_5." ".$check_6." ".$check_7.$check_8;

//die($chekers);
require_once "user-agent-details.php";

$insert = "INSERT INTO Genre_types(UniqueID,Types,Ip,User_agent)
VALUES('$_SESSION[streamID]','$chekers','$ip','$user_agent')
";

if(mysqli_query($conn,$insert)){


    die("success");
}else{


    die("Failed to add Genre,Please try again or reload page.");
}

}



}else{

exit;
}