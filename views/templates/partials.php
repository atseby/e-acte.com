<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Une description courte de la page.">
  <meta name="author" content="Ton Nom">

  <title><?php echo "e-Actes: " . $title ?></title>

  <!-- Favicon -->
  <link rel="icon" href="favicon.ico">

  <!-- Feuille de style principale -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "main.css" ?>">

  <!-- Feuille de style du menu principal -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "menu.css" ?>">

  <!-- Feuille de style de register -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "register.css" ?>">

  <!-- Feuille de style de Blog -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "blog.css" ?>">

  <!-- Feuille de style de Blog -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "faq.css" ?>">

  <!-- Feuille de style de Blog -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "accueil.css" ?>">

  <!-- Feuille de style de Profil -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "profil.css" ?>">

  <!-- Feuille de style de dashboard_agent -->
  <link rel="stylesheet" href="<?php echo ROOT . SP . ASSETS . SP . "css" . SP . "dashboard_agent.css" ?>">

  <!-- Police Google Fonts (exemple) -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">




</head>

<body>

  <!-- Overlay -->
  <div class="overlay" id="menuOverlay" onclick="toggleMenu(false)"></div>

  <!-- Menu mobile -->
  <div class="mobile-menu" id="mobileMenu">
    <button class="close-btn" onclick="toggleMenu(false)">❌</button>
    <nav>
      <ul>
        <li><a href="accueil">Accueil</a></li>
        <li><a href="blog">Blog</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="faq">FAQ</a></li>
      </ul>
    </nav>
  </div>

  <!-- En-tête -->
  <header>
    <h1>e-Actes</h1>
    <!-- Bouton hamburger -->
    <button class="menu-toggle d-lg-none" onclick="toggleMenu(true)">☰</button>

    <!-- Menu desktop -->
    <nav class="desktop-menu d-none d-lg-flex">
      <a href="accueil">Accueil</a>
      <a href="blog">Blog</a>
      <a href="contact">Contact</a>
      <a href="faq">FAQ</a>
    </nav>
  </header>

  <main>

    <?php echo $content ?>

  </main>

  <footer>
    <p>&copy; 2025 - Ministère de l’Administration. Tous droits réservés.</p>
  </footer>

  <!-- Script JavaScript du menu principal -->
  <script src="<?php echo ROOT . SP . ASSETS . SP . "js" . SP . "menu.js" ?>"></script>

  <!-- Script JavaScript de demande d'acte dynamique -->
  <script src="<?php echo ROOT . SP . ASSETS . SP . "js" . SP . "demande-dynamique.js" ?>"></script>

    <!-- Script JavaScript de paiement dynamique de timbre -->
  <script src="<?php echo ROOT . SP . ASSETS . SP . "js" . SP . "paiement-dynamique.js" ?>"></script>

  <!-- Script JavaScript JS pour BOOSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>