<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['price']))
{
    $name_car = $_POST['price'];


    //connect DB
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
    $Insert = "INSERT INTO chage_elct(price) values (?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("i",$price);
      if($stmt->execute()){
      echo"
      <script> alert ('new record inserted successfully.');
      location.href ='/project_4/index.html';
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
