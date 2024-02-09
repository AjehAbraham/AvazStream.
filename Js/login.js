//FUNCTION OF CREATE ACCOUNT AND LOGIN

$(document).ready(function (e) {
      
  $(".router-main").on('submit', (function(e){
  
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
  
if(Data == "\r\nsuccess" || Data == "success"){

  window.location.reload();

}else if(Data =="\r\nlogin" || Data == "login"){

alert("Please login");

}else{

  if(Data != "" || Data != null){

    
    
  document.querySelector(".general-response-message").innerHTML = Data;

//NESTED FUNCTION FOR CREATE ACCOUNT FORM//
document.querySelector("#closeForm").addEventListener("click",CloseRegForm);
function CloseRegForm(){
document.querySelector(".general-request-overlay-container").style.width="0%";

}

document.querySelector("#toggle").addEventListener("click",show_password_text);
function show_password_text(){
    
  var passcode = document.querySelector("#password_text");
  
  if (passcode.type == "password"){
  
  document.querySelector("#passcode_text").innerHTML ="Hide password";
    
  
  passcode.type = "text";
  
  
  }else{
  
  
    document.querySelector("#passcode_text").innerHTML ="Show password";
    
    passcode.type ="password";
  }
  
  
  
    }
    
  
    $(document).ready(function (e) {

      $("#FormData").on('submit', (function(e){
      
      
        e.preventDefault();
        
       document.querySelector(".loader-container-overlay").style.display= "block";
      
         $.ajax({
       
          url: 'process/account',
      type : 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
          success:function(Data){
      
           document.querySelector(".loader-container-overlay").style.display= "none";
           
           document.querySelector(".error_message").innerHTML = Data;
      
      
      if(Data == "\r\nsuccess" || Data =="success"){
        

        document.querySelector("#FormData").reset();
        
        document.querySelector(".error_message").innerHTML = "";
      
        window.location.reload();
    
      
      }else if(Data == "success-two" || Data == "\r\nsuccess-two"){
      
        document.querySelector("#FormData").reset();
        
        document.querySelector(".error_message").innerHTML = "";
        
document.querySelector(".general-request-overlay-container").style.width="0%";
      
        alert("Account created successfully");
      
      }else{


        if(Data == "Error" || Data == "\r\nError"){

          alert("Your reuest could not be completed,please try again");
        }else{

          document.querySelector(".error_message").innerHTML = Data;
      

        }
      }
      
          },
          error:function(Data){
            document.querySelector(".loader-container-overlay").style.display= "none";
            document.querySelector(".error_message").innerHTML = Data;
      
          }
        
         });
      
      
      
      }));
      
      

    });

   
//END OF NESTED FUNCTION FOR CREATE ACCOUNT FORM





  }else{

    alert("Failed complteing request");

  }


}
  
  
  },
  error:function(Data){
  document.querySelector(".page-request-loader-overlay").style.display= "none";
  alert("Request error");
  
  }
  
  });
  
  
  
  }));
  
  
  });