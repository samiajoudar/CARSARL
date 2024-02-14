
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact page</title>
        
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

<body>
 
    <?php include('menu.php'); 
    if(!isset($_POST['action']))
                    {
                        $_POST['action']="";
                    }
    
    ?>
    <section class="banner banner-secondary" id="top" style="background-image: url(img/cars.webp);">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <section class="popular-places">
            <div class="container">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-md-8"> 
                            <div class="left-content">
                                <div class="row">
                                  <form method="post" action="">   
                                     
                                     <div class="col-md-6">
                                      <fieldset>
                                        <input  type="email" name="email" class="form-control" id="email" placeholder="Email..." required>
                                      </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                      <fieldset>
                                        <input  type="text" name="subject" class="form-control" id="subject" placeholder="Subject..." required>
                                      </fieldset>
                                    </div>
 
                                    <div class="col-md-12">
                                      <fieldset>
                                        <textarea  rows="6" name="message" class="form-control" id="message" placeholder="Your message..." required></textarea>
                                      </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                      <fieldset>
                                      <div class="form-btn">
                                            <button class="submit-btn" type="submit"  name="action" value="Reserv">Send Message</button>
                                        </div>
                                        
                                      </fieldset>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="right-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content"> 
                                            <p>You have a question ? you need an aswer? Contact us </p>
                                            <ul>
                                                <li><span>Phone:</span><a href="#">+212 5 24 47 39 71</a></li>
                                                <li><span>Email:</span><a href="#">capsimcarsarl@gmail.com</a></li>
                                                <li><span>Address:</span><i class="fa fa-map-marker"></i>  Essaouira , 418 Lot Tafoukt </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </section>
                <?php include('footer.php'); 
                 
                    if ($_POST['action'] == 'Reserv') { 
                        if($_POST['email']=="" || $_POST['subject']=="" || $_POST['message']=="")
                        {	
                            echo'<script> alert("Veuillez renseigner"); </script>';
                        }else {
                            echo '<script> alert("Success"); </script>';
                            include("controllers/config.php");
                            $sql = "INSERT INTO `reclamation`(`email`, `sujet`, `message`) VALUES ('".$_POST['email']."','".$_POST['subject']."','".$_POST['message']."')";
                                    $result = $conn->query($sql);
                                    echo "res: ".$result;
                                    echo '<script>location.replace("fleet.php"); </script>';
                        }
                    } 
                
                
                ?>

</body>
</html>