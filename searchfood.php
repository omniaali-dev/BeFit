<?php
session_start();
include 'config.php';
$id=$_SESSION['id'];
if (isset($_POST['query']) && $_POST['query'] != '') {
    if (isset($_POST['search'])) {
        $curl = curl_init(); // create a new cURL resource
        // set URL and other appropriate options
        curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.calorieninjas.com/v1/nutrition?query=$_POST[query]",
  CURLOPT_RETURNTRANSFER => true, //the return value from curl_exec will be the actual result and not TRUE
  CURLOPT_FOLLOWLOCATION => true, //follow any "Location: " header that the server sends as part of the HTTP header
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    // "x-rapidapi-host: calorieninjas.p.rapidapi.com",
    "X-Api-Key:fvNSnXPM0PdTi5bDqfJolREaAzwKlC0kl4NizUJV"
  ],
]);  // grab URL and pass it to the browser
        $response = curl_exec($curl);
        $err = curl_error($curl);
// close cURL resource, and free up system resources
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
             
            
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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous">

    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
  </head>

  <body>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous">
    </script>
    <form action=" " method="post">
      <div class="input-group mb-3" style="width:30%; padding-top:20px; margin:auto;">
        <input type="text" class="form-control" name="query" placeholder="Enter food item" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button style="border: none;" type="submit" class="btn-outline-secondary" name="search">search</button>
        <br>
        <p style="color:red; margin-top:10px;font-size: 14px">for more presice nutritional information please use quantity measures</p>
      </div>
    </form>

    <?php if(isset($data)) {
   ?>
    <div class="card text-center" style="margin:auto; width:50%; margin-top:100px; min-height:200px">
      <div class="card-header">
        <?php foreach($data['items'] as $item) {
          echo "<strong>". "food name:  </strong>". $item['name'] . "<br>";
          $name=$item['name'];
      } ?>
      </div>
      <div class="card-body">
        <p class="card-text">
          <?php
  foreach($data['items'] as $item) {
      echo "Serving size: " . $item["serving_size_g"] . " gram  <br>";
      echo "Calories: ". $item["calories"] . "<br>";
      $cal=$item["calories"];
      echo "Protein: ". $item["protein_g"] . " gram  <br>";
      echo "Carbohydrates: ". $item["carbohydrates_total_g"] . " gram  <br>";
      echo "Fat: ". $item["fat_total_g"] . " gram  <br>";
  }
       ?>
            <form action="" method="post">
              <select style="height:40px;" name="mealtype">
                <option value="breakfast">Breakfast</option>
                <option value="lunch">lunch</option>
                <option value="dinner">dinner</option>
                <option value="snacks">Snacks</option>
              </select>
              <input type="hidden" name="name" value="<?php echo $data['items'][0]['name'];?>" />
              <input type="hidden" name="pro" value="<?php echo $data['items'][0]['protein_g'];?>" />
              <input type="hidden" name="fat" value="<?php echo $data['items'][0]['fat_total_g'];?>" />
              <input type="hidden" name="carb" value="<?php echo $data['items'][0]['carbohydrates_total_g'];?>" />
              <input type="hidden" name="cal" value="<?php echo $data['items'][0]['calories'] ;?>" />
              <button class="addfood" name='add_food'>ADD FOOD</button>
            </form>
      </div>
      </p>
    </div>
    <?php  }
      if(isset($_POST['add_food'])){
       $pro=$_POST['pro'];
       $fat=$_POST['fat'];
       $carb=$_POST['carb'];
       $id=$_SESSION['id'];
       $cal=$_POST['cal'];
       $name=$_POST['name'];
       $mealtype=$_POST['mealtype']; 
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$pro', '$fat', '$carb','$id','$cal','$name')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT food_id FROM food WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['food_id']=$row['food_id'];
        }
        $food_id=$_SESSION['food_id'];
        $sql = "INSERT INTO `intake` (`food_id`,`id`,`mealtype`) 
           VALUES ('$food_id','$id', '$mealtype')";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo"<script>alert('Great! Food already added to your food diary.')</script>";
        }
      }
       
        ?>

    <button class="btnn" style=" width: 200px;  margin: auto; margin-top: 30px;">
      <a style="color: white;" href="addfood.php">View my diary</a>
    </button>


    <div class="card-footer text-muted">



  </body>

  </html>