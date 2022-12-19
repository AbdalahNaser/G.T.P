<?php

    include('PHP/config.php');
    $email = $_POST['Email_ID']??null;
    $password = $_POST['Password']??null;

        //to prevent from mysqli injection
        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select * from sign_up1 where Email_ID = '$email' and Password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
          echo"
          <script> alert ('Login successful');
          location.href ='/project_(3)/logout.html';
          </script>";
          //  echo "<h1><center> Login successful </center></h1>";
            //header("location: logout.html");
        }
        else{
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title> login page</title>
</head>

<body class="bg-secondary">
    <!--Start Login-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg mt-5">
                    <div class="card-header C text-white">تسجيل الدخول</div>
                    <div class="card-body">
                        <form action="Login.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="user_name" name="Email_ID"
                                    placeholder="email" autofocus>
                                <label for="User_name">email</label>
                            </div>
                            <div class="form-floating mb-3">

                                <input type="password" class="form-control" id="Pass" name="Password"
                                    placeholder="****">
                                <label for="Pass">Password</label>
                            </div>
                            <div class="form-check mb-3">

                                <input type="checkbox" class="form-check-input" form="remember_me">
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>
                            <div class="d-grid">

                                <input type="submit" name="submit" class="btn btn-danger" value="Login to continue">
                                <a href="logout.html"> </a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Login-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
