<?php 
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
 session_start(); if(isset($_SESSION['username'])){
    header('Access-Control-Allow-Origin: *');
     
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
//echo($contentType);
if ($contentType === "application/json") {
    
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));
  
    $decodedPar = json_decode($content, true);
    switch ($decodedPar['action']) {
        case 'addToCart':
        if(preg_match('/YMI*/',$decodedPar['id'])){
            //print_r($decodedPar);
        array_push($_SESSION["data"],new _Bow($decodedPar['id'],$decodedPar['price'],$decodedPar['name'],$decodedPar['addPrice']));
        }
        else
        array_push($_SESSION["data"],new _Produkt($decodedPar['id'],$decodedPar['price'],$decodedPar['name']));
        //print_r($_SESSION);
        echo("{\"action\":\"getCart\",\"data\":".json_encode($_SESSION['data'])."}");
            break;
        case 'getCart':
        //print_r($_SESSION);
        //foreach($_SESSION['data'] as $key => $value){ echo (json_encode($value));};
        echo "{\"action\":\"getCart\",\"data\":".json_encode($_SESSION['data'])."}";
        break;
        case 'clearCart':
        $_SESSION['data']=[];
        echo "{\"action\":\"getCart\",\"data\":".json_encode($_SESSION['data'])."}";
        break;
        default:
            # code...
            break;
    }


}else{
    echo("{\"action\":\"error\",\"code\":\"contentType\",\"given\":\"{$contentType}\"}");
}
//echo("{\"action\":\"ok\",\"code\":\"SESSION\"}");
 }else{echo("{\"action\":\"error\",\"code\":\"logIn\"}");}
?>