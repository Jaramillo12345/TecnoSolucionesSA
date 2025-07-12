CREATE TABLE Usuario (
    idusuario SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena TEXT NOT NULL,  -- Recomendado usar hashing seguro
    rol VARCHAR(50) DEFAULT 'empleado',  -- admin, empleado
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Cliente (
    idcliente SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    telefono VARCHAR(20),
    direccion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idusuario INT REFERENCES Usuario(idusuario)
);

CREATE TABLE Proyecto (
    idproyecto SERIAL PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
	idcliente INT REFERENCES Cliente(idcliente),
	idusuario INT REFERENCES Usuario(idusuario),
    fecha_inicio DATE,
    fecha_fin DATE,
    estado VARCHAR(50) DEFAULT 'En progreso' -- En progreso, Finalizado
);

CREATE TABLE Tarea (
    idtarea SERIAL PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    idproyecto INT REFERENCES Proyecto(idproyecto) ON DELETE CASCADE,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado VARCHAR(50) DEFAULT 'Pendiente' -- Pendiente, En progreso, Completada
);

CREATE TABLE Reporte (
    idreporte SERIAL PRIMARY KEY,
    idproyecto INT REFERENCES Proyecto(idproyecto),
    fecha_generacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ruta_pdf TEXT -- Ruta al archivo PDF generado
);


INSERT INTO Usuario (nombre, email, contrasena, rol) 
VALUES ('Jose Lopez', 'joselopez123@tecnosoluciones.com', '$2y$10$caE0udlG0wUMZODYGXqAiOJaqJ1tu3LI1hppNr05fZBZwZb879wdK', 'empleado'); --contrasena = 123

INSERT INTO Cliente (nombre, email, telefono, direccion, idusuario)
VALUES ('Carlos Lopez', 'carloslopez123@gmail.com', '123456789', 'Calle 123', 1);

INSERT INTO Proyecto (nombre, descripcion, idcliente, idusuario, fecha_inicio, fecha_fin, estado)
VALUES ('Sistema Web de Gestión', 'Desarrollo de sistema de gestión online', 1, 1, '2025-07-01', '2025-08-01', 'En progreso');

INSERT INTO Tarea (nombre, descripcion, idproyecto, fecha_inicio, fecha_fin, estado)
VALUES ('Diseño de base de datos', 'Modelar y crear la estructura de la base de datos', 1, '2025-07-02', '2025-08-02', 'Pendiente');

select * from Usuario;
select * from Cliente;
select * from Proyecto;
select * from Tarea;