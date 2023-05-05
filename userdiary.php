<?php
session_start();
include 'config.php';
$id = $_SESSION['id'];
$email=$_SESSION['email'];
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$sql = "SELECT BMR,total_calories FROM healthdata WHERE healthdata.id = '$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
  $bmr= $row['BMR'];
  $total=$row['total_calories'];
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- enforce css file to reload in case of chaching problems -->
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;1,400&family=Lexend+Deca:wght@200;300&display=swap"
      rel="stylesheet">
    <title>User diary</title>
  </head>
  <body style="margin:0">

    <div class="header">
      <a href="index.html" class="logo">
        <img src="images/logo.png" alt="">
      </a>
      <ul class="main-nav dairy" id="main-nav">
        <button class="btnn dairy" style="color:white;">
          <a href="index.html" style="color:white">Home</a>
        </button>
        <button class="btnn dairy" style="color:white;">
          <a href="userProfile.php" style="color:white">Profile</a>
        </button>
        <button class="btnn dairy">
          <a href="logout.php" style="color:white">Logout</a>
        </button>

      </ul>
    </div>
    <div class="container">
      <div style class="box diarybox">
        <div style="margin-bottom:10px;" class="box-top">
          <div style="position:relative; padding-left: 119px;" class="profile diarypro">

            <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
              <div class="upload">
                <?php      
              $query = "SELECT * FROM user WHERE id='$id'";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($result)){
      
                  $id = $row["id"];
                  $name=$row["username"];
                  $image=$row["profile-image"];

                  ?>
                <img src="profileImages/<?php echo $image; ?>" width=125 height=125 title="<?php echo $image ?>">
                <?php } ?>
                <div class="round">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="hidden" name="name" value="<?php echo $name;?>">
                  <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                  <i class="fa fa-camera" style="color:orange;"></i>
                </div>
              </div>

            </form>
            <script type="text/javascript">
              document.getElementById("image").onchange = function() {
                document.getElementById("form").submit();
              };
            </script>
            <?php 
                if(isset($_FILES["image"]["name"])){
                  $id = $_POST["id"];
                  $name = $_POST["name"];
                  $imageName = $_FILES["image"]["name"];
                  $imageSize = $_FILES["image"]["size"];
                  $tmpName = $_FILES["image"]["tmp_name"];//temporary name of the uploaded file which is generated automatically by php
                  //image validation 
                  $validImageExtension = ['jpg', 'jpeg' , 'png'];
                  $imageExtension = explode('.', $imageName);
                  $imageExtension = strtolower(end($imageExtension));
                   if(!in_array($imageExtension, $validImageExtension)){
                          echo " <script> alert('Invalid Image Extension');
                          document.location.href = 'userdiary.php';</script>";
                   }
                   elseif ($imageSize > 1200000){
                         echo "<script>alert('Image size is too large');
                         document.location.href = 'userdiary.php'; </script> ";
                   }
                   else{
                         $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
                         $newImageName .= '.' . $imageExtension;
                         $query = "UPDATE `user` SET `profile-image` = '$newImageName' WHERE `id` = '$id'";
                         mysqli_query($conn,$query);
                         move_uploaded_file($tmpName, 'profileImages/' . $newImageName);
                         echo  "<script> document.location.href = 'userdiary.php';</script>";
                   }
                }
                ?>
            <div style="margin-left: 19px;" class="name-user">

              <?php 
                
                date_default_timezone_set("Asia/Kuwait");
                // 24-hour format of an hour without leading zeros (0 through 23)
                $Hour = date('G');
                
                if ( $Hour >= 5 && $Hour <= 11 ) {
                    echo "Good Morning ". $username . "<br>"; 
                } else if ( $Hour >= 12 && $Hour <= 18 ) { //from 12pm to 6pm
                    echo "Good Afternoon " . $username . "<br>"; ;
                } else if ( $Hour >= 19 || $Hour <= 4 ) { //from 7pm to 4am
                    echo "Good Evening ". $username . "<br>"; ;
                }
                ?>
              <a href="userProfile.php">
                <small>Profile</small>
                <i style="margin-left: 4px;" class="fa-solid fa-arrow-right-long"></i>
              </a>
              <a href="addfood.php">
                <small>Add food</small>
                <i style="margin-left: 4px;" class="fa-solid fa-arrow-right-long"></i>
              </a>

            </div>
          </div>
        </div>
        <?php include 'chart.php' ?>

      </div>

      <!-- Start cards -->
      <div class="diary-srv">
        <div class="container">
          <div class="dairy-cards">
             <a href="addfood.php">
            <div class="card1">
              <i style="color:#961a1a" class="fa-solid fa-apple-whole"></i>
              <div class="card1-text">Add food to your dairy </div>
             
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-plus"></i>
              


            </div>
              </a>
                <a href="contact_expert.php">
            <div class="card1">
              <i style="color:#1565c0" class="fa-solid fa-briefcase-medical"></i>
              <div class="card1-text">Contact our specialists</div>
            
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
              

            </div>
              </a>
            <a href="recipes.php">
            <div class="card1">
              <i style="color:#de7e02" class="fa-solid fa-bowl-rice"></i>
              <div class="card1-text">Browse a collection of our recipes</div>
             
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
              
            </div>
              </a>
           <a href="workouts.php">
            <div class="card1">
              <i style="color:#FF5722" class="fa-solid fa-dumbbell"></i>
              <div class="card1-text">Browse our collection of workouts</div>
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
            </div>
              </a>
               <a href="fourm.php">
            <div class="card1">
              <i style="color:#FF8F00" class="fa-solid fa-comment"></i>
              <div class="card1-text">Join our community</div>
             
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
              
            </div>
              </a>
                 <a href="food_sub.php">
            <div class="card1">
              <i style="color:#2b660b" class="fa-solid fa-bowl-food"></i>
              <div class="card1-text">Subscribe to a food company</div>
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
            </div>
              </a>
                 <a href="statistics.php">
            <div class="card1">
              <i style="color:#c44158" class="fa-solid fa-chart-simple"></i>
              <div class="card1-text">Show my statistics</div>
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
            </div>
              </a>
               <a href="blog.php">
            <div class="card1">
              <i style="color:chocolate" class="fa-solid fa-newspaper"></i>
              <div class="card1-text">Explore our articles</div>
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
        

            </div>
              </a>
               <a href="contactus.php">
            <div class="card1">
              <i style="color:#3E2723" class="fa-solid fa-envelope"></i>
              <div class="card1-text">Send us your reviews</div>
             
                <i style="font-size: 40px; margin-top: 27px; padding-top:-10px;color: #bdbdbd;" class="fa-solid fa-circle-arrow-right"></i>
              

            </div>
              </a>
          </div>
        </div>
      </div>
    </div>
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
  </body>

  </html>