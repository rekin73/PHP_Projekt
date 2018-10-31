<?php 
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
 session_start(); if(isset($_SESSION['username'])){
    header('Access-Control-Allow-Origin: *');
     $_SESSION["data"]=[];
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType === "application/json") {
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));
  
    $decodedPar = json_decode($content, true);
    if(preg_match('/YMI*/',$decodedPar['id']))
array_push($_SESSION["data"],new _Bow($decodedPar['id'],$decodedPar['price'],$decodedPar['name'],$decodedPar['addPrice']));

}
echo("{\"akt\":\"ok\",\"kod\":\"SESSION\"}");
 }else{echo("{\"akt\":\"error\",\"kod\":\"logIn\"}");}
?>