CREATE DATABASE testesmart CHARACTER SET utf8 COLLATE utf8_general_ci;

USE testesmart;

CREATE TABLE marca (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,   
    PRIMARY KEY(id)
);

CREATE TABLE produtos (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    marca_id INT UNSIGNED NOT NULL,
    nome VARCHAR(100) NOT NULL,
    preco FLOAT NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_produtos_marca_id_marca_id
		FOREIGN KEY (marca_id) REFERENCES marca(id)
);

# Insert base para testes

INSERT INTO marca ( nome) VALUES ('Coca-Cola');
INSERT INTO produtos ( marca_id, nome, preco, descricao) VALUES ( 1, 'Sprite', 4.25, 'Sprite nasceu em 1966 e oferece o sabor natural de lima-limão mais famoso do mundo.');
