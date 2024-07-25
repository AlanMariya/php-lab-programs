<?php
if(isset($_POST['txtsubmit'])){
    $fruits=$_POST['txtfruits'];
    echo"Selected Fruit is:";
    foreach($fruits as $v){
        echo $v;
    }
}
?>