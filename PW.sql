CREATE DATABASE projeto_pw;
USE projeto_pw;

CREATE TABLE album (
    id_album INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    data DATE,
    id_artista INT
);

CREATE TABLE genero (
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    id_album INT,
    FOREIGN KEY (id_album) REFERENCES Album(id_album)
);

CREATE TABLE produtor (
    id_produtor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    nacionalidade VARCHAR(255)
);

CREATE TABLE musica (
    id_musica INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    tempo DOUBLE,
    id_album INT DEFAULT NULL,
    id_artista INT,
    id_produtor INT,
    FOREIGN KEY (id_album) REFERENCES Album(id_album),
    FOREIGN KEY (id_produtor) REFERENCES Produtor(id_produtor)
);

CREATE TABLE artista (
    id_artista INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    idade INT,
    nacionalidade VARCHAR(255),
    id_album INT,
    id_musica INT,
    FOREIGN KEY (id_album) REFERENCES Album(id_album),
    FOREIGN KEY (id_musica) REFERENCES Musica(id_musica)
);

ALTER TABLE album
ADD FOREIGN KEY (id_artista) REFERENCES Artista(id_artista)