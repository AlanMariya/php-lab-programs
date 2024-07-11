<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
  session_start();
  $_SESSION["username"]="Alan";
  $_SESSION["email"]="alan@gmail.com";
  echo"Session variables are set";
  ?>  
</body>
</html>