<?php
require_once("inicio.php");
require_once(__ROOT__ . "/control/SessionControl.php");
require_once(__ROOT__ . "/modelo/UsuarioModelo.php");
require_once(__ROOT__ . "/control/PeliculaControl.php");
SessionControl::testSession();
SessionControl::checkSession();

$usuario = unserialize(SessionControl::get("USUARIO"));

if ($usuario->getRol() != 'administrador') {
    SessionControl::destroy();
    header("Location:../index.php");
}



$control = new PeliculaControl();
$catalogo = $control->getCatalogoPelicula();
$catalogoSop = $control->getCatalogoSoporte();
$catalogoGen = $control->getCatalogoGenero();

$control->createOrUpdate();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <title>Género</title>
        <link href="css/master.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
        <script src="js/cat_pelicula.js" defer></script>
    </head>
    <body>
        <div id="wrap">
            <div class="container" >
                <div class="header">
                    <a href="#">
                        <img src="img/logo.jpg" alt="logo" name="logo" width="612" height="206" />
                    </a> 

                </div>

                <div id="profile">
                    <?php
                    echo "<strong>Bienvenido: </strong><em> " . $usuario->getNombre() . " </em><strong>/  Rol </strong>: <em> " . $usuario->getRol() . " </em>";
                    ?>
                    <strong id="logout"><a href="logout.php">Salir</a></strong>
                </div>
                <?php require_once("menubar.php"); ?>
                <seccion>
                    <p class="seccion-titulo">Catálogo de peliculas</p> 

                    <?php $control->printPelicula($catalogo); ?>

                    <div id="login" class="center">
                        <h2>Operaciones</h2>
                        <p>
                            <input type="button" id="nuevo"  value="Nuevo">
                            <input type="button" id="modificar" value="Modificar">
                        </p> 
                        <form action="" method="post">
                            <input type="hidden" value="" id="idpelicula" name="idpelicula">
                            <label>Nombre :</label>
                            <input id="titulo" name="titulo" placeholder="Nombre de la pelicula" type="text" disabled>
                            <label>Soporte :</label>
                            <?php $control->printSoporte($catalogoSop); ?>
                            <input type="hidden" value="" id="idsoporte" name="idsoporte">
                            <input id="soporte" name="soporte" placeholder="Soporte de pelicula" type="text" disabled>
                            <label>Genero :</label>
                            <?php $control->printGenero($catalogoGen); ?>
                            <input type="hidden" value="" id="idgenero" name="idgenero">
                            <input id="genero" name="genero" placeholder="Genero de pelicula" type="text" disabled>
                            <input id="guarda" name="submit" type="submit" value=" Guardar " disabled>
                        </form>
                    </div>


                </seccion>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>