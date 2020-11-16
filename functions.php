<?php
@ob_start();
session_start();

use Illuminate\Database\Capsule\Manager as DB;
require 'vendor/autoload.php';
require 'config/database.php';

echo '
<!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        
        <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">

        
        <link rel="stylesheet" href="css/style.css">
';

if (isset($_SESSION['user'])) {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;

    $users = DB::table('data_usuarios')->where('usuario','=',$user)->first();

    

    $name = $users->nombre;
    $lastname = $users->apellidos;
    $access = $users->tipo_usuario;
    $id = $users->id_data_usuarios;
} else $loggedin = FALSE;

function destroySession()
{
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
?>