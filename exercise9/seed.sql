-- =============================================
-- Exercicio 9 - Insercao de Dados
-- AULA 05 - PHPMyAdmin e Conexao PHP com MySQL
-- =============================================

USE sisbiblioteca;

-- -----------------------------------------
-- Dados para a tabela livros
-- -----------------------------------------
INSERT INTO livros (nome, autor, status) VALUES
('Dom Casmurro',              'Machado de Assis',      1),
('O Cortico',                 'Aluisio Azevedo',       1),
('Grande Sertao: Veredas',    'Guimaraes Rosa',        0),
('Memorias Postumas de Bras Cubas', 'Machado de Assis', 1);

-- -----------------------------------------
-- Dados para a tabela pessoa
-- -----------------------------------------
INSERT INTO pessoa (cpf, nome, telefone) VALUES
('123.456.789-00', 'Maria Silva',    '(11) 98765-4321'),
('987.654.321-00', 'Joao Oliveira',  '(21) 91234-5678'),
('456.789.123-00', 'Ana Santos',     '(31) 99876-5432');
