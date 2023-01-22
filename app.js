$(window).ready(function() {

  $('#formulario_login').on('submit', function(e) {
    
    e.preventDefault();

    let usuario = $('#txt_usuario').val();
    let pass = $('#txt_contrasena').val();

    $.post('config/controlador.php', {usuario, pass}, function(data) {

      if(data == 'true') {

        location.href = 'admin.html';

      } else {

        swal.fire({
          title: '¡Error!',
          icon: 'error',
          text: data
        });

      }

    });

  });

});