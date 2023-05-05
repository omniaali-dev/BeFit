<?php 

include '../../project/config.php';
session_start();
$id=$_SESSION['id'];
$user_role=$_SESSION['user_role'];
if(!($_SESSION['user_role'] == 'admin')){
echo '<h2>Access denied. You do not have access to this section</h2>'; 
exit; 
}

$sql="SELECT COUNT(id) FROM user";
$result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)){
  $total_users=$row['COUNT(id)'];
}

$sql="SELECT COUNT(post_id) FROM posts";
$result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)){
  $total_posts=$row['COUNT(post_id)'];
}
$sql="SELECT COUNT(comment_id) FROM comments";
$result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)){
  $total_comments=$row['COUNT(comment_id)'];
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;1,400&family=Lexend+Deca:wght@200;300&display=swap" rel="stylesheet">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous">
  </script>
  
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">

      <div class="logo_name">Be Fit</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="user.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Users</span>
        </a>
        <span class="tooltip">User</span>
      </li>
      <li>
        <a href="user_posts.php">
          <i class='bx bx-chat'></i>
          <span class="links_name">Posts</span>
        </a>
        <span class="tooltip">Posts</span>
      </li>

      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->
          <div class="name_job">
            <div class="name">Admin</div>
          </div>
        </div>
        <a style="background-color:transparent;" href="../../project/logout.php">
          <i class='bx bx-log-out' id="log_out"></i>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div style="margin-left:80px;" class="text">Dashboard</div>
    <div class="dash">
      <div class="carddash">
        <p class="phash">Total
          <br>users</p>
        <i class="fa-solid fa-user icon"></i>
        <p class="total">
          <?php echo $total_users; ?>
        </p>
      </div>
      <div class="carddash">
        <p class="phash">Total
          <br>posts</p>
        <i class="fa-solid fa-envelopes-bulk icon"></i>
        <p class="total">
          <?php echo $total_posts ?>
        </p>
      </div>
      <div class="carddash">
        <p class="phash">Total
          <br>articles</p>
        <i class="fa-solid fa-newspaper icon"></i>
        <p class="total">2</p>
      </div>
      <div class="carddash">
        <p class="phash">Total
          <br>comments</p>
        <i class="fa-solid fa-comment icon"></i>
        <p class="total">
          <?php  echo $total_comments?>
        </p>
      </div>
    </div>


  </section>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
      }
    }
  </script>
</body>

</html>