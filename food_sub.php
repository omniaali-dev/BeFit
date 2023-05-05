<!DOCTYPE html>
<html style=" overflow-x: hidden; scroll-padding-top: 7rem; scroll-behavior: smooth;" lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
        <a href="">JOIN OUR COUMMUNITY</a>
      </li>
      <li>
        <a href="contactus.php">CONTACT US</a>
      </li>
    </ul>
  </div>
  <div class="food_sub">
    <div class="food_sub_text">
      <h1>Be Fit
        <br> Diet company</h1>
      <p>Enjoy our healthy and delicious meals prepared with high quality and under the supervision of nutritionists and get
        the happiness you deserve </p>
    </div>
  </div>
  <div id="food_sub" class="row row-cols-1 row-cols-md-3 g-4 card_sub">
    <div class="col">
      <div class="card h-100">
        <img src="images/pexels-federico-ramirez-13174396.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 style="text-align: center;margin-bottom: 20px;
    margin-top: 20px;font-family: bitter;
    font-weight: bold;" class="card-title">Low Carb plan</h5>
          <p class="card-text">A plan created for people who want to limit carbohydrates and instead have high-protein meals.</p>
          <ul>
            <li style="margin-bottom:10px; font-weight:bold;">What this plan consist of ?</li>
            <li>- 3 low carb, high protein meals per day</li>
            <li>- 2 snacks per day</li>

          </ul>
        </div>
        <div style="padding-bottom: 20px;" class="card-footer">
          <strong class="text-muted">
            <p style="margin-top: 17px; margin-left: 35%;">500&dollar; per month</p>
          </strong>
          <button class="company_btn">Subscribe </button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="images/pexels-ella-olsson-1640777.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 style="text-align: center;margin-bottom: 20px;margin-top: 20px;font-family: bitter;font-weight: bold;" class="card-title">The balanced plan</h5>
          <p class="card-text">This plan contain meals that are rich in carbohydrates,protein and fat.</p>
          <ul>
            <li style="margin-bottom:10px; font-weight:bold;">What this plan consist of ?</li>
            <li>- 2-3 balanced meals meals per day</li>
            <li>- 2 snacks per day</li>

          </ul>
        </div>
        <div style="padding-bottom: 20px;" class="card-footer">
          <strong class="text-muted">
            <p style=" margin-top: 17px; margin-left: 35%;">450&dollar; per month</p>
          </strong>
          <button class=" company_btn">Subscribe </button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="images/pexels-polina-tankilevitch-4519054.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 style="text-align: center;margin-bottom: 20px;margin-top: 20px;font-family: bitter;font-weight: bold;" class="card-title">Vegetarian plan</h5>
          <p class="card-text">A variety of healthy plant-based meals for people who follow a vegetarian diet.</p>
          <ul>
            <li style="margin-bottom:10px; font-weight:bold;">What this plan consist of ?</li>
            <li>- 3-4 vegetarian meals per day</li>
            <li>- 2 snacks per day</li>

          </ul>
        </div>
        <div style="padding-bottom: 20px;" class="card-footer">
          <strong class="text-muted">
            <p style=" margin-top: 17px; margin-left: 35%;">400&dollar; per month</p>
          </strong>
          <button class=" company_btn">Subscribe </button>
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