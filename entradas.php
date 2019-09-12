<?php require 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>
    <div id="principal">
        <h1>Todas las Entradas</h1>
        <?php
        $entradas = conseguirEntradas($db, null, null);
        if(!empty($entradas) && mysqli_num_rows($entradas)>=1):
            while($entrada=mysqli_fetch_assoc($entradas)):
        ?>
            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?= $entrada['titulo']?></h2>
                        <p>
                            <?= substr($entrada['descripcion'],0, 200)."..." ?>
                        </p>
                        <span class="fecha">
                            <?= $entrada['categoria']." | ".$entrada['fecha'] ?>
                        </span>
                </a>
            </article>
        <?php
            endwhile;
        else:
        ?>
            <div class="alerta">No hay entradas en esta categoria</diV>
        <?php endif; ?>
    </div>           
<?php require_once 'includes/pie.php';?>

