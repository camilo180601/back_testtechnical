# Despliegue de API Laravel en Laravel Cloud

Esta guía detalla los pasos para desplegar una API desarrollada en Laravel utilizando **Laravel Cloud**, así como la configuración de la base de datos en este entorno.

## Requisitos Previos

- **Cuenta en Laravel Cloud**: Si aún no tienes una, regístrate en [Laravel Cloud](https://cloud.laravel.com/).
- **Repositorio Git**: Tu proyecto Laravel debe estar versionado en un repositorio Git accesible (por ejemplo, GitHub, GitLab).

## Pasos para el Despliegue

### 1. Crear un Nuevo Proyecto en Laravel Cloud

1. **Accede al Panel de Laravel Cloud**: Inicia sesión en tu cuenta de Laravel Cloud.
2. **Inicia un Nuevo Proyecto**:
   - Haz clic en "New Project" o "Nuevo Proyecto".
   - Asigna un nombre a tu proyecto y proporciona una breve descripción si lo deseas.
3. **Conecta tu Repositorio Git**:
   - Selecciona el proveedor de Git donde se encuentra tu código (GitHub, GitLab, etc.).
   - Autoriza a Laravel Cloud para acceder a tu cuenta de Git si es necesario.
   - Elige el repositorio que contiene tu proyecto Laravel.

### 2. Configurar Variables de Entorno

Laravel requiere ciertas variables de entorno para funcionar correctamente. Configura estas variables en Laravel Cloud:

1. **Accede a la Configuración del Proyecto**: Dentro de tu proyecto en Laravel Cloud, navega a la sección de configuración o "Settings".
2. **Establece las Variables de Entorno**:
   - `APP_ENV`: Establece este valor a `production`.
   - `APP_KEY`: Laravel Cloud puede generar una clave de aplicación automáticamente, o puedes establecerla manualmente.
   - `DB_CONNECTION`: Define el tipo de base de datos que utilizarás (por ejemplo, `mysql`).
   - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`: Estos valores serán proporcionados por Laravel Cloud al configurar la base de datos (ver siguiente sección).

### 3. Configurar la Base de Datos

Laravel Cloud facilita la creación y gestión de bases de datos:

1. **Crea una Nueva Base de Datos**:
   - Navega a la sección de bases de datos dentro de tu proyecto en Laravel Cloud.
   - Haz clic en "Crear Base de Datos" o similar.
   - Selecciona el tipo de base de datos (por ejemplo, MySQL) y define el nombre de la base de datos.
2. **Obtén las Credenciales de la Base de Datos**:
   - Una vez creada, Laravel Cloud proporcionará las credenciales necesarias (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
3. **Actualiza las Variables de Entorno**: Asegúrate de que las variables de entorno relacionadas con la base de datos estén correctamente configuradas con las credenciales proporcionadas.

### 4. Desplegar la Aplicación

Con el repositorio conectado y las variables de entorno configuradas, procede a desplegar la aplicación:

1. **Inicia el Despliegue**:
   - Dentro de tu proyecto en Laravel Cloud, haz clic en "Deploy" o "Desplegar".
   - Selecciona la rama del repositorio que deseas desplegar (por ejemplo, `main` o `master`).
2. **Monitorea el Proceso**: Laravel Cloud mostrará logs en tiempo real del proceso de despliegue. Verifica que no haya errores y que el despliegue se complete exitosamente.

### 5. Verificar la Aplicación en Producción

Una vez completado el despliegue:

1. **Accede a la URL Proporcionada**: Laravel Cloud asignará una URL temporal o definitiva a tu aplicación.
2. **Prueba la API**: Realiza solicitudes a tus endpoints para asegurarte de que la API funcione correctamente en el entorno de producción.

## Consideraciones Adicionales

- **Migraciones de Base de Datos**: Asegúrate de ejecutar las migraciones necesarias para crear las tablas en la base de datos:
  ```bash
  php artisan migrate --force

