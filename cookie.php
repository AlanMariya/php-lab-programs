<?php
    echo"Today:".date("y/m/d h:i:s:a")."<br>";
    $d=date("y/m/d h:i:s:a");
    setcookie("Date",$d);
    if(isset($_COOKIE["Date"])){
        $n=$_COOKIE["Date"];
        echo"You last visited on: ".$n;}
        else
        {
            echo"This is your first vist";
        }
    
?>