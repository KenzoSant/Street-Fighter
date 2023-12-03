const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);


let listMapas = document.querySelectorAll('.services__card')

let nomeHeroi = params.get("nomeHeroi");
let nomeVilao = params.get("nomeVilao");

const nomeHeroiElement = document.getElementById('nomeHeroi');
nomeHeroiElement.innerText = nomeHeroi;

const nomeVilaoElement = document.getElementById('nomeVilao');
nomeVilaoElement.innerText = nomeVilao;


const imagemHeroi = document.getElementById('imagemHeroi')
imagemHeroi.setAttribute("src", params.get("imagemHeroi"))

const imagemVilao = document.getElementById('imagemVilao')
imagemVilao.setAttribute("src", params.get("imagemVilao"));

const modal = document.getElementById('modal')
const modalText = document.getElementById('modalText')

const modalOp1 = document.getElementById('modalOp1');
const modalOp2 = document.getElementById('modalOp2');

function jogar() {
    var body = document.body;
    var estilos = window.getComputedStyle(body);
    var backgroundImage = estilos.backgroundImage;
        
    enviarDados();
       
    window.location.href = '../luta/luta.php?' +
    '&nomeHeroi=' + nomeHeroi + '&imagemHeroi=' + imagemHeroi.src +
    '&nomeVilao=' + nomeVilao + '&imagemVilao=' + imagemVilao.src +
    '&backgroundImage='+backgroundImage;
}

async function enviarDados(){
    return await $.ajax({
        type: "POST",
        url: "../luta/luta_b.php",
        data: { nomeHeroi: nomeHeroi, imagemHeroi: imagemHeroi,nomeVilao:nomeVilao,imagemVilao:imagemVilao }, 
        contentType: "application/x-www-form-urlencoded",
        success: function (data) {     
            console.log(data)        
        },
    });   
}

async function changeBackground(element) {
    var imageUrl = element.src;
    listMapas.forEach((map)=>{
        map = map.children[0]
        if(map.classList.contains('active')){
            map.classList.remove('active')
        }
    })
    element.classList.add('active')
    await emitirSom('./audio-selecionar.mp3');
    document.documentElement.style.setProperty('--background-image', 'url(' + imageUrl + ')');
}

function randomBackground() {
    var cards = document.getElementsByClassName('services__card');
    var randomIndex = Math.floor(Math.random() * cards.length);
    var randomCard = cards[randomIndex];
    var imageUrl = randomCard.querySelector('img').src;
    console.log('Random Image URL:', imageUrl);
    document.documentElement.style.setProperty('--background-image', 'url(' + imageUrl + ')');
}





function random(){    
    
    let numero_aleatorio = gerarNumeroAleatorio();
    let i = 0
    let contador = 0
    let interval = setInterval(function(){
        if(i < numero_aleatorio){       
        
     
        changeBackground(listMapas[contador].children[0])

        contador++;
        i++;  
        if(contador == listMapas.length){
            contador = 0;
        }
        }else{
            clearInterval(interval)
        }
    
       
    },200)
    }


function gerarNumeroAleatorio() {
    const numeroAleatorio = Math.floor(Math.random() * 15) + 16; // Gera um número entre 16 e 30
    return numeroAleatorio;
}
