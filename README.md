# Backend Swapi Api
Este proyecto tiene como proposito emplear la Swapi API para la obtencion de informacion clave para el imperio. 
Mi mision debe ser tomada con seriedad, por eso cree endpoints especificos que seran definitivos para la lucha. 
### Link
https://closed-van-production.up.railway.app

## Correr en Local

Estar preparados debemos. Por eso lo primero es levantar el proyecto.

Clonemos el proyecto

```bash
  git clone https://github.com/ya1k96/backend
```
Con el repo listo, corramos el siguiente comando
```bash
  composer install
```
Una vez hayamos instalado las dependencias, lo siguiente es configurar nuestras variables de entorno.
Podes ayudarte del archivo que dejo preparado!
```bash
  .env.example
```
Lo importante es setear bien los datos de la BBDD y la variable `API_SWAPI`
(revisa el archivo mencionado arriba)

Y por ultimo hagamos correr las migraciones de las tablas.
```bash
  php artisan migrate
```
Y listo, ya estas preparado para emprender la lucha que se avecina. 
```bash
  php artisan serve
```

## API Reference
El tiempo es valioso. Asi que me tome la libertad de dejar una referencia sobre todos los endpoints a tu disposición.

### Authenticate
#### Register 

```http
  POST /api/register
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. Tu nombre soldado |
| `email`      | `string` | **Required**. Tu correo |
| `password`      | `string` | **Required**. Contraseña min(8) |

#### Login 

```http
  POST /api/login
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Tu correo |
| `password`      | `string` | **Required**. Contraseña |

### Vehicles
#### Get all items

```http
  GET /api/vehicles
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Token Bearer` | `string` | **Required** |
| `Accept` | `application/json` | **Required** |
| `limit` | `int` | **Optional** |
| `offset` | `int` | **Optional** |


#### Get item

```http
  GET /api/vehicles/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id del vehiculo |
| `Accept` | `application/json` | **Required** |

### People
#### Get all items

```http
  GET /api/people
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Token Bearer` | `string` | **Required** |
| `Accept` | `application/json` | **Required** |
| `limit` | `int` | **Optional** |
| `offset` | `int` | **Optional** |

#### Get item

```http
  GET /api/people/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id del personaje |
| `Accept` | `application/json` | **Required** |

### Planets
#### Get all items

```http
  GET /api/planets
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Token Bearer` | `string` | **Required** |
| `Accept` | `application/json` | **Required** |
| `limit` | `int` | **Optional** |
| `offset` | `int` | **Optional** |

#### Get item

```http
  GET /api/planets/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id del planeta |
| `Accept` | `application/json` | **Required** |


