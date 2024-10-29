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
  id_produtor INT,
  FOREIGN KEY (id_album) REFERENCES album(id_album),
  FOREIGN KEY (id_produtor) REFERENCES produtor(id_produtor)
);