-- -----------------------------------------------------
-- Schema appausadb
-- -----------------------------------------------------
create user 'appausa_user'@'%' identified by 'appausa2020';
CREATE SCHEMA IF NOT EXISTS `appausadb` DEFAULT CHARACTER SET utf8 ;
grant all privileges on appausadb.* to 'appausa_user'@'%';
USE `appausadb` ;
-- -----------------------------------------------------
-- TABLAS
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`tipo_contrato` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrip` VARCHAR(45) NOT NULL,
  `duracion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`));
  
CREATE TABLE IF NOT EXISTS `appausadb`.`elemento` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrpción` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`));
  
CREATE TABLE IF NOT EXISTS `appausadb`.`actividad` (
  `nombre` VARCHAR(45) NOT NULL,
  `elemento` VARCHAR(45) NOT NULL,
  `url` VARCHAR(45) NOT NULL unique,
  PRIMARY KEY (`nombre`),
  CONSTRAINT `fk_actividad_elemento`
    FOREIGN KEY (`elemento`)
    REFERENCES `appausadb`.`elemento` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
  
CREATE TABLE IF NOT EXISTS `appausadb`.`rol` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrpción` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`));
  
create table if not exists `appausadb`.`perfil` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrpción` VARCHAR(45) NOT NULL,
  `rol_asociado` VARCHAR(45) NOT NULL,
  `e` int(1) NOT NULL,
  primary key (nombre),
    CONSTRAINT `fk_perfil_rol`
    FOREIGN KEY (`rol_asociado`)
    REFERENCES `appausadb`.`rol` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS `appausadb`.`gestion_actividad` (
  `actividad` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(45) NOT NULL,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`actividad`,`perfil`),
  INDEX `fk_gestion_actividad_actividad_idx` (`actividad` ASC) ,
  CONSTRAINT `fk_gestion_actividad_actividad`
    FOREIGN KEY (`actividad`)
    REFERENCES `appausadb`.`actividad` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  INDEX `fk_gestion_actividad_perfil_idx` (`perfil` ASC) ,
  CONSTRAINT `fk_gestion_actividad_perfil`
    FOREIGN KEY (`perfil`)
    REFERENCES `appausadb`.`perfil` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `appausadb`.`usuario` (
  `cc` BIGINT(10) NOT NULL,
  `tipo_doc` VARCHAR(45)NOT NULL,
  `pnombre` VARCHAR(45) NOT NULL,
  `snombre` VARCHAR(45) NULL,
  `papellido` VARCHAR(45) NOT NULL,
  `sapellido` VARCHAR(45) NOT NULL,
  `fecha_nam` date NOT NULL,
  `edad` INT(2) NOT NULL,
  `correo_electronico` VARCHAR(150) NOT NULL unique,
  `telefono` BIGINT(10) NOT NULL unique,
  `rol` VARCHAR(45) NULL,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`cc`),
  INDEX `fk_usuario_rol_idx` (`rol` ASC) ,
  CONSTRAINT `fk_usuario_rol`
    FOREIGN KEY (`rol`)
    REFERENCES `appausadb`.`rol` (`nombre`)
    ON DELETE SET NULL
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `appausadb`.`cuenta` (
  `correo_electronico` VARCHAR(150)NOT NULL,
  `contrasena` VARCHAR(150)  NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(45) NOT NULL,
  `usuario` BIGINT(10) NOT NULL unique,
  `fallidos` int(1) NOT NULL,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`correo_electronico`),
  INDEX `fk_cuentaapp_usuario_idx` (`usuario` ASC) ,
  CONSTRAINT `fk_cuentaapp_usuario`
    FOREIGN KEY (`usuario`)
    REFERENCES `appausadb`.`usuario` (`cc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
CONSTRAINT `fk_cuenta_perfil`
    FOREIGN KEY (`perfil`)
    REFERENCES `appausadb`.`perfil` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `appausadb`.`contrasena_restablecida` (
  `fecha` DATE NOT NULL,
  `codigo` VARCHAR(150) NOT NULL unique,
  `cuenta` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`fecha`,`cuenta`),
  INDEX `fk_contrasena_restablecida_cuenta1_idx` (`cuenta` ASC) ,
  CONSTRAINT `fk_contrasena_restablecida_cuenta1`
    FOREIGN KEY (`cuenta`)
    REFERENCES `appausadb`.`cuenta` (`correo_electronico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `appausadb`.`accion` (
	`nombre` varchar(45) NOT NULL,
    `descrip` varchar(45) NOT NULL,
    primary key(`nombre`)
);

CREATE TABLE IF NOT EXISTS `appausadb`.`log` (
  `cuenta` VARCHAR(150) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `accion` VARCHAR(45) NOT NULL,
  `descrip` TEXT(150) NOT NULL,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`cuenta`,`fecha`),
  INDEX `fk_log_accion_idx` (`accion` ASC) ,
  INDEX `fk_log_cuenta_idx` (`cuenta` ASC) ,
  CONSTRAINT `fk_log_accion1`
    FOREIGN KEY (`accion`)
    REFERENCES `appausadb`.`accion` (`nombre`)
    ON DELETE cascade
    ON UPDATE CASCADE,
  CONSTRAINT `fk_log_cuenta1`
    FOREIGN KEY (`cuenta`)
    REFERENCES `appausadb`.`cuenta` (`correo_electronico`)
    ON DELETE cascade
    ON UPDATE CASCADE);
    
    

CREATE TABLE IF NOT EXISTS `appausadb`.`entidad` (
   `nit` BIGINT(17) NOT NULL,
  `nombre_entidad` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `telefono` BIGINT(10) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `email` VARCHAR(150) NOT NULL unique,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`nit`));
  
    
CREATE TABLE IF NOT EXISTS `appausadb`.`tipo_empresa` (
  `nombre_tipo` VARCHAR(45) NOT NULL,
  `actividad` VARCHAR(45) NOT NULL,
  `descripción` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre_tipo`));
  
CREATE TABLE IF NOT EXISTS `appausadb`.`empresa` (
  `nit` BIGINT(17) NOT NULL,
  `nombre_empresa` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `email` VARCHAR(150) NOT NULL unique,
  `telefono` BIGINT(10) NOT NULL unique,
  `descripción_empresa` TEXT(150) NULL,
  `num_empleados` INT(4) NOT NULL,
  `tipo_empresa` VARCHAR(45) NULL,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`nit`),
  INDEX `fk_empresa_tipo_idx` (`tipo_empresa` ASC) ,
  CONSTRAINT `fk_empresa_tipo`
    FOREIGN KEY (`tipo_empresa`)
    REFERENCES `appausadb`.`tipo_empresa` (`nombre_tipo`)
    ON DELETE SET NULL
    ON UPDATE CASCADE);
    
CREATE TABLE IF NOT EXISTS `appausadb`.`contrato` (
  `num_contrato` BIGINT NOT NULL,
  `empleado` BIGINT(10) NOT NULL,
  `empresa` BIGINT(17) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NULL,
  `sueldo`  BIGINT (10) NOT NULL,
  `funciones` TEXT(150) NOT NULL,
  `arl` BIGINT(17)  NULL,
  `caja_compensación` BIGINT(17)  NULL,
  `fondo_pensiones` BIGINT(17)  NULL,
  `eps` BIGINT(17)  NULL,
  `tipo_contrato` VARCHAR(45) NULL,
  `e` int(1) NOT NULL,
  PRIMARY KEY (`num_contrato`,`empresa`, `empleado`),
  INDEX `fk_contrato_empleado1_idx` (`empleado` ASC) ,
  INDEX `fk_contrato_entidad3_idx` (`eps` ASC) ,
  INDEX `fk_contrato_empresa1_idx` (`empresa` ASC) ,
  INDEX `fk_contrato_tipo_contrato1_idx` (`tipo_contrato` ASC) ,
  CONSTRAINT `fk_contrato_empleado`
    FOREIGN KEY (`empleado`)
    REFERENCES `appausadb`.`usuario` (`cc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_entidad`
    FOREIGN KEY (`arl`)
    REFERENCES `appausadb`.`entidad` (`nit`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_entidad1`
    FOREIGN KEY (`caja_compensación`)
    REFERENCES `appausadb`.`entidad` (`nit`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_entidad2`
    FOREIGN KEY (`fondo_pensiones`)
    REFERENCES `appausadb`.`entidad` (`nit`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_entidad3`
    FOREIGN KEY (`eps`)
    REFERENCES `appausadb`.`entidad` (`nit`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_empresa1`
    FOREIGN KEY (`empresa`)
    REFERENCES `appausadb`.`empresa` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_tipo_contrato1`
    FOREIGN KEY (`tipo_contrato`)
    REFERENCES `appausadb`.`tipo_contrato` (`nombre`)
    ON DELETE SET NULL
    ON UPDATE CASCADE);
    
CREATE TABLE IF NOT EXISTS `appausadb`.`solicitud_th`(
`empleado` BIGINT(10) NOT NULL,
`funcion` TEXT(150) NOT NULL,
`fecha_env` DATE NOT NULL,
primary key(empleado),
CONSTRAINT `fk_solicitudth_usuario`
    FOREIGN KEY (`empleado`)
    REFERENCES `appausadb`.`usuario` (`cc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `appausadb`.`entidades_contratadas`(
	`nit_empresa` BIGINT(17) NOT NULL,
    `nit_entidad` BIGINT(17) NOT NULL,
	primary key (`nit_empresa`,`nit_entidad`),
    CONSTRAINT `fk_entidades_cotratadas_empresa`
    FOREIGN KEY (`nit_empresa`)
    REFERENCES `appausadb`.`empresa` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT `fk_entidades_cotratadas_entidad`
    FOREIGN KEY (`nit_entidad`)
    REFERENCES `appausadb`.`entidad` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


CREATE TABLE `gestion_elemento` (
  `elemento` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`elemento`,`rol`),
  CONSTRAINT `fk_gestion_elemento_elemento` FOREIGN KEY (`elemento`) REFERENCES `elemento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_gestion_elemento_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- drop database appausadb;

ALTER TABLE empresa ADD inicio_actividad int(2) AFTER tipo_empresa;
ALTER TABLE empresa ADD fin_actividad int(2) AFTER inicio_actividad;