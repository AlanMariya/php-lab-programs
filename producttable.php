<?php
mysql_connect('localhost','root');
mysql_select_db('products');
if(isset($_POST['submit'])){
    $item_code=$_POST['code'];
    $item_name=$_POST['name'];
    $price=$_POST['unitprice'];
    mysql_query("insert into values('$item_code','$item_name','$price')");
    $result=mysql_query("select * from items");
    echo"<table border=1>";
    echo"<tr><th>ITEM CODE</th>";
    echo"<th>ITEM NAME</th>";
    echo"<th>UNIT PRICE</th></tr>";
    while($row=mysql_fetch_array(result)){
        $item_code=$row[0];
        $item_name=$row[1];
        $price=$row[2];
        echo"<tr><td>$item_code</td>";
        echo"<td>$item_name</td>";
        echo"<td>$price</td></tr>";
    }
}
echo"</table>";
?>