<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect to the login page if not authenticated
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
                    <h2>Marques :
                        </h2><br>
                </div >
                <div class="card col-7" style="margin-left:10px">
                    
                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom voiture</th> 
                            <th scope="col"></th> 
                            </tr>
                        </thead>
                        <?php 
                    include("controllers/config.php");
                    if(!isset($_POST['action']))
                    {
                        $_POST['action']="";
                    }
                    $sql = "SELECT *  FROM marque";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        echo ' <tbody>
                                    <tr>
                                        <th scope="row">'. $row["id"].'</th>
                                        <td>'. $row["nom"].'</td> 
                                        <td>
                                        <form method="post" action="">
                                                    <button type="submit" class="btn btn-link" name="action" value="delete">supprimer</button>
                                        
                                                    <input type="hidden" name="id" value="'.$row["id"].'"/>
                                                </form>
                                        </td> 
                                    </tr>
                            
                                </tbody>';
                                
                                        
                    }
                    } else {
                    echo "0 results";
                    }
                    
                   
                    if ($_POST['action']) {
                         
                         
                        include("controllers/config.php");
                        if ($_POST['action'] == 'add') { 
                            $sql = "INSERT INTO `marque`(`nom`) VALUES('".$_POST['marque']."')";
                                    $result = $conn->query($sql);
                                    echo "res: ".$result;
                            echo '<script> alert("Marque bien ajoutée"); </script>';
                        }
                        if ($_POST['action'] == 'delete') { 
                            $sql = " DELETE FROM `marque` WHERE id=".$_POST['id'];
                                    $conn->query($sql); 
                            echo '<script> alert("Marque numero '.$_POST['id'].' a été supprimer"); </script>'; 
                        }
                         echo '<script> location.replace("home.php"); </script>';
                         $conn->close();
                    }
 
                    ?>
                       </table>
                    </div>
                </div>
                <div class="card col-3" style="margin-left:10px; height:150px">
                    <div class="card-header ">
                        Ajouter Voiture
                    </div>
                    <div class="card-body">
                        <form method="post" action=""> 
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">Nom de la voiture</span>
                                </div>
                                <input type="text" name="marque" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <button type="submit" class="btn btn-success" name="action" value="add">Ajouter</button>
                        </form>
                    </div>
                </div>





            </div>
        </div> 
        
    </div>
    
</body>
</html>