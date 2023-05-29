CREATE TABLE `aplicacion`.`clientes` (`Identificador` INT(255) NOT NULL AUTO_INCREMENT , `nombrecompleto` VARCHAR(255) NOT NULL , `correo` VARCHAR(255) NOT NULL , `usuario` VARCHAR(255) NOT NULL , `contrasena` VARCHAR(255) NOT NULL , `foto` VARCHAR(255) NOT NULL , PRIMARY KEY (`Identificador`)) ENGINE = InnoDB;

CREATE TABLE `aplicacion`.`mensajes` (`Identificador` INT(255) NOT NULL AUTO_INCREMENT , `emisor` VARCHAR(255) NOT NULL , `receptor` VARCHAR(255) NOT NULL , `mensaje` TEXT NOT NULL , PRIMARY KEY (`Identificador`)) ENGINE = InnoDB;


CREATE TABLE `aplicacion`.`registros` (`Identificador` INT(255) NOT NULL AUTO_INCREMENT , `fecha` VARCHAR(255) NOT NULL , `navegador` VARCHAR(255) NOT NULL , `ip` VARCHAR(255) NOT NULL , `pagina` VARCHAR(255) NOT NULL , PRIMARY KEY (`Identificador`)) ENGINE = InnoDB;
