-- Criação do Banco de Dados
CREATE DATABASE marca_pagina_multiplo;
USE marca_pagina_multiplo;

-- Tabela 1: Estante (Livros disponíveis)
CREATE TABLE estante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    numero_paginas INT NOT NULL
);

-- Tabela 2: Alunos (Usuários do sistema)
CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Tabela 3: Progressao (Relaciona aluno e livro com o progresso)
CREATE TABLE progressao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_fk_livro INT NOT NULL,
    id_fk_aluno INT NOT NULL,
    pagina_atual INT NOT NULL DEFAULT 0,
    
    -- Chaves estrangeiras para garantir integridade
    FOREIGN KEY (id_fk_livro) REFERENCES estante(id) ON DELETE CASCADE,
    FOREIGN KEY (id_fk_aluno) REFERENCES alunos(id) ON DELETE CASCADE,
    
    -- Opcional: Garante que um aluno tenha apenas um registro de progresso por livro
    UNIQUE KEY unique_leitura (id_fk_livro, id_fk_aluno)
);

