<?php
include("../../controllers/Personagens/personagens.php");
?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style/per5.css">
    <link rel="shortcut icon" href="../../assets/images/street_logo.png" type="image/x-icon" />
    <title>StreetFighter</title>
</head>
<body>

    <div class="overlay"></div>

    <div class="selecao">
        <div class="selecao__heroi">

        </div>

        <div class="col subdiv">
            <h2 class="section__title" id="heroi">HERÓI</h2>   
                <h1 class="col__txt">VS</h1>          
            <h2 class="section__title" id="vilao">VILÃO</h2>
        </div>

        <div class="selecao__vilao">

        </div>
    </div>

    <div class="menu__game">
        <!-- HEROIS -->
        <section class="services section" id="services">
            <div class="services__container container grid">

                <div class="services__card heroi" data-nome="Ryu" id="ryu-2" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/ryu.png?h=51778c13c01235d62adfa5eb90016638">
                </div>

                <div class="services__card heroi" data-nome="Ken" id="ken-2" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/ken.png?h=c4725797e7d123403e8964d2698998c9">
                    <h3 class="services__title">Ken</h3>
                </div>

                <div class="services__card heroi" data-nome="Chun-Li" id="chun-li-2" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/cnl.png?h=cdcdad24aed42606eede35add77e6d11">
                    <h3 class="services__title">Chun-Li</h3>
                </div>

                <div class="services__card heroi" data-nome="Guile" id="guile" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/gul.png?h=13fa8b86069fbb4beafe9622893ae48b">
                    <h3 class="services__title">Guile</h3>
                </div>

                <div class="services__card heroi" data-nome="Cammy" id="cammy-2" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/cmy.png?h=02d15a6f5afd19670bb5471532fd9277">
                    <h3 class="services__title">Cammy</h3>
                </div>

                <div class="services__card heroi" data-nome="E.Honda" id="ehonda" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/hnd.png?h=de6928f8eaaaa4c06c597aaa1a950419">
                    <h3 class="services__title">E.Honda</h3>
                </div>

                <div class="services__card heroi" data-nome="Dhalsim" id="dhalsim-2" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/dsm.png?h=831bf42208028686d3edefc248f28bdb">
                    <h3 class="services__title">Dhalsim</h3>
                </div>

                <div class="services__card heroi" data-nome="R.Mika" id="rmika-2" onclick="selecionarHeroi(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/rmk.png?h=05f676f9bc729cd0095fb09ed25bb54c">
                    <h3 class="services__title">R.Mika</h3>
                </div>

            </div>

            <button class="random btn-heroi" onclick="random(this)">Random</button>
        </section>


        <!-- VILOES -->
        <section class="services section" id="services">
            <div class="services__container container grid">
                <div class="services__card vilao" data-nome="Akuma" id="akuma" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/gok.png?h=3588ea4aef20328a81efcbe49828fd44">
                    <h3 class="services__title">Akuma</h3>
                </div>

                <div class="services__card vilao" data-nome="M.Bison" id="mbison-2" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/veg.png?h=05940c2c8feafe94aa6ced8003b4b2dc">
                    <h3 class="services__title">M.Bison</h3>
                </div>

                <div class="services__card vilao" data-nome="Juri" id="juri-2" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/jri.png?h=7ae0eed9f826c2a0b23ad9c8a3aeea5c">
                    <h3 class="services__title">Juri</h3>
                </div>

                <div class="services__card vilao" data-nome="Rose" id="rose" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/rse.png?h=fb93918b4c5091b6cc90c6eb59950760">
                    <h3 class="services__title">Rose</h3>
                </div>

                <div class="services__card vilao" data-nome="Necalli" id="necalli-2" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/ncl.png?h=0339842bc100b496aa5ebcc60168a6c6">
                    <h3 class="services__title">Necalli</h3>
                </div>

                <div class="services__card vilao" data-nome="Seth" id="seth" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/sth.png?h=bc938bfb086b60d65a27d5f4addee3ef">
                    <h3 class="services__title">Seth</h3>
                </div>

                <div class="services__card vilao" data-nome="Gill" id="gill" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/gil.png?h=abc6ccf567cdfed23b5b3c4c95bbdf51">
                    <h3 class="services__title">Gill</h3>
                </div>

                <div class="services__card vilao" data-nome="Urien" id="urien" onclick="selecionarVilao(this)">
                    <img src="https://game.capcom.com/cfn/sfv/as/common/character/bustup/l/urn.png?h=b7de083995d9997f2ca91a2ff4eed839">
                    <h3 class="services__title">Urien</h3>
                </div>

            </div>
            <button class="random btn-vilao" onclick="random(this)">Random</button>
        </section>
    </div>

    <div class="services__button">
        <a href="../../controllers/Usuarios/logout.php" class="btn btn-danger">SAIR</a> 
        <button class="btn btn-primary" type="button" onclick="jogar()" action="home_b">PRONTO</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./personagens.js"></script>
    <script>
        async function emitirSom(arquivoDeAudio) {
        
        arquivoDeAudio = '../../assets/audio/audio-selecionar.mp3'
        const audio = new Audio(arquivoDeAudio);
        audio.play();
    }
</script>

</body>

</html>