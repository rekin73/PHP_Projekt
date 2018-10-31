<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
    <script src="send.js"></script>
</head>
<body>
<span class="loggedAs">
    <?php session_start(); if(isset($_SESSION['username'])) echo "Jesteś zalogowany jako: ".$_SESSION['username']; ?>
</span>
<a href='getProducts.php?p=k_1'>Łuki</a>
    <a href="getProducts.php?p=k_2">Strzały</a>
    <a href="getProducts.php?p=k_3">Cięciwy</a>
    <a href="getProducts.php?p=k_4">Rękawice</a>
    <a href="getProducts.php?p=k_5">Odzierz</a>
    <div id="content">
<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
/* $a=new _Produkt("qwerty",'adasd',1234);
echo $a->kod;
$b=new _Bow("asdf",10000,'sdasd',2000);
$b->setBuyingPrice(21);
echo $b->buyingPrice; */

$p=$_GET['p'];
//echo($p);
$ch = curl_init();
// CURLOPT_URL, CURLOPT_RETURNTRANSFER, CURLOPT_POST, CURLOPT_POSTFIELDS
curl_setopt($ch, CURLOPT_URL, "http://www.asahi-archery.co.jp/kyudo_en_jp/${p}/items_en1.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "city=".$decodedPar['mias']);
 
$result = curl_exec($ch);
//echo json_encode($result,JSON_UNESCAPED_UNICODE); 
//$decodedId=json_decode(trim($result,'[]'),true);
curl_close($ch);
//echo $result;
//$xml = simplexml_import_dom($result);

//print_r($result);
$doc=new DOMDocument();
$doc->loadHTML($result);
$xml = simplexml_import_dom($doc);
$r=$xml->xpath('//div[@class="cell_block"]');
foreach ($r as $key => $value) {
    //$value=$value->asXML();
    $item_num=trim($value->xpath('//span[@class="item_numb"]')[0]);
    $item_price=trim($value->xpath('//span[@class="item_price"]')[0]);
    $item_sub=$value->xpath('//span[@class="item_subjects"]');
//$cena=$value->xpath('//[@href="./profile_en.php?id=*"]');
//$value->asXML()->div->a->img->addAttribute('src',"http://www.asahi-archery.co.jp/kyudo_en_jp/obj_k");
//echo($elema->asXML());

    
    //$button->addAttribute('onclick',"addToCart.php/?id=".$item_num[0]);
    
    $price=trim(explode(" ",$item_sub[0])[2]);
    $item_price=str_replace(",",".",$item_price);
    $item_name=$value->xpath('//span[@class="item_name"]');
    $item_name=$item_name[0];
    //echo $price;
    //echo ($price);
    $value->addChild("button","kup")->addAttribute('onclick',"sendReq({id:\"{$item_num}\",price:\"{$item_price}\",addPrice:\"{$price}\",\"name\":\"{$item_name}\"})");
    //print_r($value);
    
        //echo("{$key},{$val}");
        if(preg_match('/YUMI*/',$value->span[0])){
        //print_r($value->div->a['href'][0]);
        //echo $value->div->a['href'];
        }
        else{}
        //echo($value->span[0]."<br/>");

    
    //echo($value);
    //print_r($value->div->span);
    
    echo simplexml_import_dom($value)->asXML();
    //echo($value->asXML());
}

?>
</div>
</body>
</html>