create database projeto_pweb_sbll;
use projeto_pweb_sbll;

CREATE TABLE `projeto_pweb_sbll`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `birthday` DATE NOT NULL , `email` VARCHAR(100) NOT NULL , `username` VARCHAR(100) NOT NULL , `address` TEXT NOT NULL , PRIMARY KEY (`id`));
CREATE TABLE `projeto_pweb_sbll`.`pets` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `description` TEXT NOT NULL , `type` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`));
CREATE TABLE `projeto_pweb_sbll`.`pets_pics` ( `id` INT NOT NULL AUTO_INCREMENT , `pet_id` INT NOT NULL , `image` BLOB NOT NULL , PRIMARY KEY (`id`), FOREIGN KEY (`pet_id`) REFERENCES `pets`(`id`));