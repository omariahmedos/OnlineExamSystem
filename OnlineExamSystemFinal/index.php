 <?php
 
session_start();
require("dbConnection.php");
	if (isset($_POST['submit1'])) {
		$name= htmlspecialchars($_POST['name']);
		$email= htmlspecialchars($_POST['email']);
		$subject= htmlspecialchars($_POST['subject']);
		$message= htmlspecialchars($_POST['message']);
		if (!empty($name) && !empty($email) && !empty($subject) && !empty($message) ) {
			$qry = mysqli_query($conn,"insert into contactus values(null, '$name', '$email', '$subject', '$message')") or die("insert error");
			echo "<script> alert('Message submiteed Successfully')</script>";
			header("Refresh:3; url=index.php");
		}
		else {
			echo "<script> alert('Kindly fill all fields')</script>";
		}
	}
?>   

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Online Exam System</title>
  <!-- Favicons -->
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">
		<div class="logo mr-auto p-auto ">	       
			<a href="index.php" class="p-1"><img src="assets/img/hero-img.png" alt="" class="img-fluid pr-2"></a>
				<span  style="font-size:1.3em;"><a href="index.php" style="color:white;"><b>Online Exam System </b></a></span>
		</div>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">Project</a></li>
          <li><a href="#team">About Me</a></li>         
          <li><a href="#contact">Contact Us</a></li>
			<li><a href="index2.php" class=" btn btn- text-white  btn-lg p-2 ml-2" style="width:100%; background: #1acc8d;">Sign in</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" >
    <div class="container" >
      <div class="row" >
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1><span>Online Exam System</span></h1>
            <h2>Online Exam System is web based Application to take Multiple Choice Questions (MCQs) to evaluate the competency level of a student. </h2>
            <div class="text-center text-lg-left">
              <a href="index2.php" class="btn-get-started scrollto">For Student </a>
			       <a href="admin/index.php" class="btn-get-started scrollto mt-2">For Educator/Admin</a>
            </div>	
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
		<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
			  <defs>
				<path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
			  </defs>
			  <g class="wave1">
				<use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
			  </g>
			  <g class="wave2">
				<use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
			  </g>
			  <g class="wave3">
				<use xlink:href="#wave-path" x="50" y="9" fill="#fff">
			  </g>
		</svg>
  </section>
 <!-- End Hero -->
 
  <main id="main">
    <!-- ======= About Section ======= -->
	<section id="about" class="about">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right" > </div>
					<div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
						<h3 class="">PROJECT</h3>
						<p>Online Exam System is a web-based Application that provides Multiple Choice Questions (MCQs) to evaluate the competency level of a student.</p>
						<div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
							<div class="icon"><i class='bx bxs-lock'></i></div>
								<h4 class="title"><a>Secure System</a></h4>
								<p class="description">Our Online Exam System is highly secure from cyber criminals, It can't be access by unauthorized person without permission. </p>
						</div>
							<div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
								<div class="icon"><i class='bx bx-notepad'></i></div>
									<h4 class="title"><a>Autograding</a></h4>
									<p class="description">Once exam finished, Student will get the instant result with high accuracy without any issues.</p>
							</div>
						<div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
						  <div class="icon"><i class='bx bxs-star'></i></div>
						  <h4 class="title"><a>Easy To Use</a></h4>
						  <p class="description">It is super easy to use, where studetns login into exam with their provided username and password to attend the examination</p>
						</div>
					</div>
			</div>
		</div>
	</section><!-- End About Section -->
	
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
		<div class="container">
			<div class="row" data-aos="fade-up">
				<br>
				<div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
					<div class="count-box p-5" >
						<i class="icofont-users-alt-5"></i>
						<span data-toggle="counter-up">800</span>
						<p>Students </p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0">
					<div class="count-box p-5">
						<i class="icofont-document-folder"></i>
						<span data-toggle="counter-up">200</span>
						<p>Exam Conducted</p>
					</div>
				</div>
				  <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
					<div class="count-box p-5">
					  <i class="icofont-live-support"></i>
					  <span data-toggle="counter-up">2,250</span>
					  <p>Hours Of Support</p>
					</div>
				  </div>
			</div>
		<br>	
      </div>
	</section><!-- End Counts Section -->

    <!-- ======= Developer Section ======= -->
    <section id="team" class="team ">
      <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
          <p>About Me</p>
        </div>
			<div class="row content " data-aos="fade-left"> 
				<div class="col-md-4 border-right data-aos="fade-right">
					<center>   <img src="ppic.jpeg" class="img-fluid " alt="" style="border-radius:50px;"/>  </center>
				</div>
				<div class="col-md-8 p-3" data-aos="fade-up"> <br>
					<h3>Hello, I'm <span class="text-danger"> <b>Ahmed Al-Omari </b></span></h3> <br>
					<p>
					 I'm Frontend and Backend developer and I performed all the programming of Online Exam System Application.
					</p>			  
					<p>					
						Online Exam System is web based Application to take Multiple Choice Questions (MCQs) to evaluate the competency level of a student is part of Final Year Project at Information Technology, Asia Pacific University of Technology & Innovation (APU) Malaysia.									
					</p>
				</div>
			</div>        
      </div>
    </section>
	<!-- End Team Section -->
  
    <!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container">
			<div class="section-title" data-aos="fade-up">      
				<p>Contact Us</p>
			</div>
			<div class="row">
				<div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
					<div class="info">
						<div class="address">
							<i class="icofont-google-map"></i>
							<h4>Location:</h4>
							<p>Selangor jalan Street One south. 43300 Malaysia</p>
						</div>
						<div class="email">
							<i class="icofont-envelope"></i>
							<h4>Email:</h4>
							<p>TP053429@mail.apu.edu.my</p>
						</div>
						<div class="phone">
							<i class="icofont-phone"></i>
							<h4>Call:</h4>
							<p>+60 17-351 4181</p>
						</div>
					</div>
				</div>
					<div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
						<form method="post" action="index.php"  >
							<div class="form-row">
								<div class="col-md-6 form-group">
									<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
								</div>
								<div class="col-md-6 form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email"  />
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" /> 
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
							</div>
							<button type="submit" name="submit1" style="background: #1acc8d; border: 0; padding: 10px 30px;  color: #fff;transition: 0.4s;border-radius: 50px;">Send Message</button>
						</form>
				  </div>
			</div>
		</div>
	</section>
	<!-- End Contact Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Ahmed Omari</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      
        Designed by <a>Ahmed Omari</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.4/lib/darkmode-js.min.js"></script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>