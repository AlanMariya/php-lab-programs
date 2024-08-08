<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "weblab@1";
$dbname = "login";

// Create connection using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['login'])) {
    $user_name = $_POST['username'];
    $pass_word = $_POST['password'];
    //validate input
    if(empty($user_name) || empty($pass_word)) {
        echo "Please enter both username and password";
    }else{
        //prevent SQL injection
        $user_name = mysqli_real_escape_string($conn, $user_name);
        $pass_word = mysqli_real_escape_string($conn, $pass_word);

        //Query database
        $query = "SELECT * FROM logintable1 WHERE username = '$user_name' AND password = '$pass_word'";
        $result =$conn->query($query);

        if($result && $result ->num_rows == 1){
        echo "Login Successful";
        }else{
        echo "Login Failed";
    }
    }
}
    ?>