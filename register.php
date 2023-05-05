<?php 
    session_start(); 
    include 'config.php';
    if(isset($_POST["register"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
        $session['username']=$_POST["username"];

        $check_query = mysqli_query($conn, "SELECT * FROM user where email ='$email'");
        $rowCount = mysqli_num_rows($check_query);

        if(!empty($email) && !empty($password)){
            if($rowCount > 0){
                ?>
<script>
    alert("User with email already exist!");
</script>
<?php
            }
            if(strlen($password)< 8){
                 ?>
    <script>
        alert("Password must not be less than 8 characters!");
    </script>
    <?php
            }
            
            else{
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $result = mysqli_query($conn, "INSERT INTO user (email, password , username, status) VALUES ('$email', '$password_hash', '$username', 0)");
                if($result){
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "Mail/phpmailer/PHPMailerAutoload.php";  
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='omniaali9099@gmail.com';
                    $mail->Password='ijrubbvezsjhrvyg';
    
                    $mail->setFrom('omniaali9099@gmail.com', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Be Fit";
                    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>";
    
                            if(!$mail->send()){
                                ?>
        <script>
            alert("<?php echo " Register Failed, Invalid Email "?>");
        </script>
        <?php
                            }else{
                                $sql = "SELECT * FROM user WHERE email='$email'";
                               $result = mysqli_query($conn, $sql);
                              if($result->num_rows > 0){
                                $row = mysqli_fetch_assoc($result);
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['email'] = $row['email'];}
                                ?>
            <script>
                alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");

                window.location.replace('verification.php');
            </script>
            <?php
                            }
                }
            }
        }
    }

?>

                <!doctype html>
                <html lang="en">

                <head>

                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Fonts -->
                    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
                    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
                    <link rel="icon" href="Favicon.png">
                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

                    <title>Register Form</title>
                </head>

                <body>
                       <nav style="background-color: #eee; height:77px;" class="navbar navbar-expand-lg navbar-light navbar-laravel">
                    <!-- <nav style="background-color: #eee; height:77px;" class="navbar navbar-expand-lg navbar-light navbar-laravel"> -->
                        <div class="container">

                            <a style="margin-top: -9px; margin-left: -139px;" href="index.html" class="logo">
                                <img style=" height: 132px;padding-top: 18px; margin-left: 114px;" src="images/logo.png" alt="">
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
                                    <div class="card">
                                        <div style="text-align:center" class="card-header">Register now with your email</div>
                                        <div class="card-body">
                                            <form action="#" method="POST" name="register">
                                                <div class="form-group row">
                                                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="username" class="form-control" name="username" required autofocus>
                                                    </div>
                                                </div>
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
                                                    <input class="btnn" type="submit" value="Register" name="register">
                                                </div>
                                        </div>
                                        </form>
                                        <script>
                                            if (window.history.replaceState) {
                                                window.history.replaceState(null, null, window.location.href);
                                            }
                                        </script>

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