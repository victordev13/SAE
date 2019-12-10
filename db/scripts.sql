-- MySQL Script generated by MySQL Workbench
-- Mon Dec  9 23:42:03 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sae_fvc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sae_fvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sae_fvc` DEFAULT CHARACTER SET utf8 ;
USE `sae_fvc` ;

-- -----------------------------------------------------
-- Table `sae_fvc`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sae_fvc`.`categoria` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `periodo_manutencao` INT(11) NOT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sae_fvc`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sae_fvc`.`equipamento` (
  `id_equipamento` INT(11) NOT NULL AUTO_INCREMENT,
  `cod` INT(11) NOT NULL,
  `patrimonio` INT(11) NOT NULL,
  `categoria` INT(100) NOT NULL,
  `data` DATE NOT NULL,
  PRIMARY KEY (`id_equipamento`),
  INDEX `categoria` (`categoria` ASC) VISIBLE,
  CONSTRAINT `categoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `sae_fvc`.`categoria` (`id_categoria`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sae_fvc`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sae_fvc`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 40
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sae_fvc`.`horario_aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sae_fvc`.`horario_aula` (
  `id_horario_aula` INT(11) NOT NULL AUTO_INCREMENT,
  `aula` INT(11) NOT NULL,
  `inicio` TIME NOT NULL,
  `fim` TIME NOT NULL,
  PRIMARY KEY (`id_horario_aula`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sae_fvc`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sae_fvc`.`agendamento` (
  `id_agendamento` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` INT(11) NOT NULL,
  `data` DATE NOT NULL,
  `equipamento` INT(11) NOT NULL,
  `inicio` INT(11) NOT NULL,
  `fim` INT(11) NOT NULL,
  `observacao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_agendamento`),
  INDEX `equipamento` (`equipamento` ASC) VISIBLE,
  INDEX `inicio` (`inicio` ASC) VISIBLE,
  INDEX `fim` (`usuario` ASC) VISIBLE,
  CONSTRAINT `equipamento`
    FOREIGN KEY (`equipamento`)
    REFERENCES `sae_fvc`.`equipamento` (`id_equipamento`),
  CONSTRAINT `fim`
    FOREIGN KEY (`usuario`)
    REFERENCES `sae_fvc`.`usuarios` (`id_usuario`),
  CONSTRAINT `inicio`
    FOREIGN KEY (`inicio`)
    REFERENCES `sae_fvc`.`horario_aula` (`id_horario_aula`),
  CONSTRAINT `usuario`
    FOREIGN KEY (`usuario`)
    REFERENCES `sae_fvc`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sae_fvc`.`login_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sae_fvc`.`login_usuario` (
  `id_login_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(32) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `nivel_usuario` INT(1) NOT NULL,
  `id_usuario_fk` INT(11) NOT NULL,
  PRIMARY KEY (`id_login_usuario`),
  UNIQUE INDEX `usuario` (`usuario` ASC) VISIBLE,
  UNIQUE INDEX `id_usuario` (`id_usuario_fk` ASC) VISIBLE,
  CONSTRAINT `cod_usuario`
    FOREIGN KEY (`id_usuario_fk`)
    REFERENCES `sae_fvc`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


