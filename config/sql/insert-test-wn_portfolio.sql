SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Data for table `wn_portfolio`.`cadres`
-- -----------------------------------------------------
START TRANSACTION;
USE `wn_portfolio`;
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (101, 'réseaux', 'description réseaux', 'autres');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (102, 'maintenance', 'description maintenance', 'autres');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (103, 'contact', '54 rue de vincennes 93100 MONTREUIL', 'autres');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (1, 'test1', 'petite description 1 uno 1', 'references');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (2, 'test2', 'petite description 2 due 2', 'references');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (3, 'test3', 'petite description 3 tre 3', 'references');
INSERT INTO `wn_portfolio`.`cadres` (`id`, `titre`, `desc`, `type`) VALUES (4, 'test4', 'petite description 4 quattro 4', 'references');

COMMIT;


-- -----------------------------------------------------
-- Data for table `wn_portfolio`.`references`
-- -----------------------------------------------------
START TRANSACTION;
USE `wn_portfolio`;
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`) VALUES (1, 'sous-titre de la reference 1 uno 1', 'bg-intro1.jpg', 'slide1.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule');
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`) VALUES (2, 'sous-titre de la reference 2 due 2', 'bg-intro2.jpg', 'slide2.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule');
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`) VALUES (3, 'sous-titre de la reference 3 tre 3', 'bg-intro3.jpg', 'slide3.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule');
INSERT INTO `wn_portfolio`.`references` (`id`, `sousTitre`, `bg`, `img`, `url`, `tech`) VALUES (4, 'sous-titre de la reference 4 quattro 4', 'bg-intro4.jpg', 'slide4.jpg', 'http://whosnet2014.fr/', 'php,jquery,truc,bidule');

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
