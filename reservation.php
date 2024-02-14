<!DOCTYPE html>
<html>

<head>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
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
	session_start();
	$id = isset($_GET['id']) ? $_GET['id'] : '';?>		
	<section style="padding: 0%;">
	
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form  method="post" action="">
								<div class="form-group">
									<span class="form-label">Your full name</span>
									<input class="form-control" name="name" type="text" placeholder="Enter your full name" required>
								</div>
								<div class="form-group">
									<span class="form-label">Your phone number</span>
									<input class="form-control" name="phone" type="number" placeholder="Enter your phone number" required>
								</div>
								<div class="form-group">
									<span class="form-label">Your email</span>
									<input class="form-control" name="email" type="email" placeholder="Enter your full name" required>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Pick up</span>
											<input class="form-control" name="dateDebut" type="date" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Drop off</span>
											<input class="form-control" name="dateFin"  type="date" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										 
								<div class="form-btn">
									<button class="submit-btn" type="submit"  name="action" value="Reserv">Envoyer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	<section style="padding: 0%;">
        <?php 
		
		include('footer.php'); 
		if ($_POST['action'] == 'Reserv') { 
			if($_POST['name']=="" || $_POST['email']=="" || $_POST['phone']=="" || $_POST['dateDebut']=="" || $_POST['dateFin']=="" )
			{	
				echo'<script> alert("Veuillez renseigner"); </script>';
			}else if($_POST['dateDebut']>$_POST['dateFin'])
			{
				echo'<script> alert("Date debut doit etre inferieur à date fin"); </script>';

			}else{

				echo '<script> alert("Success"); </script>';
				include("controllers/config.php");
				$sql = "INSERT INTO `reservation`(`id_voiture`, `date_debut`, `date_fin`, `nom`, `email`, `tele`,`etat`) VALUES ("
						.$_GET['id'].",'".$_POST['dateDebut']."','".$_POST['dateFin']."','".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','')";
						$result = $conn->query($sql);
						echo "res: ".$result;
						echo '<script>location.replace("fleet.php"); </script>';
			}
        } 
 
        ?>
	</section>
</body>

</html>