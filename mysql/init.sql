USE usuariosdb;

CREATE TABLE roles (
    id_rol INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(100)
);

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_rol INT,
    activo TINYINT DEFAULT 1,
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
);

CREATE TABLE sesiones (
    id_sesion INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    fecha_inicio DATETIME DEFAULT CURRENT_TIMESTAMP,
    ip VARCHAR(45),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE logs (
    id_log INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    accion VARCHAR(100),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

INSERT INTO roles (nombre, descripcion) VALUES
('admin', 'Control total del sistema'),
('consulta', 'Solo lectura'),
('ingreso', 'Acceso limitado al login');

INSERT INTO usuarios (nombre, email, password, id_rol) VALUES
('Administrador', 'admin@sistema.com', MD5('admin123'), 1),
('Usuario Consulta', 'consulta@sistema.com', MD5('consulta123'), 2),
('Usuario Ingreso', 'ingreso@sistema.com', MD5('ingreso123'), 3);
