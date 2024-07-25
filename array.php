<?php
    $names=array("peas","onion","carrot","beetroot","carrot","tomato","pumpkin","garlic","potato");
    echo"<b>The original array</b><br>";
    foreach($names as $n){
        echo"$n <br>";
    }
    echo"<b>The sorted array</b><br>";
    sort($names);   
    foreach($names as $n){
        echo"$n <br>";
    }
    echo"<b>Array without duplicate elements</b><br>";
    $a=array_unique($names);
    foreach($a as $i){
        echo"$i <br>";
    }
    echo"<b>Removing last element<br></b>";
    array_pop($names);
    foreach($names as $n){
        echo"$n <br>";}
        echo"<b> Reverse order</b><br>";
        $a=array_reverse($names);
        foreach($a as $i){
            echo"$i <br>";}
    ?>