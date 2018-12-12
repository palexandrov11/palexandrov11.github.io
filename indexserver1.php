
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


$pdo = new PDO("mysql:host=localhost;dbname=id7448806_localhost", $username, $password);

if ($option != "2"){
    $t = "t".$step;
    $p = "p".$step;
    if ($option === '0'){
      if ($key === ''){
          $update = $pdo->prepare("UPDATE Passwords SET "."$t"." = ".":duration WHERE user = :user");
          $update->execute(array(':duration' => $duration, ':user' => $user));
          echo "1";
      }else{
          $update = $pdo->prepare("UPDATE Passwords SET "."$t"."=".":duration,"."$p"."=".":key WHERE user = :user");
          $update->execute(array(':duration' => $duration, ':key' => $key, ':user' => $user));
          echo "1";
      }
    }else {
      if ($key === ''){
          $select_d = $pdo->prepare("SELECT "."$t"." FROM Passwords WHERE user = :user");
          $select_d->execute(array(':user' => $user));
          $i = $select_d->fetch();
          $response_d = $i["$t"];
          if ($step === "20"){
              if (intval($response_d) === intval($duration)){
                  echo "1";
              }else{
                  echo "0";
              }
          } else{
                if ((intval($response_d) - 250 < intval($duration)) && (intval($duration) < intval($response_d) + 250)){
                    echo "1";
                }else{
                     echo "0";
                }
            }
      } else{
          $select_k = $pdo->prepare("SELECT "."$p, $t"." FROM Passwords WHERE user = :user");
          $select_k->execute(array(':user' => $user));
          $j = $select_k->fetch();
          $response_k = $j["$p"];
          $response_kd = $j["t"];
          if (intval($response_k) === intval($key)){
             if ((intval($response_kd) - 250 < intval($duration)) && (intval($duration) < intval($response_kd) + 250)){
              echo "1";
             }else{
              echo "0";
             }
          }
        }
    }
} else{
  $select_u = $pdo->prepare("SELECT user FROM Passwords WHERE user = :user");
  $select_u->execute(array(":user" => $user));
  $a = $select_u->fetch();
  $response_u = $a["user"];
  if ($response_u === NULL){
    $insert = $pdo->prepare("INSERT INTO Passwords(user) Values(:user)"); 
    $insert->execute(array(":user" => $user));
    echo '0';
  } else {
    echo '1';
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
