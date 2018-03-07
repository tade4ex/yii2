CREATE TABLE IF NOT EXISTS `yii1`.`evrnt_user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(128) NOT NULL COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `surname` VARCHAR(45) NOT NULL COMMENT '',
  `password` VARCHAR(255) NOT NULL COMMENT '',
  `salt` VARCHAR(255) NOT NULL COMMENT '',
  `access_token` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `username_UNIQUE` (`username` ASC)  COMMENT '',
  UNIQUE INDEX `access_token_UNIQUE` (`access_token` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii1`.`evrnt_note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yii1`.`evrnt_note` ;

CREATE TABLE IF NOT EXISTS `yii1`.`evrnt_note` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `text` TEXT NOT NULL COMMENT '',
  `creator` INT NOT NULL COMMENT '',
  `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_evrnt_note_1_idx` (`creator` ASC)  COMMENT '',
  CONSTRAINT `fk_evrnt_note_1`
    FOREIGN KEY (`creator`)
    REFERENCES `yii1`.`evrnt_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii1`.`evrnt_access`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yii1`.`evrnt_access` ;

CREATE TABLE IF NOT EXISTS `yii1`.`evrnt_access` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `note_id` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_evrnt_access_1_idx` (`note_id` ASC)  COMMENT '',
  INDEX `fk_evrnt_access_2_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_evrnt_access_1`
    FOREIGN KEY (`note_id`)
    REFERENCES `yii1`.`evrnt_note` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evrnt_access_2`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii1`.`evrnt_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii1`.`evrnt_login_history`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yii1`.`evrnt_login_history` ;

CREATE TABLE IF NOT EXISTS `yii1`.`evrnt_login_history` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `date_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_evrnt_login_history_1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_evrnt_login_history_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii1`.`evrnt_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;