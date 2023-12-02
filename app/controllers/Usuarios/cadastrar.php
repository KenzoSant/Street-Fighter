<?php
$rootDir = dirname(__DIR__, 3); 
require_once $rootDir . '/vendor/autoload.php';
require_once $rootDir . '/App/Common/Environment.php';

use \App\Common\Environment;

Environment::load();



$con = new mysqli( getenv('DB_HOSTNAME'), getenv('DB_USERNAME'), getenv('DB_PASSWORD') , getenv('DB_DATABASE'));



function buscarEmail($email, $con) {
  $query = "SELECT COUNT(*) as count FROM usuario WHERE email = ?";

  $stmt = $con->prepare($query);

  if ($stmt === false) {
      return false;
  }

  $stmt->bind_param("s", $email);

  if ($stmt->execute()) {
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();

      if ($row["count"] > 0) {
          return true; 
      }
  }

  return false; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT) ;
  if(!buscarEmail($email,$con)){
    $stmt = $con->prepare("INSERT INTO usuario (email, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    echo "Email Criado com sucesso";
    header("Location: ../../../index.php?http=201");
  }else{
    echo "Esse email já está sendo usado";
    header("Location: ../../../index.php?http=409");
  }
  

    


}



