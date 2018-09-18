CRUD&DataTables
===============

Ejemplo de implementación de [IgnitedDatatables](https://github.com/IgnitedDatatables) en operaciones CRUD sobre tablas maestro-detalle

He realizado varias vistas de tablas empleando IgnitedDatatables + Datatables y/o Pagination.  
El tiempo de construcción de la página figura al final de cada una, siendo la más rápida la página realizada con una simple paginación, sin el empleo de Datatables.  
La tabla maestra (Items) contiene 1000 registros. La tabla detalle (Subitems) contiene 5000 registros.
  
**Software empleado:**

-   [Boostrap 3.3.7](https://getbootstrap.com/docs/3.3/components/)
-   [Codeigniter 3.1.9](https://codeigniter.com/)
-   [Datatables (IgnitedDatatables 2.0 beta)](https://github.com/IgnitedDatatables/Ignited-Datatables)
-   [Plugin Datatables 1.10 + jQuery](https://datatables.net/)
-   [Faker (Librería para generar datos falsos)](https://github.com/fzaninotto/Faker)
-   [CodeIgniter Composer Installer](https://github.com/kenjis/codeigniter-composer-installer)
-   [Codeigniter CRUD Generator 1.4 by](https://bitbucket.org/harviacode/codeigniter-crud-generator)[harviacode.com](http://harviacode.com/)

**Instalación**  

-   Descargue el fichero zip y descomprímalo en el directorio raiz de su servidor.
-   Configure 'Database'.
-   Importe el fichero myci\_datatables.sql.
-   Desde el menú 'Utiles', ejecute 'Nuevos Items&Subitems'.

**Propósito**  

-   Práctica y aprendizaje en el uso de DataTables, tanto el plugin como la librería.

**Conclusiones**  
En mi opinión la forma más sencilla de presentar en la web tablas con miles de registros es empleando "CodeIgniter’s Pagination class". La librería "Pagination" que aporta Codeigniter.  
El empleo del plugin datatables + ignitedDatatables presenta cierta complejidad. La falta de ejemplos en IgnitedDatatables hace muy complejo resolver los errores que durante el desarrollo se presentan.

**Agradecimientos**  
Estoy profundamente agradecido a harviacode.com por su generador de código que tanto ha simplificado el desarrollo de proyectos como éste.  
Así mismo agradezco a los creadores de IgnitedDatatables y Datatables todo el trabajo realizado.

**Licencia**  
El software de terceros se distribuye bajo sus respectivas licencias.  
El código desarrollado en el proyecto se distribuye bajo licencia MIT.  
Todo se ha desarrollado para ser compartido y con la intención de que pueda ser de utilidad a otros desarrolladores. [Contacto](mailto:expresoweb2015@gmail.com)

Page rendered in **0.0454** seconds. CodeIgniter Version **3.1.9**
