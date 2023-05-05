<?php
    session_start();
    include 'config.php';
    if(isset($_SESSION['id'])){
         header("Location:userdiary.php");
    }
    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($conn, trim($_POST['email'])); //Escapes special characters in a string for use in an SQL statement
        $password = trim($_POST['password']); //Strip whitespace from the beginning and end of a string

        $sql = mysqli_query($conn, "SELECT * FROM user where email = '$email'");
        $count = mysqli_num_rows($sql);
    
            if($count > 0){
                
                $fetch = mysqli_fetch_assoc($sql);
                $hashpassword = $fetch["password"];
                $email=$fetch["email"];
    
                if($fetch["status"] == 0){
                    ?>
    <script>
        alert("Please verify email account before login.");
    </script>

    <?php 
            
              //Verifies that the given hash matches the given password
            } else if(password_verify($password, $hashpassword)){
             $sql = "SELECT * FROM user WHERE email='$email'";
             $result = mysqli_query($conn, $sql);      
             if($result->num_rows > 0){
              $row = mysqli_fetch_assoc($result);
              $_SESSION['user_role'] = $row['user_role'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['id'] = $row['id'];
              $_SESSION['email'] = $row['email'];
              if($_SESSION['user_role'] == 'admin'){
                   header("Location:admin/adminpanel.php");
              }
              else{
              header("Location: userdiary.php");}
        }
                  
             }
             else{
           
                 echo'<script> alert("password or email is invalid, please try again.") </script>';
                }
            }
                
    }

?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <title>Login Form</title>
    </head>

    <body>

        <nav style="background-color: #eee; height:77px;" class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">

                <a style="" href="index.html" class="logo logi">
                    <img style=" height: 132px;padding-top: 18px;" src="images/logo.png" alt="">
                </a>
                 <button style=" margin-left: 316px;"class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                <div style="background-color: #eee;" class="collapse navbar-collapse log-li" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" style="font-weight:bold; color:black; text-decoration:underline">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card" style="height: 330px;">
                            <div class="card-header" style="text-align: center;">Login with your email</div>
                            <div class="card-body">
                                <form action="#" method="POST" name="login">
                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password" required>
                                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                                        </div>
                                    </div>



                                    <div class="col-md-6 offset-md-4">
                                        <input type="submit" class="btnn" value="Login" name="login">
                                        <a style="position: absolute;  transform: translate(13px, 17px);  text-decoration: none;" href="recover_psw.php" class="btn-link">
                                            Forgot Your Password?
                                        </a>
                                    </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>

        </main>
                 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

    </html>
    <script>
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        toggle.addEventListener('click', function() {
            if (password.type === "password") {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
            this.classList.toggle('bi-eye');
        });
    </script>