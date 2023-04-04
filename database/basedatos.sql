CREATE DATABASE tarea_mvc;
USE tarea_mvc;

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
fechaproduccion    DATE 		  NOT NULL,
fechavencimiento  DATE 			  NOT NULL,
estado				CHAR(1)       NOT NULL    DEFAULT'1'
)ENGINE = INNODB;

SELECT* FROM productos

INSERT INTO productos(nombreproducto, categoria, proveedor, descripcion, formato, restricciones, stock, precio, fechaproduccion, fechavencimiento)VALUES
('paracetamol','medicamento','Bayer','pastilla para algo','pastilla','venta con receta',40,1.50,'2021-05-12','2023-05-12')