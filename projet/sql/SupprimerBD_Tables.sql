##########################################################################
# Description : Script de création de la BD site de recette 
# Auteur      : Gharbi Walid, Ayachi Imed
# Session     : Hiver 2020
##########################################################################

USE  site_recettes;
 
DELETE FROM etape;
DROP TABLE etape;

DELETE FROM ingredient;
DROP TABLE ingredient;

DELETE FROM recette;
DROP TABLE recette;

DROP DATABASE site_recettes;