<?php
$Titulo = "Registrarse";
include_once '../Estructura/cabecera.php';
?>
<!-- MD5 -->
<script src="../../Utiles/md5.js"></script>
<!--VALIDADOR -->
<script src="..\..\Utiles\validaciones.js"></script>
<!-- VALIDACIONES ESTILOS -->
<link rel="stylesheet" href="../../Utiles/validaciones.css">

<div class="container p-4 mt-5 border border-warning border-2 rounded-2 bg-primary bg-opacity-10" style="width: 350px;">
    <h5 class="text-center"><i class="fa-solid fa-user-plus me-2"></i>Registro</h5>
    <hr>
    <!-- INICIO FORMULARIO DE REGISTRO -->
    <form action="" name="registro" id="registro" method="POST" accept-charset="utf-8">
        <div class="form-group mb-3">
            <label for="usmail" class="form-label">Correo: </label>
            <input type="email" class="form-control" id="usmail" name="usmail" autocomplete="off">
        </div>
        <div class="form-group mb-3">
            <label for="usnombre" class="form-label">Nombre de Usuario: </label>
            <input type="text" class="form-control" id="usnombre" name="usnombre" autocomplete="off">
        </div>
        <div class="form-group mb-3">
            <label for="uspass" class="form-label">Contraseña: </label>
            <input type="password" class="form-control" id="uspass" name="uspass" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-outline-success">Registrarse</button>
    </form>
    <!-- FIN FORMULARIO DE REGISTRO -->
</div>

<script src="../../Utiles/js/registro.js"></script>

<?php include_once '../Estructura/pie.php'; ?>