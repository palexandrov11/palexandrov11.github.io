
<?php
$servername = "localhost";
$username = "id7448806_pa";
$password = "55555";
$database = "id7448806_localhost";


//parse the GET request from the browser
$user = $_GET["user"];
$step = $_GET["step"];
$key = $_GET["key"];
$duration = $_GET["duration"];
$option = $_GET["option"];

//establish connection with database
$pdo = new PDO("mysql:host=localhost;dbname=id7448806_localhost", $username, $password);

//determine whether user information is being verified (login) or updated (registration)
//use step variable to correctly identify the respective cell in the database for a given input
//echo "1" if cell was succesfully updated or input was validated and 
//echo "0" if cell was not succesfully updated or input did not match data in given cell 
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
          $response_kd = $j["$t"];
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
}

?>
