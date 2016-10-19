<?php
$db_handle = new mariamedebe();
?>
<section class="left">
    <h2>Noticias</h2>
    <?php
    $noticias = $db_handle->runQuery("SELECT idnoticia,titulo, left(contenido,194) AS acortar, img FROM noticias ORDER BY idnoticia DESC LIMIT 4");
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
    <a href="noticias" target="blank"><strong>Ver más noticias</strong></a>
    <a href="eventos" target="blank"><strong>Ver más eventos</strong></a>
</section>