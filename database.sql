CREATE TABLE `parfumes1`.`users` (`id` INT NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR NOT NULL , `email` VARCHAR NOT NULL , `password` VARCHAR NOT NULL , 
`user_type` ENUM('user','admin','','') NOT NULL , PRIMARY KEY (`id`), UNIQUE `email_index` (`email`)) ENGINE = InnoDB;

CREATE TABLE `parfumes`.`register` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(150) NOT NULL , 
`email` VARCHAR(150) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `parfumes`.`products` (`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(255) NOT NULL , `price` FLOAT NOT NULL , 
`image` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;