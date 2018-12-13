
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

if ($option != "2"){
    $t = "t".$step;
    $p = "p".$step;
    if ($option === '0'){
      if ($key === ''){
          $sql_t = "UPDATE Passwords SET "."$t"." = "."'$duration' WHERE user = '$user'";
          $conn->query($sql_t);
          echo "1";
      }else{
          $sql_p = "UPDATE Passwords SET "."$t"."="."'$duration',"."$p"."="."'$key' WHERE user = '$user'";
          $conn->query($sql_p);
          echo "1";
      }
    }else {
      if ($key === ''){
          $sql_v = "SELECT "."$t"." FROM Passwords WHERE user = '$user'";
          $result_v = $conn->query($sql_v);
          while ($row = $result_v->fetch_assoc()){
            $t_int = intval($row[$t]);
          }
          if ($step === "20"){
              if ($t_int === intval($duration)){
                  echo "1";
              }else{
                  echo "0";
              }
          } else{
                if (($t_int - 200 < intval($duration)) && (intval($duration) < $t_int + 200)){
                    echo "1";
                }else{
                     echo "0";
                 }
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
} else{
  if ($a === NULL){
    $sql_n = "INSERT INTO Passwords(user) Values('$user')";
    $conn->query($sql_n);
    echo "0";
  }else{
    echo "1";
  }
}


?>
