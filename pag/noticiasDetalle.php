<?php  
$id =$_GET['id'];
$db_handle = new mariamedebe();

$consulta = $db_handle->runQuery("SELECT titulo, contenido, img FROM noticias WHERE idnoticia ='$id'");
if (!empty($consulta)){ 
    foreach($consulta as $key=>$value){
        //$contenido =$consulta[$key]['perfil'];
?>
<h2><?php echo $consulta[$key]['titulo']; ?></h2>
<img src="<?php echo ruta ?>intra/img/noticias/<?php echo $consulta[$key]['img']; ?>" alt="">
<article><?php echo $consulta[$key]['contenido']; ?></article>
<?php
    }
}
?>