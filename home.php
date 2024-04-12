<?php
session_start();

include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHub - Home</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/hamburguer.js"></script>
    <script src="assets/js/sair.js"></script>
    <script src="assets/js/backToTop.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <nav id="navbar">
        <a href="#"><img class="logo" src="assets/img/logo.png" alt=""></a>
        <div id="navbar__itens">
            <?php

            include 'conexao.php';

            if (isset($_SESSION["adm_id"])) {
                $adm_id = $_SESSION["adm_id"];

                $query = "SELECT usuario_nome FROM usuarios WHERE usuario_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $adm_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                echo "<a class='nav__link nome'>Logado como: {$user['usuario_nome']}!</a>";
            }

            ?>
            <a class="nav__link" href="#servicos">Serviços</a>
            <a class="nav__link" href="#sobre">Quem Somos</a>
            <a class="nav__link" href="#contato">Contato</a>
            <?php
            include 'conexao.php';

            if (!isset($_SESSION["adm_id"])) {
                echo "<a class='nav__link login' href='index.php'>Entrar</a>";
            }

            if (isset($_SESSION["adm_id"])) {
                echo "<button class='nav__link btn' onclick='confirmLogout()'>Logout</button>";
            }

            ?>
        </div>
        <button class="hamburguer">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div id="sidebar">
            <button class="fechar" onclick="toggleMenu()">
                <img class="close" src="assets/img/close.png" alt="">
            </button>
            <a class="sidebar__link" href="#servicos">Serviços</a>
            <a class="sidebar__link" href="#sobre">Quem Somos</a>
            <a class="sidebar__link" href="#contato">Contato</a>
        </div>

    </nav>

    <div id="barra_roxa"></div>

    <?php

    include 'conexao.php';

    if (isset($_SESSION["adm_id"])) {
        $adm_id = $_SESSION["adm_id"];

        $query = "SELECT usuario_nome FROM usuarios WHERE usuario_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $adm_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        echo "<a class='welcome'> Logado como administrador: {$user['usuario_nome']}</a>";
    }

    ?>

    <main>

        <?php

        include 'conexao.php';

        if (isset($_SESSION["adm_id"])) {
            $adm_id = $_SESSION["adm_id"];

            $query = "SELECT usuario_nome FROM usuarios WHERE usuario_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $adm_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            echo "<h2 class='adm'>Você está logado como administrador</h2>";
        }

        ?>

        <div id="apresentacao">
            <div class="textos">
                <p class="apresentacao__title">Um mundo de oportunidades</p>
                <h1 class="apresentacao__texto">
                    Conectando mentes; Transmitindo conhecimento
                </h1>
                <p class="apresentacao__descricao">Encontre o melhor método de estudos para você. Venha interagir no divertido mundo da educação, conosco!</p>
            </div>
            <img class="apresentacao__img" src="assets/img/icons.png" alt="">
        </div>

        <div id="servicos">
            <div class="textos">
                <p class="servicos__title">Serviços</p>
                <h1 class="servicos__texto">
                    De que maneira podemos ser úteis?
                </h1>
                <p class="servicos__descricao">Pensando em auxiliar na problemática da defasagem na aprendizagem, a Quasar desenvolveu uma plataforma de streaming por assinatura, denominado SmartHub, que mistura educação com tecnologia, sendo uma inovação totalmente original no mercado.</p>
            </div>
            <img class="servicos__img" src="assets/img/home.png" alt="">
        </div>

        <div id="sobre">
            <div class="textos">
                <p class="sobre__title">Quem Somos</p>
                <h1 class="sobre__texto">
                    Conheça nossa empresa e desenvolvedores
                </h1>
                <p class="sobre__descricao">A Quasar é uma empresa de desenvolvimento de soluções web e mobile, que visa desenvolver produtos capazes de agregar valor à sociedade. Sempre buscando a excelência e maestria no que faz.</p>
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
                    Precisa de suporte?
                </h1>
                <p class="contato__descricao">Precisa deixar uma sugestão, tirar uma dúvida ou reportar algum problema no streaming? Então não hesite em nos consultar.</p>
            </div>
            <div class="fale_btn">
                <a class="botao__fale" href="fale.php">Fale Conosco!</a>
            </div>
        </div>

    </main>

    <button onclick="topFunction()" id="btnTopo" title="Voltar ao topo">&#8593</button>

    <footer>
        <p>Desenvolvido por Quasar© 2024</p>
    </footer>

</body>

</html>