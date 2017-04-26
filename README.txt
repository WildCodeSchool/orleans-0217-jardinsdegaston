README.txt

Mise en service du site web jardinsdegaston.fr
=============================================

1 – Les jardins de Gaston : Objet du site web
2 – Prérequis sur le serveur
3 – Installation initiale
4 – Base de données
5 – Arborescence projet
6 – Nommage des images
7 – Credits


1°) - Les Jardins de Gaston : objet du site web
===============================================
Il s’agit d’un site web développé en PHP, permettant de présenter le savoir-faire de l'entreprise "Les Jardins de
Gaston", dans le domaine de l’entretien de parcs et jardins.


2°) - Prequis sur le serveur :
==============================
- Serveur lamp,
- url rewriting activé sur Apache (a2enmod rewrite),
- PHP en version 7, plus les modules php-gd et php-intl,
- Composer.


3°) - Installation initiale :
=============================
L’ensemble des scripts du site est disponible ici (dépôt github) :
https://github.com/WildCodeSchool/orleans-0217-jardinsdegaston
a) – cloner le dépôt (git clone)
b) – Utiliser composer pour installer les modules nécessaires (composer install)
c) – Changer le propriétaire de l’arborescence (chmod -R <userApache>:<groupApache>  <arborescence>)
d) – Faire pointer la racine du site web sur le répertoire web (serveur virtuel apache)
 


4°) - Base de données :
=======================
Base de données MySQL, nom de la base : db_gaston,
- Créer la database,
- Créer un user/password avec tous les droits sur les tables de db_gaston
- Importer le dump gaston.sql (placé à la racine du projet)
- Créer un fichier src/model/connect.php contenant :
	<?php
	define("DSN", "mysql:host=localhost;dbname=db_gaston");
	define("USER", "<nom_user>");
	define("PASS", "<password>"


5°) - Arborescence projet :
===========================
*-----------------------*-----------------------------------------------------------------------*
* Arborescence		* Contenu								*
*-----------------------*-----------------------------------------------------------------------*
* src			* (presque) tous les scripts du site					*
*-----------------------*-----------------------------------------------------------------------*
* src/controller	* Arbo controllers + classes Controller.php et ErrorController.php	*
*-----------------------*-----------------------------------------------------------------------*
* src/controller/admin	* Toutes les classes controller pour l’admin 				*
*-----------------------*-----------------------------------------------------------------------*
* src/controller/site	* Les classes controller pour le site et le journal			*
*-----------------------*-----------------------------------------------------------------------*
* src/form		* Les formulaires 							*
*-----------------------*-----------------------------------------------------------------------*
* src/model		* Toutes les classes entity et entityManager + le fichier connect.php  	* 
*-----------------------*-----------------------------------------------------------------------*
* src/view		* Arbo vues twig							*
* src/view/admin/...	* vues twig admin							*
* src/view/site		* vues twig site et journal						*
*-----------------------*-----------------------------------------------------------------------*
* vendor		* arbo gérée par composer						*
*-----------------------*-----------------------------------------------------------------------*
* web			* arbo site public							*
*			* + index.php (site public et journal) + .htaccess pour url rewriting	*
*-----------------------*-----------------------------------------------------------------------*
* web/admin		* index.php pour l’admin						*
*			* + .htaccess (url rewriting et authentification) et .htpassword	*
*-----------------------*-----------------------------------------------------------------------*
* web/css		* tous les css								*
*-----------------------*-----------------------------------------------------------------------*
* web/fonts		* Police(s) personnalisee(s)						*
*-----------------------*-----------------------------------------------------------------------*
* web/img		* toutes les images du site						*
*-----------------------*-----------------------------------------------------------------------*
* web/js		* tous les javascrip et jquery						*
*-----------------------*-----------------------------------------------------------------------*
* web/tmp		* zone de chargement temporaire des images.				*
*-----------------------*-----------------------------------------------------------------------*


Nommage des images :
====================
Toutes les images modifiables 
- sont au format .jpg (ou .jpeg),
- sont préfixées ‘img’, et identifiés par une lettre (B = background, Rav ou Rap = réalisation, P = prestation,
J = journal), puis par un tiret, puis un nombre correspodant à l'id de l'objet correspondant en base de données,
puis l'extension .jpg (ex : imgP-4.jpg = l'image correspondant à pa prestation enregistrement 4 de la table prestation).
Formats : B = 1920x1200, R = 750x400, P = 400x400, J = 600x400
Cas particulier des réalisations : les images "avant" et "après" sont identifiées par Rav et Rap (ex : imgRav-3.jpg
et imgRap-3.jpg sont les 2 images associées à l'enregistrement 3 de la table realisation)
Les images modifiables sont automatiquement adaptées en taille et résolution, en fonction de leur destination, lors
de l'upload.

*-----------------------*---------------*-----------------------------------------------------------------------*
* Nom des images	* Modifiable	* Commentaire								*
*-----------------------*---------------*-----------------------------------------------------------------------*
* bgimg1.jpg		* automatique	* Image de fond pour l’accueil (nom de fichier utilisé dans le CSS)	*
*-----------------------*---------------*-----------------------------------------------------------------------*
* bgimgref.jpg		* non		* Image de fond de secours (si image normale non trouvée)		*
*-----------------------*---------------*-----------------------------------------------------------------------*
* bgimg2.jpg		* non		* Image de fond de transition						*
*-----------------------*---------------*-----------------------------------------------------------------------*
* bgimg3.jpg		* non		* image de fond ‘Et pendant ce temps-là, chez Gaston’			*
*-----------------------*---------------*-----------------------------------------------------------------------*
* bgimg4.jpg		* non		* image de fond ‘Conseil du moment’					*
*-----------------------*---------------*-----------------------------------------------------------------------*
* bgimg5.jpg		* non		* image formulaire contact						*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgB-1.jpg		* oui		* Image préparée pour fond accueil Printemps				*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgB-2.jpg		* oui		* Image préparée pour fond accueil Eté					*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgB-3.jpg		* oui		* Image préparée pour fond accueil Automne				*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgB-4.jpg		* oui		* Image préparée pour fond accueil Hiver				*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgB-ref.jpg		* non		* Image vide (remplacement) format background (1920x1200)		*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgRav-x.jpg		* oui		* Image réalisation avant (x = id de la realisation)			*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgRap-x.jpg		* oui		* Image réalisation après (x = id de la realisation)			*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgRav-ref.jpg	* non		* image vide (remplacement) format réalisation (750x400)		*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgRap-ref.jpg	* non		* image vide (remplacement) format réalisation (750x400)		*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgP-x.jpg		* oui		* Image prestation (x = id de la prestation)				*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgP-ref.jpg		* non		* Image vide (remplacement) format prestation (400x400)			*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgJ-x.jpg		* oui		* image journal (x = id de l’article du journal)			*
*-----------------------*---------------*-----------------------------------------------------------------------*
* imgJ-ref.jpg		* non		* Image vide (remplacement) format journal (600x400)			*
*-----------------------*---------------*-----------------------------------------------------------------------*

Credits :
=========
Ce projet a été développé par les élèves de la Wild Code School - session février 2017
Isabelle MULIGO, Jérémie DAVIAUD, Sylvain JAN, Patrick FAUCHEUX
Assistés de leurs formateurs Sylvain et Nicolas

