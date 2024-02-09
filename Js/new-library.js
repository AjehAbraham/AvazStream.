   
//LIBRARY FORM//

$(document).ready(function (e) {

    $(".library").on('submit', (function(e){
    
    
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
         
    //NESTED FUNCTION FOR SETTING PAGE
    
    
    document.querySelector("#closeLib").addEventListener("click",closeLib);
    function closeLib(){
    
      //document.querySelector(".options-container-overlay").style.display= "none";
    document.querySelector(".general-request-overlay-container").style.width ="0%";
    }     
    //END OF FUNCTION FOR LIBRARY//
    
    
    //FUNCTION FOR LIBRARY OPTIONS//
    
    $(document).ready(function (e) {
    
    $(".lib-type").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".page-request-loader-overlay").style.display= "block";
    
       $.ajax({
     
        url: 'Router/options',
    type : 'POST',
    data: new FormData(this),
    cache: false,
    contentType: false,
    processData: false,
        success:function(Data){
    
          document.querySelector(".page-request-loader-overlay").style.display= "none";
          
      if(Data != "" || Data != null){
         
         document.querySelector(".lib-message-data").innerHTML = Data;
         
    
         
    $(document).ready(function (e) {
    
    $(".Data-form-option").on('submit', (function(e){
    
    
      e.preventDefault();
      
    document.querySelector(".page-request-loader-overlay").style.display= "block";
    
         
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
    
          document.querySelector(".page-request-loader-overlay").style.display= "none";
          
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
          document.querySelector(".page-request-loader-overlay").style.display= "none";
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
          document.querySelector(".page-request-loader-overlay").style.display= "none";
        alert("Your request could not be completed")
    
        }
      
       });
    
    
    
    }));
    
    
    
    });
    
    
    
    //END OF LIBRARY OPTIONS//
    
    
         
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
    
    
    //END OF LIBRARY FORM//