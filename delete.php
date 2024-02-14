<?php
if (  isset($_GET['action']) && $_GET['action'] === 'buttonClick') {
  session_unset();
  session_destroy();
  header('Location: login.php'); 
  exit();
}

?>