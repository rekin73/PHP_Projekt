<?php 
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
 session_start(); if(isset($_SESSION['username'])){
     $_SESSION["data"]=[];
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType === "application/json") {
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));
  
    $decodedPar = json_decode($content, true);
    if(preg_match('/YMI*/',$decodedPar['id']))
array_push($_SESSION["data"],new _Bow($decodedPar['id'],$decodedPar['price'],$decodedPar['name'],$decodedPar['addPrice']));
echo("{\"action\":\"error\",\"code\":\"log\"}");
}
 }else{echo("{\"action\":\"error\",\"code\":\"logIn\"}");}
?>