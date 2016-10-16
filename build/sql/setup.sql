CREATE TABLE `games` (
  `game_id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `platform` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`game_id`));

INSERT INTO `games` (`title`, `platform`) VALUES ('Kid Chameleon', 'Megadrive');
INSERT INTO `games` (`title`, `platform`) VALUES ('Adams Family', 'Super Nintendo');
INSERT INTO `games` (`title`, `platform`) VALUES ('Street Fighter II Turbo', 'Super Nintendo');
INSERT INTO `games` (`title`, `platform`) VALUES ('Jungle Strike', 'Megadrive');
INSERT INTO `games` (`title`, `platform`) VALUES ('Pilot Wings', 'Super Nintendo');
INSERT INTO `games` (`title`, `platform`) VALUES ('Fifa 95', 'Megadrive');
INSERT INTO `games` (`title`, `platform`) VALUES ('Another World', 'Megadrive');
INSERT INTO `games` (`title`, `platform`) VALUES ('Lotus challenge', 'Megadrive');
INSERT INTO `games` (`title`, `platform`) VALUES ('James Pond', 'Megadrive');
INSERT INTO `games` (`title`, `platform`) VALUES ('Clayfighter', 'Super Nintendo');
