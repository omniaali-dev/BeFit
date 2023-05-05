<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous">
  </script>
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
        <a href="fourm.php">JOIN OUR COUMMUNITY</a>
      </li>
      <li>
        <a href="contactus.php">CONTACT US</a>
      </li>
    </ul>
  </div>
  <div class="workouts">
    <div class="food_sub_text">
      <h1 style="color:white;font-weight:400 ">Start your fitness journey with us
        <br> </h1>
      <p style="font-size:17px">We offer you diffrent workout plans,challnges and tracking methods in order to help you to stay consistent and motvited
        and reach your goals </p>
    </div>
  </div>
  <div class="container workout-con">
    <h2 style=" font-size: 3rem;padding-bottom:6rem;color: white;margin-top: 46px;" class="d_heading">Our Workout plans </h2>
    <div style="margin-bottom:201px;    padding-right: 30px;
    padding-left: 30px;" class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <a href="workoutplan.php?plan1=pla">
          <div class="card h-100">
            <img src="images/workouts.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title workout-title">Body-weight resistance trainings</h5>
              <p class="card-text">This plan increases your muscle strength by making your muscles work against your body weight.</p>
              <ul>
                <li style="    margin-bottom: 10px;
    font-weight: bold;">Equipments:</li>
                <li>1- Fitness Mat</li>
                <li>2- Resistance Bands (optional)</li>

              </ul>
              <p style="font-weight:bold">Duration :15 days</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <div class="card  h-100">
          <img src="images/pexels-cesar-galeao-3253501.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title workout-title">Cardio and Resistence workouts</h5>
            <p class="card-text">The perfect plan if you want to lose weight and have a toned body, a collection of resistance and cardio workouts
              to level up your workout routine.</p>
            <ul>
              <li style="margin-bottom: 10px;font-weight: bold;">Equipments:</li>
              <li>1- Fitness Mat</li>
              <li>2- Resistance Bands (optional)</li>
              <li>3- Dumbbells (optional)</li>


            </ul>
            <p style="font-weight:bold">Duration :15 days</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card  h-100">
          <img src="images/pexels-tirachard-kumtanom-601177.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title workout-title">Cardio workouts</h5>
            <p class="card-text">A collection of weight loss workouts to improve your health and body.</p>
            <ul>
              <li style="margin-bottom: 10px;font-weight: bold;">Equipments:</li>
              <li>1- Fitness Mat</li>

            </ul>
            <p style="font-weight:bold">Duration :15 days</p>
          </div>
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
    </div>
</body>

</html>