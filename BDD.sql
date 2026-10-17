create database Olympiade;

use Olympiade;

CREATE TABLE User_(
   nom_utilisateur VARCHAR(50),
   mdp VARCHAR(255) NOT NULL,
   grade VARCHAR(50) NOT NULL,
   PRIMARY KEY(nom_utilisateur)
);

CREATE TABLE Univers(
   id_univers INT auto_increment,
   nom_univers VARCHAR(50),
   PRIMARY KEY(id_univers)
);

CREATE TABLE Visite_Musee(
   id_visite INT auto_increment,
   horraires VARCHAR(5) NOT NULL,
   Guide VARCHAR(50) NOT NULL,
   nb_place INT NOT NULL,
   PRIMARY KEY(id_visite)
);

CREATE TABLE Billet(
   id_billet Int auto_increment,
   date_billet DATE NOT NULL,
   propriétaire VARCHAR(50) NOT NULL,
   id_visite INT NOT NULL,
   PRIMARY KEY(id_billet),
   FOREIGN KEY(id_visite) REFERENCES Visite_Musee(id_visite)
);

CREATE TABLE attractions(
   Nom VARCHAR(50),
   taille_min INT,
   statue VARCHAR(50) NOT NULL,
   attente VARCHAR(50),
   id_univers INT NOT NULL,
   PRIMARY KEY(Nom),
   FOREIGN KEY(id_univers) REFERENCES Univers(id_univers)
);

Insert into User_ (nom_univers, mdp, grade) Values ('Admin', '$2y$10$fi03NPPMXs.oLyZQQcTiXeK9CiFT93T3UadafRmSEz/dC2EShH.KK', 'Admin');



