<?php

function parserMagazins($db, $url){
   $file = file_get_contents($url);
   $doc = phpQuery::newDocument($file);
   foreach ($doc->find('.other-stores .store-pod') as $store) {
       $store = pq($store);
       $name = $store->attr('title');
  	   $href = $store->attr('href');
       $href = 'https://www.coupons.com'.$href;
       $db->execute("INSERT INTO `magazine` SET `name`='$name', `url`='$href'");
    }
    echo '<pre>'.'successful parser!'.'</pre>';
}

function parserProduct($db, $name, $url){
    $file = file_get_contents($url);
    $doc = phpQuery::newDocument($file);
    $i = 0;
    foreach ($doc->find('.pods .pod .media') as $coupons ) {
        $i++;
        if($i > 50) break;
        $coupons = pq($coupons);
        $img = $coupons->find('.media-object img')->attr('src');
        $heading = $coupons->find('.pod_brand')->html();
        $description = $coupons->find('.pod_description')->html();
        $expirationDate = $coupons->find('.pod_expiry')->html();
        $db->execute("INSERT INTO `products` SET 
            `name`='$name', 
            `imgsrc`='$img', 
            `heading`='$heading', 
            `description`='$description'"    
        );       
    }
}

function parserProducts($db)
{
   	$magazine = $db->query("SELECT * FROM `magazine`");
    $j = 0;
    foreach ($magazine as $element) {
        $j++;
        if($j > 50) break;
        parserProduct($db, $element['name'], $element['url']);
    }
    echo '<pre>'.'successful parser!'.'</pre>';
}

?>