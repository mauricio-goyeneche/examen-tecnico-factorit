# Acerca del proyecto

Este es un proyecto planeado por FactorIT para realizar un sistema académico sobre el framework Laravel de PHP.

-   Link del repositorio de [GitHub](https://github.com/mauricio-goyeneche/examen-tecnico-factorit).

## Tecnologías Utilizadas

Realicé este proyecto con:

-   [Xampp](https://www.apachefriends.org/es/index.html) v3.3.0, junto con PHP 7.4.29.
-   [Laravel](https://laravel.com/docs/9.x/releases) versión 9.x.
-   [Bootstrap](https://getbootstrap.com/docs/5.1/getting-started/introduction/) v5.1.3 instalado vía NPM, con customizaciones propias vía SASS.
-   MYSQL como gestor de base de datos con MariaDB v10.4.24.
-   [VSC](https://code.visualstudio.com/) como editor de texto preferido.

** No se hizo uso de JQuery durante el transcuro del proyecto. **

## Como utilizarlo

1. Descargar y descomprimir el [proyecto](https://github.com/mauricio-goyeneche/examen-tecnico-factorit) en tu entorno de desarrollo preferido (Por ejemplo: Xampp o Wampp).

2. Ejecutar el comando npm install para descargar todas las dependencias mediante NPM.

```sh
   npm install
```

3. Modificar archivo .env para que las variables de entorno apunten a la base de datos correctamente.
   Para eso, modificar las siguientes variables:

```sh
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=(tu nombre de base de datos)
    DB_USERNAME=root
    DB_PASSWORD=(password, si la tiene)
```

4. Ejecutar las migraciones, el proyecto ya crea las tablas con sus columnas y keys mediante migraciones pero no tienen datos insertados ni seeders que la alimenten.

```sh
   php artisan migrate
```

5. Compilar assets para que se actualicen los archivos de estilos en las vistas.

```sh
   npm run dev
```

6. Ejecutar el servidor con:

```sh
   php artisan serve
```
