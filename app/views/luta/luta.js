const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);

let nomeHeroi = params.get("nomeHeroi");
let nomeVilao = params.get("nomeVilao");

var backgroundImage = params.get('backgroundImage');
console.log('Cor de Fundo:', backgroundImage);

document.documentElement.style.setProperty('--background-image', `${backgroundImage}`);

function changeBackground(backgroundUrl) {
    document.documentElement.style.setProperty('--background-image', `${backgroundUrl}`);
}

const backgroundSelector = document.getElementById("backgroundSelector");

if (backgroundSelector) {
    backgroundSelector.addEventListener("change", function () {
        const selectedOption = backgroundSelector.value;
        changeBackground(selectedOption);
    });
}

const nomeHeroiElement = document.getElementById('nomeHeroi');
nomeHeroiElement.innerText = nomeHeroi;

const nomeVilaoElement = document.getElementById('nomeVilao');
nomeVilaoElement.innerText = nomeVilao;

const chuteHeroi = document.getElementById('chuteHeroi')
const socoHeroi = document.getElementById('socoHeroi')
const vidaVilao = document.getElementById('vidaVilao')

const chuteVilao = document.getElementById('chuteVilao')
const socoVilao = document.getElementById('socoVilao')
const vidaHeroi = document.getElementById('vidaHeroi')

const imagemHeroi = document.getElementById('imagemHeroi')
imagemHeroi.setAttribute("src", params.get("imagemHeroi"))

const imagemVilao = document.getElementById('imagemVilao')
imagemVilao.setAttribute("src", params.get("imagemVilao"));

const modal = document.getElementById('modal')
const modalText = document.getElementById('modalText')

const modalOp1 = document.getElementById('modalOp1');
const modalOp2 = document.getElementById('modalOp2');


window.addEventListener('beforeunload', function (e) {
    let modaIsShow = !$(modal).hasClass('show')
    if (modaIsShow) {
        var mensagem = 'Reiniciar Jogo?';
        e.returnValue = mensagem;
    }    
});


modalOp1.addEventListener('click', () => {
    reiniciar()
})


modalOp2.addEventListener('click', () => {
    window.location.href = '../personagens/personagens.php'
})



chuteHeroi.addEventListener('click', () => {    
    chutar(vidaVilao, nomeHeroi, nomeVilao)
    desabilitarGolpes('heroi') 
})

socoHeroi.addEventListener('click', () => {
    soco(vidaVilao, nomeHeroi, nomeVilao)
    desabilitarGolpes('heroi') 
})


chuteVilao.addEventListener('click', () => {
    chutar(vidaHeroi, nomeVilao, nomeHeroi)
    desabilitarGolpes('vilao') 
})

socoVilao.addEventListener('click', () => {
    soco(vidaHeroi, nomeVilao, nomeHeroi)
    desabilitarGolpes('vilao') 
})


async function chutar(element, nomePerson1, nomePerson2) {
    let dano = await golpear('chute').done();
    if (dano != 0) {
        let vida = element.innerText.split("%").join("")
        vida = vida - dano;
        modalGolpe(nomePerson1 + ' chutou ' + nomePerson2)
        await emitirSom('chute');
        setTimeout(() => vida = atualizarVida(element, vida),1300); 
   
        if (vida < 1) {
            modalText.innerText = nomePerson1 + ' Wins...'
            setTimeout(() => vida = $(modal).modal("show"),2200);             
        }         
    }else{
        modalGolpe(nomePerson1 + ' errou o ataque')
    }
}

async function soco(element, nomePerson1, nomePerson2) {
    let dano = await golpear('soco').done();
    if (dano != 0) {
        let vida = element.innerText.split("%").join("")
        vida = vida - dano;
        modalGolpe(nomePerson1 + ' deu um soco em ' + nomePerson2)
        await emitirSom('soco');
        setTimeout(() => vida = atualizarVida(element, vida),1300);
        if (vida < 1) {
            modalText.innerText = nomePerson1 + ' Wins...'
            $(modal).modal("show");
        }        
        modalGolpe(nomePerson1 + ' deu um soco em ' + nomePerson2)
        
    }else{
        modalGolpe(nomePerson1 + ' errou o ataque')
    }
}


function atualizarVida(element, novaVida) {
    if (novaVida < 1) {
        novaVida = 0;
    }
    element.innerText = novaVida + "%";
    element.style.width = novaVida + '%';
    if (novaVida < 20) {
        element.classList.add("bg-danger")
        element.classList.remove("bg-warning")
    } else if (novaVida < 70) {
        element.classList.add("bg-warning")
        element.classList.remove("bg-success")
    }
    return novaVida
}


function golpear(golpe) {
    return $.ajax({
        type: "POST",
        url: "../../controllers/Luta/luta.php",
        data: { precisao: 35, golpe: golpe },
        contentType: "application/x-www-form-urlencoded",
    });
}


function reiniciar() {
    vidaHeroi.style.width = "100%";
    vidaHeroi.innerText = "100%";
    vidaHeroi.classList.remove("bg-danger");
    vidaHeroi.classList.remove("bg-warning");
    vidaHeroi.classList.add("bg-success");

    vidaVilao.style.width = "100%"
    vidaVilao.innerText = "100%"
    vidaVilao.classList.remove("bg-danger");
    vidaVilao.classList.remove("bg-warning");
    vidaVilao.classList.add("bg-success");
}


function sorteio() {
    let modalSortText =  document.getElementById('modalSortText')
    let numeroSorteado = Math.floor(Math.random() * 2) + 1;
    if (numeroSorteado == 1) {
        modalSortText.innerText = "O herói ganhou o sorteio."
        $("#modalSort").modal('show');
        chuteVilao.disabled = true;
        socoVilao.disabled = true;
    } else {
        modalSortText.innerText = "O Vilão ganhou o sorteio."
        $("#modalSort").modal('show');        
        chuteHeroi.disabled = true;
        socoHeroi.disabled = true;
    }
}

function desabilitarGolpes(person){
    if(person == 'heroi'){
        chuteHeroi.disabled = true;
        socoHeroi.disabled = true;
        chuteVilao.disabled = false
        socoVilao.disabled = false
    }else if(person == 'vilao'){
        chuteVilao.disabled = true
        socoVilao.disabled = true
        chuteHeroi.disabled = false;
        socoHeroi.disabled = false;
    }
}

$(document).ready(function () {
    sorteio()
    setTimeout(() => $("#modalSort").modal('hide'), 2000);
});

function modalGolpe(text){
    modalSortText.innerText = text
    setTimeout(() => $("#modalSort").modal('hide'), 1000);
        $("#modalSort").modal('show');
}
