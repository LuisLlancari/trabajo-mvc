CREATE DATABASE tarea_mvc;
USE tarea_mvc;
-- Hacemos una tabla de productos referente a los productos de las Farmacias
CREATE TABLE productos
(
idproducto 	 		INT    AUTO_INCREMENT  PRIMARY KEY,
nombreproducto   	VARCHAR(60)	  NOT NULL,
categoria			VARCHAR(70)   NOT NULL,
proveedor			VARCHAR(60)	  NOT NULL,
descripcion			VARCHAR(120)  NULL,
formato				VARCHAR(70)   NOT NULL,
restricciones		VARCHAR(120)  NOT NULL,
stock					INT     		  NOT NULL,
precio				DECIMAL(7,2)  NOT NULL,
fecharegistro     DATETIME			DEFAULT NOW(),
estado				CHAR(1)       NOT NULL    DEFAULT'1'
)ENGINE = INNODB;

SELECT* FROM productos

INSERT INTO productos(nombreproducto, categoria, proveedor, descripcion, formato, restricciones, stock, precio)VALUES
('paracetamol2','medicamento','Bayer','pastilla para algo','pastilla','venta con receta',40,1.50)


-- CREAMOS LOS PROCEDIMIENTOS ALMACENADOS
-- LISTAR

CALL spu_productos_listar()

DELIMITER $$
CREATE PROCEDURE spu_productos_listar()
BEGIN
	SELECT idproducto,
			 nombreproducto,
			 categoria,
			 proveedor,
			 descripcion,
			 formato,
			 restricciones,
			 stock,
			 precio
			 FROM productos
			 WHERE estado = '1'
			 ORDER BY idproducto DESC;
END $$


-- AGREGAR 

DELIMITER $$
CREATE PROCEDURE spu_productos_registrar
(
	IN nombreproducto_ 	VARCHAR(60),
	IN categoria_ 			VARCHAR(70),
	IN proveedor_     	VARCHAR(60),
	IN descripcion_      VARCHAR(120),
	IN formato_ 			VARCHAR(70),
	IN restricciones_    VARCHAR(120),
	IN stock_				INT,
	IN precio_				DECIMAL(7,2)
)
BEGIN
	INSERT INTO productos (nombreproducto, categoria, proveedor, descripcion, formato, restricciones, stock, precio) VALUES
	(nombreproducto_, categoria_ , proveedor_, descripcion_, formato_, restricciones_, stock_, precio_);
	END $$

-- PROCEDIMIENTO PAARA ELIMINAR
DELIMITER $$
CREATE PROCEDURE spu-productos_eliminar(IN idcurso_ INT)
BEGIN
	UPDATE productos
	SET estado = '0'
	WHERE idcurso = idcurso_;
END$$

