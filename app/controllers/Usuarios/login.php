<?php
$rootDir = dirname(__DIR__, 3);
require_once $rootDir . '/vendor/autoload.php';
require_once $rootDir . '/App/Common/Environment.php';

use \App\Common\Environment;

Environment::load();
$con = new mysqli(getenv('DB_HOSTNAME'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));



// Verificar a conexão
if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

$dbname = getenv('DB_DATABASE');
// Criação do banco de dados se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($con->query($sql) === TRUE) {
}

// Conexão com o banco de dados específico
$con = new mysqli(getenv('DB_HOSTNAME'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_DATABASE'));
$table_check_query = "SHOW TABLES LIKE 'usuario'";
$result = $con->query($table_check_query);


if ($result->num_rows == 0) {
    // A tabela de usuários não existe, então executa o arquivo SQL para criar a tabela
    $sql_file = __DIR__ . '/../../../script.sql';

    // Lê o conteúdo do arquivo SQL
    $sql_content = file_get_contents($sql_file);

    if ($sql_content !== false) {
        if ($con->multi_query($sql_content) === TRUE) {
           
        } 
    } 
} 


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
