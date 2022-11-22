<?php require_once INCLUDES . 'inc_header.php'; ?>
<?php require_once INCLUDES . 'inc_navbar.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-12 py-3">
      <h1 class="my-3 float-start"><?php echo $d->title; ?></h1>
      <a href="home" class="btn btn-danger float-end"> Regresar</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-3">
            <div class="card-header">Detalles del proyecto</div>
            <div class="card-body">
              <form id="temario_form">
                <div class="mb-3">
                  <label for="titulo">Titulo Proyecto</label>
                  <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $d->p->titulo; ?>">
                </div>

                <div class="mb-3">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" cols="3" rows="3"> <?php echo $d->p->descripcion; ?></textarea>
                </div>
                <button class="btn btn-success" type="submit">Guardar Cambios</button>
              </form>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header">Agregar Documento</div>
            <div class="card-body">
              <form id="add_laccion_form">
                <div class="mb-3">
                  <label for="l_titulo">Titulo Proyecto</label>
                  <input type="text" class="form-control" name="titulo" id="l_titulo" require>
                </div>

                <div class="mb-3">
                  <label for="l_tipo">Tipo de leccion</label>
                  <select name="tipo" id="l_tipo" class="form-select">
                    <?php foreach (get_tipo_lecciones() as $tipo) : ?>
                      <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="l_contenido">Contenido</label>
                  <textarea class="form-control" name="contenido" id="l_contenido" cols="3" rows="3"> </textarea>
                </div>
                <button class="btn btn-success" type="submit">Agregar</button>
              </form>
            </div>
          </div>

          <div class="card mb-3 d-none">
            <div class="card-header">Actualizar Documento</div>
            <div class="card-body">
              <form id="update_laccion_form">
                <input type="hidden" name="id" value="" require>
                <div class="mb-3">
                  <label for="ul_titulo">Titulo Proyecto</label>
                  <input type="text" class="form-control" name="titulo" id="ul_titulo" require>
                </div>

                <div class="mb-3">
                  <label for="ul_tipo">Tipo de leccion</label>
                  <select name="tipo" id="ul_tipo" class="form-select">
                    <?php foreach (get_tipo_lecciones() as $tipo) : ?>
                      <?php echo sprintf('<option value="%s">%s</option>', $tipo[0], $tipo[1]); ?>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="l_contenido">Contenido</label>
                  <textarea class="form-control" name="contenido" id="l_contenido" cols="3" rows="3"> </textarea>
                </div>
                <button class="btn btn-success" type="submit">Guardar cambios</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="wrapper_lecciones">
            <?php if (!empty($d->p->lacciones)) : ?>
              <div id="accordion">
                <?php foreach ($d->p->lacciones as $l) : ?>
                  <div class="group">
                    <h3><?php echo sprintf('%s %s', format_tipo_leccion($l->tipo), $l->titulo); ?></h3>
                    <div>
                      <?php echo empty($l->contenido) ? '<span class-"text-muted"> Sin contenido</span>' : $l->contenido; ?>
                      <div class="mt-3">
                        <div class="btn-group">
                          <button class="button btn btn-success bt-sm"> <i class="fas fa-edit"> </i></button>

                          <button class="button btn btn-danger bt-sm"> <i class="fas fa-trash"> </i> </button>


                        </div>

                        <button class=" btn btn-sm <?php echo $l->$status === 'pendiente' ? 'btn-warning text-dark' : 'btn-success '; ?>"> <i class="fas fa-check"></i> Lista</button>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>

              <?php else : ?>
                <div class="text-center py-3">
                  <img src="<?php echo IMAGES . 'pdf.png'; ?>" alt="" class="img-fluid" style="width: 100px; ">
                  <p class="text-muted"> No hay proyectos</p>
                </div>

              <?php endif; ?>

              </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<?php require_once INCLUDES . 'inc_footer.php'; ?>