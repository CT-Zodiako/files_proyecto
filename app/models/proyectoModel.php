<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de proyecto
 */
class proyectoModel extends Model
{
  public static $t1   = 'proyectos'; // Nombre de la tabla en la base de datos;

  // Nombre de tabla 2 que talvez tenga conexión con registros
  //public static $t2 = '__tabla 2___'; 
  //public static $t3 = '__tabla 3___'; 

  function __construct()
  {
    // Constructor general
  }

  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM proyectos ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM proyectos ORDER BY id DESC';
    return PaginationHandler::paginate($sql);
  }


  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM proyectos WHERE id = :id LIMIT 1';

    $rows = parent::query($sql, ['id' => $id]);

    if (!$rows) return [];
    //si si existe el registro carga
    $rows = $rows[0];
    $sql = 'SELECT * FROM lacciones WHERE id_proyecto = :id_proyecto ORDER BY orden ASC';
    $rows['lacciones'] = ($lacciones = parent::query($sql, ['id_proyecto' => $rows['id']])) ? $lacciones : [];

    return $rows;
  }
}
