<?php
session_start();

include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHub - Home</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/home.css">
    <link href="assets/js/scroll.js">
</head>

<body>
    <nav id="navbar">
        <a href="#"><img class="logo" src="assets/img/logo.png" alt=""></a>
        <div id="navbar__itens">
            <a href="#servicos">Serviços</a>
            <a href="#sobre">Quem Somos</a>
            <a href="#contato">Contato</a>
        </div>
    </nav>
    <div id="barra_roxa"></div>

    <main>
        <div id="apresentacao">
            <div id="textos">
                <p class="apresentacao__title">Um mundo de oportunidades</p>
                <h1 class="apresentacao__texto">
                    Conectando Mentes; Transmitindo Conhecimento
                </h1>
                <p class="apresentacao__descricao">Encontre o melhor método de estudos para você. Venha interagir no divertido mundo da educação, conosco!</p>
            </div>
            <img class="apresentacao__img" src="assets/img/icons.png" alt="">
        </div>

        <div id="servicos">
            <div id="textos">
                <p class="servicos__title">Serviços</p>
                <h1 class="servicos__texto">
                    De que maneira podemos ser úteis?
                </h1>
                <p class="servicos__descricao">Pensando em auxiliar na problemática da defasagem na aprendizagem, a Quasar desenvolveu uma plataforma de streaming por assinatura, denominado SmartHub, que mistura educação com tecnologia, sendo uma inovação totalmente original no mercado.</p>
            </div>
            <img class="servicos__img" src="assets/img/home.png" alt="">
        </div>

        <div id="sobre">
            <div id="textos">
                <p class="sobre__title">Quem Somos</p>
                <h1 class="sobre__texto">
                    Conheça nossa empresa e desenvolvedores
                </h1>
                <p class="sobre__descricao">A Quasar é uma empresa de desenvolvimento de soluções web e mobile, que visa desenvolver produtos capazes de agregar valor à sociedade. Sempbre buscando a excelência e maestria no que faz.</p>
            </div>
            <img class="sobre__img" src="assets/img/quasar.png" alt="">
        </div>
        <div id="desenvolvedores">
            <ul>
                <li>
                    <img class="desenvolvedores__img" src="assets/img/matheus.png" alt="">
                    <p class="desenvolvedores__nome">Matheus Arcangelo Pestana</p>
                    <p class="desenvolvedor__funcao">Product Owner</p>
                </li>
                <li>
                    <img class="desenvolvedores__img" src="assets/img/kathleen.png" alt="">
                    <p class="desenvolvedores__nome">Kathleen Corrêa Santos Souza</p>
                    <p class="desenvolvedor__funcao">Desenvolvedora</p>
                </li>
                <li>
                    <img class="desenvolvedores__img" src="assets/img/carine.png" alt="">
                    <p class="desenvolvedores__nome">Carine Geovana Nogaroto Vaz Motta</p>
                    <p class="desenvolvedor__funcao">Desenvolvedora</p>
                </li>
                <li>
                    <img class="desenvolvedores__img" src="assets/img/joao.png" alt="">
                    <p class="desenvolvedores__nome">João Pedro Felício Trindade</p>
                    <p class="desenvolvedor__funcao">Desenvolvedor</p>
                </li>
            </ul>
        </div>

        <div id="contato">
            <div id="fale">
                <p class="contato__title">Contato</p>
                <h1 class="contato__texto">
                    Caso necessário, nos consulte
                </h1>
                <p class="contato__descricao">Precisa deixar uma sugestão, tirar uma dúvida ou reportar algum problema no streaming? Então não hesite em nos consultar.</p>
            </div>
            <a class="botao__fale" href="fale.php">Fale Conosco!</a>
        </div>
    </main>

    <footer>
        <p>Desenvolvido por Quasar© 2024</p>
    </footer>

</body>

</html>