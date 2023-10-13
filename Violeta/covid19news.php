<!DOCTYPE html>

<html class="no-js">
<!--<![endif]-->

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
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>COVID-19 NEWS</h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="chart-table section bg-gray">
        <h2 class="justify-content-center">BARANGAY VIOLETA</h2>
        <h3 class="justify-content-center">AS OF <?php echo date("M d,Y") ?></h3>
        <div class="container">
            <div class="row mt-30 justify-content-center">

                <div class="col-md-3 col-sm-4 col-xs-8 ">
                    <div class="chart-item text-center ">
                        <h1>     <?php 
                              
                              include('../DBConnection.php'); 
                            
                              $result = mysqli_query($conn,"SELECT count(household_id) as `total` FROM `household_list` WHERE `VaccineInfo` = 'Fully Vaccine' OR `VaccineInfo` = 'First Dose' ");  
                              $row = mysqli_fetch_assoc( $result );
                                $num_rows=$row['total'];
                                echo $num_rows;
                              ?> </h1> 

                        <div class="chart-title">

                            <h3>TOTAL VACCINATED</h3>
                           
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-4 col-xs-8 ">
                    <div class="chart-item text-center ">
                        <h1><?php include('../DBConnection.php'); 
                              
                              $result = mysqli_query($conn,"SELECT COUNT(household_id) AS `total` FROM `household_list` ");  
                              $row = mysqli_fetch_assoc( $result );
                                $num_rows=$row['total'];
                                echo $num_rows;?></h1>

                        <div class="chart-title">

                            <h3>TOTAL CITIZEN</h3>
                           
                        </div>

                    </div>
                </div>

            

            </div>
        </div>

        <!-- ---------------------- DIRE TUNG BOX2x SA BY PUROK--------------------- -->
        <div class="row mt-30">
                    <?php  include('../DBConnection.php'); 
                    require('../DBConnection.php');
                    $query = "SELECT * FROM `purok_list`";
                    $query_run = mysqli_query($conn, $query);
                    $check_official = mysqli_num_rows( $query_run) > 0;

                    if($check_official){
                        while($rows= mysqli_fetch_array($query_run))
                        {

                            ?>
                                
                                <div class="col-md-3 col-sm-4 col-xs-8 ">
                                    <div class="chart-item text-center ">
                                        

                                        <div class="chart-title">

                                            <h3> Total vaccinated of <?php echo $rows['purok']; $purok =  $rows['purok_id']; ?></h3> 
                                            <h1>     <?php 
                              
                              include('../DBConnection.php'); 
                              
//  ------------------------ DIRE TUNG MAG CODE PARA MAKITA ANG EVERY PUROK NGA VACCINATED----------------------------
                            $results = mysqli_query($conn,"SELECT COUNT(household_id) AS `total` FROM `household_list` WHERE purok_id = '{$purok}' ");    
                            $row = mysqli_fetch_assoc( $results );
                            $num_rowss=$row['total'];
                              $result = mysqli_query($conn,"SELECT COUNT(household_id) AS `total` FROM `household_list` WHERE purok_id = '{$purok}' AND ( VaccineInfo = 'Fully Vaccine' OR VaccineInfo = 'First Dose' ) ");    
                              $row = mysqli_fetch_assoc( $result );
                                $num_rows=$row['total'];
                                
                            if ($num_rows == 0 && $num_rowss == 0){
                                echo '0%';
                            }else{
                                $percentage = $num_rows/$num_rowss*100;

                                echo round($percentage, 2),'%';
                            }

                               
                              
                                
                                
                              ?> </h1> 
                              
                                        </div>

                                    </div><br>
                                </div>
                            <?php
                           
                        }
                    }else{
                        echo "No Official Found";
                    }

                ?>

              
               


            </div>
        </section>


        <section >
        <center>
            <div class='tableauPlaceholder' id='viz1644287438260' style='position: relative'><noscript><a href='https:&#47;&#47;doh.gov.ph&#47;covid19tracker'><img alt='Home ' src='2Y&#47;2YBFS9DQ4&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                <param name='embed_code_version' value='3' /> <param name='path' value='shared&#47;2YBFS9DQ4' /> 
                <param name='toolbar' value='yes' /><param name='static_image' value='2Y&#47;2YBFS9DQ4&#47;1.png' />
                <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' />
                <param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' />
                <param name='display_count' value='yes' /><param name='tabs' value='no' /><param name='filter' value='publish=yes' />
            </object></div>           
             <script type='text/javascript'>        var divElement = document.getElementById('viz1644287438260');              
             var vizElement = divElement.getElementsByTagName('object')[0];              
              if ( divElement.offsetWidth > 800 ) { vizElement.style.width='910px';vizElement.style.height='2927px';}
               else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='910px';vizElement.style.height='2927px';}
                else { vizElement.style.width='100%';vizElement.style.height='6477px';}                     
                var scriptElement = document.createElement('script');                    
                scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    
                vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
        </center>
           
      

        
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

</body>

</html>