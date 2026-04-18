# Sistema Distribuido en Contenedores Docker

Sistema web con autenticacion de usuarios desarrollado con PHP y MySQL en contenedores Docker.

## Tecnologias
- Docker y Docker Compose
- PHP 8.1 + Apache
- MySQL 8.0

## Requisitos
- Docker Desktop instalado y corriendo

## Instalacion

Luego abre tu navegador en: http://localhost:8080

## Usuarios de Prueba
| Email | Contrasena | Rol |
|-------|------------|-----|
| admin@sistema.com | admin123 | Administrador |
| consulta@sistema.com | consulta123 | Consulta |
| ingreso@sistema.com | ingreso123 | Ingreso |

## Estructura del Proyecto

## Roles y Privilegios
| Rol | Permisos |
|-----|----------|
| Admin | CRUD completo de usuarios |
| Consulta | Solo lectura |
| Ingreso | Acceso basico |
