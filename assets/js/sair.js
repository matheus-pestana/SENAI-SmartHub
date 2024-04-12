function confirmLogout() {
    swal({
      title: 'Tem certeza que deseja sair?',
      text: 'Você será desconectado da sua conta.',
      icon: 'warning',
      iconColor: '#5A19A0',
      buttons: {
        cancel: 'Não',
        confirm: 'Sim',
      },
      dangerMode: true,
    })
    .then((willLogout) => {
      if (willLogout) {
        window.location.href = 'logout.php';
      }
    });
  }
  