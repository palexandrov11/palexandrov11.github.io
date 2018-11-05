<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title> Database </title>
  <style type="text/css">
    p.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px Helvetica}
  </style>
</head>
</body>
<?php
$servername = "localhost";
$username = "id7448806_pa";
$password = "55555";
$database = "id7448806_localhost";

print_r($_GET);
if($_GET["serverData"] === "") echo "a is an empty string\n";
if($_GET["serverData"] === false) echo "a is false\n";
if($_GET["serverData"] === null) echo "a is null\n";
if(isset($_GET["serverData"])) echo "a is set\n";
if(!empty($_GET["serverData"])) echo "a is not empty";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo "success";
}else{
    echo "fail";
}
//echo $_POST['serverData'];

if(isset($_POST['severData'])) {
		// data from browser extension/app
		$serverData = $_POST['serverData'];
		echo $serverData;
}
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "INSERT INTO Passwords(id, passkey) VALUES (0124, 'Hello')";

if ($conn->query($sql) === TRUE) {
	echo "Record updated succesfully";
} else {
	echo "Error updating table: " . $conn->error;
}

$sql1 = "SELECT id, passkey FROM Passwords WHERE id = 123";
$result1 = $conn->query($sql1);

while ($row = $result1->fetch_assoc()) {
	echo $row["id"] . $row["passkey"] . "<br>";
}

$conn->close();

?>
</body>
</html>