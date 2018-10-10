<?php






  $ch = curl_init();
// CURLOPT_URL, CURLOPT_RETURNTRANSFER, CURLOPT_POST, CURLOPT_POSTFIELDS
curl_setopt($ch, CURLOPT_URL, "http://www.asahi-archery.co.jp/kyudo_en_jp/k_1/items_en2.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "city=".$decodedPar['mias']);
 
$result = curl_exec($ch);
//echo json_encode($result,JSON_UNESCAPED_UNICODE); 
//$decodedId=json_decode(trim($result,'[]'),true);
curl_close($ch);
//echo $result;
//$xml = simplexml_import_dom($result);


$doc=new DOMDocument();
$doc->loadHTML($result);
$xml = simplexml_import_dom($doc);
$r=$xml->xpath('//div[@class="cell_block"]');
foreach ($r as $key => $value) {
    echo($value->asXML());
}
/*
foreach (json_decode($result,true) as $key => $value) {
    //$value["Miasto"]==$decodedPar['mias'] and $value["Powiat"]==$decodedPar['pow'] and $value["Gmina"]==$decodedPar['gmi'] and $value["Wojewodztwo"]==$decodedPar['woj']
    if(mb_strtolower($value["Miasto"])==mb_strtolower($decodedPar['mias'])&& mb_strtolower($value["Wojewodztwo"])==mb_strtolower($decodedPar['woj'])&&$value["Powiat"]==$decodedPar['pow'] && $value["Gmina"]==$decodedPar['gmi'])
    $IdMiasta=$value['IdMiasta'];
    //print_r(ucfirst(strtolower($value["Miasto"])));
    
  //echo json_encode($value);  
}
*/
//echo json_encode($decodedId,JSON_UNESCAPED_UNICODE); 
//echo(json_encode(json_decode($result)[1],JSON_UNESCAPED_UNICODE));







//print_r($decoded['IdMiasta']);
/*
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, "http://pocztowekody.pl/index/index/id_city/114933/city/Krzeszowice;Krzeszowice;krakowski;Ma%C5%82opolskie/page/1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec ($ch);
curl_close ($ch);
//print_r($result);
*/

//$IdMiasta="1801";//Kraków
/*
$doc = new DOMDocument();
@$doc->loadHTMLFile("http://pocztowekody.pl/index/index/id_city/".$IdMiasta."/city/a/page/");
$xml = simplexml_import_dom($doc);
$result = $xml->xpath('//span[@class="lblPaging"]');
$pages=substr((string)$result[0],4,strlen((string)$result[0])); //strony

//echo('\n'.$pages);
echo'<table>';

for ($j=1; $j <= $pages; $j++) { 
    @$doc->loadHTMLFile("http://pocztowekody.pl/index/index/id_city/".$IdMiasta."/city/a/page/".$j);
    $element1=$doc->getElementsByTagName('table');
    $element=$element1->item(0)->getElementsByTagName('tr');
    //print_r($element);
    $k=0;
foreach ($element as $td) {
    //echo '<td>'.$td->nodeValue.'</td>', PHP_EOL;
    echo'<tr>';
    $params2 = $element->item($k)->getElementsByTagName('td');
    $i=0;
    foreach ($params2 as $p) {
        echo"<td>".$params2->item($i)->nodeValue."</td>"; //get Category attributes
        $i++;
    }
    $k++;
    echo'</tr>';
}
}

echo'</table>';

*/



/*
for ($i=1; $i < $pages+1; $i++) { 
    
}
*/
?>