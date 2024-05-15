create database bd_ventas_ds504;

use bd_ventas_ds504;

create table tb_marca (
	codigo_marca char(5) not null primary key,
    marca varchar(30) not null);

create table tb_categoria (
	codigo_categoria char(5) not null primary key,
    categoria varchar(30) not null);

create table tb_producto (
	codigo_producto char(5) not null primary key,
    producto varchar(40) not null,
    stock_disponible int,
    costo float,
    ganancia float,
    producto_codigo_marca char(5) not null,
    producto_codigo_categoria char(5) not null,
    foreign key (producto_codigo_marca) references tb_marca (codigo_marca),
    foreign key (producto_codigo_categoria) references tb_categoria (codigo_categoria));

create table tb_departamento (
	codigo_departamento char(5) not null primary key,
	departamento varchar(25) not null);

create table tb_provincia (
	codigo_provincia char(5) not null primary key,
	provincia varchar(50) not null,
	provincia_codigo_departamento char(5) not null,
	foreign key (provincia_codigo_departamento) references tb_departamento (codigo_departamento));

create table tb_distrito (
	codigo_distrito char(5) not null primary key,
	distrito varchar(50) not null,
	distrito_codigo_provincia char(5) not null,
    foreign key (distrito_codigo_provincia) references tb_provincia (codigo_provincia));

create table tb_cliente (
	codigo_cliente char(5) not null primary key,
	nombre varchar(20) not null,
	ap_paterno varchar(20) not null,
	ap_materno varchar(20) not null,
	fecha_nacimiento date,
	direccion varchar(50),
	correo_electronico varchar(50),
	cliente_codigo_distrito char(5) not null,
    foreign key (cliente_codigo_distrito) references tb_distrito (codigo_distrito));
    
create table tb_venta (
codigo_venta char(5) not null primary key,
fecha date,
venta_codigo_cliente char(5),
monto float,
igv float,
foreign key (venta_codigo_cliente) references tb_cliente (codigo_cliente)
);

create table tb_detalle_venta (
dv_codigo_venta char(5),
dv_codigo_producto char(5),
cantidad int,
costo float,
descuento float,
foreign key (dv_codigo_venta) references tb_venta (codigo_venta), 
foreign key (dv_codigo_producto) references tb_producto (codigo_producto)
);

-- Completar 5 registros
insert into tb_marca values
('M0001', 'Sony'),
('M0002', 'LG'),
('M0003', 'Acer'),
('M0004', 'Samsung'),
('M0005', 'Asus');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_marca;

-- Completar 5 registros
insert into tb_categoria values
('C0001', 'Electrodoméstico'),
('C0002', 'Equipo de cómputo'),
('C0003', 'Smartphone'),
('C0004', 'Video Juegos'),
('C0005', 'Tv, audio y video');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_categoria;

-- Completar 4 registros
insert into tb_producto values
('P0001', 'Lavadora 13Kg', 100, 1420, 0.2, 'M0002', 'C0001'),
('P0002', 'Laptop Core i3 8GB SSD 250 GB', 54, 1762.45, 0.1635, 'M0003', 'C0002'),
('P0003', 'Samsung HT05 Audífonos Bluetooth', 85, 69, 0.5, 'M0004', 'C0005'),
('P0004', 'META QUEST 2 128GB LENTES', 95, 50, 0.6, 'M0005', 'C0004'),
('P0005', 'Mini Teclado Bluetooth', 30, 100, 0.3, 'M0005', 'C0002');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_producto;

-- Completar 10 registros
insert into tb_departamento values
('DP001','Lima'),
('DP002','Arequipa'),
('DP003','Ica'),
('DP004','Cajamarca'),
('DP005','Lambayeque'),
('DP006','Callao'),
('DP007','Loreto'),
('DP008','Puno'),
('DP009','Cuzco'),
('DP010','La Libertad');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_departamento;

-- Completar 15 registros
insert into tb_provincia values
('PR001','Lima', 'DP001'),
('PR002','Callao', 'DP001'),
('PR003','Huaral', 'DP001'),
('PR004','Cañete', 'DP001'),
('PR005','Arequipa', 'DP002'),
('PR006','Camaná', 'DP002'),
('PR007','Ica', 'DP003'),
('PR008','Chincha', 'DP003'),
('PR009','Pisco', 'DP003'),
('PR010','Puno', 'DP008'),
('PR011','Cuzco', 'DP009'),
('PR012','Trujillo', 'DP010'),
('PR013','Nazca', 'DP003'),
('PR014','Ramón Castilla', 'DP007'),
('PR015','Cutervo', 'DP004');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_provincia;

-- Completar 12 registros
insert into tb_distrito values
('D0001','Lima', 'PR001'),
('D0002','Callao', 'PR002'),
('D0003','San Martín de Porres', 'PR001'),
('D0004','Los Olivos', 'PR001'),
('D0005','Arequipa', 'PR005'),
('D0006','Cayma', 'PR005'),
('D0007','Ica', 'PR007'),
('D0008','Juliaca', 'PR010'),
('D0009','Paracas', 'PR007'),
('D0010','Alto Selva Alegre', 'PR005'),
('D0011','Cerro Azul', 'PR004'),
('D0012','Tambo de Mora', 'PR008');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_distrito;

-- Completar 5 registros
insert into tb_cliente values
('C0001', 'Carlos', 'Ramos', 'Vera', '1999-04-12', 'Av. Sauces 253', 'carlos.ramos258@gmail.com', 'D0003'),
('C0002', 'Rosa', 'Collantes', 'Flores', '2000-05-31', 'Jr. Álamos 354', null, 'D0001'),
('C0003', 'Felipe', 'Montes', 'Salas', '2001-09-22', 'Av. Flores 2541', 'fmontes.salas@gmail.com', 'D0003'),
('C0004', 'Viviana', 'Gonzáles', 'Roca', '2000-07-17', 'Calle Lomas 251', 'viviana.gr20@gmail.com', 'D0006'),
('C0005', 'Juan', 'Pérez', 'López', '1998-10-15', 'Av. Libertad 123', 'juan.perez@example.com', 'D0008');

-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_cliente;

-- Registros para tb_venta
insert into tb_venta (codigo_venta, fecha, venta_codigo_cliente, monto, igv) values
('V0001', '2024-04-01', 'C0001', 3000, 540),
('V0002', '2024-04-02', 'C0002', 2000, 360),
('V0003', '2024-04-03', 'C0003', 200, 36),
('V0004', '2024-04-04', 'C0004', 60, 10.8),
('V0005', '2024-04-05', 'C0005', 150, 27);
-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_venta;

-- Registros para tb_detalle_venta
insert into tb_detalle_venta (dv_codigo_venta, dv_codigo_producto, cantidad, costo, descuento) values
('V0001', 'P0001', 2, 2840, 0),
('V0002', 'P0002', 1, 1762.45, 0),
('V0002', 'P0003', 3, 138, 0),
('V0003', 'P0004', 1, 50, 0),
('V0004', 'P0005', 2, 100, 0);
-- Elaborado por SACA MACHACA CESAR FERNANDO
select * from tb_detalle_venta;

-- Procediminetos para Listar

-- sp_ListarDetalleVentas
delimiter $$
create procedure sp_ListarDetalleVentas()
begin 
	select * from tb_detalle_venta order by costo asc;
end; $$

drop procedure sp_ListarDetalleVentas;
call sp_ListarDetalleVentas();

-- sp_ListarMarcas
delimiter $$
create procedure sp_ListarMarca()
begin 
	select * from tb_marca;
end; $$
delimiter ;
drop procedure sp_ListarMarca;
call sp_ListarMarca();


-- sp_ListarVentas
DELIMITER $$
CREATE PROCEDURE sp_ListarVentas()
BEGIN
    SELECT v.codigo_venta, v.fecha, v.venta_codigo_cliente, CONCAT(c.nombre, ' ', c.ap_paterno, ' ', c.ap_materno) AS cliente, v.monto, v.igv
    FROM tb_venta v
    INNER JOIN tb_cliente c ON v.venta_codigo_cliente = c.codigo_cliente
    ORDER BY v.venta_codigo_cliente ASC;
END$$
DELIMITER ;

drop procedure sp_ListarVentas;
call sp_ListarVentas();

-- sp_ListarCategoria
delimiter $$
create procedure sp_ListarCategoria()
begin 
	select * from tb_categoria order by categoria asc;
end; $$

call sp_ListarCategoria();


-- sp_ListarProducto
delimiter $$ 
create procedure sp_ListarProducto()
begin
	select * from tb_producto order by stock_disponible desc;
end; $$

call sp_ListarProducto();


-- sp_BuscraProductoPorCodigo
delimiter $$ 
create procedure sp_BuscarProductoPorCodigo(in codprod char(5))
begin
	select * from tb_producto
	where codigo_producto = codprod;
end; $$

drop procedure sp_BuscarProductoPorCodigo;
call sp_BuscarProductoPorCodigo("P0001");


-- sp_RegistrarProducto
delimiter $$ 
create procedure sp_RegistrarProducto(
	in codprod char(5), in prod varchar(40), in stk int,
	in cst float, gnc float, codmar char(5), codcat char(5))
begin
	insert into tb_producto values (codprod, prod, stk, cst, gnc, codmar, codcat);
end; $$
select * from tb_producto;
call sp_RegistrarProducto('P0006', 'ASUS Vivobook 15 (X1504)', 55, 7000, 0.6, 'M0005', 'C0002');

-- sp_EditarProducto
delimiter $$ 
create procedure sp_EditarProducto(
	in codprod char(5), in prod varchar(40), in stk int,
	in cst float, gnc float, codmar char(5), codcat char(5))
begin
	update tb_producto set producto = prod, stock_disponible = stk, costo = cst,
				ganancia = gnc, producto_codigo_marca = codmar, producto_codigo_categoria = codcat
	where codigo_producto = codprod;
end; $$

call sp_EditarProducto('P0006', 'ASUS Vivobook 15 (X1504)', 55, 7000, 0.6, 'M0005', 'C0002');

select * from tb_producto;
-- sp_BorrarProducto
delimiter $$ 
create procedure sp_BorrarProducto(in codprod char(5))
begin
	delete from tb_producto
	where codigo_producto = codprod;
end; $$

drop procedure sp_BorrarProducto;
call sp_BorrarProducto('P0006');


-- sp_MostrarProductoPorCodigo
delimiter $$
CREATE PROCEDURE sp_MostrarProductoPorCodigo(
    IN codprod CHAR(5)
)
BEGIN
    DECLARE precio DECIMAL(10, 2);
    SELECT p.costo / (1 - (p.ganancia)) INTO precio
    FROM tb_producto p
    WHERE p.codigo_producto = codprod;

    SELECT p.codigo_producto, p.producto, p.stock_disponible, p.costo, p.ganancia, precio AS precio,m.marca AS nombre_marca, c.categoria AS nombre_categoria
    FROM tb_producto p
    INNER JOIN tb_marca m ON p.producto_codigo_marca = m.codigo_marca
    INNER JOIN tb_categoria c ON p.producto_codigo_categoria = c.codigo_categoria
    WHERE p.codigo_producto = codprod;
END; $$

drop procedure sp_MostrarProductoPorCodigo;
call sp_MostrarProductoPorCodigo("P0002");

select * from tb_producto;

-- sp_FiltrarProducto
DELIMITER //
CREATE PROCEDURE sp_FiltrarProducto(
    IN p_valor VARCHAR(40)
)
BEGIN
    SELECT 
        p.codigo_producto,
        p.producto,
        p.stock_disponible,
        p.costo,
        p.ganancia,
        m.marca AS nombre_marca,
        c.categoria AS nombre_categoria
    FROM 
        tb_producto p
    INNER JOIN 
        tb_marca m ON p.producto_codigo_marca = m.codigo_marca
    INNER JOIN 
        tb_categoria c ON p.producto_codigo_categoria = c.codigo_categoria
    WHERE 
        p.producto LIKE CONCAT('%', p_valor, '%')
        OR m.marca LIKE CONCAT('%', p_valor, '%')
        OR c.categoria LIKE CONCAT('%', p_valor, '%');
END //
DELIMITER ;

drop procedure sp_FiltrarProducto;
call sp_FiltrarProducto("Laptop");

-- 2

DELIMITER $$
CREATE PROCEDURE sp_FiltrarProductoss(
    IN producto VARCHAR(40)
)
BEGIN
    SELECT p.codigo_producto, p.producto, p.stock_disponible, p.costo, p.ganancia, m.marca AS nombre_marca, c.categoria AS nombre_categoria
    FROM tb_producto p
    INNER JOIN tb_marca m ON p.producto_codigo_marca = m.codigo_marca
    INNER JOIN tb_categoria c ON p.producto_codigo_categoria = c.codigo_categoria
    WHERE p.producto LIKE CONCAT('%', producto, '%');
END $$
