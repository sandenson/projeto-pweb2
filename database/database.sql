drop database projeto_pweb_sbll;
create database projeto_pweb_sbll;
use projeto_pweb_sbll;

CREATE TABLE `projeto_pweb_sbll`.`users` ( `name` VARCHAR(100) NOT NULL , `birthday` DATE NOT NULL , `email` VARCHAR(100) NOT NULL , `username` VARCHAR(100) UNIQUE NOT NULL , `address` TEXT NOT NULL , `cpf` VARCHAR(14) NOT NULL , `password` VARCHAR(20) NOT NULL , PRIMARY KEY (`username`));
CREATE TABLE `projeto_pweb_sbll`.`pets` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `description` TEXT NOT NULL , `type` VARCHAR(100) NOT NULL, `isAdopted` BOOLEAN NOT NULL DEFAULT FALSE , `adoptedBy` VARCHAR(100) , `registeredBy` VARCHAR(100) , PRIMARY KEY (`id`) , FOREIGN KEY (`adoptedBy`) REFERENCES `users`(`username`) , FOREIGN KEY (`registeredBy`) REFERENCES `users`(`username`));
CREATE TABLE `projeto_pweb_sbll`.`pets_pics` ( `id` INT NOT NULL AUTO_INCREMENT , `pet_id` INT NOT NULL , `image` BLOB NOT NULL , PRIMARY KEY (`id`) , FOREIGN KEY (`pet_id`) REFERENCES `pets`(`id`));
CREATE TABLE 'projeto_pweb_sbll'.'adopt'('user_fk' VARCHAR(100) NOT NULL FOREIGN KEY('username') REFERENCES "users"('username'), 'pet_fk' INT NOT NULL FOREIGN KEY ('pet_id') REFERENCES "pets" ('id'));
CREATE TABLE 'projeto_pweb_sbll'.'put_to_adoption'('user_fk' VARCHAR(100) NOT NULL FOREIGN KEY('username') REFERENCES "users"('username'), 'pet_fk' INT NOT NULL FOREIGN KEY ('pet_id') REFERENCES "pets" ('id'));