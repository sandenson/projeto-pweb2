drop database projeto_pweb_sbll;
create database projeto_pweb_sbll;
use projeto_pweb_sbll;

CREATE TABLE `projeto_pweb_sbll`.`users` ( `name` VARCHAR(100) NOT NULL , `birthday` DATE NOT NULL , `email` VARCHAR(100) NOT NULL , `username` VARCHAR(100) UNIQUE NOT NULL , `address` TEXT NOT NULL , `cpf` VARCHAR(14) NOT NULL , `password` VARCHAR(20) NOT NULL , PRIMARY KEY (`username`));
CREATE TABLE `projeto_pweb_sbll`.`pets` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `description` TEXT NOT NULL , `type` VARCHAR(100) NOT NULL , `sex` VARCHAR(100) NOT NULL , `isAdopted` BOOLEAN NOT NULL DEFAULT FALSE , `adoptedBy` VARCHAR(100) , `registeredBy` VARCHAR(100) , PRIMARY KEY (`id`) , FOREIGN KEY (`adoptedBy`) REFERENCES `users`(`username`) , FOREIGN KEY (`registeredBy`) REFERENCES `users`(`username`));
CREATE TABLE `projeto_pweb_sbll`.`pets_pics` ( `id` INT NOT NULL AUTO_INCREMENT , `pet_id` INT NOT NULL , `image` BLOB NOT NULL , PRIMARY KEY (`id`) , FOREIGN KEY (`pet_id`) REFERENCES `pets`(`id`));

INSERT INTO `users` (`name`, `birthday`, `email`, `username`, `address`, `cpf`, `password`) VALUES
('LULINHA', '2021-01-28', 'llto1@aluno.ifal.edu.br', '@lucasluciot', 'o manuel', '12345678947', 'juju4'),
('Luis Gustavo França', '1616-12-16', 'emaildoburgo@gmail.com', 'burgovski', 'do lado da area verde', 'cpf dele', 'senhadogustavo'),
('Leonardo Oliveira Farias', '1212-12-12', 'soresidentevil@gmail.com', 'lof', 'casa do cacebes (campo alegre)', 'cpf do lalo', 'senhadoleo'),
('Lucas Lucio Teixeira de Oliveira', '1111-11-11', 'a@a', 'luquitas', 'perto da casa do sambes', 'cpf do lulo', 'senhadolucas'),
('Matheus Pereira Araújo', '1515-12-15', 'emaildomatheusinho@gmail.com', 'matheusoide', 'casa do matheusinho', 'cpf dele', 'senhadomatheus'),
('Mateus Pereira Bazilio', '1313-12-13', 'emaildobaciliamos@gmail.com', 'onion_knight', 'casa do baciliano ramos', 'cpf do brasili', 'senhadobazilio'),
('Manuel Eduardo Nascimento Antunes', '1414-12-14', 'manuno@gmail.com', 'peixonalta', 'do lado de um rio (traipu)', 'cpf do minuano', 'senhadomanuel'),
('Luiz Gabriel Correia Sandes', '2002-11-04', 'lgabrielsandes@gmail.com', 'sandenson', 'meu endereço', 'cpf do sandes', 'senhadosandes'),
('Brunno Martins Santos', '1717-12-17', 'emaildostanislilo@gmail.com', 'stanislav', 'casa do stanislilo', 'cpf dele', 'senhadobrunno'),
('Marcos Vinícius Nascimento de Melo', '2222-11-11', 'emaildomarcos@gmail.com', 'z1wolfmaster1', 'perto da casa do sambes', 'cpf do marcos', 'senhadomarcos');