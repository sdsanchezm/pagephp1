<?php
$TaskName = $_POST['TaskName'];
$TaskStatus = $_POST['TaskStatus'];
echo "Usted escribio: ";
echo $TaskName . " - " . $TaskStatus;

$link = mysqli_connect("localhost", "root", "", "TaskControl1");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "<br>Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_query($link,"INSERT INTO TaskControlTable1 (TaskName, TaskStatus) VALUES ('$TaskName', '$TaskStatus')");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$link = mysqli_connect("localhost", "root", "", "TaskControl1");
$sql = "SELECT id, TaskName, TaskStatus FROM TaskControlTable1";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Task: " . $row["TaskName"]. "<br>";
        echo " - Task: " . $row["TaskName"] . " Status: " . $row["TaskStatus"] . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($link);
header('location: form.php')
?>