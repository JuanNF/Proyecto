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
function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre,' ', u.apellidos) AS 'usuario'  FROM  entradas e inner join categorias c on e.categoria_id = c.id inner join usuarios u on e.usuario_id = u.id where e.id=$id";
    $entrada = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entrada && mysqli_num_rows($entrada)>=1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}
function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias where id = $id;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $result= mysqli_fetch_assoc($categorias);
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

function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c on e.categoria_id = c.id";
    if(!$busqueda==null){
        $sql .= " WHERE e.titulo like '%$busqueda%'"; 
    }
    if(!$categoria==null){
        $sql .= " WHERE e.categoria_id = $categoria"; 
    }
    $sql .=" ORDER BY e.id DESC";
    if(!$limit==null){
        $sql .= " limit 4"; 
    }
    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas)>= 1){
        $resultado = $entradas;
        return $entradas;
    }
    
}
?>
