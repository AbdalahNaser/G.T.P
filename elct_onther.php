<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['year']) && isset($_POST['phone']) && isset($_POST['model_car'])&& isset($_POST['article']))
{
    $year = $_POST['year'];
    $model_car = $_POST['model_car'];
    $phone = $_POST['phone'];
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
    $Insert = "INSERT INTO elct_other(year,model_car,phone,article) values (?,?,?,?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("isis",$year,$model_car,$phone,$article);
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
