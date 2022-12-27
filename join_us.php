<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['name_companey']) && isset($_POST['phone']) &&isset($_POST['email']) &&isset($_POST['article']))
{
$name_companey = $_POST['name_companey'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $article = $_POST['article'];

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
    $Insert = "INSERT INTO join_us1(name_companey,phone,email,article) values (?,?,?,?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("siss",$name_companey,$phone,$email,$article);
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
