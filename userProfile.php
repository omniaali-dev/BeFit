<?php
session_start();
include 'config.php';
date_default_timezone_set("Asia/Kuwait");
$email=$_SESSION['email'];
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$sql = "SELECT * FROM  user,healthdata WHERE user.id=healthdata.id AND user.id='$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
  $bmr= $row['BMR'];
  $total=$row['total_calories'];
  $f_weight=$row['c_weight'];
  $g_weight=$row['g_weight'];
  $goal=$row['goal'];
  $gender=$row['gender'];
  $age=$row['age'];
  $date=$row['date'];
}
if(isset($_POST['update'])){
    header("Location:update_user_data.php");
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous">
    </script>
  </head>

  <body>
    <h2 style="    display: flex; justify-content: center; margin-top: 50px;">
      <?php echo  $username."'s profile" ?>
    </h2>
    <div class="card mb-3" style="max-width: 540px;left: 50%;position: absolute;top: 50%;transform: translate(-50%, -50%);">
      <div class="row g-0">
        <div class="col-md-4" style="background-color: #eee;  width: 35px;">
        </div>
        <div class="col-md-8">
          <div class="card-body">

            <h5 class="card-title">
              <?php echo  $username ?>
            </h5>
            <div style="display:flex;gap: 35px; color: #f60f0f;">
              <p class="card-text">
                <?php echo  $gender ?> </p>
              <p class="card-text">
                <?php echo  $age .' years old'?> </p>
            </div>

            <p class="card-text" style="width: 314px;">
              <?php echo 'Your total daily energy expenditure is : '. $bmr ?>
            </p>
            <p class="card-text" style="width: 362px;">
              <?php echo 'Your total daily calories goal to lose weight is:'. $total ?>
            </p>
            <p class="card-text">
              <?php echo 'First weight is : '. $f_weight .'kg'?>
            </p>
            <p class="card-text">
              <?php echo 'Your  goal weight is : ' .$g_weight  .'kg'?>
            </p>
            <p class="card-text">
              <?php echo 'Your  goal  is to: '. $goal ?>
            </p>
            <p class="card-text">
              <small class="text-muted">
                <?php $date=strtotime($date);echo 'Last updated on:  ' .date('l,M,Y',$date) ?>
              </small>
            </p>
            <form action="" method="post">
              <button style="border: 0; border-radius: 20px; background-color: rgba(255, 124, 4, 1); color: white; width: 100px; height: 35px;"
                name="update">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>