<?php 
switch ($_SESSION['tipo']) {
    case '3':
    header('Location: administrador'); 
    break;
    case '2':
    header('Location: personal'); 
    break;
    case '1':
    header('Location: alumnos');	    
    break;		 
    case '4':				
    header('Location: superadministrador');
    break;					
    default: echo 'Ups, no hay nada aca';						
}
?>	
