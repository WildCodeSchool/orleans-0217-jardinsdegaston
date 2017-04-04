# --------------------------------------------- *
#   Generation database des jardins de Gaston   *
# --------------------------------------------- *

# --- NECESSITE DE SE CONNECTER EN ROOT ---

# --- on fait d'abord le menage si necessaire ---
DROP DATABASE IF EXISTS db_gaston;
CREATE DATABASE db_gaston DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

# --- on créé le user pour y acceder ---
GRANT ALL ON db_gaston.* TO 'gaston' IDENTIFIED BY 'gaSt0n%';

# --- on se connecte a la database ---
USE db_gaston;

# --- on cree les tables (avec effacement prealable pour faire propre) ---
# --- note : l'ordre de creation n'a pas d'importance ---



# --- table presentation ------------------------------------------------------
#       structure figee
#       id=1 : presentation generale
#       id=2 : valeur 1
#       id=3 : valeur 2
DROP TABLE IF EXISTS presentation;
CREATE TABLE presentation (
  id INT UNSIGNED NOT NULL PRIMARY KEY,
  titre VARCHAR(50) NOT NULL,
  contenu TEXT
);
# --- La table est preremplie ---
INSERT INTO presentation VALUES
(1,'Bienvenue dans les jardins de Gaston','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(2,'Valeur 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(3,'Valeur 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');
# --- controle ---
DESCRIBE presentation;
SELECT * FROM presentation;



# --- table realisation ------------------------------------------------------
#       structure variable
#       images rubrique R, 750x400
DROP TABLE IF EXISTS realisation;
CREATE TABLE realisation (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(50) NOT NULL,
  contenu text,
  id_img_ap INT UNSIGNED NOT NULL DEFAULT 3,
  id_img_av INT UNSIGNED NOT NULL DEFAULT 3
);
INSERT INTO realisation (id, titre, contenu, id_img_ap, id_img_av) VALUES
(1,'Réalisation 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',7,8),
(2,'Réalisation 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',9,10);
# --- controle ---
DESCRIBE realisation;
SELECT * FROM realisation;



# --- table prestation --------------------------------------------------------
#       structure variable (6 prestations a l'initialisation)
#       images rubrique P,400x400
DROP TABLE IF EXISTS prestation;
CREATE TABLE prestation (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(50) NOT NULL,
  contenu TEXT,
  id_img INT UNSIGNED NOT NULL DEFAULT 2,
  ordreaff TINYINT UNSIGNED UNIQUE
);
INSERT INTO prestation (titre, contenu, ordreaff) VALUES
('Entretien des pelouses', 'Tonte, émoussage, scarification, regarnissage, ...',1),
('Taille de haies', 'Taille des haies, arbustes, arbres fruitiers, ...',2),
('Entretien des massifs', 'Entretien des massifs, désherbage, paillage, ...',3),
('Potager', 'Mise en place et entretien de potagers, ...',4),
('Evacuation des déchets végétaux', 'Evacuation des déchets végétaux, ...',5),
('Entretien des extérieurs', 'Déneigement, peinture, lasure, nettoyage haute pression, ...',6);
# --- controle ---
DESCRIBE prestation;
SELECT * FROM prestation;



# --- table conseil --------------------------------------------------------
#       structure variable
#       saison : 4 lettres possibles p(rintemps), e(té), a(utomne), h(iver), espace si pas selectionne
DROP TABLE IF EXISTS conseil;
CREATE TABLE conseil (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  contenu TEXT,
  saison char(4) default '    '
);
INSERT INTO conseil (contenu, saison) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','peah'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','p   '),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','pe  '),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','  ah'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','   h'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','p  h'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','  a '),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','  a ');
# --- controle ---
DESCRIBE conseil;
SELECT * FROM conseil;



# --- table livredor --------------------------------------------------------
#       structure variable
#       saison : 4 lettres possibles p(rintemps), e(té), a(utomne), h(iver), espace si pas selectionne
DROP TABLE IF EXISTS livredor;
CREATE TABLE livredor (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
contenu TEXT,
nom varchar(50)
);
INSERT INTO livredor (contenu, nom) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Monsieur X'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Monsieur X'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Monsieur X'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Monsieur X');
# --- controle ---
DESCRIBE livredor;
SELECT * FROM livredor;



# --- table message --------------------------------------------------------
#       structure variable
#       statut : non lu = 0, lu = 1, archive = 2, supprime = 3
DROP TABLE IF EXISTS message;
CREATE TABLE message (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL,
prenom VARCHAR(50),
email VARCHAR(250),
contenu TEXT,
date DATETIME DEFAULT NOW(),
statut TINYINT
);
# --- controle ---
DESCRIBE message;
SELECT * FROM message;



# --- table image --------------------------------------------------------
#       structure variable
#       rubrique : B = background (1920x1200), P = prestations (400x400), R = realisation (750x400), J = journal (..x..)
#       Les quatre premieres images sont des images vides (pour boucher les trous si image manquante)
#       saison (ne sert que si rubrique = B) : p = printemps, e = ete, a = automne, h = hiver
DROP TABLE IF EXISTS image;
CREATE TABLE image (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
rubrique CHAR(1),
saison char(1) DEFAULT '',
date DATETIME DEFAULT NOW()
);
INSERT INTO image (id, rubrique, saison) VALUES (1,'B','');
INSERT INTO image (id, rubrique, saison) VALUES (2,'P','');
INSERT INTO image (id, rubrique, saison) VALUES (3,'R','');
INSERT INTO image (id, rubrique, saison) VALUES (4,'J','');
INSERT INTO image (id, rubrique, saison) VALUES (5,'B','p');
INSERT INTO image (id, rubrique, saison) VALUES (6,'B','e');
INSERT INTO image (id, rubrique, saison) VALUES (7,'R','');
INSERT INTO image (id, rubrique, saison) VALUES (8,'R','');
INSERT INTO image (id, rubrique, saison) VALUES (9,'R','');
INSERT INTO image (id, rubrique, saison) VALUES (10,'R','');
INSERT INTO image (id, rubrique, saison) VALUES (11,'P','');
INSERT INTO image (id, rubrique, saison) VALUES (12,'P','');
INSERT INTO image (id, rubrique, saison) VALUES (13,'P','');
INSERT INTO image (id, rubrique, saison) VALUES (14,'P','');
INSERT INTO image (id, rubrique, saison) VALUES (15,'P','');
INSERT INTO image (id, rubrique, saison) VALUES (16,'P','');

# --- controle ---
DESCRIBE image;
SELECT * FROM image;



# --- table bgimage --------------------------------------------------------
#       structure fixe
#       image principale : id 1 = printemps, id 2 = ete, id 3 = automne, id 4 = hiver
#       image secondaire : id 5 = printemps, id 6 = ete, id 7 = automne, id 8 = hiver
DROP TABLE IF EXISTS bgimage;
CREATE TABLE bgimage (
id INT UNSIGNED NOT NULL PRIMARY KEY,
id_img INT UNSIGNED NOT NULL DEFAULT 1
);
INSERT INTO bgimage (id, id_img) VALUES (1,5),(2,1),(3,1),(4,1),(5,1),(6,6),(7,1),(8,1);
# --- controle ---
DESCRIBE bgimage;
SELECT * FROM bgimage;





