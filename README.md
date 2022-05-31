# Miskatonic
> Nicolás Moreno Sánchez
![Imagen presentacion](https://user-images.githubusercontent.com/91120049/161498683-57323a1b-316b-4078-8ec0-7c7caa3ee5ed.png)

Guía de usuario (no terminada): https://docs.google.com/document/d/1kCZPMeb8tJxEAAemSH0SjkHLttAI_EDRDKMS3iPBLAk/edit?usp=sharing

## Semana 1 (Viernes 15 de abril)

Creación del proyecto con Laravel. He estado realizando el sistema de clases de CSS para facilitarme el diseño en el futuro
(\resources\css\styles.css). He comenzado la creación de la vista de la página de inicio (para aquellos usuarios no
registrados), es completamente estática, no tiene conexión con el backend por ahora.

## Semana 2 (Viernes 22 de abril)

He completado casi al completo el diseño de la página de inicio, que además ha sido configurada correctamente como tal
en Laravel. El sistema de autenticación ya está configurado, aunque es necesario aplicar los estilos a los formularios
de login y registro.

## Semana 3 (Viernes 29 de abril)

He comenzado a dividir el diseño en módulos para facilitar su uso (nav, content, footer, etc). También, he creado las migraciones de la base de datos, y finalmente he creado una tabla más de las que tenía previstas (bookmark), para almacenar la última página leída de cada libro que comienze a leer el usuario (es una nueva tabla intermedia entre usuario y libro).

## Semana 4 (Viernes 06 de mayo)

Creación de los sliders en la página de home (no están conectados a la base de datos aún, funcionan de forma estática). He estado
trabajando en el sistema de autenticación; los usuarios ya pueden registrarse e iniciar sesión. Hay correción de errores
únicamente en el login por ahora. Aún no se distingue entre usuarios normales y administradores.

## Semana 5 - Checkpoint (Viernes 13 de mayo): https://www.youtube.com/watch?v=0Pke4Tyd-XE

Al ser la semana de la revisión, eplicaré un poco por encima todo lo hecho hasta ahora. En tema de CSS he creado ya todos los
elementos y componentes que pienso usar en la aplicación. La mayoría de páginas disponibles para el usuario están todas
disponibles (tan solo me queda conectarlas con el backend). En cuanto a JS, el visualizador de PDFs es ya 
funcional, tan solo me queda conectarlo con el backend para que lleguen los archivos. Además, he cread varios sliders a lo
largo de la página. Actualmente estoy trabajando con Laravel. La base de datos ya ha sido creada y el sistema de login
ya funciona, tan solo me queda añadir validación en el formulario de registro. Estoy realizando el CRUD que estará
disponible para los administradores (ya se difenrencia entre los ds tipos de usuarios) para que puedan poblar la base 
de datos, la mayoría de las tablas que quiero que tengan un CRUD ya lo tienen. Para ciertas tablas es posible que las
gestione con Ajax Jquery en vez de los controladores porque necesito que los datos se manejen en tiempo real.

## Semana 6 (Viernes 20 de mayo)

El rerproductor está finalizado casi al completo. La funcionalidad para que el libro se abra por la última página leída ya ha
sido implementada. Además, todo libro que empieze a leerse se almacenará en una lista (en la que también se elimina
automáticamente cuando lea la última página) para que pueda acceder más facilmente. El usuario ya puede añadir 
libros a su lista para leer más tarde.

Todas las vistas son ya dinámicas y están conectadas con la base de datos.

El buscador de libros ha sido creado. He usado Ajax para que los resultados vayan apareciendo 'onkeyup' y no al hacer
click en un botón.

## Semana 7 (Viernes 27 de mayo)

Creadas dos nuevas vistas: al hacer click en un autor o un género, el usuario irá a una vista en la que se le mostrarán los 
libros de formas filtrada. 

El usuario puede cambiar el color de fondo del reproductor entre blanco y sepia.

Han sido añadidos tanto los middlewares de autenticación como de roles (para controlar que solo el administrador pueda
acceder al panel de control).

Actualizado el buscador, ahora se pueden buscar libros tanto por título como por autor.

El administrador ya puede actualizar los archivos multimedia y las relaciones foráneas.

Los datos son validados en todos los formularios (login y panel de administración).

El usuario puede cambiar entre inglés y español.

## Semana 8 (Viernes 03 de junio)

El usuario puede cambiar la información de su perfil, incluido la información sobre su tarjeta de crédito, para lo cual
deberá confirmar su contraseña (en ningún momento se muestra la información completa de la tarjeta, tan sólo los
últimos dígitos del número de la tarjeta).

La tabla de usuarios ha sido actualizada. Ahora podrá ver desde su perfil cuando es su próximo pago, teniendo en cuenta
si es mensual o anual.

Ha sido añadida una nueva tabla para que el administrador pueda seleccionar los libros que aparecen en el slider
principal.

### TO DO:

	- Revisión de bugs y correcciones

### INTRODUCCIÓN

**Miskatonik** es una biblioteca online que contedrá información, obras y biografías sobre el escritor **H.P. Lovecraft**
y sus allegados. Las funciones de la web serán:

	● Sistema de login. Se diferenciará entre al menos dos tipos de usuarios (administrador y 
	suscriptor). No se permitirá el acceso más allá de la página de inicio a aquellos que no
	tengan cuenta en la web :heavy_check_mark:	
		
	● Sistema de administración. Se podrá subir nuevo contenido, además de modificar 
	y eliminar el existente :heavy_check_mark:	
		
	● Lector de PDFs. Mediante la librería PDF.js crearé un reproductor personalizado en el 
	que el usuario podrá leer los libros que desee :heavy_check_mark:	
	
	● Marcapáginas. El usuario podrá seguir de forma automática por la última página que haya 
	leido al abrir de nuevo el libro :heavy_check_mark:	
		
	● Colores. El usuario podrá cambiar los colores del reproductor para leer de forma 
	cómoda :heavy_check_mark:	
		
	● Favoritos. El usuario podrá guardar en favoritos aquellos libros que desee :heavy_check_mark:	
		
	● Sistema de búsqueda. A través de una barra de búsqueda el usuario podrá buscar el 
	contenido :heavy_check_mark:	
		
	● Responsive. La aplicación estará adaptada a pantallas web y móviles :heavy_check_mark:

### TECNOLOGÍA

En un principio, el proyecto será construido mediante:

	● Laravel, para el backend y el scaffolding.

	● JavaScript y CSS para el frontend.

	● Jquery para manipular ciertos elementos del DOM.

	● MySQL para las bases de datos.

### SCAFFOLDING

La web contará con páginas ocultas solo accesibles para los administradores, además de una 
página inicial que será accesible para todos los usuarios. Para poder usar la web con normalidad 
será necesario la creación de una cuenta por parte del usuario. Tendrá varias páginas disponibles; 
menú inicial, menú de busqueda, listas, autores, etc. Mediante JS añadiré elemtos que faciliten el
uso de la web, como sliders, galerías, listas, etc.

### SISTEMA DE DISEÑO

Mi objetivo es crear un **sistema de diseño** mediante CSS con clases predefinifas para facilitarme 
en un futuro la creación del estilo de la web. Crear mi propio 'TailwindCSS'. Tendré un estilo predefinido
desde el principio para crear una web compacta y cohesionada. Tipografía, colores, espaciado y atributos 
similares serán claramente definidos desde primer momento.
	
> Puedes consultar la evolución del sistema de diseño en: https://github.com/nicoms13/django-designsystem.git
El sistema de diseño no está aún actualizado a la temática porque he decido cambiarla recientemente (por eso
el nombre es django).

![Imagen home](https://i.gyazo.com/e3f892871442f620f93a0a9ef60be9c7.png)

![Imagen table](https://i.gyazo.com/ad4a6e74843f3282263c3219ce4fc688.png)

![Imagen logg](https://i.gyazo.com/c1bae1fa37285902bf8c93fc4e1dc5de.png)

![Imagen home](https://i.gyazo.com/f5f7f128463836d680e4a0145888657f.png)

![Imagen pdf](https://i.gyazo.com/57622939e468c545096de3df957a5520.png)

### BASE DE DATOS

Las tablas que formarán la base de datos serán Usuario, Libro (la cual tendrá un campo para diferenciar
entre películas y series), Categoría, libroCategoría (tabla intermedia), Autor, libroAutor (tabla 
intermedia) y Lista (tabla donde se almacenará el ID del usuario y el ID del libro que quiera guardar).

En la tabla usuarios se almacenará además el tipo de perfil del usuario, para diferenciar entre 
administradores y usuarios normales. La tabla Libro heredará una clave foránea, el ID del 
autor. He decidido no crear una tabla intermedia entre la relación Lista y Usuario porque el
usuario tendrá únicamente una Lista en la que añadirá los títulos favoritos, por lo que me 
parecía redundante crear una tabla intermedia. Entre libro y autor será necesario una tabla 
intermedia porque ciertos libros están escritos por más de un autor.

![Imagen bd](https://user-images.githubusercontent.com/91120049/161692122-9c2df334-bdf9-4d82-b6b8-959b5622d01f.png)
> Click en la imagen para verla a mejor resolución

![Imagen sql](https://i.gyazo.com/ca95345ceb75242116881db4f3849fd9.png)

### DESPLIEGUE

La aplicación será desplegada en un hosting gratuito, posiblemente InfinityFree o Heroku. Por lo tanto el nombre
de dominio tendrá publicidad del host utilizado. En cuanto a la base de datos, se que si finalmente uso
InfinityFree, el host te provee automáticamente un servidor diferente para almacenar la base de 
datos. Desconozco si Heroku también lo permite, en caso de que sí, no tendré ningún problema en dividir
aplicación y base de datos.