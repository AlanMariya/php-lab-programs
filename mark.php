<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "weblab@1";
$dbname = "marklist";

// Create connection using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['insert'])) {
    $reg_no = $_POST['regno'];
    $name = $_POST['name'];
    $mark1 = $_POST['mark1'];
    $mark2 = $_POST['mark2'];
    $mark3 = $_POST['mark3'];
    $mark4 = $_POST['mark4'];
    $mark5 = $_POST['mark5'];
    $total = $mark1 + $mark2 + $mark3 + $mark4 + $mark5; // Calculate total
    if($total>400)
    {
        $grade="A";
        echo "Grade is : $grade"."<br>";
    }
    else if($total>300 && $total<400)
    {
        $grade="B";
        echo "Grade is : $grade"."<br>";
    }
    else if($total>250 && $total<300)
    {
        $grade="C";
        echo "Grade is : $grade"."<br>";
    }
    else
    {
        $grade="Failed";
        echo  $grade;
    }
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO mark (Regno,Name, Mark1, Mark2, Mark3, Mark4, Mark5, Total, Grade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $reg_no, $name, $mark1, $mark2, $mark3, $mark4, $mark5, $total, $grade);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch data
$result = $conn->query("SELECT * FROM mark");

if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Register Number</th><th>Name</th><th>Mark 1</th><th>Mark 2</th><th>Mark 3</th><th>Mark 4</th><th>Mark 5</th><th>Total</th><th>Grade</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['Regno'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Mark1'] . "</td>";
        echo "<td>" . $row['Mark2'] . "</td>";
        echo "<td>" . $row['Mark3'] . "</td>";
        echo "<td>" . $row['Mark4'] . "</td>";
        echo "<td>" . $row['Mark5'] . "</td>";
        echo "<td>" . $row['Total'] . "</td>";
        echo "<td>" . $row['Grade'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
<html>
    <body>
        <form action="#" method="post">
            Register Number List: <select name="regvalue">
                <option value="">select</option>
                <?php
                // Database connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data
                $sql = $conn->query("SELECT Regno FROM mark");
                while ($row = $sql->fetch_assoc()) {
                    echo "<option value='" . $row['Regno'] . "'>" . $row['Regno'] . "</option>";
                }

                // Close connection
                $conn->close();
                ?>
            </select>
            <input type="submit" name="set" value="View Mark List">
        </form>

<?php
if (isset($_POST['set'])) {
            $selected_regno = $_POST['regvalue'];

            // Database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch and display selected student's marks
            $sql = $conn->prepare("SELECT * FROM mark WHERE Regno = ?");
            $sql->bind_param("s", $selected_regno);
            $sql->execute();
            $result = $sql->get_result();

    if ($result->num_rows > 0) {
echo "<table border=1>";
echo "<tr><th>Register Number</th><th>Name</th><th>Mark 1</th><th>Mark 2</th><th>Mark 3</th><th>Mark 4</th><th>Mark 5</th><th>Total</th><th>Grade</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['Regno'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Mark1'] . "</td>";
                    echo "<td>" . $row['Mark2'] . "</td>";
                    echo "<td>" . $row['Mark3'] . "</td>";
                    echo "<td>" . $row['Mark4'] . "</td>";
                    echo "<td>" . $row['Mark5'] . "</td>";
                    echo "<td>" . $row['Total'] . "</td>";
                    echo "<td>" . $row['Grade'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No records found for the selected registration number.";
            }

            // Close connection
            $conn->close();
        }
        ?>
    </body>
</html>