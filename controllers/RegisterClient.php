<?php 


function indexRegister() {
    $globalcss = "/assets/css/global.css";
    $globaljs = "/assets/js/global.js";
    $css = "/assets/css/clientForm.css";
    $js = "/assets/js/clientRegister.js";
    $content = __DIR__ . "/../views/clientRegister.php";
    

    require __DIR__ . "/../includes/layout.php";

}
function toRegister () {
    require __DIR__ . "/../config/api/registerClient.php";
    
}




