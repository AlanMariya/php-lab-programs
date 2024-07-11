<?php
Session_Start();
if(isset($_SESSION["username"]&& $_SESSION["email"])){
    echo"username: $_SESSION["email"];
}
    ?>