<?Php 
include_once 'config.php';
session_start();
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
  <title>Document</title>
</head>

<body>

  <?php 
 if(isset($_GET['recipe1'])){ 
   
  if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
  <script>
    alert("<?php echo "
      Rrecipe has been added to your diary "?>");
  </script>
  <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
    <script>
      alert("<?php echo "
        Rrecipe has been added to your diary "?>");
    </script>
    <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
      <script>
        alert("<?php echo "
          Rrecipe has been added to your diary "?>");
      </script>
      <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
        <script>
          alert("<?php echo "
            Rrecipe has been added to your diary "?>");
        </script>
        <?php
        header("Location:addfood.php");
        }
  }?>
          <nav style="background:#eee; height: 80px;" class="navbar navbar-expand-lg ">
            <div class="container-fluid">
              <a href="" class="logo" style="margin-left:0;">
                <img src="images/logo.png" alt="">
              </a>
       

              
              <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                      role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Add recipe to my diary
                    </a>
                    <?php $name="Strawberry oatmeal pancakes"; $calories = 260.0; $carbohydrates=44; $protein= 12; $fat= 5; ?>
                    <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe1&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe1&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe1&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe1&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <div class="recipe-content">
            <div class="recipe-img">
              <img src="images/pancakes.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card mb-3 recipe1">
              <div class="card-body">
                <h5 class="card-title">Strawberry oatmeal pancakes</h5>
                <br>
                <p class="card-text">Prep Time: 5 minutes
                  <br>Cook Time: 15 minutes
                  <br>Servings: 4 (makes 12 pancakes)
                  <br>Calories: 260kcal</p>
                <p class="card-text">
                  <strong>Ingredients:</strong>
                </p>
                <input type="checkbox" name="ingr"> 2 cups gluten-free rolled oats
                <br>
                <input type="checkbox" name="ingr"> 1 cup milk
                <br>
                <input type="checkbox" name="ingr"> ½ cup plain 2% Greek yogurt
                <br>
                <input type="checkbox" name="ingr"> 1 large egg
                <br>
                <input type="checkbox" name="ingr"> 1 large, ripe banana
                <br>
                <input type="checkbox" name="ingr"> 1 teaspoon vanilla extract
                <br>
                <input type="checkbox" name="ingr"> 2 teaspoons baking powder
                <br>
                <input type="checkbox" name="ingr"> 1½ cups chopped strawberries
                <br>
                <input type="checkbox" name="ingr"> Oil spray
                <br>
                <input type="checkbox" name="ingr"> Optional toppings: Greek yogurt, chopped strawberries, maple syrup
              </div>
            </div>
            <div class="card mb-3 instructions">
              <div class="card-body">
                <h5 class="card-title">Instructions</h5>
                <br>
                <p class="card-text">1- Pulse the oats in a blender until finely ground.
                  <br> 2-Add the milk, yogurt, egg, banana, vanilla extract, baking powder, to the blender. Blend until smooth.
                  <br> 3-Heat a nonstick pan or griddle over medium heat and coat lightly with olive oil or coconut oil spray.
                  <br> 4- Working in batches, pour the batter into the skillet, about ¼ cup batter per pancake.
                  <br> 5- Sprinkle chopped strawberries on the pancakes.
                  <br> 6-Cook the pancakes until bubbles appear around the edges and the bottoms are nicely browned, 2-3 minutes.
                  <br> 7- Flip and cook another 1-2 minutes until done. Repeat with the remaining batter.
                  <br> 8- Serve pancakes immediately or keep warm in a 200°F oven. Serve with a dollop of Greek yogurt, chopped
                  strawberries and a drizzle of maple syrup.</p>

              </div>
            </div>
            <div class="card mb-3 macros">
              <div class="card-body">
                <h5 class="card-title">Nutrutions</h5>
                <br>
                <p class="card-text">Calories: 260kcal, Carbohydrates: 44g, Protein: 12g, Fat: 5g, Saturated Fat: 1g, Polyunsaturated Fat: 1g,
                  Monounsaturated Fat: 1g, Trans Fat: 1g, Cholesterol: 44mg, Sodium: 404mg, Potassium: 649mg, Fiber: 6g,
                  Sugar: 11g, Vitamin A: 226IU, Vitamin C: 34mg, Calcium: 232mg, Iron: 2mg</p>
              </div>
            </div>
          </div>
          <?php } ?>
</body>


<!-- start 2nd recipe -->
<?php
if(isset($_GET['recipe2'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
  <script>
    alert("<?php echo "
      Rrecipe has been added to your diary "?>");
  </script>
  <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
    <script>
      alert("<?php echo "
        Rrecipe has been added to your diary "?>");
    </script>
    <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
      <script>
        alert("<?php echo "
          Rrecipe has been added to your diary "?>");
      </script>
      <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
        <script>
          alert("<?php echo "
            Rrecipe has been added to your diary "?>");
        </script>
        <?php
        header("Location:addfood.php");
        }
  }?>
          <nav style="background:#eee; height:80px;" class="navbar navbar-expand-lg ">
            <div class="container-fluid">
              <a href="" class="logo" style="margin-left:0;">
                <img src="images/logo.png" alt="">
              </a> 
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                      role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Add recipe to my diary
                    </a>
                    <?php $name="Strawberrie protein smoothie"; $calories = 309.0; $carbohydrates=43; $protein= 21; $fat= 7; ?>
                    <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe2&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe2&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe2&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="recipe-content.php?recipe2&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <body>
            <div class="recipe-content">
              <div class="recipe-img">
                <img src="images/smothie.jpg" class="card-img-top" alt="...">
              </div>
              <div class="card mb-3 recipe1">
                <div class="card-body">
                  <h5 class="card-title">Strawberrie protein smoothie</h5>
                  <br>
                  <p class="card-text">Prep Time: 10 minutes
                    <br>Servings: 2
                    <br>Calories: 309kcal</p>
                  <p class="card-text">
                    <strong>Ingredients:</strong>
                  </p>
                  <input type="checkbox" name="ingr"> 1 ½ cup milk
                  <br>
                  <input type="checkbox" name="ingr"> 1 ripe frozen banana
                  <br>
                  <input type="checkbox" name="ingr"> 2 cups strawberries
                  <br>
                  <input type="checkbox" name="ingr"> ½ cup vanilla Greek yogurt
                  <br>
                  <input type="checkbox" name="ingr"> 2 tablespoons vanilla protein powder
                  <br>
                </div>
              </div>
              <div class="card mb-3 instructions">
                <div class="card-body">
                  <h5 class="card-title">Instructions</h5>
                  <br>
                  <p class="card-text">1- Place all the ingredients in a high-speed blender, and blend for 60-120 seconds until you get a smooth
                    and creamy texture.
                    <br> 2-Taste the smoothie, adding more milk if it is too thick or adding more sweetener if it’s not sweet
                    enough for you. Pour into a cup or mason jar. Enjoy immediately, or store in fridge for up to 24 hours.
                    <br>



                </div>
              </div>
              <div class="card mb-3 macros">
                <div class="card-body">
                  <h5 class="card-title">Nutrutions</h5>
                  <br>
                  <p class="card-text">Calories: 309kcal, Carbohydrates: 43g, Protein: 21g, Fat: 7g, Saturated Fat: 4g, Polyunsaturated Fat: 1g,
                    Monounsaturated Fat: 2g, Cholesterol: 49mg, Sodium: 134mg, Potassium: 782mg, Fiber: 4g, Sugar: 31g, Vitamin
                    A: 352IU, Vitamin C: 90mg, Calcium: 305mg, Iron: 1mg</p>
                </div>
              </div>
            </div>
          </body>
          <?php }?>
          <!-- start 3rd recipe -->
          <?php
if(isset($_GET['recipe3'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
            <script>
              alert("<?php echo "
                Rrecipe has been added to your diary "?>");
            </script>
            <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
              <script>
                alert("<?php echo "
                  Rrecipe has been added to your diary "?>");
              </script>
              <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                <script>
                  alert("<?php echo "
                    Rrecipe has been added to your diary "?>");
                </script>
                <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                  <script>
                    alert("<?php echo "
                      Rrecipe has been added to your diary "?>");
                  </script>
                  <?php
        header("Location:addfood.php");
        }
  }?>
                    <nav style="background:#eee; height: 80px;" class="navbar navbar-expand-lg ">
                      <div class="container-fluid">
                        <a href="" class="logo" style="margin-left:0;">
                          <img src="images/logo.png" alt="">
                        </a>
          

                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Add recipe to my diary
                              </a>
                              <?php $name="Radish salad"; $calories = 188.0; $carbohydrates=4.6; $protein= 0.7; $fat= 18.8; ?>
                              <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                                <li>
                                  <a class="dropdown-item" href="recipe-content.php?recipe3&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="recipe-content.php?recipe3&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="recipe-content.php?recipe3&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="recipe-content.php?recipe3&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>
                    

                    <body>
                      <div class="recipe-content">
                        <div class="recipe-img">
                          <img src="images/pexels-karolina-grabowska-4198023.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card mb-3 recipe1">
                          <div class="card-body">
                            <h5 class="card-title">Radish Salad</h5>
                            <br>
                            <p class="card-text">Prep Time: 15 mins
                              <br>Servings: 6
                              <br>Calories: 188kcal</p>
                            <p class="card-text">
                              <strong>Ingredients:</strong>
                            </p>
                            <input type="checkbox" name="ingr"> 2 cups sliced radishes
                            <br>
                            <input type="checkbox" name="ingr"> ½ teaspoon salt
                            <br>
                            <input type="checkbox" name="ingr"> 1 cup sliced red onion
                            <br>
                            <input type="checkbox" name="ingr"> 1 cup seeded and sliced cucumber
                            <br>
                            <input type="checkbox" name="ingr"> ½ cup extra virgin olive oil
                            <br>
                            <input type="checkbox" name="ingr">2 tablespoons white vinegar
                            <br>
                            <input type="checkbox" name="ingr">1 clove garlic, minced
                            <br>
                            <input type="checkbox" name="ingr">½ teaspoon white sugar
                            <br>
                          </div>
                        </div>
                        <div class="card mb-3 instructions">
                          <div class="card-body">
                            <h5 class="card-title">Instructions</h5>
                            <br>
                            <p class="card-text">1- Toss radishes with salt let stand for about 10 minutes.
                              <br> 2- Drain any liquid and transfer radishes to a large bowl add red onion and cucumber slices.
                              <br> 3- Whisk olive oil, vinegar, dill, garlic, and sugar together in a small bowl until well mixed;
                              pour over vegetables and toss to combine. Cover and refrigerate for at least 1 hour before
                              serving.
                              <br>



                          </div>
                        </div>
                        <div class="card mb-3 macros">
                          <div class="card-body">
                            <h5 class="card-title">Nutrutions</h5>
                            <br>
                            <p class="card-text">188 calories, protein: 0.7g, carbohydrates: 4.6g, fat: 18.8g, sodium: 210.9mg, Sugars: 2.3g,
                              Fat: 18.8g, Saturated Fat: 2.6g</p>
                          </div>
                        </div>
                      </div>
                    </body>
                    <?php }?>
                    <?php
if(isset($_GET['recipe4'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                      <script>
                        alert("<?php echo "
                          Rrecipe has been added to your diary "?>");
                      </script>
                      <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                        <script>
                          alert("<?php echo "
                            Rrecipe has been added to your diary "?>");
                        </script>
                        <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                          <script>
                            alert("<?php echo "
                              Rrecipe has been added to your diary "?>");
                          </script>
                          <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                            <script>
                              alert("<?php echo "
                                Rrecipe has been added to your diary "?>");
                            </script>
                            <?php
        header("Location:addfood.php");
        }
  }?>
                              <nav style="background:#eee; height: 80px;" class="navbar navbar-expand-lg ">
                                <div class="container-fluid">
                                  <a href="" class="logo" style="margin-left:0;">
                                    <img src="images/logo.png" alt="">
                                  </a>
                                  <!-- <a class="logo" href="#"><img src="images/logo.png" alt=""></a> -->
                                  <!-- <a class="navbar-brand logo" href="#"><img src="images/logo.png" alt=""></a> -->

                                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                  </button>
                                  <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                    <ul class="navbar-nav">
                                      <li class="nav-item dropdown">
                                        <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                                          role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Add recipe to my diary
                                        </a>
                                        <?php $name="Steak with BBQ sauce"; $calories = 444.0; $carbohydrates=11; $protein= 52.55; $fat= 25; ?>
                                        <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                                          <li>
                                            <a class="dropdown-item" href="recipe-content.php?recipe4&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                                          </li>
                                          <li>
                                            <a class="dropdown-item" href="recipe-content.php?recipe4&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                                          </li>
                                          <li>
                                            <a class="dropdown-item" href="recipe-content.php?recipe4&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                                          </li>
                                          <li>
                                            <a class="dropdown-item" href="recipe-content.php?recipe4&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </nav>

                              <body>
                                <div class="recipe-content">
                                  <div class="recipe-img">
                                    <img src="images/pexels-valeria-boltneva-1251208.jpg" class="card-img-top" alt="...">
                                  </div>
                                  <div class="card mb-3 recipe1">
                                    <div class="card-body">
                                      <h5 class="card-title">Steak with BBQ sauce</h5>
                                      <br>
                                      <p class="card-text">Prep Time: 5 mins
                                        <br>Cook Time: 25 mins
                                        <br>Servings: 1
                                        <br>Calories: 444kcal</p>
                                      <p class="card-text">
                                        <strong>Ingredients:</strong>
                                      </p>
                                      <input type="checkbox" name="ingr"> 190 g Cowboy steak
                                      <br>
                                      <input type="checkbox" name="ingr"> salt
                                      <br>
                                      <input type="checkbox" name="ingr"> Freshly ground black pepper
                                      <br>
                                      <input type="checkbox" name="ingr"> 1tbsp low fat yogurt
                                      <br>
                                      <input type="checkbox" name="ingr"> 1 tablespoon oil
                                      <br>
                                      <input type="checkbox" name="ingr"> 1tbsp BBQ sauce
                                      <br>
                                      <input type="checkbox" name="ingr"> 1 small sliced onion
                                      <br>
                                      <input type="checkbox" name="ingr"> 1tsp fresh Thyme
                                      <br>
                                    </div>
                                  </div>
                                  <div class="card mb-3 instructions">
                                    <div class="card-body">
                                      <h5 class="card-title">Instructions</h5>
                                      <br>
                                      <p class="card-text">1- Preheat oven to 400°F.
                                        <br> 2- Sprinkle the top of the steak with a generous pinch of salt and pepper and thyme
                                        add 1 tbsp of BBQ sauce and 2tbsp of low fat yogurt.
                                        <br> 3- Heat the oil in a large cast iron skillet over medium high heat on the stove.
                                        When the oil is hot, add the steak and the onion, seasoned side down. Season the
                                        second side with salt and pepper and stir the onin
                                        <br> 4-Cook to desired doneness.

                                    </div>
                                  </div>
                                  <div class="card mb-3 macros">
                                    <div class="card-body">
                                      <h5 class="card-title">Nutrutions</h5>
                                      <br>
                                      <p class="card-text">444 calories, protein: 52.55g, carbohydrates: 11g, total-fat: 25g, sodium: 3341 mg,
                                        Sugars: 8g, Saturated Fat:7g</p>
                                    </div>
                                  </div>
                                </div>
                              </body>
                              <?php }?>
                              <?php
if(isset($_GET['recipe5'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                <script>
                                  alert("<?php echo "
                                    Rrecipe has been added to your diary "?>");
                                </script>
                                <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                  <script>
                                    alert("<?php echo "
                                      Rrecipe has been added to your diary "?>");
                                  </script>
                                  <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                    <script>
                                      alert("<?php echo "
                                        Rrecipe has been added to your diary "?>");
                                    </script>
                                    <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                      <script>
                                        alert("<?php echo "
                                          Rrecipe has been added to your diary "?>");
                                      </script>
                                      <?php
        header("Location:addfood.php");
        }
  }?>
                                        <nav style="background:#eee; height: 80px;" class="navbar navbar-expand-lg ">
                                          <div class="container-fluid">
                                            <a href="" class="logo" style="margin-left:0;">
                                              <img src="images/logo.png" alt="">
                                            </a>
                                            <!-- <a class="logo" href="#"><img src="images/logo.png" alt=""></a> -->
                                            <!-- <a class="navbar-brand logo" href="#"><img src="images/logo.png" alt=""></a> -->

                                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                              aria-expanded="false" aria-label="Toggle navigation">
                                              <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                              <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                  <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Add recipe to my diary
                                                  </a>
                                                  <?php $name="Baked salmon"; $calories = 306.0; $carbohydrates=1; $protein= 34; $fat= 3; ?>
                                                  <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                                                    <li>
                                                      <a class="dropdown-item" href="recipe-content.php?recipe5&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                                                    </li>
                                                    <li>
                                                      <a class="dropdown-item" href="recipe-content.php?recipe5&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                                                    </li>
                                                    <li>
                                                      <a class="dropdown-item" href="recipe-content.php?recipe5&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                                                    </li>
                                                    <li>
                                                      <a class="dropdown-item" href="recipe-content.php?recipe5&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                                                    </li>
                                                  </ul>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </nav>

                                        <body>
                                          <div class="recipe-content">
                                            <div class="recipe-img">
                                              <img src="images/pexels-krisztina-papp-2374946.jpg" class="card-img-top" alt="...">
                                            </div>
                                            <div class="card mb-3 recipe1">
                                              <div class="card-body">
                                                <h5 class="card-title">Baked Salmon</h5>
                                                <br>
                                                <p class="card-text">Prep Time: 10 mins
                                                  <br>Cook Time: 15 mins
                                                  <br>Servings: 4
                                                  <br>Calories: 306kcal</p>
                                                <p class="card-text">
                                                  <strong>Ingredients:</strong>
                                                </p>
                                                <input type="checkbox" name="ingr"> 4 salmon fillets - about 6 ounces each
                                                <br>
                                                <input type="checkbox" name="ingr"> 2 tablespoons olive oil
                                                <br>
                                                <input type="checkbox" name="ingr"> ½ teaspoon salt
                                                <br>
                                                <input type="checkbox" name="ingr"> ¼ teaspoon cracked black pepper
                                                <br>
                                                <input type="checkbox" name="ingr"> 2 teaspoons minced garlic
                                                <br>
                                                <input type="checkbox" name="ingr"> 1 teaspoon Italian herb seasoning blend - OR herbs de provence, or ¼ teaspoon
                                                each dried thyme, parsley, oregano, and basil
                                                <br>
                                                <input type="checkbox" name="ingr"> 1 medium lemon
                                                <br>
                                              </div>
                                            </div>
                                            <div class="card mb-3 instructions">
                                              <div class="card-body">
                                                <h5 class="card-title">Instructions</h5>
                                                <br>
                                                <p class="card-text">1-Preheat oven to 400 degrees and grease a large baking pan. Arrange salmon
                                                  fillets on the baking sheet and season generously with salt and pepper.
                                                  <br> 2- Stir together olive oil, garlic, herbs, and juice of 1/2 lemon. Spoon
                                                  over salmon fillets being sure to rub all over the tops and sides of the
                                                  salmon so it has no dry spots. Thinly slice remaining 1/2 of lemon and
                                                  top each piece of salmon with a slice of lemon.
                                                  <br> 3- Bake for 12-15 minutes until salmon is opaque and flaky when pulled
                                                  apart with a fork. You can broil the last 1-2 minutes if desired.
                                                  <br> 4-Garnish with fresh thyme, swap out the lemon for lime and add a sprinkle
                                                  of cilantro at the end if desired and serve.

                                              </div>
                                            </div>
                                            <div class="card mb-3 macros">
                                              <div class="card-body">
                                                <h5 class="card-title">Nutrutions</h5>
                                                <br>
                                                <p class="card-text">Calories: 306 kcal, Carbohydrates: 1 g, Protein: 34 g, Fat: 18 g, Saturated
                                                  Fat: 3 g, Cholesterol: 94 mg, Sodium: 366 mg, Potassium: 839 mg, Fiber:
                                                  1 g, Sugar: 1 g, Vitamin A: 68 IU, Vitamin C: 1 mg, Calcium: 23 mg, Iron:
                                                  1 mg
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                        </body>
                                        <?php }?>
                                        <?php
if(isset($_GET['recipe6'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                          <script>
                                            alert("<?php echo "
                                              Rrecipe has been added to your diary "?>");
                                          </script>
                                          <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                            <script>
                                              alert("<?php echo "
                                                Rrecipe has been added to your diary "?>");
                                            </script>
                                            <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                              <script>
                                                alert("<?php echo "
                                                  Rrecipe has been added to your diary "?>");
                                              </script>
                                              <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                <script>
                                                  alert("<?php echo "
                                                    Rrecipe has been added to your diary "?>");
                                                </script>
                                                <?php
        header("Location:addfood.php");
        }
  }?>
                                                  <nav style="background:#eee; height: 80px;"  class="navbar navbar-expand-lg ">
                                                    <div class="container-fluid">
                                                      <a href="" class="logo" style="margin-left:0;">
                                                        <img src="images/logo.png" alt="">
                                                      </a>
                                                      <!-- <a class="logo" href="#"><img src="images/logo.png" alt=""></a> -->
                                                      <!-- <a class="navbar-brand logo" href="#"><img src="images/logo.png" alt=""></a> -->

                                                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                                        <span class="navbar-toggler-icon"></span>
                                                      </button>
                                                      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                        <ul class="navbar-nav">
                                                          <li class="nav-item dropdown">
                                                            <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                                                              role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              Add recipe to my diary
                                                            </a>
                                                            <?php $name="peaunt butter cups"; $calories = 157.0; $carbohydrates=8; $protein= 4; $fat= 18; ?>
                                                            <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                                                              <li>
                                                                <a class="dropdown-item" href="recipe-content.php?recipe6&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                                                              </li>
                                                              <li>
                                                                <a class="dropdown-item" href="recipe-content.php?recipe6&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                                                              </li>
                                                              <li>
                                                                <a class="dropdown-item" href="recipe-content.php?recipe6&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                                                              </li>
                                                              <li>
                                                                <a class="dropdown-item" href="recipe-content.php?recipe6&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                                                              </li>
                                                            </ul>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                  </nav>

                                                  <body>
                                                    <div class="recipe-content">
                                                      <div class="recipe-img">
                                                        <img src="images/pexels-federica-gioia-11158836.jpg" class="card-img-top" alt="...">
                                                      </div>
                                                      <div style="font-size: 15px;" class="card mb-3 recipe1">
                                                        <div class="card-body">
                                                          <h5 class="card-title">peanut butter cups</h5>
                                                          <br>
                                                          <p class="card-text">Prep Time: 15 minutes
                                                            <br>Cook Time: 0 mins
                                                            <br>Servings:12
                                                            <br>Calories for 1 serving: 157kcal</p>
                                                          <p class="card-text">
                                                            <strong>Ingredients:</strong>
                                                          </p>
                                                          <p class="card-text">Bottom Layer (chocolate):</p>
                                                          <input type="checkbox" name="ingr">1/3 cup all-natural creamy peanut butter
                                                          <br>
                                                          <input type="checkbox" name="ingr">2.5 tablespoon melted coconut oil
                                                          <br>
                                                          <input type="checkbox" name="ingr">1 teaspoon vanilla extract
                                                          <br>
                                                          <input type="checkbox" name="ingr">3 tablespoons unsweetened cocoa powder
                                                          <br>
                                                          <input type="checkbox" name="ingr"> 2 tablespoons maple syrup
                                                          <br>
                                                          <p class="card-text">Top Layer (peanut butter)</p>
                                                          <input type="checkbox" name="ingr">1/3 cup all-natural creamy peanut butter
                                                          <br>
                                                          <input type="checkbox" name="ingr">2 tablespoons melted coconut oil
                                                          <br>
                                                          <input type="checkbox" name="ingr">1 teaspoon vanilla extract
                                                          <br>
                                                          <input type="checkbox" name="ingr">2 tablespoons maple syrup
                                                          <br>
                                                          <input type="checkbox" name="ingr">Himalayan sea salt
                                                          <br>
                                                        </div>
                                                      </div>
                                                      <div class="card mb-3 instructions">
                                                        <div class="card-body">
                                                          <h5 class="card-title">Instructions</h5>
                                                          <br>
                                                          <p class="card-text">1-Line a muffin tin with 12 muffin liners and then spray with coconut
                                                            oil cooking spray and set aside.
                                                            <br> 2- In a medium bowl, stir all ingredients for the bottom layer
                                                            (chocolate) together until smooth. Set aside..
                                                            <br> 3- In another medium bowl, stir all ingredients for the top
                                                            layer (peanut butter) together until smooth. Set aside.
                                                            <br> 4-scoop a heaping 1/2 tablespoon of the chocolate layer into
                                                            each muffin cup. Repeat until you’ve filled 12 cups. Then, pick
                                                            up the entire muffin tin and shake/tap it until the layer is
                                                            set evenly. 5-Repeat the same thing with the peanut butter layer,
                                                            adding around a heaping 1/2 tablespoon on top of the chocolate
                                                            layer. Pick up the entire muffin tin one more time and shake/tap
                                                            it until your cups are even.
                                                            <br>6-Finally, sprinkle each cup with some Himalayan sea salt.
                                                            <br> 7-Place the muffin tin in the freezer for 30 minutes or until
                                                            firm. Enjoy!
                                                            <br> 8-Store healthy peanut butter cups in the freezer to enjoy for
                                                            later.

                                                        </div>
                                                      </div>
                                                      <div class="card mb-3 macros">
                                                        <div class="card-body">
                                                          <h5 class="card-title">Nutrutions</h5>
                                                          <br>
                                                          <p class="card-text">Calories: 157 kcal, Carbohydrates: 8 g, Protein:4 g, Fat: 18 g,
                                                            Saturated Fat: 13 g
                                                          </p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </body>
                                                  <?php }?>
                                                  <?php
if(isset($_GET['recipe7'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                    <script>
                                                      alert("<?php echo "
                                                        Rrecipe has been added to your diary "?>");
                                                    </script>
                                                    <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                      <script>
                                                        alert("<?php echo "
                                                          Rrecipe has been added to your diary "?>");
                                                      </script>
                                                      <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                        <script>
                                                          alert("<?php echo "
                                                            Rrecipe has been added to your diary "?>");
                                                        </script>
                                                        <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                          <script>
                                                            alert("<?php echo "
                                                              Rrecipe has been added to your diary "?>");
                                                          </script>
                                                          <?php
        header("Location:addfood.php");
        }
  }?>
                                                            <nav style="background:#eee; height: 80px;" class="navbar navbar-expand-lg ">
                                                              <div class="container-fluid">
                                                                <a href="" class="logo" style="margin-left:0;">
                                                                  <img src="images/logo.png" alt="">
                                                                </a>
                                                                <!-- <a class="logo" href="#"><img src="images/logo.png" alt=""></a> -->
                                                                <!-- <a class="navbar-brand logo" href="#"><img src="images/logo.png" alt=""></a> -->

                                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                                                  aria-expanded="false" aria-label="Toggle navigation">
                                                                  <span class="navbar-toggler-icon"></span>
                                                                </button>
                                                                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                                  <ul class="navbar-nav">
                                                                    <li class="nav-item dropdown">
                                                                      <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Add recipe to my diary
                                                                      </a>
                                                                      <?php $name="Berry Protein Smoothie"; $calories = 291.0; $carbohydrates=34; $protein= 28; $fat= 6; ?>
                                                                      <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                                                                        <li>
                                                                          <a class="dropdown-item" href="recipe-content.php?recipe7&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                                                                        </li>
                                                                        <li>
                                                                          <a class="dropdown-item" href="recipe-content.php?recipe7&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                                                                        </li>
                                                                        <li>
                                                                          <a class="dropdown-item" href="recipe-content.php?recipe7&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                                                                        </li>
                                                                        <li>
                                                                          <a class="dropdown-item" href="recipe-content.php?recipe7&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                                                                        </li>
                                                                      </ul>
                                                                    </li>
                                                                  </ul>
                                                                </div>
                                                              </div>
                                                            </nav>

                                                            <body>
                                                              <div class="recipe-content">
                                                                <div class="recipe-img">
                                                                  <img src="images/pexels-pixabay-434295.jpg" class="card-img-top" alt="...">
                                                                </div>
                                                                <div style="font-size: 15px;" class="card mb-3 recipe1">
                                                                  <div class="card-body">
                                                                    <h5 class="card-title">Berry Protein Smoothie</h5>
                                                                    <br>
                                                                    <p class="card-text">Prep Time: 8 minutes
                                                                      <br>Cook Time: 0 mins
                                                                      <br>Servings: 2
                                                                      <br>Calories: 291kcal</p>
                                                                    <p class="card-text">
                                                                      <strong>Ingredients:</strong>
                                                                    </p>
                                                                    <input type="checkbox" name="ingr">1 ½ cups water(360 mL), or yogurt or milk of choice
                                                                    <br>
                                                                    <input type="checkbox" name="ingr">1 scoop vanilla protein powder
                                                                    <br>
                                                                    <input type="checkbox" name="ingr">150 g frozen strawberry
                                                                    <br>
                                                                    <input type="checkbox" name="ingr">100g frozen blueberry
                                                                    <br>
                                                                    <input type="checkbox" name="ingr"> ½ cup frozen raspberry (60 g)
                                                                    <br>
                                                                    <input type="checkbox" name="ingr">½ cup frozen blackberry(75 g)
                                                                    <br>
                                                                  </div>
                                                                </div>
                                                                <div class="card mb-3 instructions">
                                                                  <div class="card-body">
                                                                    <h5 class="card-title">Instructions</h5>
                                                                    <br>
                                                                    <p class="card-text">1- Put all ingredients into a blender and mix until smooth.
                                                                  </div>
                                                                </div>
                                                                <div class="card mb-3 macros">
                                                                  <div class="card-body">
                                                                    <h5 class="card-title">Nutrutions</h5>
                                                                    <br>
                                                                    <p class="card-text">Calories 291, Fat 6g,Carbs 34g,Fiber 8g,Sugar 17g, Protein
                                                                      28g
                                                                    </p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </body>
                                                            <?php }?>
                                                            <?php
if(isset($_GET['recipe8'])){
   if(isset($_GET['breakfast'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="breakfast";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                              <script>
                                                                alert("<?php echo "
                                                                  Rrecipe has been added to your diary "?>");
                                                              </script>
                                                              <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['lunch'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="lunch";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                                <script>
                                                                  alert("<?php echo "
                                                                    Rrecipe has been added to your diary "?>");
                                                                </script>
                                                                <?php
        header("Location:addfood.php");
        }
  }
    if(isset($_GET['dinner'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="dinner";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                                  <script>
                                                                    alert("<?php echo "
                                                                      Rrecipe has been added to your diary "?>");
                                                                  </script>
                                                                  <?php
        header("Location:addfood.php");
        }
  }
   if(isset($_GET['snacks'])){
       $fat=$_GET['fat'];
       $carb=$_GET['carbohydrates'];
       $Protein=$_GET['protein'];
       $id=$_SESSION['id'];
       $cal=$_GET['calories'];
       $name=$_GET['name'];
       $mealtype="snacks";
        $sql = "INSERT INTO `food` (`protein`,`fat`, `carb`, `id` ,`food_calories`,`food_name`) 
           VALUES ('$Protein', '$fat', '$carb','$id','$cal','$name')";
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
          ?>
                                                                    <script>
                                                                      alert("<?php echo "
                                                                        Rrecipe has been added to your diary "?>");
                                                                    </script>
                                                                    <?php
        header("Location:addfood.php");
        }
  }?>
                                                                      <nav style="background:#eee; height: 80px;" class="navbar navbar-expand-lg ">
                                                                        <div class="container-fluid">
                                                                          <a href="" class="logo" style="margin-left:0;">
                                                                            <img src="images/logo.png" alt="">
                                                                          </a>
                                                                      

                                                                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                                                            aria-expanded="false" aria-label="Toggle navigation">
                                                                            <span class="navbar-toggler-icon"></span>
                                                                          </button>
                                                                          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                                            <ul class="navbar-nav">
                                                                              <li class="nav-item dropdown">
                                                                                <a style="background: orange; border-radius: 14px;color: white;margin-left: 565px;" class="nav-link dropdown-toggle" href="#"
                                                                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                  Add recipe to my diary
                                                                                </a>
                                                                                <?php $name="Cinanmon apple greek yogurt bowl"; $calories = 295.0; $carbohydrates=45; $protein= 24; $fat= 10; ?>
                                                                                <ul style="margin-left: 565px;" class="dropdown-menu dropdown-menu-dark">
                                                                                  <li>
                                                                                    <a class="dropdown-item" href="recipe-content.php?recipe8&breakfast=breakfast&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to breakfast</a>
                                                                                  </li>
                                                                                  <li>
                                                                                    <a class="dropdown-item" href="recipe-content.php?recipe8&lunch=lunch&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to lunch</a>
                                                                                  </li>
                                                                                  <li>
                                                                                    <a class="dropdown-item" href="recipe-content.php?recipe8&dinner=dinner&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to dinner</a>
                                                                                  </li>
                                                                                  <li>
                                                                                    <a class="dropdown-item" href="recipe-content.php?recipe8&snacks=snacks&name=<?php echo $name; ?>&calories=<?php echo $calories ?>&carbohydrates=<?php echo $carbohydrates; ?>&protein=<?php echo $protein; ?>&fat=<?php echo $fat; ?>">Add to snacks </a>
                                                                                  </li>
                                                                                </ul>
                                                                              </li>
                                                                            </ul>
                                                                          </div>
                                                                        </div>
                                                                      </nav>

                                                                      <body>
                                                                        <div class="recipe-content">
                                                                          <div class="recipe-img">
                                                                            <img src="images/apple.jpg" class="card-img-top" alt="...">
                                                                          </div>
                                                                          <div style="font-size: 15px;" class="card mb-3 recipe1">
                                                                            <div class="card-body">
                                                                              <h5 class="card-title">Cinnamon apple greek yogurt bowl</h5>
                                                                              <br>
                                                                              <p class="card-text">Prep Time: 10 minutes
                                                                                <br>Cook Time: 20 mins
                                                                                <br>Servings: 2
                                                                                <br>Calories for 1 serving: 280kcal</p>
                                                                              <p class="card-text">
                                                                                <strong>Ingredients:</strong>
                                                                              </p>
                                                                              <input type="checkbox" name="ingr">1 apple, peeled, cored, seeded and diced
                                                                              <br>
                                                                              <input type="checkbox" name="ingr">1/2 tablespoons honey
                                                                              <br>
                                                                              <input type="checkbox" name="ingr">1 tablespoon golden raisins
                                                                              <br>
                                                                              <input type="checkbox" name="ingr">1/4 teaspoon cinnamon
                                                                              <br>
                                                                              <input type="checkbox" name="ingr"> 2 cups 0% fat greek plain yogurt
                                                                              <br>
                                                                              <input type="checkbox" name="ingr">1 tablespoon granola
                                                                              <br>
                                                                            </div>
                                                                          </div>
                                                                          <div class="card mb-3 instructions">
                                                                            <div class="card-body">
                                                                              <h5 class="card-title">Instructions</h5>
                                                                              <br>
                                                                              <p class="card-text">1- Place diced apple, honey and raisins in
                                                                                a small pot, add 1/4 cup water, sprinkle
                                                                                with cinnamon, cover, and cook over low heat
                                                                                until soft.
                                                                                <br>2-Set aside to cool.
                                                                                <br> 3-Divide the yogurt in 2 medium bowls. Top
                                                                                with apples and granola. Serve immediately.
                                                                            </div>
                                                                          </div>
                                                                          <div class="card mb-3 macros">
                                                                            <div class="card-body">
                                                                              <h5 class="card-title">Nutrutions</h5>
                                                                              <br>
                                                                              <p class="card-text">Serving: 1bowl, Calories: 295kcal, Carbohydrates:
                                                                                45g, Protein: 24g, Fat: 10g, Saturated Fat:
                                                                                0g, Cholesterol: 5mg, Sodium: 161mg, Fiber:
                                                                                3g, Sugars: 30g
                                                                              </p>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </body>
                                                                      <?php }?>

</html>