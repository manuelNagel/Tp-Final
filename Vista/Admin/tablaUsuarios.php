<?php
$Titulo = "Tabla Usuarios";
include_once '../Estructura/cabecera.php';
    $objUsuarios = new abmUsuario();
    $listaUsuario = $objUsuarios->buscar(null);
    $objRol = new abmRol();
    $listaRoles = $objRol->buscar(null);
    if (count($listaUsuario) > 0) {
?>
<script src="../../Utiles/md5.js"></script>
        <div class="container my-2">
            <div class="table-responsive">
                <table class="table table-hover caption-top align-middle text-center" id="tablaUsuarios">

                    <thead class="table-dark">
                        <tr>
                            <th width="70">ID</th>
                            <th>Nombre</th>
                            <th>Mail</th>
                            <th>Deshabilitado</th>
                            <th width="125">Roles</th>
                            <th width="425">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- AQUI SE AÑADEN LOS USUARIOS DINÁMICAMENTE -->
                    </tbody>
                </table>
            </div>

            
        </div>

        <script src="../../Utiles/js/funcionesABMUsuario.js"></script>
    <?php } else {
    ?>
        <div class="container p-2">
            <div class="alert alert-info" role="alert">
                No hay usuarios cargados!
            </div>
        </div>
<?php
    }
    include_once '../Estructura/pie.php';
 ?>