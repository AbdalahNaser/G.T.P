<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if (isset($_POST['type_90']) && isset($_POST['type_95']) && isset($_POST['price']) && isset($_POST['liter'])) {
  $type_90 = $_POST['type_90'];
  $type_95 = $_POST['type_95'];
  $price = $_POST['price'];
  $liter = $_POST['liter'];

  $dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="user_db";
  $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);


  $conn->query("SET NAMES utf8");
  $conn->query("SET CHARACTER SET utf8");
  if ($conn->connect_error){
    die('could not connect to the database');
  }
  else {
    $Insert = "INSERT INTO gas(type_90,type_95,price,liter) values (?,?,?,?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("siii",$type_90,$type_95,$price,$liter);
      if($stmt->execute()){
      echo"
      <script> alert ('new record inserted successfully.');
      location.href ='/project_(3)/index.html';
      </script>";
    }else
    {
      echo $stmt->error;
    }
  }
  $stmt->close();
  $conn->close();
}
else{
  echo "all field are required.";
  die();
}
?>
