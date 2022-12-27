<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['year']) && isset($_POST['type_car']) &&isset($_POST['phone']) &&isset($_POST['model_car'])&& isset($_POST['article']))
{
    $year = $_POST['year'];
    $type_car = $_POST['type_car'];
    $phone = $_POST['phone'];
    $model_car = $_POST['model_car'];
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
    $Insert = "INSERT INTO elct(year,type_car,phone,model_car,article) values (?,?,?,?,?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("isiss",$year,$type_car,$phone,$model_car,$article);
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
