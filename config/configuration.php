<?php
 
const DEBUG = false; // production : false; dev : true

// Accès base de données
// const BD_HOST = 'xxxxxx';
// const BD_DBNAME = 'forumep';
// const BD_USER = 'root';
// const BD_PWD = 'xxxxxx';

// Décommentez les lignes du dessous si vous voulez utiliser la base locale de votre PC
const BD_HOST = 'localhost';
const BD_DBNAME = 'forumep';
const BD_USER = 'root';
const BD_PWD = '';

// Langues du site si jamais on veut faire des traductions (créer un dossier "lang" avec les fichiers de langues)
// const LANG ='FR-fr';
// const LANG = 'EN-en';

// Auteurs du site
const AUTEUR = 'Anne PASSELÈGUE - Justine VENET - Thomas KREBS'; 

// Dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ENTITY','./entities/');
define('PATH_ASSETS','./assets/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/v_');

// Sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');
define('PATH_CVS', PATH_ASSETS.'cvs/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_OFFERS', PATH_ASSETS.'offers/');
