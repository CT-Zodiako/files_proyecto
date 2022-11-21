<?php

/**
 * La primera función de pruebas del curso de creando el framework MVC
 *
 * @return void
 */
function en_custom()
{
  return 'ESTOY DENTRO DE CUSTOM_FUNCTIONS.';
}

/**
 * Carga las diferentes divisas soporatadas en el proyecto de pruebas
 *
 * @return void
 */
function get_coins()
{
  return
    [
      'MXN',
      'USD',
      'CAD',
      'EUR',
      'ARS',
      'AUD',
      'JPY'
    ];
}

function get_proyectos_estados()
{
  return [
    ['borrador', 'Borrador'],
    ['completo', 'Completo']
  ];
}

function format_proyecto_estado($estado)
{

  $text   = '';
  $clases = '';
  $icon   = '';
  $output = '';
  $placeholder = '<span class="%s"> <i class="%s"></i> %s</span>';

  switch ($estado) {
    case 'borrador':
      $text = 'Borrador';
      $clases = 'btn btn-warning text-dark';
      $icon = 'fas fa-eraser';
      $output = sprintf($placeholder, $clases, $icon, $text);
      break;

    case 'completo':
      $text = 'Completo';
      $clases = 'btn btn-success ';
      $icon = 'fas fa-check';
      $output = sprintf($placeholder, $clases, $icon, $text);
      break;

    default:
      $text = 'Desconocido';
      $clases = 'btn btn-danger ';
      $icon = 'fas fa-question-circle';
      $output = sprintf($placeholder, $clases, $icon, $text);
      break;
  }

  return $output;


}

function get_tipo_lecciones(){
  return[
    ['texto', 'Texto'],
    ['video', 'Video'],
    ['descarga', 'Descarga'],
    ['recurso_externo', 'Recurso Externo'],
  ];
}
