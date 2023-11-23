<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo $Titulo ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- JQUERY -->
    <script type="text/javascript" src="..\..\Utiles\jquery-3.6.1\jquery.min.js"></script>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="..\..\Utiles\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\..\Utiles\palette.css">
    <script src="..\..\Utiles\bootstrap\js\bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP VALIDATOR -->
    <script src="..\..\Utiles\bootstrap\js\bootstrapValidator.min.js"></script>
    <script src="..\..\Utiles\bootstrap\js\mensajesBVes_ES.js"></script>
    <!-- BOOTBOXJS LIBRERIA NOTIFICACIONES -->
    <script type="text/javascript" src="../../Utiles/bootboxjs-5.5.2/bootbox.min.js"></script>
    <!-- FONTAWESOME LIBRERIA ICONOS -->
    <script src="../../Utiles/Iconos/FontAwesomeKit.js"></script>

    <!-- ICON -->
    <link rel="icon" type="image/x-icon" href="../img/icon.ico">
    <!-- MENU -->
    <script src="..\..\Utiles\js\menu.js"></script>
    <?php
    include_once '../../configuracion.php';
    $sesion = new Session();
    
    ?>
</head>
<?php include_once("../../Vista/Estructura/menu.php") ;
$param = $_SERVER['REQUEST_URI'];
echo "<script>console.log('Debug Objects: " . $param . "' );</script>";
$substringToRemove = "Home/";
$url = str_replace($substringToRemove, "", $param);
$url = str_replace("Vista/", "", $param);
if(!(strpos($url, "registro.php") !== false || strpos($url, "login.php") !== false||strpos($url, "index.php") !== false||strpos($url, "productos.php") !== false)){
    
    $url = '..'.$url;
    if (!$sesion->verificarPermiso($url)) {
        $mensaje = "No tiene permiso para acceder a este sitio.";
    
        echo "<script> window.location.href='../Home/index.php?mensaje=" . urlencode($mensaje) . "'</script>";
        
    }

}
    ?>
<!-- FIN CABECERA -->
