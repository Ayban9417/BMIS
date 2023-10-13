<?php  session_start(); ?>

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
    <link rel="stylesheet" href="css/bootstrap.css">

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

        <section class="page-title bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h1>Certificate for Loan</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>

        <section>
            <?php  include('../DBConnection.php'); 
            require('../DBConnection.php');
                 $purok = $_POST["purok"];
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $middlename = $_POST["middlename"];
                $age = $_POST["age"];
                $status = $_POST["status"];
                $contact = $_POST["contact"];
                $purpose = $_POST["purpose"];
                $or_no = $_POST["orNum"];

              
                $querys = mysqli_query($conn, "SELECT firstname,lastname FROM household_list WHERE firstname =  '$firstname' AND lastname = '$lastname'");
                $rowss = mysqli_num_rows($querys);
                if ($rowss > 0)
                {
                    $query = "INSERT INTO `clearance_list` (firstname,lastname,middlename,age,civil_status,contact,purpose,or_no) VALUES ('$firstname','$lastname','$middlename','$age','$status','$contact','$purpose','$or_no')";
                    mysqli_query($conn, $query);
                    echo "<script> alert('Succesfully Submitted!')</script>";
                }

                else
                {
                    echo "<script> alert('NAME DOES NOT EXIST IN THE BARANGGAY DATABASE')</script>";
                    echo "<script>window.close();</script>";
                }
                

               
            ?>

<div  id="noscript2" class="container-fluid">
    <div class="d-flex w-100 align-items-center">
        <div class="col-2 px-3">
            <center><img src="../uploads/VIOLETA.png" alt="Barangay Logo" class="img-fluid rounded-0" width="100px" height="100px"></center>
        </div>
        <div class="col-8 flex-grow-1 lh-1">
            <p class="m-0 text-center">Republic of the Philippines</p>
            <p class="m-0 text-center"><?php
        require_once("../DBConnection.php");

        $position = $conn->query("SELECT * from `system_infos` where id = 1 ");
             $city = mysqli_fetch_array( $position );
            
        ?><?php echo $city['city'] ?></p>
            <div class="clearfix"></div>
            <p class="fw-bold text-center"><large><?php echo $city['baranggay'] ?></large></p>
        </div>
        <div class="col-2">

        </div>
    </div>
    <hr>
    <br>
    <h2 class="fw-bold text-center">CERTIFICATE FOR LOAN</h2>
    <br>
    <br>
    <br>
    <br>
</div>

           
        <div class="container-fluid">
         <div id="outprint_modal">
         <p>
            <span class="ms-5"></span>This is to certify that <b><u class="px-1"><?php echo $lastname.', '.$firstname.', '.$age ?></u></b> years old, and a bonafide resident of <?php  echo $city['baranggay'] ?> <?php  echo $city['city'] ?>, <?php  echo $city['province'] ?> is known to be of good moral character and law-abiding citizen in the community.
        </p>
        <p><span class="ms-5"></span>This Certification is being issued upon the request of the above-name person for the requirements of his/her <?php echo $purpose?>   .
 </p>
        <p><span class="ms-5">ISSUED this <b><u class="px-1"><?php echo date("l jS ") ?></u></b> day of <b><u class="px-1"><?php echo date('F Y') ?></u></b> at the Punong Baranggay Office <?php  echo $city['baranggay'] ?> <?php  echo $city['city'] ?>, <?php  echo $city['province'] ?> </p>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex w-100 justify-content-end">
            <?php 
            $position = $conn->query("SELECT position,position_id from `position_list` where is_approver = 1 ");
             $pos = mysqli_fetch_array( $position );
            if(isset($pos['position_id']))
            $official = $conn->query("SELECT CONCAT(lastname, ', ' ,firstname) as fullname from `official_list` where position_id = '{$pos['position_id']}' ");
            $lname = mysqli_fetch_array( $official)['fullname'];
       
            ?>
            
            <div class="col-4">
                <div class="w-100 text-center border-bottom border-dark"><?php echo isset($lname) ? $lname : ''  ?></div>
                <div class="w-100 text-center"><?php echo ($pos['position']) ? $pos['position'] : '' ?></div>
            </div>

        </div>
        
        <br>
        <br>
        <dl class="row">
            <dt class='col-auto'>OR #:</dt>
            <dd class='col-3 border-bottom'><?php 
                echo ($or_no);
                 ?></dd>
        </dl>
        <dl class="row">
            <dt class='col-auto'>Data Issued:</dt>
            <dd class='col-3 border-bottom'><?php echo date("M d,Y") ?></dd>
        </dl>
    </div>
    <div class="row justify-content-end border-top pt-2">
        <div class="col-auto me-1">
            <button class="btn btn-sm btn-success rounded-0" id='print_data' type="button"><i class="fa fa-print"></i> Print</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-sm btn-dark rounded-0"  onclick="self.close()"><i class="fa fa-times"></i> Close</button>
        </div>
    </div>    
    <div class="clearfix mb-1"></div>
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
$(function(){
    $('#print_data').click(function(){
        var _p = $('#outprint_modal').clone()
        var _h = $('head').clone()
        var _header = $('#noscript2').html()
        var el = $('<div>')
        el.append(_h)
        el.append(_header)
        el.append(_p)
        
        var nw = window.open("","_blank","width=1000,height=900,top=50,left=250")
                    nw.document.write(el.html())
                    nw.document.close()
                    setTimeout(() => {
                    nw.print()
                        setTimeout(() => {
                            nw.close()
                        }, 200);
                    }, 500);
    })
})
</script>

</body>

</html>