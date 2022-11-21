<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de proyectos
 */
class proyectosController extends Controller
{
  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }
  }

  function index()
  {
    Redirect::to('home');
  }

  function ver($id)
  {
    if (!$proyecto = proyectoModel::by_id($id)) {
      Flasher::new('No existe el proyecto.','danger');
      Redirect::to('home');
    }
    $data =
      [
        'title' => sprintf('Proyecto #%s', $proyecto['numero']),
        'p'     => $proyecto
      ];
    View::render('ver', $data);
  }

  function agregar()
  {
    try {
      $data = [
        'numero' => rand(111111, 999999),
        'titulo' => '',
        'descripcion' => '',
        'status' => 'borrador',
        'creado' => now(),
        'actualizado' => now()

      ];

      if(!$id= proyectoModel::add(proyectoModel::$t1, $data)){
        throw new PDOException("Error al guardar el proyecto ");
      }

      Redirect::to(sprintf('proyectos/ver/%s', $id));
    } catch (PDOEXception $e) {
      Flasher::new($e->getMessage(), 'danger');
      Redirect::to('home');
    }
  }

  function post_agregar()
  {
  }

  function editar($id)
  {
    View::render('editar');
  }

  function post_editar()
  {
  }

  function borrar($id)
  {
    // Proceso de borrado
  }
}
