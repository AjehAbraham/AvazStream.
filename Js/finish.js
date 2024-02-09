   
$(document).ready(function (e) {

    $(".profile-data").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".loader-container-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'process/finish',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
          document.querySelector(".loader-container-overlay").style.display= "none";
      if(Data != "" || Data != null){
         
        // document.querySelector(".response-type-one").innerHTML = Data;
        if(Data == "success" || Data == "\r\nsuccess"){
  
  alert("Your profile has been updated");
  
          document.querySelector(".setting-profile-container-overlay").style.width= "0%";
  
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
  
  