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

$user = $_GET["user"];
$step = $_GET["step"];
$key = $_GET["key"];
$duration = $_GET["duration"];
$option = $_GET["option"];

$p_int = '';
$t_int = '';


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_u = "SELECT user FROM Passwords WHERE user = '$user'";
$result1 = $conn->query($sql_u);
$a = $result1->fetch_assoc();

if ($a === NULL){
  $sql_n = "INSERT INTO Passwords(user) Values('$user')";
  $conn->query($sql_n);
  echo "0";
} else{
  $t = "t".$step;
  $p = "p".$step;
  if ($option === '0'){
    if ($key === ''){
        $sql_t = "UPDATE Passwords SET "."$t"." = "."'$duration' WHERE user = '$user'";
        $conn->query($sql_t);
    }else{
        $sql_p = "UPDATE Passwords SET "."$t"."="."'$duration',"."$p"."="."'$key' WHERE user = '$user'";
        $conn->query($sql_p);
    }
  }else {
    if ($key === ''){
        $sql_v = "SELECT "."$t"." FROM Passwords WHERE user = '$user'";
        $result_v = $conn->query($sql_v);
        while ($row = $result_v->fetch_assoc()){
          $t_int = intval($row[$t]);
        }
        if (($t_int - 200 < intval($duration)) && (intval($duration) < $t_int + 200)){
          echo "1";
        }else{
          echo "0";
        }
    } else{
        $sql_v = "SELECT "."$p, $t"." FROM Passwords WHERE user = '$user'";
        $result_v = $conn->query($sql_v);
        while ($row = $result_v->fetch_assoc()){
           $p_int = intval($row[$p]);
           $t_int = intval($row[$t]);
        }
        if ($p_int === intval($key)){
           if (($t_int - 200 < intval($duration)) && (intval($duration) < $t_int + 200)){
            echo "1";
           }else{
            echo "0";
           }
        }
      }
  }
}




/*$sql = "INSERT INTO Passwords(user) VALUES ('philip')";

if ($conn->query($sql) === TRUE) {
  echo "Record updated succesfully";
} else {
  echo "Error updating table: " . $conn->error;
}*/

/*$a = array();
$t0 = $_SERVER['REQUEST_TIME'];
array_push($a, $t0);
$b = count($a);
echo "array".$b;*/

/*if ($opt === '1'){
    echo "yes yes";
    $sql1 = "SELECT user FROM Passwords WHERE user = '$user'";
    if($conn->query($sql1)){
        echo "yes yes yes yes";
        if(intval($t1) != 0){
            $dt = $t1 - intval($stamp);
            echo "FUCKYES".$dt;
        }else{
            $t1 = intval($stamp);
            echo "nope".$t1;
        }
        }
    }*/


//$sql_user = "SELECT user FROM Passwords WHERE user

/*else{
    "INSERT INTO Passwords(user, passkey) VALUES ($user, 
    echo "the user does not exist";
    
}*/



//if $opt === ""
//if ()
//$sql2 = "INSERT INTO Passwords(user, passkey) VALUES ($user, "


/*$sql1 = "SELECT id, passkey FROM Passwords WHERE id = '123'";
$result1 = $conn->query($sql1);
while ($row = $result1->fetch_assoc()) {
  echo $row["id"] . $row["passkey"] . "<br>";
}
while ($row = $result1->fetch_assoc()) {
  echo $row["id"] . $row["passkey"] . "<br>";
}*/

$conn->close();

/*
if($_GET["a"] === "") echo "a is an empty string\n";
if($_GET["a"] === false) echo "a is false\n";
if($_GET["a"] === null) echo "a is null\n";
if(isset($_GET["a"])) echo "a is set\n";
if(!empty($_GET["a"])) echo "a is not empty";
$info = $_GET["a"];
echo $info . 'yoyoyoyo';
if($_POST["a"] === "") echo "a is an empty string\n";
if($_POST["a"] === false) echo "a is false\n";
if($_POST["a"] === null) echo "a is null\n";
if(isset($_POST["a"])) echo "a is set\n";
if(!empty($_POST["a"])) echo "a is not empty";
$info = $_POST["a"];
echo $info;
*/

?>
</body>
</html>