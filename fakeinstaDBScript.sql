-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema fakeinsta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fakeinsta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fakeinsta` DEFAULT CHARACTER SET utf8mb4 ;
USE `fakeinsta` ;

-- -----------------------------------------------------
-- Table `fakeinsta`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fakeinsta`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(256) NOT NULL,
  `login` VARCHAR(15) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX (`login`),
  UNIQUE INDEX (`email`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `fakeinsta`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fakeinsta`.`posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(256) NOT NULL,
  `description` VARCHAR(140) NOT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX (`user_id`),
  CONSTRAINT `posts_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `fakeinsta`.`users` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `fakeinsta`.`posts_likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fakeinsta`.`posts_likes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NULL DEFAULT NULL,
  `post_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX (`user_id`),
  INDEX (`post_id`),
  CONSTRAINT `posts_likes_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `fakeinsta`.`users` (`id`),
  CONSTRAINT `posts_likes_ibfk_2`
    FOREIGN KEY (`post_id`)
    REFERENCES `fakeinsta`.`posts` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 61
DEFAULT CHARACTER SET = utf8mb4;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
