SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ems` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ems` ;

-- -----------------------------------------------------
-- Table `ems`.`payments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`payments` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `acno_from` VARCHAR(45) NULL,
  `acno_to` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `phoneno` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`clients` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `address` VARCHAR(50) NULL,
  `place` VARCHAR(45) NULL,
  `phoneno` VARCHAR(45) NULL,
  `bank_name` VARCHAR(45) NULL,
  `acno` VARCHAR(45) NULL,
  `amount` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`venues`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`venues` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(50) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`categories` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`events` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL,
  `description` VARCHAR(100) NULL,
  `start_time` TIME NULL,
  `start_date` DATE NULL,
  `end-time` TIME NULL,
  `end-date` DATE NULL,
  `noof_people` INT NULL,
  `payments_id` INT NOT NULL,
  `clients_id` INT NOT NULL,
  `venues_id` INT NOT NULL,
  `categories_id` INT NOT NULL,
  PRIMARY KEY (`id`, `payments_id`, `clients_id`, `venues_id`, `categories_id`),
  INDEX `fk_events_payments_idx` (`payments_id` ASC),
  INDEX `fk_events_clients1_idx` (`clients_id` ASC),
  INDEX `fk_events_venues1_idx` (`venues_id` ASC),
  INDEX `fk_events_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_events_payments`
    FOREIGN KEY (`payments_id`)
    REFERENCES `ems`.`payments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_clients1`
    FOREIGN KEY (`clients_id`)
    REFERENCES `ems`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_venues1`
    FOREIGN KEY (`venues_id`)
    REFERENCES `ems`.`venues` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `ems`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`users` (
  `id` INT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `user_type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`food_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`food_items` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`foods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`foods` (
  `id` INT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL,
  `food_items_id` INT NOT NULL,
  PRIMARY KEY (`id`, `food_items_id`),
  INDEX `fk_foods_food_items1_idx` (`food_items_id` ASC),
  CONSTRAINT `fk_foods_food_items1`
    FOREIGN KEY (`food_items_id`)
    REFERENCES `ems`.`food_items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`vehicles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`vehicles` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `reg_no` VARCHAR(50) NULL,
  `seat` VARCHAR(45) NULL,
  `price` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`booking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`booking` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `events_id` INT NOT NULL,
  PRIMARY KEY (`id`, `events_id`),
  INDEX `fk_booking_events1_idx` (`events_id` ASC),
  CONSTRAINT `fk_booking_events1`
    FOREIGN KEY (`events_id`)
    REFERENCES `ems`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`entertainments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`entertainments` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`entertainment_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`entertainment_type` (
  `id` INT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `events_id` INT NOT NULL,
  `entertainments_id` INT NOT NULL,
  PRIMARY KEY (`id`, `events_id`, `entertainments_id`),
  INDEX `fk_entertainment_type_events1_idx` (`events_id` ASC),
  INDEX `fk_entertainment_type_entertainments1_idx` (`entertainments_id` ASC),
  CONSTRAINT `fk_entertainment_type_events1`
    FOREIGN KEY (`events_id`)
    REFERENCES `ems`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entertainment_type_entertainments1`
    FOREIGN KEY (`entertainments_id`)
    REFERENCES `ems`.`entertainments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ems`.`event_vehicles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ems`.`event_vehicles` (
  `id` INT NULL AUTO_INCREMENT,
  `noof_vehicle` INT NULL,
  `total_price` INT NULL,
  `vehicles_id` INT NOT NULL,
  PRIMARY KEY (`id`, `vehicles_id`),
  CONSTRAINT `fk_event_vehicles_vehicles1`
    FOREIGN KEY (`vehicles_id`)
    REFERENCES `ems`.`vehicles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
