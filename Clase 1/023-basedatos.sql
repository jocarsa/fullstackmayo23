CREATE DATABASE aplicacion;
USE aplicacion;

CREATE TABLE `aplicacion`.`usuarios` (
    `Identificador` INT(255) NOT NULL AUTO_INCREMENT ,
    `nombredeusuario` VARCHAR(255) NOT NULL , 
    `mail` VARCHAR(255) NOT NULL , 
    `contrasena` VARCHAR(255) NOT NULL , 
    `nombrereal` VARCHAR(255) NOT NULL , 
    `fechadenacimiento` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`Identificador`)
) ENGINE = InnoDB;

INSERT INTO `usuarios` (
    `Identificador`, 
    `nombredeusuario`, 
    `mail`, `contrasena`, 
    `nombrereal`, 
    `fechadenacimiento`
) VALUES (
    NULL, 
    'raul', 
    'raul@mail.com', 
    'raul', 
    '', 
    ''
);


CREATE USER 'aplicacion'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';
GRANT USAGE ON *.* TO 'aplicacion'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `aplicacion`.* TO 'aplicacion'@'localhost';
