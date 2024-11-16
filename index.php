<?php
// Initialisation des paramètres du site
require_once('./config/configuration.php');
// require_once(PATH_TEXTES.LANG.'.php');

// besoin de require avant de serialiser / deserialiser
// require_once(PATH_ENTITY . 'User.php');
// Initialisation du système de session
// session_name('forum-ep');
// session_start();

//vérification de la page demandée 
if(isset($_GET['page']))
{
  // Nettoyage
  $page = htmlspecialchars($_GET['page']);
  if(!is_file(PATH_CONTROLLERS.$_GET['page'].".php"))
  { 
    $page = '404'; //page demandée inexistante
  }
}
else{
  $page='home'; //page par défaut si argument non spécifié
}

// Vérification connexion
// if (isset($_SESSION['account'])) {
//   $isLogged = true;
//   $user = unserialize($_SESSION['account']);
// }else{
//   $isLogged = false;
// }

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php');
?>
