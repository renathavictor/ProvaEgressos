CREATE DATABASE `egressos`;
USE `egressos`;


CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(50) NOT NULL, 
  email VARCHAR(50) NOT NULL, 
  password VARCHAR(60) NOT NULL,
  course VARCHAR(50),
  linkedin VARCHAR(50),
  github VARCHAR(50)
);

CREATE TABLE courses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(50) NOT NULL,
  campus VARCHAR(30)
);


/* cursos */
INSERT INTO courses (name, campus) VALUES ('Sistemas para Internet', 'ifpb-jp');
INSERT INTO courses (name, campus) VALUES ('Redes de Computadores', 'ifpb-jp');

/* usuarios */

INSERT INTO users (name, email, password) VALUES ('Luiz Carlos Chaves', 'lucachaves@gmail.com', '$2y$10$q0GsV5xZIbuDPyNwFF64tu/JOJuoC2HtFSAL7opEL3AZVARFskVze');
INSERT INTO users (name, email, password) VALUES ('Aline Donato', 'aline@gmail.com', ' $2y$10$c2yTXOn5ZgalBYvZWFCUkeJZqQqFInsv4AogzmEvnxaApJSOptHEO');
INSERT INTO users (name, email, password) VALUES ('Alana Morais', 'alana_mm@hotmail.com', ' $2y$10$c2yTXOn5ZgalBYvZWFCUkeJZqQqFInsv4AogzmEvnxaApJSOptHEO');
INSERT INTO users (name, email, password) VALUES ('Alisson Sena', 'alisson.sena@gmail.com', ' $2y$10$c2yTXOn5ZgalBYvZWFCUkeJZqQqFInsv4AogzmEvnxaApJSOptHEO');
INSERT INTO users (name, email, password) VALUES ('André Vinagre', 'andrenvinagre@gmail.com', ' $2y$10$c2yTXOn5ZgalBYvZWFCUkeJZqQqFInsv4AogzmEvnxaApJSOptHEO');
INSERT INTO users (name, email, password) VALUES ('Andreza Vieira', 'andreza_sv@yahoo.com.br', ' $2y$10$c2yTXOn5ZgalBYvZWFCUkeJZqQqFInsv4AogzmEvnxaApJSOptHEO');
INSERT INTO users (name, email, password) VALUES ('Anna Clara Nobrega', 'acrnobrega@hotmail.com', ' $2y$10$c2yTXOn5ZgalBYvZWFCUkeJZqQqFInsv4AogzmEvnxaApJSOptHEO');
