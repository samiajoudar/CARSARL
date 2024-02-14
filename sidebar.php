<?php
if (  isset($_GET['action']) && $_GET['action'] === 'buttonClick') {
  session_unset();
  session_destroy();
  header('Location: login.php'); 
  exit();
}

?>
<div class="sidenav">
<img class="exemple2" src="img/rentallog.png" alt="Exemple avec clip-path"  style="margin-left:50px ;width:150px; clip-path:ellipse(40% 40%);">
<br>
<br>
<br> 
<br>
  <a href="home.php">Marques</a>
<br>
  <a href="voitures.php">Voitures</a>
<br>
  <a href="reservations.php">Reservations</a>
  <br>
  <a href="reclamations.php">Reclamations</a>
<br>
<br>
  <a type="submit" href="?action=buttonClick" click>Logout</a>
<br>
</div>