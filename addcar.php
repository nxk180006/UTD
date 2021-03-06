<?php
    session_start();
    $year   = '';
    $gender = '';

    $hostname="localhost";
    $database="car rental";
    $username="root";
    $password="root";
    $conn = mysqli_connect($hostname, $username, $password,$database);

    $DB_conn    = '';
    $DB_SQL     = '';
    $DB_ResultSet   = '';

        if (isset ($_POST['submitb'])){
            $name = $_POST['cname'];
            unset($_POST['cname']);
            $type = $_POST['ctype'];
            unset($_POST['ctype']);
            $location = $_POST['loc'];
            unset($_POST['loc']);
            $image = $_POST['image'];
            unset($_POST['image']);

            $sql="INSERT IGNORE INTO `car` (`car_id`, `name`, `type_id`, `status`, `Image`) VALUES (NULL, '$name', '$type', 'A', '$image')";

            $result = $conn->query($sql);
            $id = mysqli_insert_id($conn);

            $sql2="INSERT INTO `car_loc` (`loc_id`, `car_id`) VALUES ($location, $id)";
            $result = $conn->query($sql2);

            header("location: cars.php");
        }
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Rent-a-Car</title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>

<body class="loader-active">

    <header id="header-area" class="fixed-top">
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-left">
                        <i class="fa fa-map-marker"></i> University of Texas at Dallas
                    </div>

                    <div class="col-lg-4 text-center">
                        <i class="fa fa-mobile"></i> +1 800 345 678
                    </div>

                    <div class="col-lg-4 text-right">
                        <i class="fa fa-clock-o"></i> Mon-Fri 09.00 - 17.00
                    </div>
                </div>
            </div>
        </div>

        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo.png" alt="JSOFT">
                        </a>
                    </div>

                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="cars.php">Cars</a></li>
                                <?php
                                  if(isset($_SESSION['sess_name']))
                                  {
                                    echo "<li><a href=myaccount.php>My Account</a></li>";
                                    echo "<li><a href=logout.php>Sign Out</a></li>";
                                  }
                                  else
                                  {
                                    echo "<li><a href=login.php>Login</a></li>";
                                  }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Add New Car</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="lgoin-page-wrap" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                    <form action="#" method="POST" action="#">
                        <div class="login-page-content">
                            <div class="login-form">
                                <div class="name">
                                </div>
                                <div class="name">
                                    <input type="text" name="cname" id="cname" placeholder="Car Name">
                                </div>
                                <div class="img-input">
                                    <input type="file" name="image" id="image" placeholder="Add Image">
                                </div>

                                <select  class="custom-select" style="width: 100%; margin-bottom: 12px " id="loc" name="loc">
                                    <option value="%" selected>Location</option>
                                    <option value=1>Plano</option>
                                    <option value=3>Dallas</option>
                                    <option value=2>Richardson</option>
                                    <option value=4>Frisco</option>
                                </select>
                                <select  class="custom-select" style="width: 100%; margin-bottom: 5px" id="ctype" name="ctype">
                                    <option value="%" selected>Car Type</option>
                                    <option value=1>Economy</option>
                                    <option value=2>Sedan</option>
                                    <option value=3>SUV</option>
                                    <option value=4>Premium</option>
                                </select>

                                <div class="log-btn">
                                    <button type="submit" name="submitb" id="submitb"> Add Car </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="footer-area">
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>About Us</h2>
                            <div class="widget-body">
                                <h2>Rent-a-Car</h2>
                                <p>Find a car available at your location for your dates and book it instantly.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>get in touch</h2>
                            <div class="widget-body">
                                <p>Contact us for any query. We are happy to help.</p>
                                <ul class="get-touch">
                                    <li><i class="fa fa-map-marker"></i>University of Texas at Dallas</li>
                                    <li><i class="fa fa-mobile"></i> +1 800 345 678</li>
                                    <li><i class="fa fa-envelope"></i> carrental@utdallas.edu</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Main Js ===-->
    <script src="assets/js/main.js"></script>

</body>

</html>
