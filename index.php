<?php
session_start();
if ($_SESSION["loggedin"] != true) {
    echo 'not logged in';
    header("Location: DevamLogin.php");
    exit;
}



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--
    Victory Template
    http://www.templatemo.com/tm-507-victory
    -->
    <title>Dragon Trades</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js">
    </script>
    <link rel="stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: #C39482;
            
            padding: 10px;
        }

        .grid-item {
            background-color: #C39482;

            padding: 20px;
            font-size: 30px;
            text-align: center;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
        }

        a:hover {
            background-color: #C39482;
            color: black;
        }

        .previous {
            background-color: #f1f1f1;
            color: black;
        }

        .next {
            background-color: #4CAF50;
            color: white
        }

        .cook-delecious {
            margin-top: 0px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 1px;
        }

        .grid-item {
            background-color: #C39482;

            padding: 20px;
            font-size: 30px;
            text-align: center;
            text-decoration: none;
        }
    </style>
    <style>
        /* Popup container - can be anything you want */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* The actual popup */
        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class - hide and show the popup */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">

            <img src="logo1.JPG" alt="Dragon Trade" width="1000" height="1000">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-togglle">
                        <a href="index.php" class="navbar-brand scroll-top">Dragon Trades <br>
                    <span><?php echo "Hello ".  $_SESSION['username'];?></span>
                    </a><br>
                    


                    </button>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse" >
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact Us</a></li>

                        <li><a href="sellBook.php">Sell Book </a></li>
                        <?php
                        if (array_key_exists('Logout', $_POST)) {
                            logout();
                        }

                        if ($_SESSION["loggedin"] = true) {

                            echo  '<li><a href="logout.php">Log Out</a></li>';
                        } else {
                            # code...
                            echo  '<li><a href="DevamLogin.php">Log In</a></li>';
                        }
                        ?>
                        <li><a href="checkout.php">Checkout</a></li>

                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->

    <div class="cook-delecious">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="first-image">
                    <img src="img/cook_01.jpg" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="cook-content">
                    <h4>Here you can find books</h4>
                    <div class="contact-content">


                        <h5>Sell textbook to Dragon Trades, make some spare money. Easy to sell online</h5>

                        <select class="js-example-basic-single isbn" name="state">
                            <option value="AL">Enter ISBNs, title or author</option>
                            <?php

                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $db = "userregistration";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $db);

                            $sql = mysqli_query($conn, "SELECT isbnnumber From sellbook");
                            $row = mysqli_num_rows($sql);
                            while ($row = mysqli_fetch_array($sql)) {
                                // var_dump($row['isbnnumber']);
                                echo "<option value='" . $row['isbnnumber'] . "'>" . $row['isbnnumber'] . "</option>";
                            }
                            ?>

                        </select>
                        <!-- <input type="text" placeholder="Enter ISBNs, title or author"> -->
                        <div class="popup" onclick="myFunction()"><u>What is ISBN?
                                <span class="popuptext" id="myPopup">the ISBN number can be found on the back cover,
                                    next to the barcode. If a book doesn't show the ISBN on the back cover, look on the
                                    page featuring the copyright and publisher information and the ISBN will be found
                                    there.
                                    <img class="text-center" src="barcode.png" alt="barcode">
                                </span>

                        </div>
                        <script>
                            // When the user clicks on div, open the popup
                            function myFunction() {
                                var popup = document.getElementById("myPopup");
                                popup.classList.toggle("show");
                            }
                        </script>
                    </div>
                    <!--<span>or</span>
                            <div class="primary-white-button">
                                <!--<a href="#" class="scroll-link" data-id="book-table">Search Now</a> -- >

                                <input type="text" placeholder="Enter ISBNs, title or author">
                                <a href="isbn.php">What is ISBN?</a>
                            </div>
                            -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="second-image">
                    <img src="img/IMG_9049.JPG" alt="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="second-image">
                </div>


                <section class="services">
                    <div class="grid-container">
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="AnuWesCO.php">
                                        <img src="Anto.jpg" alt="Breakfast" width="100" height="105">
                                        <html>

                                        <h4>Antoinette Westphal COMAD </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="Art&Sci.php">
                                        <img src="A&S.png" alt="Breakfast" width="100" height="105">
                                        <h4>Arts and Sciences</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="LeBowColl.php">
                                        <img src="Bussiness.png" alt="Breakfast" width="100" height="105">
                                        <h4>Bennett S. LeBow Coll. of Bus.</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="CenterForCivic.php">
                                        <img src="Civic.png" alt="Breakfast" width="100" height="105">
                                        <h4>Center for Civic Engagement</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="schOfEntrpreneurship.php">
                                        <img src="1.png" alt="Breakfast" width="100" height="105">
                                        <h4>Close Sch of Entrepreneurship</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="collegeOfCCI.php">
                                        <img src="CCI.png" alt="Breakfast" width="100" height="105">
                                        <h4>Col of Computing & Informatics</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="collegeOfEngineering.php">
                                        <img src="Eng.png" alt="Breakfast" width="100" height="105">
                                        <h4>College of Engineering</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="DornsifeSchOfPublicHealth.php">
                                        <img src="Dornsife.jpg" alt="Breakfast" width="100" height="105">
                                        <h4>Dornsife Sch of Public Health</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="GoodwinCollOfProFStudies.php">
                                        <img src="Goodwin.jpg" alt="Breakfast" width="100" height="105">
                                        <h4>Goodwin Coll of Prof Studies</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="miscellaneous.php">
                                        <img src="Miss.jpg" alt="Breakfast" width="100" height="105">
                                        <h4>Miscellaneous</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="nursing&HealthProfessions.php">
                                        <img src="Nur&Health.jpg" alt="Breakfast" width="100" height="105">
                                        <h4>Nursing & Health Professions</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="pennoniHonorsCollege.php">
                                        <img src="Pennoni.jpg" alt="Breakfast" width="100" height="105">
                                        <h4>Pennoni Honors College</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="SchOfBiomedEngr,Sci&Hlth.php">
                                        <img src="Sci&Health.jpg" alt="Breakfast" width="100" height="105">
                                        <h4>Sch.of Biomed Engr,Sci & Hlth</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-item">
                                    <a href="schoolOfEducation.php">
                                        <img src="2.png" alt="Breakfast" width="100" height="105">
                                        <h4>School of Education</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- <section id="rate-us bg-light"> -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading">
                                    <h2>Rate Us Here</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-12">
                                    <div class="left-image">
                                        <img src="img/book_left_image.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="right-info">
                                        <h4>Review</h4>
                                        <form id="form-submit" action="db.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <select required name='rating'>
                                                            <option value="">Select Rating</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <input name="name" type="name" class="form-control" id="name" placeholder="Full name" required width="1000">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <textarea name="message" class="form-control" placeholder="Tell us"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <button type="submit" value="Submit" name="review" id="form-submit" class="btn">
                                                            <h3>Rate Now</h3>
                                                        </button>

                                                        <br>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- </section>
                    <section id="book-table">
                    </section> -->


                    <footer>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Copyright &copy; 2020 Dragon Trades</p>
                                </div>
                                <div class="col-md-4">
                                    <ul class="social-icons">
                                        <li><a rel="nofollow" href="http://www.facebook.com/templatemo" target="_parent"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <p>Designed by <em>Drexel Students</em></p>
                                </div>
                            </div>
                        </div>
                    </footer>







                    <script src="bootstrap.min.js"></script>

                    <script src="plugins.js"></script>
                    <script src="js/main.js"></script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('select').select2();






                            // navigation click actions 
                            $('.scroll-link').on('click', function(event) {
                                event.preventDefault();
                                var sectionID = $(this).attr("data-id");
                                scrollToID('#' + sectionID, 750);
                            });
                            // scroll to top action
                            $('.scroll-top').on('click', function(event) {
                                event.preventDefault();
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow');
                            });
                            // mobile nav toggle
                            $('#nav-toggle').on('click', function(event) {
                                event.preventDefault();
                                $('#main-nav').toggleClass("open");
                            });
                        });
                        // scroll function
                        function scrollToID(id, speed) {
                            var offSet = 0;
                            var targetOffset = $(id).offset().top - offSet;
                            var mainNav = $('#main-nav');
                            $('html,body').animate({
                                scrollTop: targetOffset
                            }, speed);
                            if (mainNav.hasClass("open")) {
                                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                                mainNav.removeClass("open");
                            }
                        }
                        if (typeof console === "undefined") {
                            console = {
                                log: function() {}
                            };
                        }
                    </script>
</body>

</html>