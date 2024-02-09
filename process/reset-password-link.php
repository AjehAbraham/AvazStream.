<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])){


    if(!empty($_POST["email"])){

$email = htmlspecialchars($_POST["email"]);
$email = stripcslashes($email);
$email = trim($email);

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

    die("Invalid email");
}else{
require_once "connection_db.php";
//CHECK RECORDSS//

$check = "SELECT * FROM Register_db WHERE Email='$email'";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){

$details = mysqli_fetch_assoc($result);
    //CREATE EMAIL LINK//
require_once "user-agent-details.php";
    $rand = uniqid(). rand(492,2195);
$id = $details["UniqueID"];
$hash = password_hash($rand,PASSWORD_DEFAULT);
$type="email-reset";
$status = "Nil";

$insert = "INSERT INTO Reset_password(UniqueID,Types,Status,HashID,PlainID,Ip,User_agent)
VALUES('$details[UniqueID]','$type','$status','$hash','$rand','$ip','$user_agent')
";



if(mysqli_query($conn,$insert)){

    //SEND USER EMAILS LINK//

    if($details["Username"] == ""){

        $name = "Chief";
    }else{

        $name = $details["Username"];
    }
    $to = $details["Email"];
    $from = 'Avazstream';
    $fromName = 'Reset-password'; 
    
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    /*$headers .= 'Bcc: welcome2@example.com' . "\r\n"; */
    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
    
    $subject ="Reset Password";
     
    
     
     $MailMessage ="
        <h3>Avazstream Reset password</h3>";
        
        
        $MailMessage .="<p>Hello ".$name. ",<p>";
        
        
        $MailMessage .="<p>Click <a href='9paywave.000webhostapp.com/create-password?Token=$rand'></a> to reset your password</p>";
        
        $MailMessage .="<p>Device ". $user_agent."</p>";
    
        $MailMessage .="<p>From ". $ip."</p>";
    
        
     
     $mail = mail($to,$subject,$MailMessage, $headers);
    
     if($mail == TRUE){
    
     // die("Email has been sent to Reset your password.");
    
    die("success");
    
     }else{
    
    
     
    die("Failed to send Email,please try again.");
    
     }


    die("success");
}else{


    die("Failed to proccess your request");
}


}else{


    die("User does not exits");
}


}

    }else{

        die("Please enter your email");
    }


}else{



    exit;
}