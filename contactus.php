<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php
$message_sent=false;
if(isset($_POST['email'])&& $_POST['email'] !=''){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      $name = $_POST['name'];
     $email = $_POST['email'];
    $message = $_POST['message'];
 require_once "Mail/phpmailer/class.PHPmailer.php";
 require_once "Mail/phpmailer/class.smtp.php";
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->Username='omniaali9099@gmail.com';
    $mail->Password='ijrubbvezsjhrvyg';
    $mail->SMTPSecure='tls';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("omniaali9099@gmail.com");
    $mail->Subject = ("$email");
    $mail->Body = $message;
     if($mail->send()){
     $message_sent=true;
     }
     else{
        ?>
    <script>
        alert("<?php echo "
            Something went wrong, please
            try again "?>");
    </script>
    <?php
     }

}

}
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
        </head>

        <body style=" color: #333; display: grid; max-width: 100%; place-items: center;">
            <?php if($message_sent) {
    echo "<h3>Thank you for contacting us , will be in touch soon</h3>";
    ?>
            <a style="width:300px" class="btnn" href="userdiary.php">Go back to my diary</a>
            <?php 
} 
else{ ?>
            <h2 class="contact-heading">Contact us</h2>
            <form class="con-us" style="" action="contactus.php" method="post" autocomplete="off">
                <laabel class="contact-label" for="name">Your name</label>
                    <input class="contact-input " type="text" name="name" placeholder="Your name">

                    <laabel class="contact-label" for="email">Email</label>
                        <input class="contact-input " type="email" name="email" placeholder="Email">
                        <laabel class="contact-label" for="message">Message</label>
                            <textarea style=" height: 6em;" class="contact-input " name="message" placeholder="Message"></textarea>
                            <input class="cont-submit" class="btn" type="submit" value="submit">
            </form>
            <?php  } ?>
        </body>

        </html>