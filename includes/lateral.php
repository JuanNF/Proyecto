<aside id="sidebar">
    
    <?php if(isset($_SESSION['usuario'])):?>
        <div id="login" class="bloque">
            <h3><?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']?></h3>
            <a href="cerrar.php" class="boton boton-rojo">Cerrar Sesion</a>
            <a href="mis-datos.php" class="boton boton-verde">Mis datos</a>
            <a href="crear-entradas.php" class="boton boton-naranja">Crear Entradas</a>
            <a href="crear-categoria.php" class="boton">Crear Categorias</a>
        </div>
    <?php endif;?>
    <?php if(!isset($_SESSION['usuario'])):?>
    <div id="login" class="bloque">
        <h3>Indetificate</h3>
            <?php if(isset($_SESSION['error_login'])):?>
                <div class="alerta alerta-error">
                    <h3><?= $_SESSION['error_login']?></h3>
                </div>
            <?php endif;?>
            <form action="login.php" method="POST">
                
                <label fot="email">Email</label>
                <input type="email" name="email"/>
                <label fot="password">Contraseña</label>
                <input type="password" name="password"/>
                <input type="submit" value="Entrar"/>
            </form>
    </div>
    <div id="register" class="bloque">
        <h3>Registrate</h3>
        <?php if(!empty($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado']; ?>
            </div>
        <?php elseif (!empty($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif;?>
        <form action="registro.php" method="POST">
            <label fot="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            
            <?php echo isset($_SESSION['errores']['nombre']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
            
            <label fot="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            
            <?php echo isset($_SESSION['errores']['apellidos']) ? mostrarError($_SESSION['errores'], 'apellidos') : '';?>
            
            <label fot="email">Email</label>
            <input type="email" name="email"/>
            
            <?php echo isset($_SESSION['errores']['email']) ? mostrarError($_SESSION['errores'], 'email') : '';?>
            
            <label fot="password">Contraseña</label>
            <input type="password" name="password"/>
            
            <?php echo isset($_SESSION['errores']['password']) ? mostrarError($_SESSION['errores'], 'password') : '';?>
            
            <input type="submit" name="submit" value="Registrar"/>
        </form>
        <?php
            borrarErrores();
        ?>
    </div>    
    <?php endif; ?>
</aside>

