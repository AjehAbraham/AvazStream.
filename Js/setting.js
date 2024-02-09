
//SETTING FORM//

$(document).ready(function (e) {

    $(".settings").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".page-request-loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Router/home-sidebar',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
          document.querySelector(".page-request-loader-overlay").style.display= "none";
      if(Data != "" || Data != null){
         
         document.querySelector(".general-response-message").innerHTML = Data;
          
       document.querySelector("#closeSettingBtn").addEventListener("click",CloseSetting);
    
    function CloseSetting(){
      document.querySelector(".general-request-overlay-container").style.width ="0%";
    }
    
    document.querySelector("#closeBox").addEventListener("click",closePassword);
       function closePassword(){
    document.querySelector(".change-password-form").style.width = "0%";
    
       }   
    
    document.querySelector("#oepnPassword").addEventListener("click",OpenPassword);
       function OpenPassword(){
    document.querySelector(".change-password-form").style.width = "100%";
    
       }
    //END OF NESTED FUNCTION FOR SETTING PAGE//
    

//FUNCTION TO CHANGE PASSWORD
  
$(document).ready(function (e) {

   $(".data-data-password").on('submit', (function(e){
   
   
     e.preventDefault();
     
    document.querySelector(".loader-container-overlay").style.display= "block";
   
      $.ajax({
    
       url: 'process/change-password',
   type : 'POST',
   data: new FormData(this),
   cache: false,
   contentType: false,
   processData: false,
       success:function(Data){
   
         document.querySelector(".loader-container-overlay").style.display= "none";
 
     if(Data != "" || Data != null){
    
      if(Data == "success" || "\r\nsuccess"){


         alert("password has been changed successfuly");
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

//END OF CHANGE PASSWORD FUNCTION//

    
      }else{
    alert("Error occured");
    
      }
    
    
        },
        error:function(Data){
        document.querySelector(".page-request-loader-overlay").style.display= "none";
        alert("Your request could not be completed")
    
        }
      
       });
    
    
    
    }));
    
    
    
    });
    
    //END OF SETTING//