# Proyecto IWG (nombre por definir)

## Información general

### Descripción proyecto
La intención de este proyecto es ayudar al estudio de los alumnos de la USM creando un espacio colaborativo donde se podrán hacer cuestionarios o videos hechos por alumnos.


### Integrantes

- Carlos Lagos (P201)
- Vicente Muñoz  (P201)
- Reinaldo Ramirez (P201)


## Instalación y modo de uso

### Requerimientos

Tener instalado lo siguiente:
- <a href="https://www.php.net/downloads.php">PHP</a>
- <a href="https://getcomposer.org/">Composer</a>

_Nota: Registra estos programas en la PATH._

### Instalación de paquetes

Ejecutar el siguiente comando en la carpeta de el repositorio.
```
composer install
```

### Comandos artisan

Lista de algunos comandos:
```
php artisan serve     (Desplegar en modo de desarrollo)
php artsian make:model  Nombre   (Crear Modelo, si se agrega -m al final se crea un modelo con migración)
php artisan make:migrate nombre     (Crear estrucutra de migracion en database/migrations)
php artisan migrate     (Migrar las tablas a la base de datos)
php artisan migrate:rollback     (Deshacer la última migración ejecutada y registrada en la base de datos)
php artisan migrate:reset     (Deshacer todas las migraciones de la base de datos)
```

### Tests

_No creados._


## Modo de trabajo

Se trabajara vía pull request para tener un mayor control de los cambios en la rama maestra

## Bitacora

```
Creación de el repositorio-blog y creación de el proyecto en laravel - 31/10/2020
```








