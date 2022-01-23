<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/all.min.css">
    
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    
    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/custom.css">
    <title>OSMS</title>
</head>
<body>
    
    <!-- Navigation Bar Start-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary pl-5 fixed-top">
     <a href="index.php" class="navbar-brand">Online Service Management System</a>
     <span class="navbar-text">Your Problem, Our Solution</span>
     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
     	<span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="myMenu">
     	<ul class="navbar-nav pl-5 custom-nav">
     		<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
     		<li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
			<li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
			<li class="nav-item"><a href="Requester/RequesterLogin.php" target="_blank" class="nav-link">Login</a></li>
			<li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>

     	</ul>
     </div>
    </nav>
    <!-- Navigation Bar End-->

    <!-- Start Header Jumbotron-->
    <header class="jumbotron background-image" style="background-image: url(images/banner4.jpeg);">
    </br>
    <div>
       <h1><b>Welcome to OSMS</b></h1>
       <p class="font-italic">Customer's Happiness is our Aim</p> 
       <a href="Requester/RequesterLogin.php" target="_blank" class="btn btn-primary mr-4">Login</a>
       <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
    </header>
    <!-- End Header Jumbotron-->

    <!--Start Introduction -->
    <div class="container">
    	<div class="jumbotron">
    		<h3 class="text-center">OSMS Services Description</h3>
    		<p>
    			OSMS is an Online based service management sytem. We focus on enhancing your user experience by offering world-class maintainance services of Household. We provide these services to keep your keep your accessories fit and make your life easier! With well equipped appliances service centers and fully trained mechanics, we provide quality services wth excellent packages! You can enjoy our services at anywhere of Dhaka, Chittagong, Khulna, Sylhet, Barisal, Rajshahi, Rngpur and Mymensingh. Now you can book your service sitting at home just by a simple registration.
    		</p>
    	</div>
    </div>
    <!--End Introduction -->

    <!--Start Services Section -->
    <div class="container text-center border-bottom" id="services">
    	<h2>Avaiable Services</h2>
    	<div class="row mt-4">
    		<div class="col sm-4 mb-4">
    			<a href="#"><i class="fas fa-tv fa-8x"></i></a>
    			<h4 class="mt-4">All Apliences</h4>
    		</div>
    		
    		<div class="col sm-4 mb-4">
    			<a href="#"><i class="fas fa-sliders-h fa-8x"></i></a>
    			<h4 class="mt-4">Preventive Maitainances</h4>
    		</div>

    		<div class="col sm-4 mb-4">
    			<a href="#"><i class="fas fa-cogs fa-8x"></i></a>
    			<h4 class="mt-4">Fault Repair</h4>
    		</div>
    	</div>
    </div>
    <!--End Services Section -->

    <!--Start Registration Form -->
    <?php include('UserRegistration.php') ?>
    <!--End Registration Form -->

    
    <!--Start Customer Review -->
    <div class="jumbotron bg-primary">
    	<div class="container">
    		<h2 class="text-center text-white">Happy Customers</h2>
    		<div class="row mt-5">
    			<div class="col-lg-3 col-sm-6"> <!--Start 1st Column -->
    				<div class="card shadow-lg mb-2">
    					<div class="card-body text-center">
    						<img src="images/img4.jpeg" height="150px" width="110px" class="image-fluid" style="border-radius: 150px;" alt="img4">
    						<h4 class="card-title">Emmilie Anderson</h4>
    						<p class="card-text">Very impressive work! They are very proffessional at their work.</p>
    					</div>
    				</div>
    			</div> <!--End 1st Column -->

    			<div class="col-lg-3 col-sm-6"> <!--Start 2nd Column -->
    				<div class="card shadow-lg mb-2">
    					<div class="card-body text-center">
    						<img src="images/img3.jpeg" height="150px" width="110px" class="image-fluid" style="border-radius: 150px;" alt="img4">
    						<h4 class="card-title">Addrick Bulson</h4>
    						<p class="card-text">Very impressive work! They are very proffessional at their work.</p>
    					</div>
    				</div>
    			</div> <!--End 2nd Column -->

    			<div class="col-lg-3 col-sm-6"> <!--Start 3rd Column -->
    				<div class="card shadow-lg mb-2">
    					<div class="card-body text-center">
    						<img src="images/img2.jpeg" height="150px" width="110px" class="image-fluid" style="border-radius: 150px;" alt="img4">
    						<h4 class="card-title">Raju Mia</h4>
    						<p class="card-text">Very impressive work! They are very proffessional at their work.</p>
    					</div>
    				</div>
    			</div> <!--End 3rd Column -->

    			<div class="col-lg-3 col-sm-6"> <!--Start 4th Column -->
    				<div class="card shadow-lg mb-2">
    					<div class="card-body text-center">
    						<img src="images/img1.jpeg" height="150px" width="110px" class="image-fluid" style="border-radius: 150px;" alt="img4">
    						<h4 class="card-title">Rocky Ahmed</h4>
    						<p class="card-text">Very impressive work! They are very proffessional at their work.</p>
    					</div>
    				</div>
    			</div> <!--End 4th Column -->
    		</div>
    	</div>
    </div>
    <!--End Customer Review -->

    <!--Start Contact Us -->
    <div class="container" id="contact" >
    	<h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <!--Start 1st Column -->
            <?php include('contactform.php') ?>
            <!--End 1st Column -->

            <div class="col-md-4 text-center"> <!--Start 2nd Column -->
                <strong>Headquarter:</strong><br>
                OSMS pvt ltd,<br>
                Karwan Bazar,<br>
                Dhaka-1215<br>
                Phone:+8801825929263<br>
                <a href="#" target="_blank">www.osms.com</a><br>
                <br><br>
                <strong>Branch:</strong><br>
                OSMS pvt ltd,<br>
                New Market,<br>
                Chittagong-1325<br>
                Phone:+8801825929263<br>
                <a href="#" target="_blank">www.osms.com</a><br>
            </div> <!--End 2nd Column -->
        </div>
    </div>
    <!--End Contact Us -->

    <!--Start Footer -->
    
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6"> <!--Start 1st column-->
                    <span class="pr-2">Follow US:</span>
                    <a href="#" target="_blank" class="pr-2 fi-color">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" target="_blank" class="pr-2 fi-color">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </div> <!--End 1st column-->

                <div class="col-md-6 text-right"> <!--Start 2nd column-->
                    <small>Designed by Tithir Mahmud &copy; 2021</small>
                    <a href="Admin/login.php" target="_blank">Admin Login</a>
                </div> <!--End 2nd column-->
            </div>
        </div>
    </footer>

    <!--End Footer -->


    <!--Javascript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>