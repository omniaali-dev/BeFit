<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
	 crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
	 crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

</head>

<body>
	<div class="header">
		<a href="" class="logo">
			<img src="images/logo.png" alt="">
		</a>
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
	<div class="contan">
		<div class="mainheading">
			<h1 class="sitetitle">Be Fit Blog</h1>
			<p class="lead">
				nutrition, health and fitness articles, and journals
			</p>
		</div>
		<section class="featured-posts">
			<div class="section-title">
				<h2>
					<span>Featured</span>
				</h2>
			</div>
			<div class="card-columns listfeaturedtag">

				<!-- begin post -->
				<div class="card">
					<div class="row">
						<div class="col-md-5 wrapthumbnail">
							<a href="articles.php?art1=art">
								<div class="thumbnail" style="background-image:url(images/pexels-pixabay-40751.jpg);background-position: 84% 22% !important;">
								</div>
							</a>
						</div>
						<div class="col-md-7">
							<div class="card-block">
								<h2 class="card-title">
									<a style="text-decoration:none" href="articles.php?art1=art">Learn more about TDEE and BMR and how to improve your TDEE </a>
								</h2>
								<h4 class="card-text">get deep into learning important nutrition terms and learn more about your body.</h4>
								<div class="metafooter">
									<div class="wrapfooter">
										<span class="meta-footer-thumb">
											<img class="author-thumb" src="images/logo.png" alt="Sal">
										</span>
										<span class="author-meta">
											<span class="post-name">Be fit Blog</span>
											<br/>
											<span class="post-date">22 July 2017</span>
											<span class="dot"></span>
											<span class="post-read">6 min read</span>
										</span>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="row">
						<div class="col-md-5 wrapthumbnail">
							<a href="articles.php?art2=art">
								<div class="thumbnail" style="background-image:url(images/pexels-rfstudio-3622643.jpg);">
								</div>
							</a>
						</div>
						<div class="col-md-7">
							<div class="card-block">
								<h2 class="card-title">
									<a style="text-decoration:none" href="articles.php?art2=art">Intuitive eating vs. calorie counting Which is better?
									</a>
								</h2>
								<h4 class="card-text">In this article, I share my experience with both methods and show which way has been better for me.</h4>
								<div class="metafooter">
									<div class="wrapfooter">
										<span class="meta-footer-thumb">
											<img class="author-thumb" src="images/Female-Avatar-2.png" alt="Sal">
										</span>
										<span class="author-meta">
											<span class="post-name">Omnia</span>
											<br/>
											<span class="post-date">22 July 2022</span>
											<span class="dot"></span>
											<span class="post-read">10 min read</span>
										</span>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</body>

</html>