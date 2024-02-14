<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {

    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>capsimcarsarl</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
            .sidenav {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
            padding-right: 17%;
            }

            .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            }

            .sidenav a:hover {
            color: #f1f1f1;
            }

    </style>

</head>
<body>
    <div class="row">
        <div class="col-2" style="padding:0px; border:solide"><?php include('sidebar.php'); ?></div>
        <div class="col" style="margin-left:0px; border:solide red">
            <div class="col">
                
            
            </div>
            <div class="row" style="margin-left:10px"> 
                
            <?php include('navbar.php'); ?>
                <div class="col-12">
                    <h2>Reservation :
                        </h2><br>
                </div >
                <div class="card col-11" style="margin-left:10px">
                    
                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Voiture</th>  
                            <th scope="col">date Debut</th> 
                            <th scope="col">date Fin</th> 
                            <th scope="col">Nom</th> 
                            <th scope="col">email</th> 
                            <th scope="col">tele</th> 
                            <th scope="col">etat</th> 
                            </tr>
                        </thead>
                        <?php 
                    include("controllers/config.php");
                    if(!isset($_POST['action']))
                    {
                        $_POST['action']="";
                    }
                    $sql = "SELECT reservation.* FROM `reservation` ORDER by etat,id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        echo ' <tbody>
                                    <tr>
                                        <th scope="row">'. $row["id"].'</th>
                                        <td>'. $row["id_voiture"].'</td>  
                                        <td>'. $row["date_debut"].'</td> 
                                        <td>'. $row["date_fin"].'</td> 
                                        <td>'. $row["nom"].'</td> 
                                        <td>'. $row["email"].'</td>
                                        <td>'. $row["tele"].'</td> ';
                        if($row["etat"]=="")
                        {
                            echo '<td>
                                            <form method="post" action="">
                                                <button type="submit" class="btn btn-link" name="action" value="Valider">Valider</button>
                                                <button type="submit" class="btn btn-link" name="action" value="Rejeter">Rejeter</button>
                                        
                                                <input type="hidden" name="id" value="'.$row["id"].'"/>
                                            </form>
                                        </td> ';
                        }else{
                            echo '<td>'. $row["etat"].'</td> ';
                        }
                                          
                                        
                        echo ' </tr> </tbody>';
                                
                                        
                    }
                    } else {
                    echo "0 results";
                    }
                    
                   
                    if ($_POST['action']) {
                         
                         
                        include("controllers/config.php");
                        if ($_POST['action'] == 'Valider') { 
                            $sql = "UPDATE `reservation` SET `etat`='yes' WHERE `id`=".$_POST['id'];
                                    $result = $conn->query($sql);
                                    echo "res: ".$result;
                            echo '<script> alert("Reservation validée"); </script>';
                        }
                        if ($_POST['action'] == 'Rejeter') { 
                            $sql = "UPDATE `reservation` SET `etat`='no' WHERE `id`=".$_POST['id'];
                                    $conn->query($sql); 
                            echo '<script> alert("Reservation non validée"); </script>'; 
                        }
                         echo '<script> location.replace("reservations.php"); </script>';
                         $conn->close();
                    }
 
                    ?>
                       </table>
                    </div>
                </div>
                  
            </div>
        </div> 
        
    </div>
    
</body>
</html>