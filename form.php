<html>

	<head>
		<meta charset="utf-8"/>
		<title>TaskControl1</title>
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
	</head>

<body>
<div class="container">
	<div class="jumbotron text-center">
    	<h2 class="">Kanban Basic System</h2>
    </div>
</div>

<form action="registration_form.php" method="POST"> 
	<div class="container">
		<div class="form-group">
		          	<span class="input-group-addon">Task</span>
		        	<input type="text" name="TaskName" class="form-control">
		</div>
		<div class="form-group">
		          	<span class="input-group-addon">Status</span>
					<select name="TaskStatus" class="form-control">
						<option value="BACKLOG">BACKLOG</option>
						<option value="WORK IN PROGRESS">WORK IN PROGRESS</option>
						<option value="DONE">DONE</option>
					</select>
		</div>

		<div class="form-group">
			<input type="submit" value="Save Now" class="btn btn-primary btn-lg">
		</div>

	</div>
</form>
    <br>
    <br>

<hr>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TaskControl1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, TaskName, TaskStatus FROM TaskControlTable1 WHERE TaskStatus = 'DONE' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo " - Name: " . $row["TaskName"]. " " . $row["TaskStatus"]. "<br>";
        printss1($row["TaskName"], $row["TaskStatus"]);
    }
} else {
    echo "0 results";
}

echo "<hr>";
$sql = "SELECT id, TaskName, TaskStatus FROM TaskControlTable1 WHERE TaskStatus = 'BACKLOG' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo " - Name: " . $row["TaskName"]. " " . $row["TaskStatus"]. "<br>";
        printss1($row["TaskName"], $row["TaskStatus"]);
    }
} else {
    echo "0 results";
}

echo "<hr>";
$sql = "SELECT id, TaskName, TaskStatus FROM TaskControlTable1 WHERE TaskStatus = 'WORK IN PROGRESS' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo " - Name: " . $row["TaskName"]. " " . $row["TaskStatus"]. "<br>";
        printss1($row["TaskName"], $row["TaskStatus"]);
    }
} else {
    echo "0 results";
}

function printss1($name, $status)
{
	if($status == "WORK IN PROGRESS")
	{
	echo "
		<span class=\"label label-info\"></span>
		<div class=\"container\">
			<div class=\"row\">
				<div class=\"col-lg-6\">
					<button class=\"btn btn-default\"> $name </button>
					<button class=\"btn btn-info\"> $status </button>
				</div>
			</div>
		</div>
		";
	}
	if($status == "DONE")
	{
	echo "
		<span class=\"label label-success\"></span>
		<div class=\"container\">
			<div class=\"row\">
				<div class=\"col-lg-6\">
					<button class=\"btn btn-default\"> $name </button>
					<button class=\"btn btn-success\"> $status </button>
				</div>
			</div>
		</div>
		";
	}
	if($status == "BACKLOG")
	{
	echo "
		<span class=\"label label-danger\"></span>
		<div class=\"container\">
			<div class=\"row\">
				<div class=\"col-lg-6\">
					<button class=\"btn btn-default\"> $name </button>
					<button class=\"btn btn-danger\"> $status </button>
				</div>
			</div>
		</div>
		";
	}
}

$conn->close();

?>

<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
</body>
</html>