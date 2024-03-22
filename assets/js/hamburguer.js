document.addEventListener("DOMContentLoaded", function() {
    var hamburguer = document.querySelector('.hamburguer');
    var sidebar = document.getElementById('sidebar');

    hamburguer.addEventListener('click', function() {
        // Verifica se o sidebar está aberto
        var sidebarIsOpen = sidebar.style.left === '0px';

        // Se estiver aberto, fecha; caso contrário, abre
        if (sidebarIsOpen) {
            sidebar.style.left = '-260px'; // Fecha o sidebar
        } else {
            sidebar.style.left = '0px'; // Abre o sidebar
        }
    });
});
