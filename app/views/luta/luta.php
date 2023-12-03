<?php
include('../../controllers/Luta/luta.php')
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/street_logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/luta.css">

    <title>StreetFighter</title>
</head>

<body>

    <div class="card__container">

        <!-- MODAL -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Street Fighter</h1>
                    </div>

                    <div class="modal-body">
                        <p id="modalText"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="modalOp1">Jogar Novamente</button>
                        <button type="button" class="btn btn-warning" id="modalOp2">Escolher Personagens</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modalSort" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p id="modalSortText"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- LUTA -->
        <div class="luta d-flex justify-content-between">

            <!-- PLAYER 1 -->
            <div class="col">

                <h2 id="nomeHeroi"></h2>  
                
                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success" id="vidaHeroi" style="width:100%">100%</div>
                </div>

                <div class="personagem player 1">  
                   <img id="imagemHeroi">
                </div>

                <div class="card">
                    <div class="d-flex justify-content-center" id="golpes">
                        GOLPES
                    </div>

                    <div class="d-flex justify-content-around">
                        <div class="container">
                            <div class="text-center">
                                <h5>Precisão: 45/100</h5>
                                <h5>Dano: 40/100 </h5>
                            </div>
                            <button type="button" id="chuteHeroi" class="btn">Chute</button>
                        </div>

                        <div class="container">
                            <div class="text-center">
                                <h5>Precisão: 60/100</h5>
                                <h5>Dano: 15/100 </h5>
                            </div>
                            <button type="button" id="socoHeroi" class="btn">Soco</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col">
                <h1 class="col__txt">VS</h1>
            </div>

            <!-- PLAYER 2 -->
            <div class="col">

                <div class="nome vilao">
                    <h2 id="nomeVilao"></h2>
                </div>
                
                <div class="progress d-flex justify-content-end" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">                  
                    <div class="progress-bar bg-success" id="vidaVilao" style="width:100%">100%</div>
                </div>

                <div class="personagem player2">  
                    <img id="imagemVilao">
                </div>

                <div class="card">
                    <div class="d-flex justify-content-center " id="golpes">
                        GOLPES
                    </div>

                    <div class="d-flex justify-content-around">
                        <div class="container">
                            <div class="text-center">
                                <h5>Precisão: 45/100</h5>
                                <h5>Dano: 40/100 </h5>
                            </div>
                            <button type="button" id="chuteVilao" class="btn">Chute</button>
                        </div>

                        <div class="container">
                            <div class="text-center">
                                <h5>Precisão: 60/100</h5>
                                <h5>Dano: 15/100</h5>
                            </div>
                            <button type="button" id="socoVilao" class="btn">Soco</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="./luta.js"></script> 


<script>
        async function emitirSom(arquivoDeAudio) {
        
        arquivoDeAudio =`../../assets/audio/${arquivoDeAudio}.mp3` 
        const audio = new Audio(arquivoDeAudio);
        audio.play();
    }
</script>

</body>


</html>