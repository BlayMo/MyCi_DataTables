<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>CRUD&DataTables</title>
      <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
      <style type="text/css">
         ::selection { background-color: #E13300; color: white; }
         ::-moz-selection { background-color: #E13300; color: white; }
         body {
         background-color: #fff;
         margin: 40px;
         font: 13px/20px normal Helvetica, Arial, sans-serif;
         color: #4F5155;
         }
         a {
         color: #003399;
         background-color: transparent;
         font-weight: normal;
         }
         h1 {
         color: #444;
         background-color: transparent;
         border-bottom: 1px solid #D0D0D0;
         font-size: 19px;
         font-weight: normal;
         margin: 0 0 14px 0;
         padding: 14px 15px 10px 15px;
         }
         code {
         font-family: Consolas, Monaco, Courier New, Courier, monospace;
         font-size: 12px;
         background-color: #f9f9f9;
         border: 1px solid #D0D0D0;
         color: #002166;
         display: block;
         margin: 14px 0 14px 0;
         padding: 12px 10px 12px 10px;
         }
         #body {
         margin: 0 15px 0 15px;
         }
         p.footer {
         text-align: right;
         font-size: 11px;
         border-top: 1px solid #D0D0D0;
         line-height: 32px;
         padding: 0 10px 0 10px;
         margin: 20px 0 0 0;
         }
         #container {
         margin: 10px;
         border: 1px solid #D0D0D0;
         box-shadow: 0 0 8px #D0D0D0;
         }
      </style>
   </head>
   <body>
      <div id="container">
         <h1>CRUD&amp;DataTables</h1>
         <div id="body">
            <p>
                Ejemplo de implementación de <a href="https://github.com/IgnitedDatatables">IgnitedDatatables</a> en operaciones CRUD sobre tablas maestro-detalle
            </p>
            <article>
               He realizado varias vistas de tablas empleando IgnitedDatatables + Datatables y/o Pagination.<br/>
               El tiempo de construcción de la página figura al final de cada una, siendo la más rápida
               la página realizada con una simple paginación, sin el empleo de Datatables.<br/>
               La tabla maestra (Items) contiene 1000 registros. La tabla detalle (Subitems) contiene 5000 registros.
            </article>
            <br/>
            <p>
               <strong>Software empleado:</strong>
            <ul  type="circle">
               <li><a href="https://getbootstrap.com/docs/3.3/components/" target="_blank">Boostrap 3.3.7</a></li>
               <li><a href="https://codeigniter.com/" target="_blank">Codeigniter 3.1.9</a></li>
               <li><a href="https://github.com/IgnitedDatatables/Ignited-Datatables" target="_blank">Datatables (IgnitedDatatables 2.0 beta)</a></li>
               <li><a href="https://datatables.net/">Plugin Datatables 1.10 + jQuery</a></li>
               <li><a href="https://github.com/fzaninotto/Faker">Faker (Librer&iacute;a para generar datos falsos)</a></li>
               <li><a href="https://github.com/kenjis/codeigniter-composer-installer">CodeIgniter Composer Installer</a></li>
               <li><a href="https://bitbucket.org/harviacode/codeigniter-crud-generator" target="_blank">Codeigniter CRUD Generator 1.4 by </a><a href="http://harviacode.com/">harviacode.com</a></li>
            </ul>
            </p>
            <p>
               <strong>Instalaci&oacute;n</strong><br/>
            <ul  type="circle">
               <li>Descargue el fichero zip y descompr&iacute;malo en el directorio raiz de su servidor.</li>
               <li>Configure 'Database'.</li>
               <li>Importe el fichero myci_datatables.sql.</li>
               <li>Desde el menú 'Utiles', ejecute 'Nuevos Items&Subitems'.</li>
            </ul>
            </p>
            <p>
               <strong>Propósito</strong><br/>
            <ul  type="circle">
               <li>Pr&aacute;ctica y aprendizaje en el uso de DataTables, tanto el plugin como la librer&iacute;a.</li>
            </ul>
            </p>                              
            <p>
               <strong>Conclusiones</strong><br/>
               En mi opini&oacute;n la forma más sencilla de presentar  en la web tablas con miles de registros es empleando "CodeIgniter’s Pagination class". La librer&iacute;a
               "Pagination" que aporta Codeigniter.<br/>
               El empleo del plugin datatables + ignitedDatatables presenta cierta complejidad. La falta de ejemplos en IgnitedDatatables hace muy
               complejo resolver los errores que durante el desarrollo se presentan.
            </p>
            <p>
               <strong>Agradecimientos</strong><br/>
               Estoy profundamente agradecido a harviacode.com por su generador de c&oacute;digo que tanto ha simplificado el desarrollo de proyectos como &eacute;ste.<br/>
               As&iacute; mismo agradezco a los creadores de IgnitedDatatables y Datatables todo el trabajo realizado.
            </p>
            <p><strong>Licencia</strong><br/>
               El software de terceros se distribuye bajo sus respectivas licencias.<br/>
               El código desarrollado en el proyecto se distribuye bajo licencia MIT.<br/>
               Todo se ha desarrollado para ser compartido y con la intenci&oacute;n de que pueda ser de utilidad a otros desarrolladores.
               <a href="mailto:expresoweb2015@gmail.com" target="_blank"> Contacto</a>
            </p>
            <p>
            <center> <a class="btn btn-primary" href="<?=site_url('items')?>">Items Datatables</a>.</center>
            </p>
         </div>
         <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
      </div>
   </body>
</html>

