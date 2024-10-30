CREATE DATABASE projeto_pw2;
USE projeto_pw2;

CREATE TABLE genero (
  id_genero INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL
);

CREATE TABLE artista (
  id_artista INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  idade INT NOT NULL,
  nacionalidade VARCHAR(255) NOT NULL
);

CREATE TABLE produtor (
  id_produtor INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  nacionalidade VARCHAR(255) NOT NULL
);

CREATE TABLE album (
  id_album INT AUTO_INCREMENT PRIMARY KEY ,
  nome VARCHAR(255) NOT NULL,
  data DATE NOT NULL,
  id_genero INT,
  id_artista INT,
  FOREIGN KEY (id_artista) REFERENCES artista(id_artista),
  FOREIGN KEY (id_genero) REFERENCES genero(id_genero)
);

CREATE TABLE musica (
  id_musica INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  tempo double NOT NULL,
  id_album INT,
  id_produtor INT NULL,
  FOREIGN KEY (id_album) REFERENCES album(id_album),
  FOREIGN KEY (id_produtor) REFERENCES produtor(id_produtor)
);

--Extra Table se quiser ter Relações Muitos para Muitos entre Musicas e Produtores

-- CREATE TABLE musica_produtor (
--     id_musica INT,
--     id_produtor INT,
--     PRIMARY KEY (id_musica, id_produtor),
--     FOREIGN KEY (id_musica) REFERENCES Musica(id_musica),
--     FOREIGN KEY (id_produtor) REFERENCES Produtor(id_produtor)
-- );