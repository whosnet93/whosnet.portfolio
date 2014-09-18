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


-- -----------------------------------------------------
-- Data for table `wn_portfolio`.`cadres`
-- -----------------------------------------------------
START TRANSACTION;
USE `wn_portfolio`;
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (101, 'réseaux', 'description réseaux', 'autres');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (102, 'maintenance', 'description maintenance', 'autres');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (103, 'contact', '54 rue de vincennes 93100 MONTREUIL', 'autres');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (1, 'test1', 'petite description 1 uno 1', 'references');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (2, 'test2', 'petite description 2 due 2', 'references');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (3, 'test3', 'petite description 3 tre 3', 'references');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `description`, `type`) VALUES (4, 'test4', 'petite description 4 quattro 4', 'references');

COMMIT;


-- -----------------------------------------------------
-- Data for table `wn_portfolio`.`references`
-- -----------------------------------------------------
START TRANSACTION;
USE `wn_portfolio`;
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`, `position`) VALUES (1, 'sous-titre de la reference 1 uno 1', 'bg-intro1.jpg', 'slide1.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 1);
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`, `position`) VALUES (2, 'sous-titre de la reference 2 due 2', 'bg-intro2.jpg', 'slide2.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 2);
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`, `position`) VALUES (3, 'sous-titre de la reference 3 tre 3', 'bg-intro3.jpg', 'slide3.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 3);
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`, `position`) VALUES (4, 'sous-titre de la reference 4 quattro 4', 'bg-intro4.jpg', 'slide4.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule', 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `wn_portfolio`.`autres`
-- -----------------------------------------------------
START TRANSACTION;
USE `wn_portfolio`;
INSERT INTO `wn_portfolio`.`autres` (`id`, `logo`) VALUES (101, 'trame1.png');
INSERT INTO `wn_portfolio`.`autres` (`id`, `logo`) VALUES (102, 'trame2.png');
INSERT INTO `wn_portfolio`.`autres` (`id`, `logo`) VALUES (103, 'trame3.png');

COMMIT;


-- -----------------------------------------------------
-- Data for table `wn_portfolio`.`reseaux-sociaux`
-- -----------------------------------------------------
START TRANSACTION;
USE `wn_portfolio`;
INSERT INTO `wn_portfolio`.`reseaux-sociaux` (`id`, `logo`, `url`) VALUES (1, 'fIcon.png', NULL);
INSERT INTO `wn_portfolio`.`reseaux-sociaux` (`id`, `logo`, `url`) VALUES (2, 'tIcon.png', NULL);
INSERT INTO `wn_portfolio`.`reseaux-sociaux` (`id`, `logo`, `url`) VALUES (3, 'sonIcon', NULL);

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
