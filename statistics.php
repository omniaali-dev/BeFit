

<?php 
include 'config.php';

 date_default_timezone_set("Asia/Kuwait");
session_start();
$id=$_SESSION['id'];
$email=$_SESSION['email'];
  $sql="SELECT c_weight,id,created_at FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
     if($result->num_rows > 0){
       $row = mysqli_fetch_assoc($result);
       $c_weight=$row['c_weight'];
       $date=$row['created_at'];
       $id=$row['id'];
       $sql="SELECT * FROM statistics WHERE id='$id'";
       $result = mysqli_query($conn, $sql);
     if (!$result->num_rows > 0){
       $sql="INSERT INTO `statistics`(`new_weight`,`id`) VALUES ('$c_weight','$id')";}}
        $result = mysqli_query($conn, $sql);
        if(isset($_POST['submit'])){
        $new_weight=$_POST['new_weight'];
        $sql="UPDATE `statistics` SET `date`='$date' WHERE id='$id'";
        $result=mysqli_query($conn, $sql);
        $sql="INSERT INTO `statistics`(`new_weight`,`id`) VALUES ('$new_weight','$id')";
        $result = mysqli_query($conn, $sql);}
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Date', 'weight'],
        <?php
             
         $sql="SELECT * FROM statistics WHERE id='$id'";
         $result=mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
           $weight=$row['new_weight'];
          echo "['".$row['date']."',$weight],";
         }
          ?>

      ]);
      var options = {
        curveType: 'function',
        legend: {
          position: 'bottom'
        },
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
$(window).resize(function(){
  drawChart();
});
  </script>
</head>

<body style="margin:0px;">
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
        <a href="logout.php">LOG OUT</a>
      </li>
      <li>
        <a href="contactus.php">CONTACT US</a>
      </li>
    </ul>
  </div>
  <div style="display: flex; align-items: center; justify-content: space-between; flex-direction: column; gap: 25px;  margin-top: 45px ">
    <form class='stat-form' action="" method="post">
      Enter Your new weight here
      <input type="text" name="new_weight" placeholder="Kg">
      <button style="    border-radius: 30px; background-color: rgba(255, 124, 4, 1); color: #FFF; cursor: pointer; border: transparent; width: 108px; height: 30px;   font-size: 16px;"
        type="submit" name="submit">Submit</button>
    </form>
    <?php 
     $sql="SELECT date,new_weight FROM statistics WHERE id='$id' ORDER BY comparison_id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
       if($result->num_rows > 0){
       $row = mysqli_fetch_assoc($result);
      $new_weight=$row['new_weight'];
      $date=$row['date'];
      $date=strtotime($row['date']);
      $da=date("Y-m-d", $date);
      echo "Your last weight was: $new_weight kg on $da";
      
      }?>
  </div>
  <div id="curve_chart" style="width: 100%; min-height: 460px;"></div>
</body>

</html>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
