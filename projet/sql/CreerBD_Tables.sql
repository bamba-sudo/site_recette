##########################################################################
# Description : Script de création de la BD site de recette 
# Auteur      : Gharbi Walid, Ayachi Imed
# Session     : Hiver 2020
##########################################################################

CREATE DATABASE site_recettes DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE site_recettes;

CREATE TABLE recette (
  code         INT(11) AUTO_INCREMENT,
  titre        VARCHAR(155),
  description	 VARCHAR(255) NULL,
  auteur       VARCHAR(255),
  nom_photo    VARCHAR(255) NULL,
  CONSTRAINT recette_pk PRIMARY KEY (code)
);

CREATE TABLE etape (
  numero         INT(11) AUTO_INCREMENT,
  code_recette   INT(11),
  texte          VARCHAR(255),
  CONSTRAINT etape_fk FOREIGN KEY (code_recette) REFERENCES recette(code),
  CONSTRAINT etape_pk PRIMARY KEY (numero)
);

CREATE TABLE ingredient (
  numero         INT(11) AUTO_INCREMENT,
  code_recette   INT(11),
  quantite       DECIMAL(8, 2),
  unite          VARCHAR(255) NULL,
  nom            VARCHAR(255),
  CONSTRAINT ingredient_fk FOREIGN KEY (code_recette) REFERENCES recette(code),
  CONSTRAINT ingredient_pk PRIMARY KEY (numero) 
);

CREATE TABLE utilisateur (
  nom         VARCHAR(255),
  mot_passe   VARCHAR(255),
  CONSTRAINT user_pk PRIMARY KEY (nom)
);

ALTER TABLE ingredient AUTO_INCREMENT=100;
ALTER TABLE etape AUTO_INCREMENT=100;
ALTER TABLE recette AUTO_INCREMENT=100;

INSERT INTO recette VALUES (1, "Sandwich au beurre d'arachides et bananes.", "Sandwich nutritif facile à préparer. Idéal pour une collation.", "Rick Cardeault", "SandwichBAetBanane.jpg");

INSERT INTO ingredient VALUES (1, 1, 2, 'tranches', 'pain blanc');
INSERT INTO ingredient VALUES (2, 1, 1,null, 'banane');
INSERT INTO ingredient VALUES (3, 1, 45, 'ml', "beurre d'arachides");

INSERT INTO etape VALUES (1, 1, 'Faire chauffer les tranches de pain dans un grille-pain');
INSERT INTO etape VALUES (2, 1, "Étandre le beurre d'arachides sur le pain grillé");
INSERT INTO etape VALUES (3, 1, "Couper et disposer la banane tranchée en rondelles sur le beurre d'arachides");

INSERT INTO utilisateur VALUES ('root','root');
INSERT INTO utilisateur VALUES ('moi','1234');


