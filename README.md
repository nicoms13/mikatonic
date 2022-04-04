# Miskatonic
> Nicolás Moreno Sánchez
![Imagen presentacion](https://user-images.githubusercontent.com/91120049/161498683-57323a1b-316b-4078-8ec0-7c7caa3ee5ed.png)

### INTRODUCCIÓN

**Miskatonik** es una biblioteca online que contedrá información, obras y biografías sobre el escritor **H.P. Lovecraft**
y sus allegados. Las funciones de la web serán:

	● Sistema de login. Se diferenciará entre al menos dos tipos de usuarios (administrador y 
	suscriptor). No se permitirá el acceso más allá de la página de inicio a aquellos que no
	tengan cuenta en la web.
		
	● Sistema de administración. Se podrá subir nuevo contenido, además de modificar 
	y eliminar el existente.
		
	● Lector de PDFs. Mediante la librería PDF.js crearé un reproductor personalizado en el 
	que el usuario podrá leer los libros que desee.
	
	● Marcapáginas. El usuario podrá seguir de forma automática por la última página que haya 
	leido al abrir de nuevo el libro.
		
	● Colores. El usuario podrá cambiar los colores del reproductor para leer de forma cómoda, 
	en principio podrá elegir entre día, noche y sepia.
		
	● Favoritos. El usuario podrá guardar en favoritos aquellos libros que desee.
		
	● Sistema de búsqueda. A través de una barra de búsqueda el usuario podrá buscar el 
	contenido.
		
	● Responsive. La aplicación estará adaptada a pantallas web y móviles.

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

### BASE DE DATOS

Las tablas que formarán la base de datos serán Usuario, Libro (la cual tendrá un campo para diferenciar
entre películas y series), Categoría, libroCategoría (tabla intermedia) Autor y Lista (tabla donde 
se almacenará el ID del usuario y el ID del libro que quiera guardar).

En la tabla usuarios se almacenará además el tipo de perfil del usuario, para diferenciar entre 
administradores y usuarios normales. La tabla Libro heredará una clave foránea, el ID del 
autor. He decidido no crear una tabla intermedia entre la relación Lista y Usuario porque el
usuario tendrá únicamente una Lista en la que añadirá los títulos favoritos, por lo que me 
parecía redundante crear una tabla intermedia. Entre libro y autor será necesario una tabla 
intermedia porque ciertos libros están escritos por más de un autor.

![Imagen bd](https://user-images.githubusercontent.com/91120049/161501089-adc8b8b1-5887-4330-b88e-c63ab7e34abd.png)
