-- Eliminar las tablas existentes
DROP TABLE IF EXISTS Calendario,  Proyecto, Equipo, Sprint, Permisos, Rol, Incidencia, Historia, Prioridad, Documento, Usuario, Usuario_Rol, Usuario_Permiso, Reunion, Asiste, Notificacion, Backlog;

CREATE TABLE IF NOT EXISTS Calendario (
    codCalendario SERIAL PRIMARY KEY,
    fecha date,
    hora time,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp
);

CREATE TABLE IF NOT EXISTS Equipo (
    codEquipo SERIAL PRIMARY KEY,
    nombreEquipo VARCHAR(100),
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp
);

CREATE TABLE IF NOT EXISTS Proyecto (
    codProyecto SERIAL PRIMARY KEY,
    sigla varchar(15),
    nombreProyecto VARCHAR(100),
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp
);

CREATE TABLE IF NOT EXISTS Sprint (
    codSprint SERIAL PRIMARY KEY,
    nombreSprint VARCHAR(100),
    codproyecto integer,
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codproyecto) REFERENCES Proyecto(codproyecto)
);


CREATE TABLE IF NOT EXISTS Permisos (
    codPermisos SERIAL PRIMARY KEY,
    sitio TEXT,
    accion TEXT,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp
);

CREATE TABLE IF NOT EXISTS Rol (
    codRol SERIAL PRIMARY KEY,
    nombreRol VARCHAR(50),
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp
);

CREATE TABLE IF NOT EXISTS Incidencia (
    codIncidencia SERIAL PRIMARY KEY,
    codProyecto integer,
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codProyecto) REFERENCES Proyecto(codProyecto)
);


CREATE TABLE IF NOT EXISTS Prioridad (
    codPrioridad SERIAL PRIMARY KEY,
    valorPrioridad VARCHAR(50),
    bonificacion integer,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp
);

CREATE TABLE IF NOT EXISTS Historia (
    codHistoria SERIAL PRIMARY KEY,
    identificador varchar,
    bonificacion_final decimal,
    descripcionSolucion varchar,
    descripcionIncidencia varchar,
    codSprint integer,
    codCalendario integer,
    codPrioridad integer,
    tiempoEstimado time,
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codPrioridad) REFERENCES Prioridad(codPrioridad),
    FOREIGN KEY (codSprint) REFERENCES Sprint(codSprint),
    FOREIGN KEY (codCalendario) REFERENCES Calendario(codCalendario)
);

CREATE TABLE IF NOT EXISTS Documento (
    codDocumento SERIAL PRIMARY KEY,
    codHistoria integer,
    url VARCHAR(500),
    titulo VARCHAR(100),
    descripcion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codHistoria) REFERENCES Historia(codHistoria)
);

CREATE TABLE IF NOT EXISTS Usuario (
    codUsu SERIAL PRIMARY KEY,
    codEqu integer,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    nombreUsuario VARCHAR(50),
    contrasena TEXT,
    cedulaIdentidad VARCHAR(50),
    telefono VARCHAR(20),
    correo VARCHAR(100),
    fechaNacimiento DATE,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codEqu) REFERENCES Equipo (codEquipo)
);

CREATE TABLE IF NOT EXISTS Usuario_Rol (
    id_usuario_rol SERIAL PRIMARY KEY,
    codRol integer,
    codUsuario integer,
    fechaInicio DATE,
    fechaFin DATE,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codRol) REFERENCES Rol(codRol),
    FOREIGN KEY (codUsuario) REFERENCES Usuario(codUsu)
);

CREATE TABLE IF NOT EXISTS Usuario_Permiso (
    idTiup SERIAL PRIMARY KEY,
    codPermiso integer,
    codUsuario integer,
    fechaPermiso DATE,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codPermiso) REFERENCES Permisos(codPermisos),
    FOREIGN KEY (codUsuario) REFERENCES Usuario(codUsu)
);

CREATE TABLE IF NOT EXISTS Reunion (
    codReunion SERIAL PRIMARY KEY,
    codCalendario integer,
    motivo varchar(100),
    descripcion varchar(200),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codCalendario) REFERENCES Calendario(codCalendario)
);

CREATE TABLE IF NOT EXISTS Asiste (
    IdAsiste SERIAL PRIMARY KEY,
    codUsuario integer,
    codReunion integer,
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codUsuario) REFERENCES Usuario(codUsu),
    FOREIGN KEY (codReunion) REFERENCES Reunion(codReunion)
);

CREATE TABLE IF NOT EXISTS Notificacion (
    codNotificacion SERIAL PRIMARY KEY,
    codUsuario integer,
    contenidoNotificacion VARCHAR(500),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codUsuario) REFERENCES Usuario(codUsu)
);

CREATE TABLE IF NOT EXISTS Backlog (
    codBacklog SERIAL PRIMARY KEY,
    codHistoria integer,
    codUsuario_asignado_por integer,
    codUsuario_asignado_a integer,
    codUsuario_revision integer,
    estadoHistoria VARCHAR(50),
    estado_registro varchar(50),
    creado_por integer,
    modificado_por integer,
    fecha_creacion timestamp,
    fecha_modificacion timestamp,
    FOREIGN KEY (codHistoria) REFERENCES Historia(codHistoria)
);
