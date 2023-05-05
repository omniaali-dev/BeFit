<!DOCTYPE html>
<html lang="en" style="font-size: 62.5%; overflow-x: hidden; scroll-padding-top: 7rem; scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

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
                <a href="fourm.php">JOIN OUR COUMMUNITY</a>
            </li>
            <li>
                <a href="contactus.php">CONTACT US</a>
            </li>
        </ul>
    </div>
    <section class="home" id="home">

        <div class="image">
            <img src="images/home-img.svg" alt="">
        </div>

        <div class="content">
            <h3>Meet our amazing team of nutritionists and nutrition coaches</h3>
            <p>Welcome to contact experts section we provide you here with contact details for our nutritionists to help you
                reach your goals</p>
            <a href="#about-expert" class="bt">Learn more
                <span class="fas fa-chevron-right"></span>
            </a>
        </div>

    </section>
    <section class="doctors" id="doctors">

        <h1 class="d_heading"> Our
            <span>nutritionists </span>
        </h1>

        <div class="box-container">

            <div class="d_box">
                <img src="images/pexels-thirdman-7659869.jpg" alt="">
                <h3>Sara AL-Shahrie</h3>
                <span>Nutrition Coache,Certified Athletic Trainer</span>
                <div class="share">
                    <a href="https://www.instagram.com/saramindbody/" class="fab fa-instagram"></a>
                    <a href="mailto:mindbodysara@gmail.com?" class="fa-regular fa-envelope"></a>
                </div>
            </div>

            <div class="d_box">
                <img src="images/pexels-mart-production-7088483.jpg" alt="">
                <h3>Dietitian Asrar</h3>
                <span>Dietitian</span>
                <div class="share">
                    <a href="https://www.instagram.com/dietitian.asrar/" class="fab fa-instagram"></a>

                </div>
            </div>

            <div class="d_box">
                <img src="images/pexels-anna-shvets-4482891.jpg" alt="">
                <h3>Lama AL-kahtani</h3>
                <span>Certified Athletic Trainer,Certified Sports Nutritionist</span>
                <div class="share">
                    <a href="https://www.instagram.com/normal_life15/" class="fab fa-instagram"></a>

                </div>
            </div>

        </div>

    </section>
    <section class="about-expert" id="about-expert">



        <div class="row">

            <div class="image">
                <img src="images/about-img.svg" alt="">
            </div>

            <div class="content">
                <h3>Consulting experts is the best thing you can do to your health</h3>
                <p>Because we know that sometimes creating your own food's or workout's plan can be hard and risky we provide
                    you with contact to our experts to help you reach your goal and be your healthy version.</p>
                <p>You can just click the icons at the bottom of the expert's name and it will redirect you to their social
                    media accounts or their email, feel free to contact us if you have any questions.</p>
            </div>

        </div>

    </section>

    <!-- about section ends -->
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