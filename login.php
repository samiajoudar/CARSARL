<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Log In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
      integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
      integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="">
      <img class="mb-4" src="img/logoo (1).jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Login</label>
      <input type="text" name="inputEmail" class="form-control" placeholder="Login" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
       
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="action" value="Reserv">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023 </p>
    </form>
    <div id="demo"></div>

  </body>
  <?php
session_start();
class Authentification {
  private $username;
  private $password;

  public function __construct() {
      $this->username = 'admin';
      $this->password = password_hash('pass', PASSWORD_DEFAULT); 
  }

  public function authenticate($inputUsername, $inputPassword) {
    error_log("ana hena");
      if ($inputUsername === $this->username && password_verify($inputPassword, $this->password)) {
          $_SESSION['authenticated'] = true;
          header('Location: home.php'); 
          exit();
      } else {
          return 'Invalid username or password';
      }
  }
}
$user = new Authentification();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : '';
    $inputPassword = isset($_POST['inputPassword']) ? $_POST['inputPassword'] : '';

    $error = $user->authenticate($inputUsername, $inputPassword);

    if ($error) {
        $error_message = $error;
    }
}


?>

</html>
