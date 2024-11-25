# Time Tracker

Time Tracker es una aplicación web desarrollada para gestionar tareas. Este proyecto está construido con un backend en **Symfony** y un frontend en **React**. Implementa una arquitectura hexagonal y sigue principios de diseño como **SOLID** y **DDD (Domain Driven Design)**.

## Tabla de Contenidos

- [Características](#características)
- [Requisitos Previos](#requisitos-previos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Tecnologías Usadas](#tecnologías-usadas)
- [Arquitectura](#arquitectura)

---

## Características

- **Backend**:
  - Gestión de tareas (crear, listar, y obtener detalles).
  - Implementado con Symfony.
  - Arquitectura hexagonal y principios SOLID.
  - Manejo de errores personalizados con excepciones.
  
- **Frontend**:
  - Interfaz para listar y crear tareas.
  - Enrutamiento con React Router DOM.
  - Integración con el backend mediante Axios.

---

## Requisitos Previos

Antes de comenzar, asegúrate de tener lo siguiente instalado:

- **PHP** (>= 8.1)
- **Composer**
- **Node.js** (>= 20.0.0)
- **npm** o **yarn**
- **Git**
- **Base de datos MySQL** o **MariaDB**

---

## Instalación

### Clonar el Repositorio

```bash
git clone https://github.com/mabechavez/time-tracker.git
cd time-tracker
```

### Configurar el Backend

1. Ve a la carpeta `backend`:
   ```bash
   cd backend
   ```
2. Instala las dependencias de PHP:
   ```bash
   composer install
   ```
3. Configura las variables de entorno:
   Crea un archivo `.env.local` y añade los detalles de conexión de la base de datos:
   ```
   DATABASE_URL="mysql://usuario:contraseña@127.0.0.1:3306/nombre_base_datos"
   ```
4. Genera la base de datos:
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```
5. Corre el servidor de desarrollo:
   ```bash
   symfony serve
   ```

### Configurar el Frontend

1. Ve a la carpeta `frontend`:
   ```bash
   cd frontend
   ```
2. Instala las dependencias de JavaScript:
   ```bash
   npm install
   ```
3. Inicia el servidor de desarrollo:
   ```bash
   npm start
   ```

---

## Uso

1. Abre el navegador e ingresa al frontend (por defecto, `http://localhost:3000`).
2. Desde la interfaz de usuario, puedes:
   - Ver la lista de tareas.
   - Crear nuevas tareas.
3. Los cambios en el backend pueden verificarse en `http://localhost:8000`.

---

## Tecnologías Usadas

- **Backend**:
  - Symfony 6
  - PHP 8.1
  - MySQL / MariaDB
  - Doctrine ORM

- **Frontend**:
  - React
  - React Router DOM
  - Axios
  - HTML5 y CSS3

---

## Arquitectura

El proyecto sigue una arquitectura hexagonal, donde:

- **Capa de Dominio**:
  - Entidades y Value Objects.
  - Reglas de negocio encapsuladas.
  
- **Capa de Aplicación**:
  - Casos de uso como `CreateTaskUseCase`.

- **Capa de Infraestructura**:
  - Repositorios persistentes con Doctrine.
  - Controladores en Symfony para manejar la API.

- **Frontend**:
  - Componentes reutilizables en React.
  - Comunicación con el backend mediante Axios.
