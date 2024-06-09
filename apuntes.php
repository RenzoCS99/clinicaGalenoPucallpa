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