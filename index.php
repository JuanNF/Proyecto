<?php require 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>
    <div id="principal">
        <h1>Ultimas Entradas</h1>
        <?php
        $entradas = conseguirUltimasEntradas($db);
        if(!empty($entradas)):
            while($entrada=mysqli_fetch_assoc($entradas)):
        ?>
            <article class="entrada">
                <a href="">
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
        endif;
        ?>
        <div id="ver-todas">
            <a href="">Ver todas las entradas</a>
        </div>
    </div>           
<?php require_once 'includes/pie.php';?>
