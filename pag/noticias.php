<?php
$db_handle = new mariamedebe();
?>
<div class="container">
	<h2>Las últimas noticias de nuestro ISEP Loreto</h2>
	<?php
    $noticias = $db_handle->runQuery("SELECT idnoticia,titulo, left(contenido,194) AS acortar, img FROM noticias ORDER BY idnoticia DESC");
    if (!empty($noticias)) { 
        foreach($noticias as $key=>$value){
            $titulo = urls_amigables($noticias[$key]['titulo']);
            ?>
            <div class="noticias">
                <img src="intra/img/noticias/<?php echo $noticias[$key]['img']; ?>" alt="" width="250" height="150">
                <div class="noticias2">
                    <h3><?php echo $noticias[$key]['titulo']; ?></h3>
                    <p><?php echo $noticias[$key]['acortar']; ?></p>   
                    <a href="<?php echo ruta."detalleNoticia/".$noticias[$key]['idnoticia']."/".$titulo;  ?>" target="blank">Leer más</a> 
                </div>
            </div>
            <?php
        }
    }?>
</div>



    
    