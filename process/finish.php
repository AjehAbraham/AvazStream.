<?php
require_once "session-session.php";

//print_r($_POST);

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["fname"]) && !empty($_POST["fname"])){

$fname = htmlspecialchars($_POST["fname"]);
$fname = stripslashes($fname);

    }else{

        die("please enter your first name");
    }


    if(isset($_POST["lname"]) && !empty($_POST["lname"])){

        $lname = htmlspecialchars($_POST["lname"]);
        $lname = stripslashes($lname);
        
            }else{
        
                die("please enter your last name");
            }


            if(isset($_POST["username"]) && !empty($_POST["username"])){

                $username = htmlspecialchars($_POST["username"]);
                $username = stripslashes($username);
                
                    }else{
                
                        die("please enter your stage name");
                    }
        

//CHECK IF USERNAME EXITS//


                    require_once "connection_db.php";

$stage_checker = "SELECT * FROM Register_db WHERE Username='$username'";

$stageResult = mysqli_query($conn,$stage_checker);

if(mysqli_num_rows($stageResult) > 0){

    die("Stage name already exits");


}else{

    //USER IS GOOD TO GO BECAUSE USERNAME DOES NOT EXITS//
$update = "UPDATE Register_db SET Username='$username', First_name='$fname', Last_name='$lname'";

if(mysqli_query($conn,$update)){

    die("success");
}else{


    die("Error occured,please try again");
}


}

}else{


    //RETRUN NOTHING//
    die("Error");
}