# Proyecto Biosinsa

Este proyecto es una aplicación web para el registro de usuarios y visualización de los usuarios registrados, utilizando PHP, MySQL y Bootstrap.

---

## Requisitos

- PHP 
- MySQL
- Composer (para cargar dependencias, si usas Dotenv)
- Navegador web moderno

---

## Instalación

1. Clona el repositorio
2. Instala dependencias 
3. Importa el backup de MySQL que se encuentra en backup.sql:
    - mysql -u [usuario] -p [nombre_base_datos] < backup.sql

4. Crea un archivo .env en la raíz del proyecto y agrega las siguientes variables con tus datos:
    - DB_HOST=
    - DB_USER=
    - DB_PASS=
    - DB_NAME=

5. En la terminal, ejecuta el servidor de desarrollo de PHP: 
    - php -S localhost:8000

