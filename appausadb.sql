-- Table `appausadb`.`elemento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`elemento` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrpción` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`actividad` (
  `nombre` VARCHAR(45) NOT NULL,
  `elemento` VARCHAR(45) NOT NULL,
  `url` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`),
  UNIQUE INDEX `url` (`url` ASC) VISIBLE,
  INDEX `fk_actividad_elemento` (`elemento` ASC) VISIBLE,
  CONSTRAINT `fk_actividad_elemento`
    FOREIGN KEY (`elemento`)
    REFERENCES `appausadb`.`elemento` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`rol` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrpción` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`perfil` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrpción` VARCHAR(45) NOT NULL,
  `rol_asociado` VARCHAR(45) NOT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`nombre`),
  INDEX `fk_perfil_rol` (`rol_asociado` ASC) VISIBLE,
  CONSTRAINT `fk_perfil_rol`
    FOREIGN KEY (`rol_asociado`)
    REFERENCES `appausadb`.`rol` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`usuario` (
  `cc` BIGINT(10) NOT NULL,
  `tipo_doc` VARCHAR(45) NOT NULL,
  `pnombre` VARCHAR(45) NOT NULL,
  `snombre` VARCHAR(45) NULL DEFAULT NULL,
  `papellido` VARCHAR(45) NOT NULL,
  `sapellido` VARCHAR(45) NOT NULL,
  `fecha_nam` DATE NOT NULL,
  `edad` INT(2) NOT NULL,
  `correo_electronico` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `rol` VARCHAR(45) NULL DEFAULT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`cc`),
  UNIQUE INDEX `correo_electronico` (`correo_electronico` ASC) VISIBLE,
  UNIQUE INDEX `telefono` (`telefono` ASC) VISIBLE,
  INDEX `fk_usuario_rol_idx` (`rol` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_rol`
    FOREIGN KEY (`rol`)
    REFERENCES `appausadb`.`rol` (`nombre`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`cuenta` (
  `correo_electronico` VARCHAR(150) NOT NULL,
  `contrasena` VARCHAR(150) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(45) NOT NULL,
  `usuario` BIGINT(10) NOT NULL,
  `e` INT(1) NOT NULL,
  `intentos_fallidos` INT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`correo_electronico`),
  UNIQUE INDEX `usuario` (`usuario` ASC) VISIBLE,
  INDEX `fk_cuentaapp_usuario_idx` (`usuario` ASC) VISIBLE,
  INDEX `fk_cuenta_perfil` (`perfil` ASC) VISIBLE,
  CONSTRAINT `fk_cuenta_perfil`
    FOREIGN KEY (`perfil`)
    REFERENCES `appausadb`.`perfil` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cuentaapp_usuario`
    FOREIGN KEY (`usuario`)
    REFERENCES `appausadb`.`usuario` (`cc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`contrasena_restablecida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`contrasena_restablecida` (
  `fecha` DATE NOT NULL,
  `codigo` VARCHAR(150) NOT NULL,
  `cuenta` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`fecha`, `cuenta`),
  UNIQUE INDEX `codigo` (`codigo` ASC) VISIBLE,
  INDEX `fk_contrasena_restablecida_cuenta1_idx` (`cuenta` ASC) VISIBLE,
  CONSTRAINT `fk_contrasena_restablecida_cuenta1`
    FOREIGN KEY (`cuenta`)
    REFERENCES `appausadb`.`cuenta` (`correo_electronico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`tipo_empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`tipo_empresa` (
  `nombre_tipo` VARCHAR(45) NOT NULL,
  `actividad` VARCHAR(45) NOT NULL,
  `descripción` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre_tipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`empresa` (
  `nit` BIGINT(17) NOT NULL,
  `nombre_empresa` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `descripción_empresa` TEXT NULL DEFAULT NULL,
  `num_empleados` INT(4) NOT NULL,
  `tipo_empresa` VARCHAR(45) NULL DEFAULT NULL,
  `inicio_actividad` INT(2) NOT NULL,
  `fin_actividad` INT(2) NOT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`nit`),
  UNIQUE INDEX `email` (`email` ASC) VISIBLE,
  UNIQUE INDEX `telefono` (`telefono` ASC) VISIBLE,
  UNIQUE INDEX `nombre_empresa` (`nombre_empresa` ASC) VISIBLE,
  INDEX `fk_empresa_tipo_idx` (`tipo_empresa` ASC) VISIBLE,
  CONSTRAINT `fk_empresa_tipo`
    FOREIGN KEY (`tipo_empresa`)
    REFERENCES `appausadb`.`tipo_empresa` (`nombre_tipo`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`entidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`entidad` (
  `nit` BIGINT(17) NOT NULL,
  `nombre_entidad` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`nit`),
  UNIQUE INDEX `email` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`tipo_contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`tipo_contrato` (
  `nombre` VARCHAR(45) NOT NULL,
  `descrip` VARCHAR(45) NOT NULL,
  `duracion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`contrato` (
  `num_contrato` BIGINT(20) NOT NULL,
  `empleado` BIGINT(10) NOT NULL,
  `empresa` BIGINT(17) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NULL DEFAULT NULL,
  `sueldo` BIGINT(10) NOT NULL,
  `funciones` TEXT NOT NULL,
  `arl` BIGINT(17) NULL DEFAULT NULL,
  `caja_compensación` BIGINT(17) NULL DEFAULT NULL,
  `fondo_pensiones` BIGINT(17) NULL DEFAULT NULL,
  `eps` BIGINT(17) NULL DEFAULT NULL,
  `tipo_contrato` VARCHAR(45) NULL DEFAULT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`num_contrato`, `empresa`),
  INDEX `fk_contrato_empleado1_idx` (`empleado` ASC) VISIBLE,
  INDEX `fk_contrato_entidad3_idx` (`eps` ASC) VISIBLE,
  INDEX `fk_contrato_empresa1_idx` (`empresa` ASC) VISIBLE,
  INDEX `fk_contrato_tipo_contrato1_idx` (`tipo_contrato` ASC) VISIBLE,
  INDEX `fk_contrato_entidad` (`arl` ASC) VISIBLE,
  INDEX `fk_contrato_entidad1` (`caja_compensación` ASC) VISIBLE,
  INDEX `fk_contrato_entidad2` (`fondo_pensiones` ASC) VISIBLE,
  CONSTRAINT `fk_contrato_empleado`
    FOREIGN KEY (`empleado`)
    REFERENCES `appausadb`.`usuario` (`cc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_empresa1`
    FOREIGN KEY (`empresa`)
    REFERENCES `appausadb`.`empresa` (`nit`)
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
  CONSTRAINT `fk_contrato_tipo_contrato1`
    FOREIGN KEY (`tipo_contrato`)
    REFERENCES `appausadb`.`tipo_contrato` (`nombre`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`entidades_contratadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`entidades_contratadas` (
  `nit_empresa` BIGINT(17) NOT NULL,
  `nit_entidad` BIGINT(17) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  PRIMARY KEY (`nit_empresa`, `nit_entidad`),
  INDEX `fk_entidades_cotratadas_entidad` (`nit_entidad` ASC) VISIBLE,
  CONSTRAINT `fk_entidades_cotratadas_empresa`
    FOREIGN KEY (`nit_empresa`)
    REFERENCES `appausadb`.`empresa` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entidades_cotratadas_entidad`
    FOREIGN KEY (`nit_entidad`)
    REFERENCES `appausadb`.`entidad` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`gestion_actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`gestion_actividad` (
  `actividad` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(45) NOT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`actividad`, `perfil`),
  INDEX `fk_gestion_actividad_actividad_idx` (`actividad` ASC) VISIBLE,
  INDEX `fk_gestion_actividad_perfil_idx` (`perfil` ASC) VISIBLE,
  CONSTRAINT `fk_gestion_actividad_actividad`
    FOREIGN KEY (`actividad`)
    REFERENCES `appausadb`.`actividad` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_gestion_actividad_perfil`
    FOREIGN KEY (`perfil`)
    REFERENCES `appausadb`.`perfil` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`gestion_elemento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`gestion_elemento` (
  `elemento` VARCHAR(45) NOT NULL,
  `rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`elemento`, `rol`),
  INDEX `fk_gestion_elemento_rol` (`rol` ASC) VISIBLE,
  CONSTRAINT `fk_gestion_elemento_elemento`
    FOREIGN KEY (`elemento`)
    REFERENCES `appausadb`.`elemento` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_gestion_elemento_rol`
    FOREIGN KEY (`rol`)
    REFERENCES `appausadb`.`rol` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`log` (
  `cuenta` VARCHAR(150) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `accion` VARCHAR(45) NOT NULL,
  `descrip` TEXT NOT NULL,
  `e` INT(1) NOT NULL,
  PRIMARY KEY (`cuenta`, `fecha`),
  INDEX `fk_log_accion_idx` (`accion` ASC) VISIBLE,
  INDEX `fk_log_cuenta_idx` (`cuenta` ASC) VISIBLE,
  CONSTRAINT `fk_log_accion1`
    FOREIGN KEY (`accion`)
    REFERENCES `appausadb`.`accion` (`nombre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_log_cuenta1`
    FOREIGN KEY (`cuenta`)
    REFERENCES `appausadb`.`cuenta` (`correo_electronico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `appausadb`.`solicitud_th`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appausadb`.`solicitud_th` (
  `empleado` BIGINT(10) NOT NULL,
  `funcion` TEXT NOT NULL,
  `fecha_env` DATE NOT NULL,
  PRIMARY KEY (`empleado`),
  CONSTRAINT `fk_solicitudth_usuario`
    FOREIGN KEY (`empleado`)
    REFERENCES `appausadb`.`usuario` (`cc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;