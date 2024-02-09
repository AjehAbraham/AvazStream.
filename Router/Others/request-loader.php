<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

exit;

}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

    exit;
}
?>

<style>
    .page-request-loader-overlay{
        background-color: black;
  position: fixed;
  z-index: 7;
  bottom: 98.5%;
  right: 0;
  left: 0;
  top: 0;
  display: none;
    }
    .page-request-loader-container{
        padding: 3px 3px;
        width: 100%;
        border-radius: ;
        background-color: red;
        margin: auto;
        animation: animated-loader 2s infinite;

        transition: width 2s, height 4s;
    }
    
    @keyframes animated-loader {
        from{ background-color: red}
        to{background-color: rgb(0,120,100)}
    }
    </style>
    <div class="page-request-loader-overlay">

    <div class="page-request-loader-container">
</div>
</div>