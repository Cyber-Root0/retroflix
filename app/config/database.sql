CREATE DATABASE IF NOT EXISTS retroflix;
use retroflix;

-- administrador
CREATE TABLE administrador(
	codigo INT NOT NULL auto_increment,
    nome VARCHAR(45),
    email VARCHAR(255),
    senha VARCHAR(45),
    cpf VARCHAR(14),
    telefone VARCHAR(14),
    sexo char(1),
    data_nascimento DATE,
    PRIMARY KEY(codigo)
);

-- cliente
CREATE TABLE cliente(
	codigo INT NOT NULL auto_increment,
    nome VARCHAR(45),
    email VARCHAR(255),
    senha VARCHAR(45),
    cpf VARCHAR(14),
    telefone VARCHAR(14),
    sexo char(1),
    data_nascimento DATE,
    PRIMARY KEY(codigo)
);

-- Diretor
CREATE TABLE diretor(
	codigo int NOT NULL auto_increment,
    nome VARCHAR(45),
    PRIMARY KEY(codigo)
);

-- Genero
CREATE TABLE genero(
	codigo INT NOT NULL auto_increment,
    nome VARCHAR(45),
    PRIMARY KEY(codigo)
);

-- Filme
CREATE TABLE filme(
	codigo INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(45),
    data_lancamento DATE,
    sinopse TEXT,
    imagem_capa BLOB,
    codigo_diretor INT,
    codigo_genero INT,
    link VARCHAR(255),
    preco_diario DECIMAL,
    PRIMARY KEY (codigo),
    FOREIGN KEY (codigo_diretor) REFERENCES diretor(codigo),
    FOREIGN KEY (codigo_genero) REFERENCES genero(codigo)
);

-- Forma de pagamento
CREATE TABLE forma_pagamento(
	codigo int NOT NULL auto_increment,
    descricao VARCHAR(45),
    PRIMARY KEY(codigo)
);

-- Locação 
CREATE TABLE locacao(
	codigo int NOT NULL auto_increment,
    data_locacao DATE,
    total DECIMAL,		-- pegar o total pela soma dos subtotais do Itens da venda
    status_atual boolean,
    codigo_cliente INT,
    codigo_pagamento INT,
    PRIMARY KEY(codigo),
    FOREIGN KEY(codigo_cliente) REFERENCES cliente(codigo),
    FOREIGN KEY(codigo_pagamento) REFERENCES forma_pagamento(codigo)
);


CREATE TABLE filmes_locacao(
	codigo_locacao int NOT NULL,
    codigo_filme int NOT NULL,
    numero_dias int,
    preco_diario DECIMAL,
    subtotal DECIMAL,
    -- PRIMARY KEY (codigo_locacao),
    -- PRIMARY KEY (codigo_filme),
    FOREIGN KEY (codigo_locacao) REFERENCES locacao(codigo),
    FOREIGN KEY (codigo_filme) REFERENCES filme(codigo)
);