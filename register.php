<meta http-http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['F_Name']) && isset($_POST['L_Name']) &&isset($_POST['Email_ID']) &&isset($_POST['Password']) && isset($_POST['confirm_Pass']) && isset($_POST['year']) && isset($_POST['type_car']) && isset($_POST['model_car']))
{
	$F_Name = $_POST['F_Name'];
	$L_Name = $_POST['L_Name'];
	$Email_ID = $_POST['Email_ID'];
	$Password = $_POST['Password'];
	$confirm_Pass = $_POST['confirm_Pass'];
	$year= $_POST['year'];
	$type_car = $_POST['type_car'];
	$model_car= $_POST['model_car'];
	$Phone = $_POST['Phone'];

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
	$Insert = "INSERT INTO sign_up1(F_Name,L_Name,Email_ID,Password,confirm_Pass,year,type_car,model_car,Phone) values (?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($Insert);
	$stmt->bind_param("sssiiissi",$F_Name,$L_Name,$Email_ID,$Password,$confirm_Pass,$year,$type_car,$model_car,$Phone);

	if($stmt->execute()){
	echo"
	<script> alert ('new record inserted successfully.');
	location.href ='/project_4/Login.php';
	</script>";
    }   else
     {
	echo $stmt->error;
      }
  }
$stmt->close();
$conn->close();
}
else
{
echo "all field are required.";
die();
}
?>
