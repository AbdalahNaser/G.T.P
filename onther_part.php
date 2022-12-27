<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['part_name']))
{

  $part_name= $_POST['part_name'];


  $dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="user_db";
  $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

  $conn->query("SET NAMES utf8");
  $conn->query("SET CHARACTER SET utf8");

  if ($conn->connect_error) {
    die('could not connect to the DB');
  }
  else {
    $Insert = "INSERT INTO part(part_name) values(?)";
    $stmt = $conn->prepare($Insert);
    $stmt->bind_param("s",$part_name);
    if($stmt->execute()) {
      echo"
      <script> alert ('new record inserted successfully.');
      location.href ='/project_4/single part.html';
      </script>";
    }else {
    echo $stmt->error;
    }

  }
  $stmt->close();
  $conn->close();
}
else {
  echo "all field are required.";
  die();
}
?>
