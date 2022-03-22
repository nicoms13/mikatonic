# django
> Nicolás Moreno Sánchez
![Imagen presentacion](https://i.imgur.com/aUzttJS.jpg)

### INTRODUCCIÓN
	Mi aplicación consistirá en una **plataforma online de vídeo** para reproducir vídeos y series, de forma similar a otras
	aplicaciones como Netflix o Prime Video. El nombre de la aplicación será **Django**, y tendrá un estilo y temática similar 
	a Netflix. Las funcionalidades que quiero que tenga la aplicación son:

		● Sistema de login y registro, diferenciando entre administradores, usuarios registrados y usuarios no registrados.
		
		● Sistema de administración en el que se pueda subir nuevo contenido, además de modificar y eliminar el existente.
		
		● Reproducción de las películas y series en un reproductor creado por mí. Cada película o serie registrada tendrá
		asociado su vídeo, imágenes e información general. Muy probablemente se reproducirá el tráiler por tema de
		ahorro de espacio.
		
		● Posiblidad de que el usuario guarde en una lista de favoritos sus películas favoritas y aquellas que quiera guardar
		para ver más tarde. La lista funcionará a forma de CRUD, en la que el usuario podrá añadir, actualizar, ver y eliminar.
		
		● Un menú personalizado con los gustos del usuario, en el que le recomiende películas o series en función de sus
		gustos personales. Contendrá secciones que faciliten el uso de la web, como sliders con los títulos más 
		recientes, tops con los más vistos, etc.
		
		● Sistema de búsqueda desarrollado, para que el usuario pueda buscar con facilidad los títulos que desea tanto por su
		nombre como por su director.
		
		● La aplicación será completamente responsive, y contará con una versión para pantallas móviles.

### TECNOLOGÍA
	En un principio, el proyecto será construido mediante:

		● **Laravel**, para el backend y el scaffolding.
		
		● **JavaScript** y **CSS** para el frontend.
		
		● **Jquery** para manipular ciertos elementos del DOM.
		
		● **MySQL** para las bases de datos.
		
		* Durante mi periodo de prácticas estaré usando el framework de JS **Angular**, por lo que podría decidir en un
		futuro usarlo en el proyecto.

### SCAFFOLDING
	La web contará con páginas ocultas solo accesibles para los administradores, además de una página inicial que será
	accesible para todos los usuarios. Para poder usar la web con normalidad será necesario la creación de una cuenta
	por parte del usuario. Tendrá varias páginas disponibles; menú inicial, menú de busqueda, listas creadas, directores,
	etc. La estructura de la web será similar a la de cualquier otra platafoma de las mismas características.

### SISTEMA DE DISEÑO
	Mi objetivo es crear un **sistema de diseño** mediante CSS con clases predefinifas para facilitarme en un futuro la creación
	del estilo de la web. Crear mi propio 'TailwindCSS'. Tendré un estilo predefinido desde el principio para crear una web
	compacta y cohesionada. Tipografía, colores, espaciado y todo lo demás será claramente definidio desde primer momento.

### BASE DE DATOS
	Las tablas que formarán la base de datos serán Usuarios, Películas, Series, Categorías y Favoritas (tabla donde se
	almacenará el ID del usuario y el ID de la serie o película que quiera guardar). En la tabla usuarios se almacenará además el tipo 
	de perfil del usuario, para diferenciar entre administradores y usuarios normales. Las tablas Películas y Series heredarán 
	dos claves foráneas cada una, el ID del director y los IDs de las categorías. Por otro lado, la tabla favoritas almacenará un
	boolean para saber si se trata de una película o una serie, la clave foránea del ID del usuario y la de la película o serie 
	según corresponda.

> Esquema entidad/relación: https://gyazo.com/0e87e29b9c93448671c11dd879c0b2d2
