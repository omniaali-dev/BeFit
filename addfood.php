<?php
session_start();
include 'config.php';
$id=$_SESSION['id'];
 date_default_timezone_set("Asia/Kuwait");
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous">
    <link rel="stylesheet" href="css/project.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous">
    </script>
  </head>

  <body class="tbody">
    <div style="width: 193%;" class="header">
      <a href="" class="logo">
        <img src="images/logo.png" alt="index.html">
      </a>
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

    <div class="tdiv table-responsive">
      <table class="table">
        <tbody>
          <!-- staring breakfast rows -->
          <tr style="background: #eee;">
            <td>
              <i style=" font-size: 30px;padding-top: 10px;color: #ff5722;" class="fa-solid fa-mug-saucer"></i>
            </td>
            <td> </td>
            <td> </td>
            <td></td>
            <td style="padding-top: 17px; padding-bottom: 17px;">Breakfast</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td style="font-weight:bold;">Food name</td>
            <td style="font-weight:bold;">Calories</td>
            <td style="font-weight:bold;">Protein</td>
            <td style="font-weight:bold;">Carbohydrates</td>
            <td style="font-weight:bold;">Fat</td>
            <td>
              <td>
          </tr>
          <!-- daily calories box -->
          <?php 
$current_date=date("Y-m-d" );
$sql="SELECT total_calories FROM healthdata WHERE healthdata.id='$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
 $total_calories=$row['total_calories'];
  $f_total_calories=floatval(str_replace(',','.',str_replace('.', '', $total_calories)));
$sql="SELECT food.date,food.id,COALESCE(SUM(food_calories),0) AS total_food FROM food WHERE DATE(food.date)='$current_date' AND food.id='$id';";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  
 $f_total_intake=floatval($row['total_food']);
 if($f_total_intake < 1000){ 
     $f_total_intake=$f_total_intake/ (10**3); //add decimel point before number if it is less than 1000 
     $f_total_intake = round($f_total_intake,3); //round number to 3 decimal digits 
     $remain = ($f_total_calories) - ($f_total_intake);
    

   echo "<div class=\"caloriesbox \">";
  echo "<h1 class=\"calorieshead\">". $f_total_calories . " - " . $f_total_intake ." = ". $remain ."<h1>";
  echo "<span class=\"daily_goal\">" ."Your daily goal". "</span>";
  echo "<span class=\"t_c_intake\">" ."Calories consumed". "</span>";
  echo "<span class=\"r_calories\">" ."Remaning calories". "</span>";
  echo  "</div>";
 }
  elseif($f_total_intake > 1000 ){ 
   $total_intake = round($f_total_intake,1); 
   $total_intake1= number_format($total_intake , -3 , '.' ,  '.' );
   $remain = ($f_total_calories) - ($total_intake1);
  echo "<div class=\"caloriesbox \">";
  echo "<h1 class=\"calorieshead\">". $f_total_calories . " - " . $total_intake1 ." = ". $remain ."<h1>";
  echo "<span class=\"daily_goal\">" ."Your daily goal". "</span>";
  echo "<span class=\"t_c_intake\">" ."Calories consumed". "</span>";
  echo "<span class=\"r_calories\">" ."Remaning calories". "</span>";
  echo  "</div>";

   }
  }}

// food deletion
if(isset($_GET['food_id'])){
  $food_id=$_GET['food_id'];
  $sql="DELETE FROM `intake` WHERE `food_id`='$food_id'";
  $result = mysqli_query($conn, $sql);
  $sql="DELETE FROM `food` WHERE`food_id`='$food_id'";
  $result = mysqli_query($conn, $sql);
header('Location:addfood.php');

}

//breakfast rows
   $sql = "SELECT food_name,food.food_id,food_calories, protein, carb , fat, food.date , mealtype FROM food , intake WHERE food.food_id = intake.food_id AND food.id='$id'";
$result = mysqli_query($conn, $sql);
$current_date=date("Y-m-d" );
while ($row = mysqli_fetch_assoc($result)) {
     $date=strtotime($row['date']);
    if ($row['mealtype']==="breakfast" ){
      if(date("Y-m-d", $date) == $current_date){
    
      ?>
          <tr>
            <td></td>
            <td> </td>
            <td>
              <?php echo $row['food_name'];?>
            </td>
            <td>
              <?php echo $row['food_calories'];?>
            </td>
            <td>
              <?php echo $row['protein'];?>
            </td>
            <td>
              <?php echo $row['carb'];?>
            </td>
            <td>
              <?php echo $row['fat'];?>
            </td>
            <td></td>
            <td>
              <a href='addfood.php?food_id=<?php echo $row['food_id'];?>'>
                <i style="color:#c90000;font-size:19px" class="fa-solid fa-circle-minus"></i>
              </a>

            </td>

          </tr>

          <?php   } }}
  
   $sql= "SELECT SUM(food_calories),SUM(fat),SUM(protein),SUM(carb) from food,intake  where food.food_id = intake.food_id AND food.id='$id' AND mealtype='breakfast' AND DATE(food.date)='$current_date' ";
   $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            $sumfood=floatval($row['SUM(food_calories)']);
   ?>
          <tr style="background-color:#fafafa">
            <td></td>
            <td>
              <a href="searchfood.php?" style="text-decoration: none;">Add</a>
            </td>
            <td style="color:red">Total</td>
            <td>
              <?php echo $sumfood; ?>
            </td>
            <td>
              <?php echo floatval($row['SUM(protein)']);?>
            </td>
            <td>
              <?php echo floatval($row['SUM(carb)']);?>
            </td>
            <td>
              <?php echo floatval($row['SUM(fat)']);?>
            </td>
            <td></td>

            <?php  } ?>
          </tr>
          <!-- starting lunch rows -->
          <tr style="background: #eee;">
            <td>
              <i style=" font-size: 30px;padding-top: 10px;color: #6D4C41;" class="fa-solid fa-bread-slice"></i>
            </td>
            <td></td>
            <td> </td>
            <td> </td>
            <td style="padding-top: 17px; padding-bottom: 17px;">Lunch</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td style="font-weight:bold;">Food name</td>
            <td style="font-weight:bold;">Calories</td>
            <td style="font-weight:bold;">Protein</td>
            <td style="font-weight:bold;">Carbohydrates</td>
            <td style="font-weight:bold;">Fat</td>
            <td></td>
          </tr>
          <?php
$sql = "SELECT food_name, food.food_id,food_calories, protein, carb , fat, food.date,mealtype FROM food , intake WHERE food.food_id = intake.food_id AND food.id='$id'";
$result = mysqli_query($conn, $sql);
$current_date=date("Y-m-d" );
while ($row = mysqli_fetch_assoc($result)) {
     $date=strtotime($row['date']);
    if ($row['mealtype']==="lunch") {
      if(date("Y-m-d", $date) == $current_date){

      ?>
            <tr>
              <td></td>
              <td> </td>
              <td>
                <?php echo $row['food_name'];?>
              </td>
              <td>
                <?php echo $row['food_calories'];?>
              </td>
              <td>
                <?php echo $row['protein'];?>
              </td>
              <td>
                <?php echo $row['carb'];?>
              </td>
              <td>
                <?php echo $row['fat'];?>
              </td>
              <td></td>
              <td>
                <a href='addfood.php?food_id=<?php echo $row['food_id'];?>'>
                  <i style="color:#c90000;font-size: 19px;" class="fa-solid fa-circle-minus"></i>
                </a>
              </td>
            </tr>

            <?php }}
    }
    $current_date=date("Y-m-d" );
    $sql= "SELECT SUM(food_calories),SUM(fat),SUM(protein),SUM(carb),mealtype from food,intake where food.food_id = intake.food_id AND food.id='$id' AND mealtype='lunch' AND DATE(food.date)='$current_date' ";
   $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            
            $sumfood=floatval($row['SUM(food_calories)']);
         
   ?>
            <tr style="background-color:#fafafa">
              <td></td>

              <td>
                <a href="searchfood.php?" style="text-decoration: none;">Add</a>
              </td>

              <?php 

                   ?>
              <td style="color:red">Total</td>

              <td>
                <?php echo $sumfood; ?>
              </td>
              <td>
                <?php echo floatval($row['SUM(protein)']);?>
              </td>
              <td>
                <?php echo floatval($row['SUM(carb)']);?>
              </td>
              <td>
                <?php echo floatval($row['SUM(fat)']);?>
              </td>



              <?php  } ?>


            </tr>
            <!-- starting dinner rows -->
            <tr style="background: #eee;">
              <td>
                <i style=" font-size: 30px;padding-top: 10px;color: #f8d468
 ;" class="fa-solid fa-cheese"></i>
              </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td style="padding-top: 17px; padding-bottom: 17px;">Dinner</td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td style="font-weight:bold;">Food name</td>
              <td style="font-weight:bold;">Calories</td>
              <td style="font-weight:bold;">Protein</td>
              <td style="font-weight:bold;">Carbohydrates</td>
              <td style="font-weight:bold;">Fat</td>
              <td></td>
            </tr>
            <?php
$sql = "SELECT food_name,food.food_id, food_calories, protein, carb , fat, food.date, mealtype FROM food , intake WHERE food.food_id = intake.food_id AND food.id='$id'";
$result = mysqli_query($conn, $sql);
$current_date=date("Y-m-d" );
while ($row = mysqli_fetch_assoc($result)) {
     $date=strtotime($row['date']);
    if ($row['mealtype']==="dinner") {
      if(date("Y-m-d", $date) == $current_date){

      ?>
              <tr>
                <td></td>
                <td> </td>
                <td>
                  <?php echo $row['food_name'];?>
                </td>
                <td>
                  <?php echo $row['food_calories'];?>
                </td>
                <td>
                  <?php echo $row['protein'];?>
                </td>
                <td>
                  <?php echo $row['carb'];?>
                </td>
                <td>
                  <?php echo $row['fat'];?>
                </td>
                <td></td>
                <td>
                  <a href='addfood.php?food_id=<?php echo $row['food_id'];?>'>
                    <i style="color:#c90000;font-size: 19px;" class="fa-solid fa-circle-minus"></i>
                  </a>
                </td>

              </tr>
              <?php }
    }}
             $current_date=date("Y-m-d" );
    $sql= "SELECT SUM(food_calories),SUM(fat),SUM(protein),SUM(carb),mealtype from food,intake where food.food_id = intake.food_id AND food.id='$id' AND mealtype='dinner' AND DATE(food.date)='$current_date' ";
   $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            
            $sumfood=floatval($row['SUM(food_calories)']);
         
   ?>
              <tr style="background-color:#fafafa">
                <td></td>

                <td>
                  <a href="searchfood.php?" style="text-decoration: none;">Add</a>
                </td>

                <?php 

                   ?>
                <td style="color:red">Total</td>

                <td>
                  <?php echo $sumfood; ?>
                </td>
                <td>
                  <?php echo floatval($row['SUM(protein)']);?>
                </td>
                <td>
                  <?php echo floatval($row['SUM(carb)']);?>
                </td>
                <td>
                  <?php echo $row['SUM(fat)'];?>
                </td>
                <td></td>

                <?php  } ?>

              </tr>
              <!-- starting snacks rows -->
              <tr style="background: #eee;">
                <td>
                  <i style=" font-size: 30px;padding-top: 10px;color: pink ;" class="fa-solid fa-ice-cream"></i>
                </td>
                <td> </td>
                <td> </td>
                <td></td>
                <td style="padding-top: 17px; padding-bottom: 17px;">Snacks</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td style="font-weight:bold;">Food name</td>
                <td style="font-weight:bold;">Calories</td>
                <td style="font-weight:bold;">Protein</td>
                <td style="font-weight:bold;">Carbohydrates</td>
                <td style="font-weight:bold;">Fat</td>
                <td></td>
              </tr>
              <?php
$sql = "SELECT food_name,food.food_id,food_calories, protein, carb , fat, food.date, mealtype FROM food , intake WHERE food.food_id = intake.food_id AND food.id='$id'";
$result = mysqli_query($conn, $sql);
$current_date=date("Y-m-d" );
while ($row = mysqli_fetch_assoc($result)) {
     $date=strtotime($row['date']);
    if ($row['mealtype']==="snacks") {
      if(date("Y-m-d", $date) == $current_date){
      ?>
                <tr>
                  <td></td>
                  <td> </td>
                  <td>
                    <?php echo $row['food_name'];?>
                  </td>
                  <td>
                    <?php echo $row['food_calories'];?>
                  </td>
                  <td>
                    <?php echo $row['protein'];?>
                  </td>
                  <td>
                    <?php echo $row['carb'];?>
                  </td>
                  <td>
                    <?php echo $row['fat'];?>
                  </td>
                  <td></td>
                  <td>
                    <a href='addfood.php?food_id=<?php echo $row['food_id'];?>'>
                      <i style="color:#c90000;font-size: 19px;" class="fa-solid fa-circle-minus"></i>
                    </a>
                  </td>
                </tr>

                <?php }
    }}
    $current_date=date("Y-m-d" );
    $sql= "SELECT SUM(food_calories),SUM(fat),SUM(protein),SUM(carb),mealtype from food,intake where food.food_id = intake.food_id AND food.id='$id' AND mealtype='snacks' AND DATE(food.date)='$current_date' ";
   $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            
            $sumfood=floatval($row['SUM(food_calories)']);
         
   ?>
                <tr style="background-color:#fafafa">
                  <td></td>

                  <td>
                    <a href="searchfood.php?" style="text-decoration: none;">Add</a>
                  </td>

                  <?php 

                   ?>
                  <td style="color:red">Total</td>

                  <td>
                    <?php echo $sumfood; ?>
                  </td>
                  <td>
                    <?php echo floatval($row['SUM(protein)']);?>
                  </td>
                  <td>
                    <?php echo floatval($row['SUM(carb)']);?>
                  </td>
                  <td>
                    <?php echo floatval($row['SUM(fat)']);?>
                  </td>
                  <td></td>

                  <?php  } ?>
                </tr>
        </tbody>
      </table>
      <a href='addfood.php?complete=complete'>
        <div class="complete">
          <button style="width:50%" class="btnn" type="button">Complete my diary</button>
        </div>
      </a>
    </div>




    <!-- exceeding total calories alert -->
    <?php 
    
    if(isset($_GET['complete'])){
      if($f_total_intake < $f_total_calories){ ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div style="background-color:beige;" class="modal-content">
          <div class="modal-header">
            <h1 style="color:red" class="modal-title fs-5" id="exampleModalLabel">Alert</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p> You consumed less than your total daily calories, We recommend that you follow your daily goal to get better
              results.
            </p>
            <p style="color:red">Consuming less than your daily calories for a long term can cause health problems.</p>
            </p>

          </div>
          <div class="modal-footer">
            <button type="button" style="  border-radius: 10px; width: 236px; height: 40px; text-align: center; border-color: none; border-color: transparent; background:orange;margin:auto; color: white;"
              class=" btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $("#exampleModal").modal('show');
        }, 1000);
      });
    </script>
    <?php 
  if($f_total_intake > $f_total_calories){ ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div style="background-color:beige;" class="modal-content">
          <div class="modal-header">
            <h1 style="color:red" class="modal-title fs-5" id="exampleModalLabel">Alert</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>You exceed your total daily calories goal, We recommend to follow your daily calories for better results.</p>

          </div>
          <div class="modal-footer">
            <button type="button" style="  border-radius: 10px; width: 236px; height: 40px; text-align: center; border-color: none; border-color: transparent; background:orange;margin:auto; color: white;"
              class=" btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $("#exampleModal").modal('show');
        }, 1000);
      });
    </script>
    <?php
if($f_total_intake == $f_total_calories){ ?>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div style="background-color:beige;" class="modal-content">
            <div class="modal-header">
              <h1 style="color:red" class="modal-title fs-5" id="exampleModalLabel">Alert</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>great! You have reached your today's caories goal.</p>

            </div>
            <div class="modal-footer">
              <button type="button" style="  border-radius: 10px; width: 236px; height: 40px; text-align: center; border-color: none; border-color: transparent; background:orange;margin:auto; color: white;"
                class=" btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
          setTimeout(function() {
            $("#exampleModal").modal('show');
          }, 1000);
        });
      </script>
      <?php  }}}}
    if($f_total_intake > $f_total_calories){?>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div style="background-color:beige;" class="modal-content">
            <div class="modal-header">
              <h1 style="color:red" class="modal-title fs-5" id="exampleModalLabel">Alert</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p> You exceed your total daily calories goal, We recommend to follow your daily calories for better results.</p>

            </div>
            <div class="modal-footer">
              <button type="button" style="  border-radius: 10px; width: 236px; height: 40px; text-align: center; border-color: none; border-color: transparent; background:orange;margin:auto; color: white;"
                class=" btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          setTimeout(function() {
            $("#exampleModal").modal('show');
          }, 1000);
        });
      </script>
      <?php }
?>


  </body>

  </html>