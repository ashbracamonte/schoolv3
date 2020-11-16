<?php
require_once 'functions.php';
use Illuminate\Database\Capsule\Manager as DB;
echo'

<body class="bg-img"> 
<div class="container">
';

if(!$loggedin){

    if(isset($_POST['usuario']))
    {

    $user= sanitizeString($_POST['usuario']);
     $pass= sanitizeString($_POST['contraseña']);

        $users = DB::table('data_usuarios')->select(['usuario', 'password'])->where('usuario', $user)->where('password', $pass)->first();

        if (!$users)
        {
            echo'<p class="is-size-5">cuenta o contraseña inválida';
        }
        else
        {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            die('<p class="is-size-3 is-left letra"> 
            <br>
            <br>
            <br>
                      Haz iniciado sesión, <a href="index.php">click aquí</a> para ir al sistema
            <br>
            <br>
            <br>
            </p>
            </div></body></html>');

         }
    }


    echo'
        <div class="card is-white">
        <figure class="image is-2by1">
        <img src="img/logoalta3.png">
        
            </figure>
            <header class="card-header">
            
                <p class="card-header-title">
                    Ingresa tus datos para iniciar sesión
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content footer">
                <div class="content">
                    <form method="post" action="login.php">
                        <div class="field">
                            <label class="label">Usuario</label>
                            <div class="control">
                                <input class="input" type="text" maxlength="45" name="usuario" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Contraseña</label>
                            <div class="control">
                                <input class="input" type="password" maxlength="11" name="contraseña" placeholder="Contraseña">
                            </div>
                        </div>
                        <button type="submit" class="button is-medium is-warning">Iniciar sesión</button>
                    </form>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div footer>
        </div>
    </div>
    ';
}
else{

}
echo'



</body>

';
