<?php
// LES CONSTANTES D'UTILISATION

define("SP",DIRECTORY_SEPARATOR);
define("BASE_URL",(dirname($_SERVER['SCRIPT_NAME'])));
define ("SRC","source");
define("ASSETS_URL", BASE_URL . "/source/assets");
define("ROOT",dirname(SRC));
define("VIEWS",ROOT.SP."views");
define("TEMPLATES",VIEWS.SP."templates");
define("CONFIG",ROOT.SP."config");
define("MODEL",ROOT.SP."model");

// IMPORTATION DU FICHIER config.php
require_once CONFIG.SP. "config.php";

// IMPORTATION DU MODEL
require_once MODEL.SP. "dataLayer.class.php";

// Créer une instance de la classe DataLayer
$model = new DataLayer();

// LES ROUTES DU SITES
require SRC.SP."routes.php";

// LES ACTIONS DU SITES
require SRC.SP."actions.php";


