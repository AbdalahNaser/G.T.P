<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>
<?php
$conn = new PDO("mysql:host=localhost; dbname=user_db",'root','');

if (isset($_POST["submit"])) {

    $str = $_post["search"];
    $str = $conn->prepare("SELECT * FROM 'search1' WHERE name = '$str'");

    $str->setFetchMode(PDO::FETCH_OBJ);
    $str->execute();

    if($row = $str->fetch())
    {

        ?>
<br><br><br>
<table>
    <tr>
        <th>name</th>
    </tr>
    <tr>
        <td>
            <?php echo $row->name; ?> </td>
    </tr>
</table>
<?php
    }

    else {
        echo "parts doesn't exist";
    }


}
    ?>
