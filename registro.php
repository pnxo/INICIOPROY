<?php

//AQUI CONECTAMOS A LA BASE DE DATOS DE POSTGRES
$conex = "host=echo-01.db.elephantsql.com port=5432 dbname=uzvrtpsy user=uzvrtpsy password=l-NYN6C0JUYJY6C3zjdJ1zVvw7avemiu";
$cnx = pg_connect($conex) or die ("<h1>Error de conexion.</h1> ". pg_last_error());
session_start();

function quitar($mensaje)
{
 $nopermitidos = array("'",'\\','<','>',"\"");
 $mensaje = str_replace($nopermitidos, "", $mensaje);
 return $mensaje;
}
if(trim($_POST["correo"]) != "" && trim($_POST["contra"]) != ""  && trim($_POST["nombre"]) != "" && trim($_POST["apellido"]) != "")
{
 // Puedes utilizar la funcion para eliminar algun caracter en especifico
 //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
 //$password = $HTTP_POST_VARS["password"];
 // o puedes convertir los a su entidad HTML aplicable con htmlentities
// $usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES));
$nombre= $_POST["nombre"];
$apellido= $_POST["apellido"];
 $password = $_POST["contra"];
 $corre= $_POST["correo"];
 $result = pg_query('INSERT INTO usuarios (nombre , apellido, email , password ) values (\''.$nombre.'\' , \''.$apellido.'\',\''.$corre.'\',\''.$password.'\')');
 //if($row = pg_fetch_array($result)){
  //if($row["password"] == $password){
  // $_SESSION["k_username"] = $row['nombre'];
//   echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
   echo '<a href="indexp.php">Index</a></p>';
   //Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
 /*  Ingreso exitoso, ahora sera dirigido a la pagina principal.
   <SCRIPT LANGUAGE="javascript">
   location.href = "indexp.php";
   </SCRIPT>*/
 // }else{
 //  echo 'Password incorrecto';
//  }
// }else{
//  echo 'Usuario no existente en la base de datos';
// }
pg_free_result($result);
}else{
 echo 'Debe especificar un usuario y password';
}
pg_close();
?>