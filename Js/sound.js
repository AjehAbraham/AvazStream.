    
$(document).ready(function (e) {

  $(".mysound").on('submit', (function(e){
  
  
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
  
        document.querySelector(".page-request-loader-overlay").style.display = "none";
    if(Data != "" || Data != null){
       
       document.querySelector(".general-response-message").innerHTML = Data;
  
        
       document.querySelector("#close-page").addEventListener("click",closePage);
  function closePage(){
  
  document.querySelector(".general-request-overlay-container").style.width ="0%";
  
  document.querySelector(".options-container-overlay").style.width= "0%";
        
        document.querySelector(".options-container-overlay").style.display= "none";
  }     
  
  
  document.querySelector("#closeCasebtn").addEventListener("click",closeCase);
  function closeCase(){
  
  document.querySelector(".case-overlay-option").style.width ="0%";
  }     
  
  document.querySelector("#OpenCasebtn").addEventListener("click",OpenCase);
  function OpenCase(){
  
  document.querySelector(".case-overlay-option").style.width ="100%";
  }     
  
  
  //FUNCTION TO CREATE ALBUM
  
  $(document).ready(function (e) {
  
  $(".create-create").on('submit', (function(e){
  
  
  e.preventDefault();
  
  document.querySelector(".loader-container-overlay").style.display= "block";
  
   $.ajax({
  
    url: 'process-file',
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
  
  document.querySelector(".create-create").reset();
  
      document.querySelector(".case-overlay-option").style.width= "0%";
      
  
         
      document.querySelector(".response-type-one").innerHTML = "";
  
  document.querySelector(".response-type-two").innerHTML = "";
  
  alert("Album created");
  
  
  
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
  
  //END OF FUNCTION TO CREATE ALBUM//
  
  
  $(document).ready(function (e) {
  
    $(".AlbData").on('submit', (function(e){
    
    
      e.preventDefault();
      
      document.querySelector(".page-request-loader-overlay").style.display = "block";
    
       $.ajax({
     
        url: 'Router/album',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
          document.querySelector(".page-request-loader-overlay").style.display = "none";
      if(Data != "" || Data != null){
         
         document.querySelector(".response-type-one").innerHTML = Data;
  
         document.querySelector(".response-type-two").innerHTML = "";
         //NESTED FUNCTION TO MANAGE ALBUM//
  
         $(document).ready(function (e) {
  
          $(".Albdata-2").on('submit', (function(e){
          
          
            e.preventDefault();
            
            document.querySelector(".page-request-loader-overlay").style.display = "block";
          
             $.ajax({
           
              url: 'Router/album',
          type : 'POST',
          data: new FormData(this),
          cache: false,
          contentType: false,
          processData: false,
              success:function(Data){
          
                  document.querySelector(".page-request-loader-overlay").style.display = "none";
            if(Data != "" || Data != null){
               
               document.querySelector(".response-type-two").innerHTML = Data;
  
  //NESTED FUNCTIOND TO MANAGE ALBUM DATA ABD UPLOAD SOUN//
  
  $(document).ready(function (e) {
  
  $(".danger-form").on('submit', (function(e){
  
  
    e.preventDefault();
    
   document.querySelector(".loader-container-overlay").style.display= "block";
  
     $.ajax({
   
      url: 'process-file',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
        document.querySelector(".loader-container-overlay").style.display= "none";
  
    if(Data != "" || Data != null){
       
      if(Data == "success" || Data == "\r\nsuccess"){
  
  alert("Audio/sound created");
  
  document.querySelector(".danger-form").reset();
  
  //document.querySelector(".response-type-one").innerHTML = "";
  
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
  
  document.querySelector("#closeTwo").addEventListener("click",CloseTwo);
  function CloseTwo(){
  
  document.querySelector(".option-class-two").style.width ="0%";
  }
  
  document.querySelector("#OpenTwo").addEventListener("click",OpenTwo);
  function OpenTwo(){
  
  document.querySelector(".option-class-two").style.width ="100%";
  }
   
  
  
  
  //END OF FUNCTIONS TO MANAGE ALBUMS DATA//
  
  
  
  
  
  //NTESTED FUNCTION SO SELECT OPTIONS
  
  $(document).ready(function (e) {
  
  $(".option-form").on('submit', (function(e){
  
  
    e.preventDefault();
    
    document.querySelector(".page-request-loader-overlay").style.display =  "block";
  
     $.ajax({
   
      url: 'Router/options',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
  
        document.querySelector(".page-request-loader-overlay").style.display =  "none";
  
    if(Data != "" || Data != null){
      
      document.querySelector(".option-message").innerHTML= Data;
  
      document.querySelector("#closeOption").addEventListener("click",CloseOption);
  
  function CloseOption(){
    document.querySelector(".options-container-overlay").style.display= "none";
  }
       
  
  $(document).ready(function (e) {
  
  $(".Data-form-option").on('submit', (function(e){
  
  
    e.preventDefault();
        document.querySelector(".page-request-loader-overlay").style.display =  "block";
  
        document.querySelector(".options-container-overlay").style.width= "0%";
        
        document.querySelector(".options-container-overlay").style.display= "none";
  
     $.ajax({
   
      url: 'process/options-process',
  type : 'POST',
  data: new FormData(this),
  cache: false,
  contentType: false,
  processData: false,
      success:function(Data){
        document.querySelector(".page-request-loader-overlay").style.display = "none";
  
  
    if(Data != "" || Data != null){
   
    if(Data == "success" || Data == "\r\nsucess"){
  
      window.location.reload();
  
    }else{
      
  alert(Data);
  
    }
  
  
  
    }else{
  
  alert("Error occured");
  
    }
  
  
      },
      error:function(Data){
        document.querySelector(".page-request-loader-overlay").style.display = "none";
      alert("Your request could not be completed")
  
      }
    
     });
  
  
  
  }));
  
  
  
  });
  
  
  //END OF FUNCTIONS TO MAINTAIN MENU//   
  
  
  
       
    }else{
  
  alert("Error occured");
  
    }
  
  
      },
      error:function(Data){
        document.querySelector(".page-request-loader-overlay").style.display =  "none";
      alert("Your request could not be completed")
  
      }
    
     });
  
  
  
  }));
  
  
  
  });
  
  //END OF OPTION FUNCTION//
  
  
  
               
            }else{
        alert("Error occured");
        
            }
        
          
              },
              error:function(Data){
                  document.querySelector(".page-request-loader-overlay").style.display = "none";
              alert("Your request could not be completed")
          
              }
            
             });
          
          
          
          }));
          
          
        
        });
         //END OF NESTED FUNCTION TO MANAGE ALBUM
         
      }else{
  alert("Error occured");
  
      }
  
    
        },
        error:function(Data){
          document.querySelector(".page-request-loader-overlay").style.display = "none";
        alert("Your request could not be completed")
    
        }
      
       });
    
    
    
    }));
    
    
  
  });
  
  
  
  
       
  
  
    }else{
  alert("Error occured");
  
    }
  
  
      },
      error:function(Data){
        document.querySelector(".page-request-loader-overlay").style.display = "none";
      alert("Your request could not be completed")
  
      }
    
     });
  
  
  
  }));
  
  
  
  });
  
  
  
  