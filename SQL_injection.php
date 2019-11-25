<?php
// class MySQL{
//   private $host;
//   private $user;
//   private $password;
//   private $connection;
//   function __construct(){}
//     function getHost(){
//       return $this->host;
//     }
//     function setHost($host){
//       $this->host = $host;
//     }
//     function getUser(){
//       return $user;
//     }
//     function setUser($user){
//       $this->user = $user;
//     }
//     function getPassword(){
//       return $password;
//     }
//     function setPassword($password){
//       $this->password = $password;
//     }
//     function getConnection(){
//       echo $this->connection;
//       if(empty($this->connection)){
//         $this->connection = mysqli_connect($this->host, $this->user, $this->password);
//       }
//       return $this->connection;
//     }
//   }
//   $user = htmlspecialchars($_POST["user"]);
//   $pass = htmlspecialchars($_POST["passwd"]);
//   echo "User: ".$user." - "."password: ".$pass."<br/>";
//   $shadow = hash('sha512',$pass);
//   echo $shadow;
//
//
//
//
//   $mysql = new MySQL();
//   $mysql->setHost('localhost');
//   $mysql->setUser('root');
//   $mysql->setPassword('');
//   $connection = $mysql->getConnection();
//   mysqli_select_db($connection, 'SQLInjection');
//   // $insert = "insert into user (username, name, password) value ('".$user."','".$user."',sha2('".$pass."',512));";
//   $insert = "insert into user (username, name, password) value ('".$user."','".$user."','".$shadow."');";
//
//   $insertQuery = mysqli_query($connection, $insert);
//   if (!$insertQuery) {
//     $message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
//     $message .= 'Consulta realitzada: ' . $consulta;
//     die($message);
//   }
//
//   mysqli_close($connection);

  // Evitar SQL Injection
  $user = htmlspecialchars($_POST["user"]);
  $pass = htmlspecialchars($_POST["passwd"]);

  // Query para probar eficacia:
  // ferran';CREATE TABLE MyGuests ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ) ;
  // $user = $_POST["user"];
  // $pass = $_POST["passwd"];
  $shadow = hash('sha512',$pass);
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=SQLInjection", "root", "P@ssw0rd");
    $query = $pdo->prepare("SELECT * FROM user where username = ".$user." and password = "..";");
    $query = $pdo->prepare("SELECT * FROM user where username = '".$user."' and password = sha2('".$pass."',512);");
    $query->execute();
    $registre = $query->fetch();

    if(!$registre){
      echo "Contraseña o usuario incorrecto";
    }else{
      echo "Bienvenido ". $_POST['user'];
    }
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

?>
