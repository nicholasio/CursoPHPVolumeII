SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `echat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `echat` ;

-- -----------------------------------------------------
-- Table `echat`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `echat`.`Users` (
  `user_hash` CHAR(40) NOT NULL,
  `name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `gravatar` VARCHAR(255) NULL,
  `lastactivity` DATETIME NULL,
  `entered_at` DATETIME NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`user_hash`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `echat`.`Chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `echat`.`Chat` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `user_hash_from` CHAR(40) NOT NULL,
  `message` TEXT NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`ID`, `user_hash_from`),
  INDEX `fk_Chat_Users_idx` (`user_hash_from` ASC),
  CONSTRAINT `fk_Chat_Users`
    FOREIGN KEY (`user_hash_from`)
    REFERENCES `echat`.`Users` (`user_hash`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
