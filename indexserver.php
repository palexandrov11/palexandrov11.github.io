
<html>
<head>
  <script type= "text/javascript" src="password.js"></script>
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
$db = "DB";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "INSERT INTO Passwords(id, passkey) VALUES (0123, 'Hellooooooooo')";

if ($conn->query($sql) === TRUE) {
	echo "Record updated succesfully";
} else {
	echo "Error updating table: " . $conn->error;
}

$sql1 = "SELECT id, passkey FROM Passwords WHERE id='0123'";
$result1 = $conn->query($sql1);

while ($row = $resul1->fetch_assoc()) {
	echo $row["id"] . $row["passkey"];
}


$conn->close();
?>
</body>
</html>