<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
{
    echo"Username : ".$_SESSION ['username']."<br><br>";
    echo"Email : ".$_SESSION ['email'];
}else{
    echo"No session varaibles are set";
}
    ?>