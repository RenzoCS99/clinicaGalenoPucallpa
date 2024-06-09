Options All: Permite todas las opciones de Apache disponibles.
-Indexes: Deshabilita el listado de directorios. Esto significa que si alguien intenta acceder a un directorio sin un archivo índice (como index.html), 
no verá una lista de archivos en ese directorio. En su lugar, recibirá un error 403 (Prohibido).
Resumen: Esta línea impide que los visitantes puedan ver el contenido de los directorios, mejorando la seguridad de tu sitio web.

RewriteEngine On: Activa el motor de reescritura de URL de Apache. Esto permite usar reglas de reescritura para modificar la apariencia y el comportamiento 
de las URLs solicitadas por los usuarios.
Resumen: Esta línea habilita la funcionalidad de reescritura de URLs en Apache.

RewriteRule: Define una regla para reescribir URLs.
^([-a-zA-Z0-9/]+)$: Es una expresión regular que coincide con cualquier cadena de caracteres que:
Empieza (^) con una serie de caracteres que pueden ser letras (a-z y A-Z), números (0-9), y el carácter de barra diagonal (/).
Termina ($) después de la serie de esos caracteres.
index.php?url=$1: Reescribe la URL solicitada para que apunte a index.php, pasando la parte de la URL coincidente como un parámetro url.
Ejemplo de Funcionamiento:

Si un usuario visita http://tu-sitio-web/alguna/ruta, Apache redirigirá internamente esta solicitud a index.php?url=alguna/ruta.
Resumen: Esta línea reescribe todas las URLs que coinciden con el patrón especificado para que apunten a index.php, pasando la URL original como un parámetro llamado url.

Resumen General del Archivo .htaccess
Options All -Indexes: Evita que los visitantes vean el contenido de los directorios si no hay un archivo índice presente.
RewriteEngine On: Activa el motor de reescritura de URLs.
RewriteRule ^([-a-zA-Z0-9/]+)$ index.php?url=$1: Reescribe todas las URLs que coinciden con el patrón para que apunten a index.php, pasando la URL original como parámetro.
Uso Típico: Esta configuración es común en aplicaciones web que utilizan un solo punto de entrada, como frameworks MVC (Model-View-Controller) o aplicaciones de página 
única (SPA), donde todas las solicitudes se manejan a través de un archivo index.php que luego decide cómo procesar la solicitud basada en el parámetro url.


echo '<div class="wrapper">';: Esta línea imprime una etiqueta <div> con la clase wrapper en el documento HTML. Esto probablemente se usa para aplicar estilos CSS y estructurar el contenido dentro de este <div>.

$url = array();: Se define una variable $url como un array vacío. Esta variable se usará para almacenar partes de la URL.

if (isset($_GET["url"])): Esta línea verifica si existe una clave "url" en el array global $_GET. $_GET es un array asociativo en PHP que contiene parámetros pasados a través de la URL. Por ejemplo, si la URL es http://tu-sitio.com/index.php?url=inicio, $_GET["url"] tendrá el valor inicio.

$url[""] = explode("/", $_GET["url"]);: Si la clave "url" existe en $_GET, esta línea toma el valor de $_GET["url"], lo divide en partes utilizando / como delimitador, y almacena el resultado en el array $url con una clave vacía "". Por ejemplo, si $_GET["url"] es inicio, el resultado será array("inicio").

if ($url[0] == "inicio") {: Esta línea verifica si el primer elemento del array $url es igual a inicio.
include "modulo/" . $url[0] . ".php";: Si la condición es verdadera, incluye el archivo modulo/inicio.php. El operador . se usa para concatenar cadenas en PHP.
include "modulos/inicio.php";: Si la condición es falsa, incluye el archivo modulos/inicio.php. Esta es una ruta predeterminada que se utiliza si la URL no es inicio.

Resumen Básico
Imprime una etiqueta <div>: Se imprime una etiqueta <div> con la clase wrapper para estructurar el contenido.
Inicializa un array: Se inicializa un array $url.
Verifica la URL: Se verifica si hay un parámetro "url" en la URL de la página.
Divide la URL: Si existe el parámetro "url", se divide en partes usando / como delimitador y se guarda en el array $url.
Incluye un archivo basado en la URL:
Si la primera parte de la URL es inicio, incluye el archivo modulo/inicio.php.
Si no, incluye el archivo modulos/inicio.php.
Ejemplo Práctico
Si la URL es http://tu-sitio.com/index.php?url=inicio, se incluirá el archivo modulo/inicio.php.
Si la URL es http://tu-sitio.com/index.php?url=otra-pagina, se incluirá el archivo modulos/inicio.php.
Este mecanismo permite cargar diferentes módulos o páginas de manera dinámica según la URL que el usuario visita. Es una técnica común para crear aplicaciones web dinámicas donde el contenido cambia según la URL solicitada.

