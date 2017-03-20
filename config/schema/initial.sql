CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
    password VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
    data_nascimento DATE,
    nome VARCHAR(255) CHARACTER SET 'utf8',
    texto TEXT CHARACTER SET 'utf8',
    sexo VARCHAR(255) CHARACTER SET 'utf8',
    avatar VARCHAR(255) CHARACTER SET 'utf8',
    cidade VARCHAR(255) CHARACTER SET 'utf8',
    telefone VARCHAR(255) CHARACTER SET 'utf8',
    fanhoso BOOLEAN,
    mudo BOOLEAN,
    data_criacao DATETIME,
    data_atualizacao DATETIME,
    data_acesso DATETIME,
    pai_id INT NULL,
    mae_id INT NULL,
    conjuge_id INT NULL,
    FOREIGN KEY pai_key(pai_id) REFERENCES usuarios(id),
    FOREIGN KEY mae_key(mae_id) REFERENCES usuarios(id),
    FOREIGN KEY conjuge_key(conjuge_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE albuns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(255) CHARACTER SET 'utf8',
    descricao TEXT CHARACTER SET 'utf8',
    data_album DATE,
    data_criacao DATETIME,
    data_atualizacao DATETIME,
    FOREIGN KEY usuario_key (usuario_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE musicas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(255) CHARACTER SET 'utf8',
    descricao TEXT CHARACTER SET 'utf8',
    data_album DATE,
    data_criacao DATETIME,
    data_atualizacao DATETIME,
    ordem INT NULL,
    FOREIGN KEY musica_key (usuario_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE fotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    album_id INT NOT NULL,
    titulo VARCHAR(255) CHARACTER SET 'utf8',
    descricao TEXT CHARACTER SET 'utf8',
    data_foto DATE,
    data_criacao DATETIME,
    data_atualizacao DATETIME,
    FOREIGN KEY album_key (album_id) REFERENCES albuns(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

