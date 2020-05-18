# Para Criar o Banco de dados

CREATE DATABASE crud;

CREATE TABLE crud.aluno (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    endereço VARCHAR(255) NOT NULL,
    idade INT(2) NOT NULL
);
