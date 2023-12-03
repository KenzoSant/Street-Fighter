<?php
include('../../controllers/Mapa/mapa.php')
    ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/street_logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../../assets/style/mapa.css">

    <title>StreetFighter</title>
</head>

<body>

    <div class="overlay"></div>
    <div class="card__container">

        <!-- MAPA -->
        <div class="mapa d-flex justify-content-between">

            <!-- PLAYER 1 -->
            <div class="col subdiv">
                <div class="personagem player1">
                    <img id="imagemHeroi">
                </div>
            </div>

            <!-- VS -->
            <div class="col subdiv">
                <div class="nome heroi">
                    <h2 class="section__title" id="nomeHeroi"></h2>
                </div>

                <h1 class="col__txt">VS</h1>

                <div class="nome vilao">
                    <h2 class="section__title" id="nomeVilao"></h2>
                </div>
            </div>

            <!-- PLAYER 2 -->
            <div class="col subdiv">
                <div class="personagem player2">
                    <img id="imagemVilao">
                </div>
            </div>

        </div>

        <!-- MAPAS -->
        <div class="maps__container">
            <div class="services__container container grid">
                <div class="services__card">
                    <img src="../../assets/images/stage1.jfif" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage2.jfif" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage3.jfif" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage4.jfif" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage5.jpg" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage6.jpg" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage7.jpg" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage8.jpg" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/stage9.jpg" onclick="changeBackground(this)">
                </div>
                <div class="services__card">
                    <img src="../../assets/images/stage10.jpg" onclick="changeBackground(this)">
                </div>
                <div class="services__card">
                    <img src="../../assets/images/stage11.jpg" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/background1.jpg" onclick="changeBackground(this)">
                </div>

                <div class="services__card">
                    <img src="../../assets/images/background2.jpg" onclick="changeBackground(this)">
                </div>
            </div>
            <button class="random btn-heroi" onclick="random()">Random</button>
        </div>
    </div>

    <div class="services__button">
        <button class="btn btn-primary" type="button" onclick="jogar()" action="home_b">PRONTO</button>
    </div>

    <script>
        function jogar() {
            var body = document.body;
            var estilos = window.getComputedStyle(body);
            var backgroundImage = estilos.backgroundImage;

            enviarDados();

            window.location.href = '../luta/luta.php?' +
                '&nomeHeroi=' + nomeHeroi + '&imagemHeroi=' + imagemHeroi +
                '&nomeVilao=' + nomeVilao + '&imagemVilao=' + imagemVilao +
                '&backgroundImage=' + backgroundImage;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="./mapa.js"></script>
    <script>
        async function emitirSom(arquivoDeAudio) {
        
        arquivoDeAudio = '../../assets/audio/audio-selecionar.mp3'
        const audio = new Audio(arquivoDeAudio);
        audio.play();
    }
</script>

</body>


</html>