SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema wn_portfolio
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `wn_portfolio` ;
CREATE SCHEMA IF NOT EXISTS `wn_portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wn_portfolio` ;

-- -----------------------------------------------------
-- Table `wn_portfolio`.`cadres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wn_portfolio`.`cadres` ;

CREATE TABLE IF NOT EXISTS `wn_portfolio`.`cadres` (
  `id` INT UNSIGNED ZEROFILL NOT NULL,
  `titre` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `type` ENUM('references','autres') NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wn_portfolio`.`references`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wn_portfolio`.`references` ;

CREATE TABLE IF NOT EXISTS `wn_portfolio`.`references` (
  `id` INT UNSIGNED ZEROFILL NOT NULL,
  `sousTitre` VARCHAR(100) NULL,
  `bg` VARCHAR(100) NOT NULL,
  `img` VARCHAR(100) NOT NULL,
  `url` VARCHAR(100) NOT NULL,
  `tech` TEXT NULL,
  `position` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `bg_UNIQUE` (`bg` ASC),
  CONSTRAINT `fk_references_cadres`
    FOREIGN KEY (`id`)
    REFERENCES `wn_portfolio`.`cadres` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wn_portfolio`.`autres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wn_portfolio`.`autres` ;

CREATE TABLE IF NOT EXISTS `wn_portfolio`.`autres` (
  `id` INT UNSIGNED ZEROFILL NOT NULL,
  `logo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_autres_cadres`
    FOREIGN KEY (`id`)
    REFERENCES `wn_portfolio`.`cadres` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wn_portfolio`.`reseaux-sociaux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wn_portfolio`.`reseaux-sociaux` ;

CREATE TABLE IF NOT EXISTS `wn_portfolio`.`reseaux-sociaux` (
  `id` INT NOT NULL,
  `logo` VARCHAR(100) NOT NULL,
  `url` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
