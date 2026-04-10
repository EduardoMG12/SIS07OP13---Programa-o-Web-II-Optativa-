-- =============================================
-- Exercicio 8 - Criacao do Banco de Dados e Tabelas
-- AULA 05 - PHPMyAdmin e Conexao PHP com MySQL
-- =============================================

CREATE DATABASE IF NOT EXISTS sisbiblioteca
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;

USE sisbiblioteca;

-- -----------------------------------------
-- Tabela: livros
-- -----------------------------------------
CREATE TABLE IF NOT EXISTS livros (
    id      INT             NOT NULL AUTO_INCREMENT,
    nome    VARCHAR(200)    NOT NULL,
    autor   VARCHAR(150)    NOT NULL,
    status  TINYINT(1)      NOT NULL DEFAULT 1,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

-- -----------------------------------------
-- Tabela: pessoa
-- -----------------------------------------
CREATE TABLE IF NOT EXISTS pessoa (
    id       INT            NOT NULL AUTO_INCREMENT,
    cpf      VARCHAR(14)    NOT NULL,
    nome     VARCHAR(150)   NOT NULL,
    telefone VARCHAR(20)    NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

-- -----------------------------------------
-- Tabela: emprestimos (chave estrangeira)
-- Liga livros e pessoa atraves de suas PKs
-- -----------------------------------------
CREATE TABLE IF NOT EXISTS emprestimos (
    id         INT  NOT NULL AUTO_INCREMENT,
    id_livro   INT  NOT NULL,
    id_pessoa  INT  NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_idLivro  FOREIGN KEY (id_livro)  REFERENCES livros(id),
    CONSTRAINT fk_idPessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa(id)
) ENGINE=InnoDB;
