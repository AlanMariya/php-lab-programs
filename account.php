<?php
mysql_connect('localhost','root');
mysql_select_db('accounts');
if(isset($_POST['submit']))
{
    $account_no=$_POST['accno'];
    $account_name=$_POST['txtname'];
    $bank_name=$_POST['bankname'];
    mysql_query("insert into values('$account_no','$account_name','$bank_name')");
    echo"<table border=1>";
    echo"<tr><th>Account No</th>";
    echo"<th>Account Name</th>";
    echo"<th>Bank Name</th></tr>";
    while($row=mysql_fetch_array(result)){
        $account_no=$row[0];
        $account_name=$row[1];
        $bank_name=$row[2];
        echo"<tr><td>$account_no</td>";
    echo"<td>$account_name</td>";
    echo"<td>$bank_name</td></tr>";
    }
}
echo"</table>";
?>