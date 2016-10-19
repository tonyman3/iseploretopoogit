<?php
//include '../cnx/finalcnx.php';
$con = new mariamedebe;
$noticias = $con->runQuery("SELECT idnoticia as id, titulo, contenido, img from noticias ORDER BY id DESC"); 
?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="4"><button type="button" class="btn btn-primary btn-lg openPopa" orden="subirNoticia">Agregar noticia</button></td>

    </tr>
    <tr>
        <td>Titulo</td>
        <td>Contenido</td>
        <td>Imagen</td>
        <td>Editar | Eliminar</td>
    </tr>
    <?php 
    //while($resnoticas = mysqli_fetch_array($querynoticias)){
    if(!empty($noticias)){ 
        foreach($noticias as $key=>$value){
            ?>
            
                <tr>
                    <td><?php echo $noticias[$key]['titulo']; ?></td>
                    <td><?php echo $noticias[$key]['contenido']; ?></td>
                    <td><?php echo $noticias[$key]['img']; ?></td>
                    <td><a class="openPopa editar" orden="traerN" href="<?php echo $noticias[$key]['id']; ?>">Editar</a> | <a class="eliminar" href="<?php echo $noticias[$key]['id']; ?>" vagina="noticias" orden="delN">Eliminar</a></td>
                </tr>
            </div>
            
            <?php
        } 
    }   
    ?>
</table>
<?php 
include 'formularioAdd.php'
?>
<!--<div class="modal fade modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Noticia</h4>
            </div>
            <form class="jormulario">
                <div class="modal-body">    
                    <p>Titulo noticia: <input type="text" name="titulo" class="titulo form-control"></p>            
                    <p>Detalle noticia: <textarea name="detalleN" id="detalleN" cols="30" rows="10"></textarea></p>
                    <p>Imagen noticia: <input type="file" name="noticiaImg"/></p>
                    <input type="hidden" name="ide" class="ide">
                    <input type="hidden" name="orden" value="editarNoticia">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Editar noticia" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>-->