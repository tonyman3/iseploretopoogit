<?php 
require_once ('../cnx/finalcnx.php');
$con = new mariamedebe;

$consulta = $con->runQuery("SELECT nombre, user, pass, idUser from usuarios u, admin a WHERE u.tipo = 3 AND u.idNombre = a.id");
?>
<table class="table table-striped table-bordered table-hover">
    <tr>
    <td colspan="4"><button type="button" class="addUser btn btn-primary btn-lg btn-add" data-toggle="modal" data-target=".modalAdd" orden="">Agregar Administrador</button></td>
    </tr>
    <tr>
        <td>Usuario</td>
        <td>Nombre</td>
        <!--<td>Contraseña</td>-->
        <td>Editar | Eliminar</td>
    </tr>
    <?php 
    if(!empty($consulta)){ 
        foreach($consulta as $key=>$value){
            ?>
            <tr>
                <td><?php echo $consulta[$key]['nombre']; ?></td>
                <td><?php echo $consulta[$key]['user']; ?></td>
                <!--<td><?php echo $consulta[$key]['pass']; ?></td>-->
                <td><h3><a class="editar" data-toggle="modal" data-target=".modalEdit" orden="traerN" datos="<?php  ?>">Editar</a></h3> | <h3><a href="<?php  ?>">Eliminar</a></h3></td>
            </tr>
            <?php            
        }
    }      
    ?>
</table>
<?php 
include 'formularioAdd.php'
?>