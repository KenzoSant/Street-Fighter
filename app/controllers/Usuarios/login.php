<?php
$rootDir = dirname(__DIR__, 3);
require_once $rootDir . '/vendor/autoload.php';
require_once $rootDir . '/App/Common/Environment.php';

use \App\Common\Environment;

Environment::load();
$con = new mysqli(getenv('DB_HOSTNAME'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_DATABASE'));

session_start();

if(isset($_SESSION['usuario_logado'])){
    header('Location:app/views/personagens/personagens.php');
}

function buscarCredenciais($email, $senha, $con)
{

    $query = "SELECT email,senha FROM Usuario WHERE email = ? LIMIT 1";

    $stmt = $con->prepare($query);

    if ($stmt === false) {
        return false;
    }

    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            if (password_verify($senha, $row['senha'])) {
                return true;
            } else {
                false;
            }
        }
    }

    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    if (buscarCredenciais($email, $senha, $con)) {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['last_activity'] = time();
        header("Location: app/views/personagens/personagens.php");

    } else {
        echo 'Credencial Incorreta';
        header("Location: index.php?http=404");
    }
}
