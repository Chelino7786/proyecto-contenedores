# Sistema Distribuido en Contenedores Docker

Sistema web con autenticacion de usuarios desarrollado con PHP y MySQL en contenedores Docker, con sistema de backup automatico.

## Tecnologias
- Docker y Docker Compose
- PHP 8.1 + Apache
- MySQL 8.0 (base de datos principal)
- MySQL 8.0 (base de datos backup)

## Contenedores
| Contenedor | Imagen | Descripcion |
|------------|--------|-------------|
| contenedor_php | php:8.1-apache | Aplicacion web en puerto 8080 |
| contenedor_mysql | mysql:8.0 | Base de datos principal |
| contenedor_mysql_backup | mysql:8.0 | Base de datos de respaldo |

## Requisitos
- Docker Desktop instalado y corriendo
- Git instalado

## Instalacion

Luego abre tu navegador en: http://localhost:8080

## Usuarios de Prueba
| Email | Contrasena | Rol |
|-------|------------|-----|
| admin@sistema.com | admin123 | Administrador |
| consulta@sistema.com | consulta123 | Consulta |
| ingreso@sistema.com | ingreso123 | Ingreso |

## Roles y Privilegios
| Rol | Permisos |
|-----|----------|
| Admin | CRUD completo de usuarios |
| Consulta | Solo lectura |
| Ingreso | Acceso basico |

## Sistema de Backup
Para realizar un respaldo de la base de datos ejecutar:

Para verificar el backup:

## Estructura del Proyecto
