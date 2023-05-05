<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title></title>
</head>

<body>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <nav style="background-color: #eee; height:77px;" class="navbar navbar-expand-lg navbar-light navbar-laravel">

        <div class="container">

            <a style="margin-top: -9px; margin-left: -139px;" href="" class="logo">
                <img style=" height: 80px;padding-top: 4px;" src="images/logo.png" alt="">
            </a>
            <div style="background-color: #eee;" class="collapse navbar-collapse" id="navbarSupportedContent">


            </div>
        </div>
    </nav>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Password Recover</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="recover_psw">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input style="width:150px;" class="btnn" type="submit" value="Recover" name="recover">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
</body>

</html>

<?php 
    if(isset($_POST["recover"])){
        include 'config.php';
        $email = $_POST["email"];

        $sql = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
<script>
    alert("<?php  echo " Sorry, no emails exists "?>");
</script>
<?php
        }else if($fetch["status"] == 0){
            ?>
    <script>
        alert("Sorry, your account must be verified first, before you recover your password !");
        window.location.replace("index.php");
    </script>
    <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='omniaali9099@gmail.com';
            $mail->Password='ijrubbvezsjhrvyg';
            $mail->setFrom('omniaali9099@gmail.com', 'Password Reset');
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Be Fit";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/project/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>Be Fit team</b>";

            if(!$mail->send()){
                ?>
        <script>
            alert("<?php echo "   Invalid Email "?>");
        </script>
        <?php
            }else{
                ?>
            <script>
                window.location.replace("notification.html");
            </script>
            <?php
            }
        }
    }


?>