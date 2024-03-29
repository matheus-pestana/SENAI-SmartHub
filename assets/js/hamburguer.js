document.addEventListener("DOMContentLoaded", function() {
    var hamburguer = document.querySelector('.hamburguer');
    var fechar = document.querySelector('.fechar');
    var sidebar = document.getElementById('sidebar');

    function toggleSidebar() {
        // Verifica se o sidebar está aberto
        var sidebarIsOpen = sidebar.style.left === '0px';

        // Se estiver aberto, fecha; caso contrário, abre
        if (sidebarIsOpen) {
            sidebar.style.left = '-260px'; // Fecha o sidebar
        } else {
            sidebar.style.left = '0px'; // Abre o sidebar
        }
    }

    // Adiciona o evento de clique ao botão hamburguer e ao botão fechar
    hamburguer.addEventListener('click', toggleSidebar);
    fechar.addEventListener('click', toggleSidebar);
});