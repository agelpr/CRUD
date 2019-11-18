CREATE DATABASE crud;

USE crud;

CREATE TABLE task (
 id INT NOT NULL AUTO_INCREMENT,
 titulo VARCHAR(200) NOT NULL,
 descripcion TEXT(1000) NOT NULL,
 created_at timestamp ,
 PRIMARY KEY(id)
);
