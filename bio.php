<?php
session_start();
if(isset($_POST['submit']))
{
    $fname=$_POST['txtname']; 
    $mname=$_POST['txtmidname'];
    $lname=$_POST['txtlname'];
    $address=$_POST['txtaddress'];
    $nationality=$_POST['txtnation'];
    $email=$_POST['txtemail'];
    $phnum=$_POST['phno'];
    echo"<table border=1>";
    echo"<tr><th>First Name</th>";
    echo"<th>Middle Name</th>";
    echo"<th>Last Name</th>";
    echo"<th>Address</th>";
    echo"<th>Nationality</th>";
    echo"<th>Email</th>";
    echo"<th>Phone Number</th></tr>";

    echo"<tr><td>$fname</td>";
    echo"<td> $mname</td>";
    echo"<td>$lname</td>";
    echo"<td>$address</td>";
    echo"<td>$nationality</td>";
    echo"<td>$email</td>";
    echo"<td>$phnum</td></tr>";
}
?>