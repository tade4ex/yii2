-- -----------------------------------------------------
-- Table `yii1`.`tbl_goods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yii1`.`tbl_goods` ;

CREATE TABLE IF NOT EXISTS `tbl_goods` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(255) NOT NULL COMMENT '',
  `count` INT(10) NOT NULL DEFAULT 0 COMMENT '',
  `email_provider` VARCHAR(255) NULL COMMENT '',
  `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB DEFAULT CHARACTER SET UTF8;