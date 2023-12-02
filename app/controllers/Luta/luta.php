<?php  
session_start();


if(!isset($_SESSION['usuario_logado'])){
    header('Location: ../../../index.php');
}


function calcularGolpe($precisao,$precisao_golpe)
{
    
    $numeroAleatorio = mt_rand(0, 100);
    $golpe = $precisao + $numeroAleatorio + $precisao_golpe;
    if ($golpe < 100) {
        return false;
    } else {
        return true;
    }
}
function chutar($precisao)
{
    $danoChute = 40;
    $precisaoChute = 10;
    if (calcularGolpe($precisao,$precisaoChute)) {
        return $danoChute;
    }
    return 0;
}
function socar($precisao)
{
    $danoSoco = 15;
    $precisaoSoco = 25;
    if (calcularGolpe($precisao,$precisaoSoco)) {
        return  $danoSoco;
    }
    
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["precisao"])) {
        $precisaoPost = $_POST["precisao"];
        $golpePost = $_POST["golpe"];

    if($golpePost == 'chute'){
      $dano = chutar($precisaoPost);
    }else if($golpePost == 'soco'){
        $dano = socar($precisaoPost);
    }  
    echo $dano;
    return $dano;

    } elseif (isset($_POST["nomeHeroi"])) {
        $nomeHeroi = $_POST["nomeHeroi"];
        $imagemHeroi = $P=$_POST["imagemHeroi"];
        $backgroundImage = $_GET['backgroundImage'];

        $nomeVilao = $_POST["nomeVilao"];
        $imagemVilao = $P=$_POST["imagemVilao"];


        
       echo 'Nome Heroi:' . $nomeHeroi.'<br>';
       echo 'Imagem Heroi:' . $imagemHeroi.'<br>';

       echo 'Nome Vilao:' . $nomeVilao.'<br>';
       echo 'Imagem Vilao:' . $imagemVilao.'<br>';
    }
    
    
}
