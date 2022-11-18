<?php require_once INCLUDES . 'inc_header.php'; ?>
<?php require_once INCLUDES . 'inc_navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h1 class="my-3 float-start" >Proyectos creados</h1>
            <a href="proyectos/agregar" class="btn btn-success float-end"> Crear proyecto</a>
        </div>
        <div class="col-lg-12 col-12">

            <?php if (empty($d->proyectos->rows)) : ?>
                <div class="text-center py-3">
                    <img src="<?php echo IMAGES . 'pdf.png'; ?>" alt="" class="img-fluid" style="width: 100px; ">
                    <p class="text-muted"> No hay proyectos</p>
                </div>
            <?php else : ?>
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
                        <?php foreach ($d->proyectos->rows as $p) : ?>
                            <tr>
                                <td><?php echo sprintf('<a href="proyectos/ver/%s">%s</a>', $p->id, $p->numero ); ?></td>
                                <td><?php echo add_ellipsis($p->titulo, 50); ?></td>
                                <td><?php echo format_proyecto_estado( $p->status); ?></td>
                                <td><?php echo format_date($p->creado); ?></td>
                                <td>
                                    <div class="bt-group">
                                        <a href="<?php echo sprintf("proyectos/ver/%s", $p->id); ?>" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i></a>
                                        <a href="<?php buildURL(sprintf('proyectos/borrar/%s', $p->id)); ?>" class="btn btn-danger btn-sm confirmar"> <i class="fas fa-trash"></i></a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $d->proyectos->pagination?>
            <?php endif; ?>
        </div>

    </div>

</div>

<?php require_once INCLUDES . 'inc_footer.php'; ?>