// Quando o usuário rola para baixo 20px da parte superior do documento, mostre o botão
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("btnTopo").style.display = "block", transition = '.2s';
  } else {
    document.getElementById("btnTopo").style.display = "none" ;
  }
}

// Quando o usuário clica no botão, rola para o topo do documento
function topFunction() {
  document.body.scrollTop = 0; // Para Safari
  document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE e Opera
}