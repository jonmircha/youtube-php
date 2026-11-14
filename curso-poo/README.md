# Curso _POO_ con _PHP_ y _MySQL_

En esta carpeta encontrarás los códigos del [Curso de Programación Orientada a Objetos con _PHP_ y _MySQL_](https://www.youtube.com/watch?v=OminOd-O5r0&list=PLvq-jIkSeTUb2n_YcwsG47RFv69A63hME) de [Jonathan MirCha](https://jonmircha.com/): 43 videos, de las clases y los objetos a una aplicación _MVC_ completa con base de datos.

| Carpeta                      | Videos  | Contenido                                                                                                                       |
| ---------------------------- | :-----: | ------------------------------------------------------------------------------------------------------------------------------- |
| [`00POOenPHP`](./00POOenPHP) |  1 a 9  | Clases y objetos, herencia, polimorfismo, clases abstractas e interfaces, con figuras geométricas, teléfonos, perros y postres. |
| [`01MySQL`](./01MySQL)       | 10 a 17 | La base de datos del proyecto, Mexflix: su esquema, las sentencias _CRUD_, las consultas y su modelo relacional.                |
| [`02MVC`](./02MVC)           | 18 a 25 | El patrón Modelo Vista Controlador aplicado a la tabla `status`.                                                                |
| [`Mexflix`](./Mexflix)       | 26 a 43 | El proyecto final: una aplicación _MVC_ para administrar películas y series, con usuarios, sesiones y rutas.                    |

## Cómo correr Mexflix

1. Crea la base de datos `mexflix` con [`01MySQL/mexflix_schema.sql`](./01MySQL/mexflix_schema.sql), desde _phpMyAdmin_ o desde la terminal:

   ```bash
   mysql -u root -p < 01MySQL/mexflix_schema.sql
   ```

1. Si tu usuario o tu contraseña de _MySQL_ no son los de una instalación de _XAMPP_ (`root`, sin contraseña), cámbialos en [`Mexflix/models/Model.php`](./Mexflix/models/Model.php).
1. Levanta el servidor desde la carpeta del proyecto:

   ```bash
   cd Mexflix
   php -S localhost:8000
   ```

## Antes de usarlo como base

El curso es de 2017. Los conceptos siguen vigentes, pero el código tiene dos prácticas que hoy no recomiendo: guarda las contraseñas con `MD5` y arma las consultas concatenando los datos que escribe el usuario. En [mis notas sobre _PHP_](https://jonmircha.com/php) verás cómo se hace hoy, con `password_hash()` y consultas preparadas, y la sintaxis moderna de _PHP 8_.

## Mis redes

- 🦊 Visita mi web https://jonmircha.com
- 🔔 Suscríbete al canal https://youtube.com/@jonmircha
- 📬 Suscríbete a mi newsletter https://jonmircha.com/newsletter
- 🌮 ¿Me invitas un taco? https://jonmircha.com/taco
