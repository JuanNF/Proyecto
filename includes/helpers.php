<?php

function  mostrarError ($errores, $campo){
    if(isset($campo) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
}


function borrarErrores(){
    if(!empty($_SESSION['errores'])){
        $_SESSION['errores'] = null;
    }
    if(!empty($_SESSION['completado'])){
        $_SESSION['completado'] = null;
    }
    if(!empty($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
    }
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $result= $categorias;
    }
    return $result;
} 
function conseguirUltimasEntradas($conexion){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4";
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas)>= 1){
        $resultado = $entradas;
    }
    return $entradas;
    
}
?>
