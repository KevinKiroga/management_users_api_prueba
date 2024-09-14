<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
</p>

# Requisitos para ejecutar el proyecto
- Editor de código: Un editor de código como Visual Studio Code o el que prefieras
- Base de datos: MySQL o XAMPP instalado, ya que el proyecto está configurado para trabajar con esta base de datos. Asegúrate de tener la versión más reciente de PHP (8.2.12) para evitar conflictos
- Gestión de archivos comprimidos: 7-Zip
- Gestor de dependencias: Composer para gestionar las dependencias y ejecutar Laravel
- Gestor de dependencias: Composer para gestionar las dependencias y ejecutar Laravel

# Configuracion del proyecto management_users_api_prueba
## 1. Clonar el Repositorio
Debes usar git para clonar el repositorio. Abre tu CMD y valla al siguiente directorio `C:/xampp/htdocs/`. Luego, ejecuta el siguiente comando:
```sh
    git clone https://github.com/KevinKiroga/management_users_api_prueba.git 
```

## 2. Acceder al proyecto
Después de clonar, cambia la direccion y entrar carpeta del proyecto usando:
```sh
    cd management_users_api_prueba
```

## 3. Abrir el proyecto
Puedes abrir el proyecto manualmente en tu editor de código preferido. Si tienes Visual Studio Code instalado, puedes abrir el proyecto usando:
```sh
    code .
```

## 4. Instalar Dependencias de Laravel
Instala las dependencias necesarias de Laravel utilizando Composer:
```sh
    composer i
```

## 5. Configurar el Archivo de .env
Renombra el archivo .env.example a .env:

## 6. Generar la APP KEY
Genera una nueva clave para la aplicación:
```sh
    php artisan key:generate
```

## 7. Generar la clave Secreta de JWT
Genere el token secreto de JWT con el siguiente comando:
```sh
    php artisan jwt:secret
```

## 8. Ejecutar las Migraciones de la Base de Datos
Ejecuta las migraciones de la base de datos:
```sh
    php artisan migrate
```
Si se te pregunta si deseas crear la base de datos, escribe yes.

## 8. Ejecutar los Seeder
Ejecuta los seeders para cargar datos iniciales en la base de datos:
```sh
    php artisan db:seed
```
## 9. Iniciar el Servidor
Inicia el servidor de Laravel:
```sh
    php artisan serve
```

# Auntenticacion de usuarios predeterminado
```json
{
    "mobile_phone": "1",
    "password": "password1"
}

{
    "mobile_phone": "2",
    "password": "password2"
}

{
    "mobile_phone": "3",
    "password": "password3"
}
```


# Endpoints o APIs

En este proyecto, puedes utilizar herramientas como [Hoppscotch](https://hoppscotch.io/) o Postman para probar los endpoints de la API.

| Método | Ruta                | Descripción                | Seguridad |
|:-------|:--------------------|:---------------------------|:----------|
| POST   | api/v1/users/login   | Inicia sesión de usuario    | NO        |
| GET    | api/v1/users         | Obtiene lista de usuarios   | NO        |
| GET    | api/v1/users/{user}  | Obtiene usuario por ID      | SI        |
| POST   | api/v1/users         | Crea nuevo usuario          | SI        |
| PUT    | api/v1/users/{user}  | Actualiza usuario por ID    | SI        |
| DELETE | api/v1/users/{user}  | Elimina usuario por ID      | SI        |


