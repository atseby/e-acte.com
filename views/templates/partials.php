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
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/main.css">

  <!-- Feuille de style du menu principal -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/menu.css">

  <!-- Feuille de style de register -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/register.css">

  <!-- Feuille de style de Blog -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/blog.css">

  <!-- Feuille de style de Blog -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/faq.css">

  <!-- Feuille de style de Blog -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/accueil.css">

  <!-- Feuille de style de Profil -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/profil.css">

  <!-- Feuille de style de dashboard_agent -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/dashboard_agent.css">

  <!-- Feuille de style du formulaire pour filtrer les demandes -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/filter-form.css">

  <!-- Feuille de style pour détails demandes -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/details-demandes.css">

  <!-- Feuille de style pour dashboard_admin -->
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/dashboard_admin.css">


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
        <li><a href="<?= BASE_URL ?>/accueil">Accueil</a></li>
        <li><a href="<?= BASE_URL ?>/blog">Blog</a></li>
        <li><a href="<?= BASE_URL ?>/contact">Contact</a></li>
        <li><a href="<?= BASE_URL ?>/faq">FAQ</a></li>
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
      <a href="<?= BASE_URL ?>/accueil">Accueil</a>
      <a href="<?= BASE_URL ?>/blog">Blog</a>
      <a href="<?= BASE_URL ?>/contact">Contact</a>
      <a href="<?= BASE_URL ?>/faq">FAQ</a>
    </nav>
  </header>

  <main>

    <?php echo $content ?>

  </main>

  <footer>
    <p>&copy; 2025 - Ministère de l’Administration. Tous droits réservés.</p>
  </footer>

  <!-- Script JavaScript du menu principal -->
  <script src="<?= ASSETS_URL ?>/js/menu.js"></script>

  <!-- Script JavaScript de demande d'acte dynamique -->
  <script src="<?= ASSETS_URL ?>/js/demande-dynamique.js"></script>

    <!-- Script JavaScript de paiement dynamique de timbre -->
  <script src="<?= ASSETS_URL ?>/js/paiement-dynamique.js"></script>

  <!-- Script JavaScript JS pour BOOSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>