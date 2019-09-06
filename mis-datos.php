<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
    <?php if(!empty($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado']; ?>
            </div>
        <?php elseif (!empty($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif;?>
        <form action="actualizar-usuario.php" method="POST">
            <label fot="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            
            <?php echo isset($_SESSION['errores']['nombre']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
            
            <label fot="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            
            <?php echo isset($_SESSION['errores']['apellidos']) ? mostrarError($_SESSION['errores'], 'apellidos') : '';?>
            
            <label fot="email">Email</label>
            <input type="email" name="email"/>
            
            <?php echo isset($_SESSION['errores']['email']) ? mostrarError($_SESSION['errores'], 'email') : '';?>
            
            <input type="submit" name="submit" value="Actualizar"/>
        </form>
        <?php
            borrarErrores();
        ?>
</div>
<?php require_once 'includes/pie.php'; ?>