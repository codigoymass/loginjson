<?php

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

$data = json_decode(file_get_contents('data.json'));

// Buscar la posición del usuario, filtrando por su correo, dentro del array del json
$usuario_posicion = array_search($usuario, array_column($data, 'usuario'));

// Validando si el usuario no existe, retorna (false), si existe retorna la posición del usuario
if(is_numeric($usuario_posicion)) {

  // Se valida la contraseña ingresada, con la guardada
  if($data[$usuario_posicion]->pass == $pass) {

    $res = 'true';

  } else {

    $res = "La contraseña no es válida.";

  }

} else {

  $res = "El usuario no existe.";

}

echo $res;