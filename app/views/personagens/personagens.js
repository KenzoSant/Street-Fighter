const herois = document.querySelectorAll(".heroi");
const viloes = document.querySelectorAll(".vilao");

let heroi = document.getElementById('heroi');
let vilao = document.getElementById('vilao');

let nomeHeroi = '';
let imagemHeroi = '';

let nomeVilao= '';
let imagemVilao= '';

const btn_random = document.getElementsByClassName('random')

document.addEventListener('click', function () {
    var body = document.body;
    var estilos = window.getComputedStyle(body);
    var backgroundImage = estilos.backgroundImage;

});



function limparSelecao(text) {
    if (text === "Heroi") {
        herois.forEach((heroi) => {
            heroi.classList.remove("box-shadow");
        });
    } else if (text === "Vilao") {
        viloes.forEach((vilao) => {
            vilao.classList.remove("box-shadow");
        });
    }
}

function heroiEstaSelecionado() {
    for (let i = 0; i < herois.length; i++) {
        if (herois[i].classList.contains("box-shadow")) {
            player1 = herois[i].id;                        
            imagemHeroi = herois[i].children[0].src
            nomeHeroi = herois[i].getAttribute("data-nome");    
            heroi.innerText = nomeHeroi;    
            return true;
        }
    }
    alert('Selecione um heroi');
    return false;
}

function vilaoEstaSelecionado() {
    for (let i = 0; i < viloes.length; i++) {
        if (viloes[i].classList.contains("box-shadow")) {
            player2 = viloes[i].id
            imagemVilao = viloes[i].children[0].src
            nomeVilao = viloes[i].getAttribute("data-nome");  
            vilao.innerText = nomeVilao
            return true;
        }
    }
    alert('Selecione um vilao');
    return false;
}

async function selecionarHeroi(element) {
    if (element.classList.contains("heroi")) {
        limparSelecao("Heroi");
        element.classList.add("box-shadow");
        element.classList.add("border-dark");
        element.classList.add("border-5");
        element.classList.add("rounded-4");
        await emitirSom('./audio-selecionar.mp3');

        const imagemHeroiElement = document.createElement("img");
        imagemHeroiElement.src = element.children[0].src;
        document.querySelector(".selecao__heroi").innerHTML = "";
        document.querySelector(".selecao__heroi").appendChild(imagemHeroiElement);

        imagemHeroiElement.classList.add("slideToLeft");
    }
    heroiEstaSelecionado();
}

async function selecionarVilao(element) {
    if (element.classList.contains("vilao")) {
        limparSelecao("Vilao");

        element.classList.add("box-shadow");
        element.classList.add("border-dark");
        element.classList.add("border-5");
        element.classList.add("rounded-4");

        emitirSom('../../assets/audio/audio-selecionar.mp3');

        const imagemVilaoElement = document.createElement("img");
        imagemVilaoElement.src = element.children[0].src;
        imagemVilaoElement.style.transform = "scaleX(-1)";

        const selecaoVilao = document.querySelector(".selecao__vilao");
        selecaoVilao.innerHTML = "";
        selecaoVilao.appendChild(imagemVilaoElement);
        selecaoVilao.classList.remove("slideToRight");
        void selecaoVilao.offsetWidth; 
        selecaoVilao.classList.add("slideToRight");
    }
    vilaoEstaSelecionado();
}

function random(element){
let personagem;
let listaPersonagem;
if(element.classList.contains("btn-heroi")){
    personagem = "heroi";
    listaPersonagem = herois
}else if(element.classList.contains("btn-vilao")){
    personagem = "vilao";
    listaPersonagem = viloes
}

let numero_aleatorio = gerarNumeroAleatorio();
let i = 0
let contador = 0
let interval = setInterval(function(){
    if(i < numero_aleatorio){       
    
    if(personagem == "heroi"){
        selecionarHeroi(herois[contador])
    }else if(personagem == "vilao"){
        selecionarVilao(viloes[contador])
    }
    
    contador++;
    i++;  
    if(contador == listaPersonagem.length){
        contador = 0;
    }
    }else{
        clearInterval(interval)
    }

   
},200)
}

function jogar() {
    if (heroiEstaSelecionado() && vilaoEstaSelecionado()) {
        var body = document.body;
        var estilos = window.getComputedStyle(body);
        var backgroundImage = estilos.backgroundImage;
        
        enviarDados();
       
        window.location.href = '../mapa/mapa.php?' +
            '&nomeHeroi=' + nomeHeroi + '&imagemHeroi=' + imagemHeroi +
            '&nomeVilao=' + nomeVilao + '&imagemVilao=' + imagemVilao +
            '&backgroundImage='+backgroundImage;
    }
    return false;
}

async function enviarDados(){
    return await $.ajax({
        type: "POST",
        url: "../mapa/luta_b.php",
        data: { nomeHeroi: nomeHeroi, imagemHeroi: imagemHeroi,nomeVilao:nomeVilao,imagemVilao:imagemVilao }, 
        contentType: "application/x-www-form-urlencoded",
        success: function (data) {     
            console.log(data)        
        },
    });   
}

function gerarNumeroAleatorio() {
    const numeroAleatorio = Math.floor(Math.random() * 15) + 16; // Gera um número entre 16 e 30
    return numeroAleatorio;
}


