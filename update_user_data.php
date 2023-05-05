<?php 
session_start();
include 'config.php';
error_reporting(0);

if(isset($_POST['submit'])){
$id=$_SESSION['id'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$c_weight = $_POST['c_weight'];
$g_weight = $_POST['g_weight'];
$height = $_POST['height'];
$a_level = $_POST['activitylevel'];
$goal = $_POST['goal'];

if($age != ""  && $c_weight!="" && $g_weight !="" && $height!= "" && $a_level!= 'pick one' && $goal!= 'pick one'){
  if($gender == 'Female'){
     $pre_bmr= (10*$c_weight) + (6.25*$height) - (5*$age) -161 ;
     if($a_level == 'Sedentary'){
      $mult_bmr = $pre_bmr *1.2;
      $bmr = number_format($mult_bmr,0);
      if($goal == 'lose weight'){
        $lose1= number_format($mult_bmr - 250);}
      if($goal == 'gain weight'){
        $lose1= number_format($mult_bmr + 250);}
      if($goal == 'mantain weight'){
          $lose1= number_format($mult_bmr ,0 );}
      }
      elseif($a_level == 'Light') {
        $mult_bmr = $pre_bmr*1.375;
        $bmr = number_format($mult_bmr,0);
        if($goal == 'lose weight'){
          $lose1= number_format($mult_bmr - 250);}
        if($goal == 'gain weight'){
          $lose1= number_format($mult_bmr + 250);}
        if($goal == 'mantain weight'){
            $lose1= number_format($mult_bmr ,0 );}
    }
      elseif($a_level == 'Moderate') {
       $mult_bmr = $pre_bmr*1.55;
       $bmr = number_format($mult_bmr,0);
       if($goal == 'lose weight'){
        $lose1= number_format($mult_bmr - 250);}
       if($goal == 'gain weight'){
        $lose1= number_format($mult_bmr + 250);}
       if($goal == 'mantain weight'){
        $lose1= number_format($mult_bmr ,0 );}
     }
     elseif($a_level == 'Very') {
      $mult_bmr = $pre_bmr*1.725;
      $bmr = number_format($mult_bmr,0);
      if($goal == 'lose weight'){
       $lose1= number_format($mult_bmr - 250);}
      if($goal == 'gain weight'){
       $lose1= number_format($mult_bmr + 250);}
      if($goal == 'mantain weight'){
       $lose1= number_format($mult_bmr ,0 );}
    
  }
   elseif($a_level == 'Extremely') {
     $mult_bmr = $pre_bmr*1.9;
     $bmr = number_format($mult_bmr,0);
     if($goal == 'lose weight'){
      $lose1= number_format($mult_bmr - 250);}
     if($goal == 'gain weight'){
      $lose1= number_format($mult_bmr + 250);}
     if($goal == 'mantain weight'){
      $lose1= number_format($mult_bmr , 0 );}
  
}
$sql = " UPDATE `user` SET `gender`='$gender', `age`='$age', `c_weight`='$c_weight', `g_weight`='$g_weight', `height`='$height', `a_level`='$a_level', `goal`='$goal'
             WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$sql = " UPDATE `healthdata` SET `BMR`='$bmr', `total_calories`='$lose1'
             WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){ 
  echo "<script>alert('Great! User data updated.')</script>";
  $email=$_SESSION['email'];
  $username = $_SESSION['username'];
  header("Location:userdiary.php");
}
else{ 
  echo "<script>alert('something went wrong.')</script>";
 
}
}  

// calculations for male
if($gender == 'Male'){
  $pre_bmr= (10*$c_weight) + (6.25*$height) - (5*$age) + 5 ;
  if($a_level == 'Sedentary'){
   $mult_bmr = $pre_bmr *1.2;
   $bmr = number_format($mult_bmr,0);
   if($goal == 'lose weight'){
     $lose1= number_format($mult_bmr - 250);}
   if($goal == 'gain weight'){
     $lose1= number_format($mult_bmr + 250);}
   if($goal == 'mantain weight'){
       $lose1= number_format($mult_bmr ,0 );}
   }
   elseif($a_level == 'Light') {
     $mult_bmr = $pre_bmr*1.375;
     $bmr = number_format($mult_bmr,0);
     if($goal == 'lose weight'){
       $lose1= number_format($mult_bmr - 250);}
     if($goal == 'gain weight'){
       $lose1= number_format($mult_bmr + 250);}
     if($goal == 'mantain weight'){
         $lose1= number_format($mult_bmr ,0 );}
 }
   elseif($a_level == 'Moderate') {
    $mult_bmr = $pre_bmr*1.55;
    $bmr = number_format($mult_bmr,0);
    if($goal == 'lose weight'){
     $lose1= number_format($mult_bmr - 250);}
    if($goal == 'gain weight'){
     $lose1= number_format($mult_bmr + 250);}
    if($goal == 'mantain weight'){
     $lose1= number_format($mult_bmr ,0 );}
  }
  elseif($a_level == 'Very') {
   $mult_bmr = $pre_bmr*1.725;
   $bmr = number_format($mult_bmr,0);
   if($goal == 'lose weight'){
    $lose1= number_format($mult_bmr - 250);}
   if($goal == 'gain weight'){
    $lose1= number_format($mult_bmr + 250);}
   if($goal == 'mantain weight'){
    $lose1= number_format($mult_bmr ,0 );}
 
}
elseif($a_level == 'Extremely') {
  $mult_bmr = $pre_bmr*1.9;
  $bmr = number_format($mult_bmr,0);
  if($goal == 'lose weight'){
   $lose1= number_format($mult_bmr - 250);}
  if($goal == 'gain weight'){
   $lose1= number_format($mult_bmr + 250);}
  if($goal == 'mantain weight'){
   $lose1= number_format($mult_bmr ,0 );}

}
$sql = " UPDATE `user` SET `gender`='$gender', `age`='$age', `c_weight`='$c_weight', `g_weight`='$g_weight', `height`='$height', `a_level`='$a_level', `goal`='$goal'
             WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$sql = " UPDATE `healthdata` SET `BMR`='$bmr', `total_calories`='$lose1'
             WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){ 
  echo "<script>alert('Great! User data updated.')</script>";
  $email=$_SESSION['email'];
  $username = $_SESSION['username'];
  header("Location:userdiary.php");

}
} 
else{ 
  echo "<script>alert('something went wrong.')</script>";
}
} else {
  echo "Please make sure all fields have been entered or selected!";}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome</title>
  <!-- Main template css file -->
  <link rel="stylesheet" href="css/project.css">
  <!-- Render all elements normally -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;1,400&family=Lexend+Deca:wght@200;300&display=swap"
    rel="stylesheet">
</head>

<body>
  <h1 style="display: flex;align-items: center;justify-content: center;color: var(--main-color);">Update your health data</h2>
    <form action="" method="POST">
      <div class="health-form">
        <div class="container">
          <div class="above">
            Choose your gender:

            <Select name="gender" value="<?php echo $gender; ?>">
              <br>
              <option value='Male'>Male</option>
              <option value='Female'>Female</option>
            </select>
            <br>
            <br> Age:
            <input style=" margin-right:-79px" ; name="age" type="text" placeholder="years" value="<?php echo $age; ?>">
            <br>
            <br> Current Weight:
            <input name="c_weight" type="text" placeholder="kgs" value="<?php echo $c_weight; ?>">
            <br>
            <br> Goal Weight:
            <input style="margin-right:-22px" name="g_weight" type="text" placeholder="kgs" value="<?php echo $g_weight; ?>">
            </style>
            <br>
            <br> Height:
            <input style="margin-right:-65px" name="height" type="text" placeholder="cm" value="<?php echo $height; ?>">
            <br>
            <br>
          </div>
          Your activity level:
          <br />
          <select name="activitylevel" value="<?php echo $a_level; ?>">
            <option value="Pick one" checked> Pick an activity level!</option>
            <option value="Sedentary"> Sedentary: Little to no exercise</option>
            <option value="Light"> Light exercise: one to three days a week</option>
            <option value="Moderate"> Moderately active: three to five days a week</option>
            <option value="Very">Very active: vigorous exercise six to seven days a week</option>
            <option value="Extremely">Extremely active: intense exercise six to seven days a week</option>
          </select>
          <br />
          <br /> Your goal:
          <br />
          <select name="goal" value="<?php echo $goal; ?>">
            <option value="Pick one" checked> Pick your goal!</option>
            <option value="lose weight"> Lose weight</option>
            <option value="gain weight"> Gain weight </option>
            <option value="mantain weight"> Mantain weight </option>
          </select>
          <br />
          <br />
          <div class="groupbtnn">
            <br>
            <button name="submit" class="btnn calc">Update</button>
          </div>
        </div>
    </form>
</body>

</html>