<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["query"]) && !empty($_POST["query"])){

    $query = htmlspecialchars($_POST["query"]);

    if(empty($query)){



    }else{
 /*       
if(strlen($query) <= 1){

        die("<p>Please enter a search query</p>");
}*/


require_once "connection_db.php";

$query = stripslashes($query);

        $search = "SELECT * FROM Sound_video_db WHERE TrackName='$query' OR Album_name='$query'  OR TrackArtist='$query'";

        $searchResult = mysqli_query($conn,$search);

        if(mysqli_num_rows($searchResult) > 0){
echo '

<div class="search-reponse-container">
<h1>Result</h1>
   
';

while($results = mysqli_fetch_assoc($searchResult)){

    $image_path = "Images/" .$results["Image_path"];

    $trackID = "<input type='hidden' name='query' value='$results[TrackID]'>";


echo '

<form class="option-form"><p><img src="'.$image_path.'"><button class="button-active">
 <i class="fa fa-play"></i> </button>
'. $results["TrackName"].'
 <b>'. $results["TrackArtist"].'</b>
 <input type="hidden" name="router" value="options">
 '.$trackID.'
   <b><button class="button-danger"><i class="fa fa-ellipsis-h"></i>
   </button></b></p></form>
';

}

echo "<br></div>";

        }else{
//CHECK FOR RELATED SEARCHES//


$search = "SELECT * FROM Sound_video_db WHERE TrackName LIKE'%$query%' OR 
Album_name LIKE '%$query%'  OR TrackArtist LIKE '%$query%'";

$searchResult = mysqli_query($conn,$search);

if(mysqli_num_rows($searchResult) > 0){
echo '

<div class="search-reponse-container">
<h1>Related result</h1>

';

while($results = mysqli_fetch_assoc($searchResult)){

  $image_path = "Images/" .$results["Image_path"];

  $trackID = "<input type='hidden' name='query' value='$results[TrackID]'>";

  //echo $image_path;

echo '

<form class="option-form"><p><img src="'.$image_path.'"><button class="button-active">
 <i class="fa fa-play"></i> </button>
'. $results["TrackName"].'
 <b>'. $results["TrackArtist"].'</b>
 <input type="hidden" name="router" value="options">
 '.$trackID.'
   <b><button class="button-danger"><i class="fa fa-ellipsis-h"></i>
   <input type="hidden" name="option">
   </button></b></p></form>
   

';



}

echo "<br></div>";


        }else{

//NO SERACH RESULT WAS FOUND//
echo '

<div class="search-reponse-container">
<h1>No result found &#128532;.</h1>
</div>
';
        }



    }

}

}else{


//QUERY IS EMPTY//


}




}