<?php
$db_handle = new mariamedebe();
//$db_handle2 = new mariamedebe();
$querymenu = $db_handle->runQuery("SELECT idmenu, nombre,submenu, enlace from menu");
?>
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>   
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="main-menu" class="nav navbar-nav mayus">
            <?php if (!empty($querymenu)){ 
                foreach($querymenu as $key=>$value){
                    if($querymenu[$key]['submenu'] == 0){     
                        $titulouno = urls_amigables($querymenu[$key]['nombre']); ?>
                        <li><a href="<?php echo ruta.$titulouno; ?>"><?php echo $querymenu[$key]['nombre']; ?></a></li>
                        <?php } elseif ($querymenu[$key]['submenu'] == 1){ ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $querymenu[$key]['nombre']; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $querymenuigual = $db_handle->runQuery("SELECT s.nombre as nombre, s.idsub as idsub, t.nombre as topic from menu m, submenu s, topico t where m.idmenu = '".$querymenu[$key]['idmenu']."' AND s.idmenu = '".$querymenu[$key]['idmenu']."' AND s.idtopico = t.idtopico");

                                if (!empty($querymenuigual)){ 
                                    foreach($querymenuigual as $key=>$value){
                                        $titulodos = urls_amigables($querymenuigual[$key]['nombre']);
                                        $topic = urls_amigables($querymenuigual[$key]['topic']);?>
                                        <li><a href="<?php echo ruta.$topic. "/". $querymenuigual[$key]['idsub']."/".$titulodos; ?>" target="_blank"><?php echo $querymenuigual[$key]['nombre']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <?php }?>
                                </li>
                                <?php
                            }
                        }
                    } ?>
                </ul>
            </div>
        </nav>