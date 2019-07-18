<?php

function printMagazines($db)
{
    $magazine = $db->query("SELECT * FROM `magazine`");
    foreach ($magazine as $element) {
        echo "<pre>".$element['name'].'|'.$element['url']."</pre>";     
    }
}

function printProducts($db)
{
	$products = $db->query("SELECT * FROM `products`");
    foreach ($products as $element) {
        echo "<img src=".$element['imgsrc'].">";
        echo "<pre>".$element['heading']."</pre>";
        echo "<pre>".$element['description']."</pre>";
    }
}

?>