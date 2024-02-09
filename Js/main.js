
document.querySelector("#openBtn").addEventListener("click",OpenSidebar);
   function OpenSidebar(){

var body = document.body;
  
body.classList.add("addSidebar");

   }   

   document.querySelector("#closeBtn").addEventListener("click",CloseSidebar);

   function CloseSidebar(){

var body = document.body;
  
body.classList.remove("addSidebar");
   }

   document.querySelector("#searchbtn").addEventListener("click",OpenSearch);

   function OpenSearch(){

    var searchBar = document.querySelector(".search-bar-overlay ");

    if(searchBar.style.display == 'block'){

      searchBar.style.display = "none";

document.querySelector(".search-box").innerHTML="<i class='fa fa-search' id='searchbtn' onclick='OpenSearch()'></i>";

    }else{

      document.querySelector(".search-box").innerHTML="<i class='fa fa-close' id='searchbtn' onclick='OpenSearch()'></i>";

      searchBar.style.display = 'block';

    }
   }


document.querySelector("#closeOption").addEventListener("click",CloseOption);

function CloseOption(){
  document.querySelector(".options-container-overlay").style.display= "none";
}
