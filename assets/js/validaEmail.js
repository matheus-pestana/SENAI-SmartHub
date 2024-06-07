function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    
    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    return true;
    }
    else{
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
    return false;
    }
}