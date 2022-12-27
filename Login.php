
<?php

    include('PHP/config.php');
    $email = $_POST['Email_ID']??null;
    $password = $_POST['Password']??null;

        //to prevent from mysqli injection
        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select * from sign_up where Email_ID = '$email' and Password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
          echo"
          <script> alert ('Login successful');
          location.href ='/project (2)/logout.html';
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
                        <form>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="user_name" placeholder="Ahmad" autofocus>
                                <label for="User_name">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="Pass" placeholder="****">
                                <label for="Pass">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" form="remember_me">
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>
                            <div class="d-grid">
                                <a href="index.html" class="btn C text-white align-items-center d-inline-flex justify-content-center" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2 bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                      </svg>تسجيل الدخول</a>
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
