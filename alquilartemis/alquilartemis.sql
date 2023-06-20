CREATE DATABASE alquilartemis;

USE alquilartemis;


CREATE TABLE empleados (
    empleadoId INT PRIMARY KEY auto_increment,
    nombreEmpleado VARCHAR(255) NOT NULL,
    celularEmpleado INT NOT NULL,
    cargo VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY auto_increment,
    empleadoId INT NOT NULL,
    usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId)
);

CREATE TABLE constructoras_clientes (
    clientesId INT PRIMARY KEY auto_increment,
    nombreConstructora VARCHAR(255) NOT NULL,
    empleadoEncargado INT NOT NULL,
    fecha VARCHAR(255) NOT NULL,
    FOREIGN KEY (empleadoEncargado) REFERENCES empleados(empleadoId)

);

CREATE TABLE productos (
    productosId INT PRIMARY KEY auto_increment,
    nombreProducto VARCHAR(255) NOT NULL,
    tipoProducto VARCHAR(255) NOT NULL,
    descripcionProducto VARCHAR(255) NOT NULL,
    precioUnitario VARCHAR(255) NOT NULL,
    stock VARCHAR(255) NOT NULL
);

CREATE TABLE detalle_cotizacion ( 
    detalleId INT PRIMARY KEY auto_increment,
    cliente INT NOT NULL,
    productosAlquilados INT NOT NULL,
    fechaAlquilado VARCHAR(255) NOT NULL,
    horaAlquiler VARCHAR(255) NOT NULL,   
    duracionAlquiler VARCHAR(255) NOT NULL, 
    precioDiaAlquiler VARCHAR(255) NOT NULL,
    totalCotizacion VARCHAR(255) NOT NULL,
    FOREIGN KEY (cliente) REFERENCES constructoras_clientes(clientesId), 
    FOREIGN KEY (productosAlquilados) REFERENCES productos(productosId) 
);

CREATE TABLE facturacion (
    facturacionId INT PRIMARY KEY auto_increment,
    clienteId INT NOT NULL,
    empleadoId INT NOT NULL,
    cotizacionId INT NOT NULL,
    fechaFacturacion VARCHAR(255) NOT NULL,
    FOREIGN KEY (clienteId) REFERENCES constructoras_clientes(clientesId),
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId),
    FOREIGN KEY (cotizacionId) REFERENCES detalle_cotizacion(detalleId)

);

CREATE TABLE obras (

    obraId INT PRIMARY KEY auto_increment,
    clienteId INT NOT NULL,
    nombreObra VARCHAR(255) NOT NULL,
    lugarObra VARCHAR(255) NOT NULL,
    FOREIGN KEY(clienteId) REFERENCES constructoras_clientes(clientesId)

);


CREATE TABLE alquiler (

    alquilerId INT PRIMARY KEY auto_increment,
    clientesId INT NOT NULL,
    fechaAlquiler VARCHAR(255) NOT NULL,
    horaAlquiler VARCHAR(255) NOT NULL,
    subtotalPeso VARCHAR(255) NOT NULL,
    empleadoId INT NOT NULL,
    placaTransporte VARCHAR(255) NOT NULL,
    observaciones VARCHAR(255) NOT NULL,
    FOREIGN KEY (clientesId) REFERENCES constructoras_clientes(clientesId),
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId)   
);

CREATE TABLE alquiler_detalle (

    alquilerDetalleId INT PRIMARY KEY auto_increment,
    productosId INT NOT NULL,
    obraId INT NOT NULL,
    cantidadAlquiler VARCHAR(255) NOT NULL,
    cantidadPropia VARCHAR(255) NOT NULL,
    cantidadSubAlquilada VARCHAR(255) NOT NULL,
    valorUnidad VARCHAR(255) NOT NULL,
    fechaStandBy VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    valorTotal VARCHAR(255) NOT NULL,
    empleadoId INT NOT NULL,
    FOREIGN KEY (productosId) REFERENCES productos(productosId),
    FOREIGN KEY (obraId) REFERENCES obras(obraId),
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId)

);

CREATE TABLE devoluciones (

    devolucionesId INT PRIMARY KEY auto_increment,
    alquilerId INT NOT NULL,
    empleadoId INT NOT NULL,
    clienteId INT NOT NULL,
    fechaDevolucion VARCHAR(255) NOT NULL,
    horaDevolucion VARCHAR(255) NOT NULL,
    observaciones VARCHAR(255) NOT NULL, 
    FOREIGN KEY (alquilerId) REFERENCES alquiler(alquilerId),
    FOREIGN KEY (clienteId) REFERENCES constructoras_clientes(clientesId),
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId)

);

CREATE TABLE devoluciones_detalle (

    devolucionesDetalleId INT PRIMARY KEY auto_increment,
    devolucionesId INT NOT NULL,
    productoId INT NOT NULL,
    obraId INT NOT NULL,
    devolucionCantidad VARCHAR(255) NOT NULL,
    devolucionCantidadPropia VARCHAR(255) NOT NULL,
    devolucionCantidadSubAlquilada VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    FOREIGN KEY(devolucionesId) REFERENCES devoluciones(devolucionesId),
    FOREIGN KEY(productoId) REFERENCES productos(productosId),
    FOREIGN KEY(obraId) REFERENCES obras(obraId)

);

CREATE TABLE inventario (

    inventarioId INT PRIMARY KEY auto_increment,
    productoId INT NOT NULL,
    cantidadInicial VARCHAR(255) NOT NULL, 
    cantidadIngresos VARCHAR(255) NOT NULL,
    cantidadSalidas VARCHAR(255) NOT NULL,
    cantidadFinal VARCHAR(255) NOT NULL,
    fechaInventario VARCHAR(255) NOT NULL,
    tipoOperacion VARCHAR(255) NOT NULL, 
    FOREIGN KEY(productoId) REFERENCES productos(productosId)

);

CREATE TABLE liquidacion (

    liquidacionId INT PRIMARY KEY auto_increment,
    clienteId INT NOT NULL,
    alquilerId INT NOT NULL,
    valorQuincenalTotal VARCHAR(255) NOT NULL,
    valorMesTotal VARCHAR(255) NOT NULL,
    FOREIGN KEY (clienteId) REFERENCES constructoras_clientes(clientesId),
    FOREIGN KEY (alquilerId) REFERENCES alquiler(alquilerId)

);


