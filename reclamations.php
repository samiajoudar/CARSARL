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
                    <h2>Reclamations :
                        </h2><br>
                </div >
                <div class="card col-11" style="margin-left:10px">
                    
                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th> 
                            <th scope="col">email</th> 
                            <th scope="col">Sujet</th> 
                            <th scope="col">Message</th> 
                            </tr>
                        </thead>
                        <?php 
                    include("controllers/config.php");
                    $db = new Database();
                    $reclamationManager = new ReclamationManager($db);
                    $reclamationManager->displayReclamations();
                    
                 
                    
                  
                     
                    class Database {
                        private $servername = "localhost";
                        private $username = "root";
                        private $password = "";
                        private $dbname = "carsarl";
                        public $conn;
                    
                        public function __construct() {
                            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
                            if ($this->conn->connect_error) {
                                die("Connection failed: " . $this->conn->connect_error);
                            }
                        }
                    
    
                        public function query($sql) {
                            return $this->conn->query($sql);
                        }
                        public function closeConnection() {
                            $this->conn->close();
                        }
                    }
                    
                    class ReclamationManager {
                        private $db;
                    
                        public function __construct(Database $db) {
                            $this->db = $db;
                        }
                    
                        public function getAllReclamations() {
                            $sql = "SELECT * FROM `reclamation`";
                            return $this->db->query($sql);
                        }
                    
                        public function displayReclamations() {
                            $result = $this->getAllReclamations();
                    
                            if ($result->num_rows > 0) {
                                echo '<tbody>';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                            <th scope="row">'. $row["id"].'</th>
                                            <td>'. $row["email"].'</td>  
                                            <td>'. $row["sujet"].'</td> 
                                            <td>'. $row["message"].'</td>  
                                        </tr>';
                                }
                                echo '</tbody>';
                            } else {
                                echo "<tr><td colspan='4'>0 results</td></tr>";
                            }
                        }
                    }
                    
                    $db->closeConnection();
           
 
                    ?>
                       </table>
                    </div>
                </div>
                  
            </div>
        </div> 
        
    </div>
    
</body>
</html>