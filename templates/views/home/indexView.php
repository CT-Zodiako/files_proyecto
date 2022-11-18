<?php require_once INCLUDES . 'inc_header.php'; ?>
<?php require_once INCLUDES . 'inc_navbar.php'; ?>

<div class="container">
    <div class="row">
    <div class="col-lg-12 col-12">
        <?php if(empty($d->proyectos->rows)):?>
            <div class="text-center py-3">
                <img src="<?php echo IMAGES.'pdf.png'; ?>" alt="" class="img-fluid" style="width: 100px; ">
                <p class="text-muted"> No hay proyectos</p>
            </div>
        <?php else: ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Titulo</th>
                    <th>Estado</th>
                    <th>Creado</th>
                    <th>Accion</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach($d->proyectos->rows as $p): ?>
                <tr>
                    <td><?php echo $p->numero; ?></td>
                    <td><?php echo add_ellipsis($p->titulo,50); ?></td>
                    <td><?php echo $p->status ?></td>
                    <td><?php echo format_date($p->creado); ?></td>
                    <td>...</td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif;?>
    </div>

    </div>
   
</div>

<?php require_once INCLUDES . 'inc_footer.php'; ?>