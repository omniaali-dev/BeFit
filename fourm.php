<?php
session_start();
$id=$_SESSION['id'];
include 'config.php';
 date_default_timezone_set("Asia/Kuwait");
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;1,400&family=Lexend+Deca:wght@200;300&display=swap"
      rel="stylesheet">
    <title>Be fit discussions</title>
  </head>

  <body>
    <div class="header">
      <a href="" class="logo">
        <img src="images/logo.png" alt="">
      </a>
       <i class="fa-solid fa-bars toggle-menu"></i>
      <ul class="main-nav" id="main-nav">
        <li>
          <a href="userdiary.php">MY DIARY</a>
        </li>
        <li>
          <a href="contactus.php">CONTACT US</a>
        </li>
             <li>
          <a href="logout.php">LOG OUT</a>
        </li>
      </ul>
    </div>
    <div style="margin-bottom:138px" class="image-fourm">
      <div class="recipe-heading fourm">
        <h2 style="font-size:33px;">WELCOME TO OUR COUMMUNITY</h2>
        <p style="font-size:13px;"> Here you can share your experience with our website, ask questions related to health, nutrition, and fitness, and share your health and fitness journey with others.
          <br>
          <strong>Please read and adhere to the following rules of our community, unless your post will be deleted.</strong>
          <br> 1- When commenting on other people's posts, be courteous.Use polite language and be friendly to others.
          <br> 2- Do not post inappropriate photos or words, and keep your posts focused and short.
          <br> 3- Do not post something not related to our community.
          <br> 4- Do not give others any medical advice or information if you are not a doctor, and do not listen to anyone else give this advice or information.
          
          <br>
          <strong>And finally, this community is for helping each other, so try to help other people with your experience and get benefits from others.
            <br>
          </strong>
        </p>
      </div>
    </div>
 
    <a class="btnn create" href="create_post.php?value">Create a post</a>
  
    <h5 class="h5-fourm">Recent posts :</h5>
    <?php
     $id=$_SESSION['id'];
$sql = "SELECT body,title,posts.date,username ,user.id , post_id FROM user,posts WHERE user.id=posts.id ORDER BY post_id DESC ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
  $post= $row['body'];
  $title=$row['title'];
  $date=$row['date'];
   $date=$row['date'];
  $username=$row['username'];
  $id=$row['id'];
  $_SESSION['post_id']=$row['post_id'];

?>
      <div class="cardf">
        <p style="margin-left:10px; margin-bottom:10px;margin-top:10px;color: #757575;" class="card-title">posted by:
          <?php echo $username ?>
        </p>
        <div class="post-content">
          <a href='post-content.php?post=<?php echo $row['post_id']; ?>'>
            <p style="font-weight: bold; color:#757575; ;margin-left: -4px; margin-top:48px; font-size: 18px;">
              <?php echo $title ?>
            </p>
          </a>
        </div>
        <p style="margin-left: 10px; margin-top: 45px;;color:#757575;">Posted at:
          <?php  $d=strtotime($row['date']); echo date("d-m-Y h:i:s",$d) ?>
        </p>
      </div>
      <a href='post-content.php?post=<?php echo $row['post_id']; ?>'class="comment-f">Comment</a>

      <?php } ?>
      <div class="contact-mail">
        <div class="container">
          <div class="info">
            <h2 class="label">Feel free to drop us a message at: </h2>
            <a href="mailto:yourhealthyversion.com?subject=contact" class="link">be_fit@gmail.com</a>
          </div>
          <div class="social">
            Find us on social netweorks.
            <i class="fab fa-youtube"></i>
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
          </div>
        </div>
      </div>
      </div>
      <!-- End contact mail -->
      <!-- Start footer -->
      <div class="footer">
        &copy; 2022
        <span>Be Fit</span> All Right Reserved
      </div>
  </body>

  </html>