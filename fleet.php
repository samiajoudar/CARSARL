<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cars page</title>
        
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
 
    <?php include('menu.php'); ?>
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/cars.webp)">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Fleet</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <?php 
                    include("controllers/config.php");
                    if(!isset($_POST['action']))
                    {
                        $_POST['action']="";
                    }
                    $sql = "SELECT voiture.*,marque.nom as nom,reservation.etat,reservation.date_debut,reservation.date_fin  FROM marque,voiture LEFT JOIN reservation ON reservation.id_voiture=voiture.id and NOW() BETWEEN reservation.date_debut AND reservation.date_fin where marque.id=voiture.marque order by voiture.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        echo '<div class="col-md-4 col-sm-6 col-xs-12" >
                                <div class="featured-item" style="border:1px solid #DCDCDC;">
                                   
                                    <div class="down-content" style="height: 500px;">
                                        <div style="height: 270px; ">
                                        <div class="thumb"  >
                                            <div style="height:400px; top: 10%;padding: 10%;" >
                                                <img src="img/'. $row["image"].'" alt="" >
                                            </div>
                                             
                                        </div>
                                        </div>
                                        <h4>'. $row["nom"].' '.$row["modele"].'</h4>

                                        <br>
                                        <div style="height: 100px;">
                                        <p>'. $row["nombre_places"].' places / '. $row["carburant"].' /'. $row["details"].' </p>

                                        <p> <strong><sup>MAD</sup>'. $row["fraix"].'</strong></span></p>
                                        </div>
                                        <div class="text-button">';

                                        if( $row["etat"]=="yes")
                                        {
                                            echo' Available from  : '.$row["date_fin"];
                                        }else
                                        {
                                            echo '
                                                <form method="post" action="">
                                                    <button type="submit" class="btn btn-link" name="action" value="Reserv">Reserve</button>
                                        
                                                    <input type="hidden" name="id" value="'.$row["id"].'"/>
                                                </form>';
                                        }
                                      echo'  </div> </div> </div></div>';
                    }
                    } else {
                    echo "0 results";
                    }
                    
                    $conn->close();
                    if ($_POST['action'] && $_POST['id']) {
                         
                         
                        
                    if ($_POST['action'] == 'Reserv') { 
                        
                      $_COOKIE["TestCookie"]=$_POST['id'];
                        echo '<script> location.replace("reservation.php?id='.$_POST['id'].'"); </script>';
                    }
                    }
 
                    ?>
                    

                    

                     

                      

                    
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>

</body>
</html>