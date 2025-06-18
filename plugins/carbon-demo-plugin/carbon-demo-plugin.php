<?php
/*
Plugin Name: Demo Carbon Composer Plugin
Description: Ejemplo de uso de la librería Carbon con Composer en WordPress.
Version: 1.0
Author: Elián Medina
*/

add_action('init', function() {
    $autoload = __DIR__ . '/vendor/autoload.php';
    if (file_exists($autoload)) {
        require_once $autoload;

        $carbon = new \Carbon\Carbon('now', 'America/Bogota');
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $carbon->locale('es');
        $fecha_actual = $carbon->isoFormat('dddd, D [de] MMMM [de] YYYY, H:mm:ss');

        add_shortcode('carbon_demo_fecha', function() use ($fecha_actual) {
      return '<div style="
          display: inline-block;
          padding: 13px 32px;
          border-radius: 6px;
          background: rgba(255,255,255,0.1);
          color: #1b4965;
          border: 1px solid rgba(255,255,255,0.5);
          font-weight: 400;
          font-size: 0.9rem;
          letter-spacing: 0.01em;
          box-shadow: 0 2px 8px 0 rgba(27,73,101,0.07);
          margin: 10px 0 0 0;
          text-align: center;
          min-width: 220px;
          white-space: nowrap;
          font-family: \'Gafata\', sans-serif;
          ">
          <span style="color:rgba(255,255,255,0.5);">' . esc_html($fecha_actual) . '</span>
      </div>';
  });
    }
});
