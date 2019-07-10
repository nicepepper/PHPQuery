<?php
    header ("Content-Type: text/html; charset=utf-8");
    require 'phpQuery.php';
    
    function print_arr($arr){
    	echo '<pre>'.print_r($arr, true).'</pre>';
    }

    function print_grup($arr1, $arr2){
    	echo '<pre>'.printf("\n%-10s|  %s", $name, $href).'</pre>';
    }
    
    $url = 'https://www.coupons.com/store-loyalty-card-coupons/';
    $file = file_get_contents($url);
    // echo htmlspecialchars($file);
    // $pattern = '#<a id="a-e.+?</a>#s';          // тут пробовал регулярки
    // preg_match($pattern, $file, $matches);     
    // print_r($matches);
    $doc = phpQuery::newDocument($file);

    echo 'Название магазина | URL';
    foreach ($doc->find('.other-stores .store-pod') as $store) {
    	$store = pq($store);
        $img = $store->find('.store-logo img')->attr('src');
    	$name = $store->attr('title');
    	$href = $store->attr('href');
    	// print_arr($img);
    	// print_arr($name);
    	// print_arr($href);
    	echo '<pre>'.$name,' | ',$href.'</pre>';
        // printf('<p>'."\n%-10s|  %s".'</p>',    $name, $href);
    }

?>