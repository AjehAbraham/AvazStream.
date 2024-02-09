
//SEARCH-FUNCTIONS//

function search(event){

    event.preventDefault();
    
    document.querySelector(".page-request-loader-overlay").style.display =  "block";
    
    var form = $("#search");
    var url = "process/search-search";
    
    $.ajax ({
    type: "POST",
    url: url,
    data: form.serialize(),
    dataType:'json',
    encode: true,
    success: function(data){
    //form has beeen submitted//
    
    },
    error: function(data){
      document.querySelector(".page-request-loader-overlay").style.display =  "none";
    
    //alert(data.responseText);
    
    document.querySelector(".search-response").innerHTML  = data.responseText; 
    
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
        
        document.querySelector(".option-error-message").innerHTML= Data;
    
        document.querySelector("#closeOption").addEventListener("click",CloseOption);
    
    function CloseOption(){
      document.querySelector(".options-container-overlay").style.display= "none";
    }
         
    //FUNCTION TO MAINTAIN OPTIONS MENU//
    
    
    $(document).ready(function (e) {
    
    $(".Data-form-option").on('submit', (function(e){
    
    
      e.preventDefault();
          document.querySelector(".page-request-loader-overlay").style.display =  "block";
    
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
          document.querySelector(".page-request-loader-overlay").style.display = "none";
        alert("Your request could not be completed")
    
        }
      
       });
    
    
    
    }));
    
    
    
    });
    
    //END OF OPTION FUNCTION//
    
    
    }
    });
    
    }