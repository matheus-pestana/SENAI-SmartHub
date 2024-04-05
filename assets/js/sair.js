function confirmLogout() {
    if (confirm("Você realmente deseja sair?")) {
        window.location.href = "logout.php";
    }
}