<!DOCTYPE html>

<html class="no-js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   

    <title>Barangay Violeta</title>
    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- Ionic Icon Css -->
    <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css">
    <!-- Magnify Popup -->
    <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<header class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- header Nav Start -->
                    <nav class="navbar">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
                                <a class="navbar-brand">

                                    <a class="logoname" href="index.php"> <img src="images/logo.png" class="logo" alt="Logo"> BARANGAY VIOLETA</a>
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About Violeta</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">S.K. <span class="ion-ios-arrow-down"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="skofficial.php">S.K. Official</a></li>
                                            <li><a href="skevents.php">S.K. Events</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Officers<span class="ion-ios-arrow-down"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="barangayofficial.php">Barangay Officials</a></li>
                                            <li><a href="bpso.php">BPSO</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="ion-ios-arrow-down"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="barangayclearance.php">Certificate for<br>Loan</a></li>
                                            <li><a href="certificateofindigent.php">Certificate of<br>Indigent</a></li>
                                            <li><a href="certificateofresidency.php">Certificate Of<br>Residency</a></li>
                                            <li><a href="certificateofcuttingtrees.php">Certificate For<br>Medical Assistance</a></li>
                                            <li><a href="businesspermit.php">Certificate For<br>Electrification</a></li>
                                            <li><a href="sedula.php">Certificate For<br>No Valid ID</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="covid19news.php">Covid 19 News</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="ion-ios-arrow-down"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="events.php">Current Events</a></li>
                                            <li><a href="upcoming.php">Upcoming Events</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="SK-events section-sm bg-gray">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>UPCOMING EVENTS</h2>
                </div>
            </div>
            <div class="row">
            <?php  include('../DBConnection.php'); 
                    require('../DBConnection.php');
                    $query = "SELECT * FROM `news` WHERE statuss = 'Upcoming Events'  ORDER BY `date_created` DESC ";
                    $query_run = mysqli_query($conn, $query);
                    $check_official = mysqli_num_rows( $query_run) > 0;

                    if($check_official){
                        while($row = mysqli_fetch_array($query_run))
                        {

                            ?>
                <div class="col-md-12">
                    <div class="content">
                   <center>   <?php echo '<img class="img-responsive" src="../admin/uploads/'.$row['image'].'" height="200px" width="500px"  alt="Image">' ?> </center>
                        <div class="content">
                            <h4><?php echo $row['title'];  ?></h4>
                            <i><h4><?php echo $row['date_created'];  ?></h4></i>
                            <p><?php echo $row['content'];  ?></p>
                            <br>
                            <br>
                            <br>
                            <hr>
                        </div>
                    </div>
                </div> <?php
            }
                    }else{
                        echo "No Official Found";
                    }

                ?>
                
            </div>
            
        </div>
    </section>




    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-manu">
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                            
                        </ul>
                    </div>
                    <p class="copyright">Copyright 2022 &copy; Design & Developed by <a>BSU BSIT Students</a>. All rights reserved.
                        <br>Visit <a href="https://malaybalaycity.gov.ph/malaybalay-dev/" target="_blank">Malaybalay City Official Website</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Main jQuery -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- filter -->
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/SyoTimer/jquery.syotimer.min.js"></script>

    <!-- Form Validator -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="plugins/google-map/map.js"></script>

    <script src="js/script.js"></script>
    <script>