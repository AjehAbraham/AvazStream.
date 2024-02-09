
//FUNCTIONS FOR PROFILE PAGE//
$(document).ready(function (e) {

    $(".pfDataform").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".page-request-loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Router/profile',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
          document.querySelector(".page-request-loader-overlay").style.display= "none";
    
          if(Data !="" || Data != null){
         
         document.querySelector(".general-response-message").innerHTML = Data;
    
    //FORM FOR ALL PROFILE
    var loadFile = 
    function upload(event){
      var image = document.querySelector("#output");
      image.src = URL.createObjectURL(event.target.files[0]);
      }      
    
    document.querySelector("#pfBtn").addEventListener("click",closePf);
    function closePf(){
    
    document.querySelector(".profile-page-container-overlay").style.width ="0%";
    }
     
   
    //SUBMIT ALL FROM IN PROFILE//
    $(document).ready(function (e) {
    
      $(".data-pf").on('submit', (function(e){
      
      
        e.preventDefault();
        
       document.querySelector(".loader-container-overlay").style.display= "block";
      
         $.ajax({
       
          url: 'uploads',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
            document.querySelector(".loader-container-overlay").style.display= "none";
           
           document.querySelector(".error_message").innerHTML = "";
      
      
      alert(Data);
      
          },
          error:function(Data){
            document.querySelector(".loader-container-overlay").style.display= "none";
            document.querySelector(".error_message").innerHTML = Data;
      
          }
        
         });
      
      
      
      }));
      
      
    
    });
    
    
    //END OF PROFILE
    
    
    
    
          }else{
    
            alert("Error occured");
          }
    
    
        },
        error:function(Data){
          document.querySelector(".page-request-loader-overlay").style.display= "none";
          //document.querySelector(".error_message").innerHTML = Data;
    
        }
      
       });
    
    
    
    }));
    
    
    
    });
    
    
    
    //END  OF PROFILE PAGE FUNSTIONS//



    
$(document).ready(function (e) {

  $(".type-type").on('submit', (function(e){
  
  
    e.preventDefault();
  document.querySelector(".loader-container-overlay").style.display= "block";
  
     $.ajax({
   
      url: 'process/process-type',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
       document.querySelector(".loader-container-overlay").style.display= "none";

    if(Data != "" || Data != null){
       
      if(Data == "success" || Data == "\r\nsuccess"){

        
document.querySelector(".genre-class-container-overlay").style.width ="0%";

document.querySelector(".genre-class-container-overlay").style.display="none";
      }else{

        alert(Data);
      }
    
    }else{

alert("Error occured");

    }

  
      },
      error:function(Data){
       document.querySelector(".loader-container-overlay").style.display= "none";
      alert("Your request could not be completed")
  
      }
    
     });
  
  
  
  }));
  
  

});