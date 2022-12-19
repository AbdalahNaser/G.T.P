<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['year']) && isset($_POST['type_car']) &&isset($_POST['model_car']) &&isset($_POST['phone'])&& isset($_POST['article']))
{
    $year = $_POST['year'];
    $type_car = $_POST['type_car'];
    $phone = $_POST['model_car'];
    $model_car = $_POST['phone'];
    $article = $_POST['article'];

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
    $Insert = "INSERT INTO techs1(year,type_car,model_car,phone,article) values (?,?,?,?,?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("isiis",$year,$type_car,$model_car,$phone,$article);
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
