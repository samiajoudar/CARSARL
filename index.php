<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>capsimcarsarl</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Untitled</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body >
    <?php include('menu.php'); ?>
    <section class="banner" id="top" style="background-image: url(img/cars.webp);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>All you can DRIVE.</h2>
                        <div class="blue-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <div class="line-dec"></div>
                            <h4>About us</h4>
                            <div class="blue-button">
                            </div>
                            <p>
"Welcome to our car rental website, where convenience meets choice. Whether you're planning a road trip, need a reliable vehicle for your daily commute, or seeking a special ride for an occasion, we've got you covered. Browse through our diverse fleet of vehicles .</p>        
                            <div class="blue-button" >
                                <a href="about-us.php" class="button">Read More</a>
                            </div>
            
                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="imgSh" src="img/cars2.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <div id="googleMap" style="width: 100%;height:300px;border: 0px;"></div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="left-content">
                            <br>
                            <div class="left-content">
                                <br>
                                <div class="line-dec"></div>
                                <h4>Contact us</h4>
                                
                                    <ul>
                                        <li><span class="col-md-3"><strong>Phone:<strong></span><a  class="content" href="#">+212 5 24 47 39 71</a></li><br>
                                        <li><span class="col-md-3"><strong>Email:</strong></span><a  class="content" href="#">capsimcarsarl@gmail.com</a></li><br>
                                        <li><span class="col-md-3"><strong>Address:</strong></span><i class="content" class="fa fa-map-marker"></i> Essaouira , 418 Lot Tafoukt </li><br>
                                    </ul>
                                    <div class="blue-button">
                                        <a href="contact.php" class="button">See More </a>

                                    </div>
                              
                            
                                <br>
                            </div>
                             
                        
                            <br>
                        </div>

                    </div>
                </div>
            </div>

            
        </section>
        <?php include('footer.php'); ?>
        <script>


            function myMap() {
                const center = new google.maps.LatLng(31.514951, -9.752757);
                const map = new google.maps.Map(document.getElementById("googleMap"), {
                    zoom: 17,
                    center: center,
                });

                new google.maps.Marker({
                    position: map.getCenter(),
                    label: "",
                    map: map,
                });
            }
        </script>
        
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmU70DP_yg1U2vVsjiQj5btcWmQC6d5Nc&callback=myMap"></script>
        </body>
       </html>