<?php
session_start();
session_regenerate_id();
if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST["router"]) && !empty($_POST["router"])){


        $router = htmlspecialchars($_POST["router"]);

        if($router == "create-account"){


            //START REG PROCCESS//
if(isset($_POST["email"]) && isset($_POST["password"])){

$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);

if(empty($email)){

    die("Email cannot be blank");

}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

    die("invalid email");

}else{

//EMAIL IS VALID AND NOT EMPTY//
$email = trim($email);

}


if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){


    die("Password must contain at least one uppercase,one lowercase,one special character and at least 8 in length.");


 }else{

    $password = htmlspecialchars($password);
 }

 //NOW CHECK IF USER ACCOUNT ALREADY EXITS//
 
 require_once "connection_db.php";

 $checker = "SELECT * FROM Register_db WHERE Email='$email'";

$result = mysqli_query($conn,$checker);

if(mysqli_num_rows($result) > 0){


    die("User with email already exits");

}else{

//REGISTER USER ACCOUNT//

require_once "user-agent-details.php";

$UniqueID = rand(103,8567). uniqid() .rand(854,2345);
$null = "";
$hash = password_hash($password,PASSWORD_DEFAULT);

$insert = "INSERT INTO Register_db(
    UniqueID,Email,First_name,Last_name,Username,
    Password,Image_path,Ip_addr,User_agent	)
    VALUES('$UniqueID','$email','$null','$null','$null',
    '$hash','$null','$ip','$user_agent')
    ";

    if(mysqli_query($conn,$insert)){

        die("success-two");

    }else{

        die("Error");

    }

}


}else{


    //RETRUN NOTHING //
}


        }elseif($router == "login"){

            //CHECK USER DETAILS//

            if(isset($_POST["email"]) && isset($_POST["password"])){

                $email = htmlspecialchars($_POST["email"]);
                $password = htmlspecialchars($_POST["password"]);
            if(empty($email)){

                die("Email cannot be blank");
            
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            
                die("invalid email");
            
            }else{
            
            //EMAIL IS VALID AND NOT EMPTY//
            $email = trim($email);
            
            }

            if(empty($password)){

                die("please enter your password");
            }else{

                $password = htmlspecialchars($password);
            }



 //NOW CHECK IF USER ACCOUNT ALREADY EXITS//
 
 require_once "connection_db.php";

 $checker = "SELECT * FROM Register_db WHERE Email='$email'";

$result = mysqli_query($conn,$checker);

if(mysqli_num_rows($result) > 0){

//FETCH USERS DETAILS AND LOG USER IN//

$details = mysqli_fetch_assoc($result);

if(password_verify($password,$details["Password"]) == "password_hash"){

    //USER PASSWORD IS VALID//

$_SESSION["streamID"] = $details["UniqueID"];
$_SESSION["userID"] = $details["id"];

//require_once "login-history.php";

require_once "set-remember-me.php";



die("success");

}else{


    //USER PASSWORD IS NOT VALID//
    die("&#128532; Invalid email or password");

}


}else{

//REGISTER USER ACCOUNT//

die("&#128532; Invalid login credential");

}



        }else{


            //RETURN NOTHING//

        }

        }else{

            //RETRUN NOTHING//


        }


    }
}
