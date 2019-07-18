<?php

/////// 1 exemple
    header ("Content-Type: text/html; charset=utf-8");
    require 'phpQuery.php';
    require 'PDOClass.php';
    require 'actionParser.php';
    require 'actionPrint.php';


    $db = new Database();
    $url = 'https://www.coupons.com/store-loyalty-card-coupons/';
    //1 exemple
    // parserMagazins($db, $url)
    // printMagazines($db, 'magazine');
    //2 exemple
    parserProducts($db);
    printProducts($db);
?>
