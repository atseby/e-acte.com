<?php

function displayError($message = "La page demandée est introuvable.") {
    $result = '
    <div class="container text-center py-5">
        <h1 class="display-4 text-danger">Erreur 404</h1>
        <p class="lead text-muted">' . htmlspecialchars($message) . '</p>
        <a href="accueil" class="btn btn-primary mt-4">Retour à l\'accueil</a>
    </div>
    ';

    return $result;
}


function displayAccueil()
{
  $result = '
  <!-- Section Hero -->
  <section class="hero">
    <h1>Bienvenue sur le portail des actes administratifs</h1>
    <p>Un service numérique rapide, sécurisé et accessible à tous.</p>
    <div>
      <a href="login" class="btn-orange">Connexion</a>
      <a href="register" class="btn-green">Inscription</a>
    </div>
  </section>

  <!-- Section Objectifs -->
  <section class="section objectifs">
    <div class="container">
      <h2>Nos objectifs</h2>
      <ul>
        <li>Dématérialiser les démarches administratives</li>
        <li>Faciliter l’accès aux documents officiels</li>
        <li>Améliorer la communication entre citoyens et administration</li>
        <li>Réduire les délais de traitement des demandes</li>
        <li>Assurer la sécurité et la confidentialité des données</li>
      </ul>
    </div>
  </section>

  <!-- Section Services -->
  <section class="section services bg-light">
    <div class="container">
      <h2>Nos services</h2>
      <div class="row text-center">
        <div class="col-md-4">
          <h4>Acte de naissance</h4>
          <p>Demandez et recevez votre acte de naissance en ligne en toute simplicité.</p>
        </div>
        <div class="col-md-4">
          <h4>Acte de mariage</h4>
          <p>Obtenez votre acte de mariage sans vous déplacer, en quelques clics.</p>
        </div>
        <div class="col-md-4">
          <h4>Acte de décès</h4>
          <p>Procédez à la demande d’un acte de décès rapidement via notre plateforme.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Vidéos d\'actualité -->
  <section class="section videos">
    <div class="container">
      <h2>Actualités en Côte d\'Ivoire</h2>
      <div class="row">
        <div class="col-md-6">
          <iframe src="https://www.youtube.com/embed/Ofmi-GMIjLs" title="Le 20 Heures de RTI 1 du 22 mai 2025" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
          <iframe src="https://www.youtube.com/embed/Eqrg2cJ7I5s" title="Le Grand Talk du 23 mai 2025" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

<!-- Section Newsletter -->
<section class="section newsletter bg-light">
  <div class="container">
    <h2 class="text-center">Abonnez-vous à notre newsletter</h2>
    <p class="text-center mb-4">Recevez les dernières actualités sur l’état civil digitalisé, les mises à jour de services et les alertes importantes directement dans votre boîte mail.</p>

    <form action="newsletter.php" method="post" class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
      <input type="email" name="email" class="form-control w-100 w-md-50" placeholder="Votre adresse email" required>
      <button type="submit" class="btn-orange">S’abonner</button>
    </form>
  </div>
</section>

    ';
  return $result;
}

function displayRegister()
{
  $result = '
  <div class="register-form">
    <h2>Créer un compte</h2>
    <form action="' . BASE_URL . SP . "actionIncription" . '" method="post" enctype="multipart/form-data" class="formulaire">

      <div class="form-groupe">
        <label for="nom">Nom complet<span style="color:red;">*</span></label>
        <input type="text" id="nom" name="nom" placeholder="Ex: Money Brou Yanik" required>
      </div>

      <div class="form-groupe">
        <label for="email">Adresse Email<span style="color:red;">*</span></label>
        <input type="email" id="email" name="email" placeholder="Votre e-mail" required>
      </div>

      <div class="form-groupe">
        <label for="telephone">Téléphone<span style="color:red;">*</span></label>
        <input type="tel" id="telephone" name="telephone" placeholder="Numéro de téléphone" required>
      </div>

      <div class="form-groupe">
        <label for="motdepasse">Mot de passe<span style="color:red;">*</span></label>
        <input type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
      </div>

      <p>(<span style="color:red;">*</span>) indique que le champ est obligatoire.</p>

      <button type="submit" class="register-btn">S\'inscrire</button>
    </form>
  </div>
    ';
  return $result;
}

function displayLogin()
{
  $result = '
<div class="register-form">
  <h2>Connexion à votre compte</h2>
  <form action="' . BASE_URL . SP . "actionConnexion" . '" method="post" class="formulaire">
    <div class="form-groupe">
      <label for="email">Adresse Email<span style="color:red;">*</span></label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-groupe">
      <label for="motdepasse">Mot de passe<span style="color:red;">*</span></label>
      <input type="password" id="motdepasse" name="motdepasse" required>
    </div>

    <button type="submit" class="register-btn">Se connecter</button>
  </form>

  <p class="lien-inscription" style="text-align: center; margin-top: 20px;">
    Pas encore de compte ? <a href="register.php" style="color: orange; font-weight: bold; text-decoration: none;">Créer un compte</a>
  </p>
</div>
    ';
  return $result;
}

function displayContact()
{
  $result = '
  <div class="contact-page">
    <h2>Contactez-nous</h2>

    <section class="coordonnees">
        <h3>Coordonnées</h3>
        <p><strong>Adresse :</strong> Rue des Services Publics, Abidjan Plateau</p>
        <p><strong>Téléphone :</strong> +225 27 20 00 00 00</p>
        <p><strong>Email :</strong> contact@etatcivil.ci</p>
    </section>

    <section class="formulaire-contact">
        <h3>Formulaire de contact</h3>
        <form action="traitement_contact.php" method="post" class="formulaire">
            <div class="form-groupe">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-groupe">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-groupe">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn orange">Envoyer</button>
        </form>
    </section>
</div>
  ';
  return $result;
}

function displayBlog()
{
  $result = '
    <div class="blog-header">
    <div class="container">
      <h1>Blog - Digitalisation de l\'État Civil</h1>
      <p>Suivez les dernières actualités sur la modernisation des services d\'état civil en Côte d\'Ivoire</p>
    </div>
  </div>

  <div class="container my-5">
    <div class="blog-post">
      <img src="https://www.oneci.ci/assets/images/news/digitalisation-etat-civil.jpg" alt="Digitalisation de l\'état civil">
      <h2>Lancement de la Digitalisation de l\'État Civil à Yamoussoukro</h2>
      <p>Le 9 mars 2023, le ministre de l’Intérieur et de la Sécurité, le Général Vagondo DIOMANDE, a lancé la phase de généralisation du déploiement du logiciel état civil à Yamoussoukro. Cette initiative vise à inscrire l’état civil dans la modernité, afin de planifier le développement de la Côte d’Ivoire et de favoriser une gouvernance administrative efficiente. <a href="https://www.oneci.ci/a-la-une/2023/03/11/1678700198-loneci-lance-officiellement-la-digitalisation-de-letat-civil-en-cote-divoire" target="_blank">Lire la suite</a></p>
    </div>

    <div class="blog-post">
      <img src="https://www.gouv.ci/assets/images/news/enregistrement-naissances-maternites.jpg" alt="Enregistrement des naissances depuis les maternités">
      <h2>Enregistrement des Naissances depuis les Maternités</h2>
      <p>Depuis août 2024, l\'enregistrement des naissances est désormais possible directement depuis les maternités en Côte d\'Ivoire. Cette avancée permet de réduire le nombre de naissances non déclarées et de faciliter l\'accès aux documents d\'état civil pour tous. <a href="https://www.gouv.ci/_actualite-article.php?d=1&p=727&recordID=17320" target="_blank">Lire la suite</a></p>
    </div>

    <div class="blog-post">
      <img src="https://www.semlex.com/wp-content/uploads/2024/04/numerisation-registres-etat-civil.jpg" alt="Numérisation des registres d\'état civil">
      <h2>Numérisation des Registres d\'État Civil à Grand-Bassam</h2>
      <p>Le 8 avril 2024, l\'ONECI, en collaboration avec SEMLEX, a remis officiellement les supports de stockage des registres d’état civil numérisés au maire de Grand-Bassam. Cette initiative s’inscrit dans le cadre de la stratégie nationale de l’état civil et de l’identification, visant à moderniser et à sécuriser les données relatives à l’état civil sur l’ensemble du territoire ivoirien. <a href="https://www.semlex.com/2024/04/16/numerisation-des-registres-detat-civil/" target="_blank">Lire la suite</a></p>
    </div>
  </div>
  ';
  return $result;
}

function displayFaq()
{
  $result = '
  <div class="faq-header">
    <h1>Foire Aux Questions</h1>
    <p>Trouvez les réponses aux questions les plus fréquentes sur l’état civil digitalisé</p>
  </div>
  <div class="faq-container">
    <div class="accordion" id="faqAccordion">

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
            Comment puis-je demander un acte de naissance en ligne ?
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Vous pouvez faire une demande d’acte de naissance via la plateforme e-Actes. Il suffit de créer un compte, remplir le formulaire en ligne, et payer les frais de timbre via paiement mobile ou carte bancaire.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
            Quels sont les documents nécessaires pour une demande ?
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Pour une demande d’acte, vous devez fournir une pièce d’identité (ou une copie), des informations sur la naissance (date, lieu, noms des parents), et une adresse email valide.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
            Combien coûte la délivrance d’un acte d’état civil ?
          </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Les frais varient selon le type de document demandé. Généralement, le timbre électronique coûte entre 1000 et 2000 FCFA. Le paiement est sécurisé et en ligne.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
            Sous combien de temps puis-je recevoir mon acte ?
          </button>
        </h2>
        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Le délai moyen est de 24 à 72 heures. Vous recevrez une version signée numériquement en PDF dans votre espace personnel ou par email.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
            Que faire si j’ai oublié mon mot de passe ?
          </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Cliquez sur "Mot de passe oublié" sur la page de connexion et suivez les instructions pour réinitialiser votre mot de passe par email.
          </div>
        </div>
      </div>

    </div>
  </div>
  ';
  return $result;
}


function displayProfil()
{
  if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] == "citoyen") {
    $email = $_SESSION["user"]["email"];
    $nom = $_SESSION["user"]["nom"];
    $telephone = $_SESSION["user"]["telephone"];
    $result = '
<link rel="stylesheet" href="assets/css/profil.css">
<script src="assets/js/demande-dynamique.js" defer></script>
<script src="assets/js/paiement-dynamique.js" defer></script>
<div class="container-fluid">
  <div class="row">
    <!-- Barre latérale -->
    <nav class="col-md-3 sidebar d-none d-md-block">
      <h4>Mon espace</h4>
      <a href="#profil">📋 Mon profil</a>
      <a href="#demande">📝 Faire une demande</a>
      <a href="#suivi">📊 Suivre mes demandes</a>
      <a href="#resultats">📄 Mes actes délivrés</a>
      <a href="' . BASE_URL . SP . "actionLogoutUser" . '">🔐 Se déconnecter</a>
    </nav>

    <!-- Contenu principal -->
    <main class="col-md-9 content">

      <!-- Section : Profil -->
      <section id="profil">
        <h3 class="section-title">Mes informations</h3>
        <form action="update_profil.php" method="post">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="nom" name="nom" value="' . $nom . '">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" value="' . $email . '">
          </div>
          <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" value="' . $telephone . '">
          </div>
          <button type="submit" class="btn-orange">Mettre à jour</button>
        </form>
      </section>

      <hr class="my-5">

      <!-- Section : Demande d’acte en 3 étapes -->
      <section id="demande">
        <h3 class="section-title">Faire une demande d’acte</h3>
        <form action="' . BASE_URL . SP . "actionDemandeActe" . '" method="post" id="form-demande">
          <!-- Étape 1 : Choix du type d’acte -->
          <div class="mb-3">
            <label for="type_acte" class="form-label">Type d’acte</label>
            <select class="form-select" name="type_acte" id="type_acte" required>
              <option value="">-- Choisir --</option>
              <option value="nouvelle_naissance">Nouvel acte de naissance</option>
              <option value="copie_naissance">Copie d’acte de naissance</option>
              <option value="mariage">Acte de mariage</option>
              <option value="deces">Acte de décès</option>
            </select>
          </div>

          <!-- Étape 2 : Champs dynamiques -->
          <div id="details-demande"></div>

          <div class="mb-3">
            <label for="motif" class="form-label">Motif de la demande</label>
            <textarea class="form-control" name="motif" rows="3" required></textarea>
          </div>

          <!-- Étape 3 : Paiement des frais de timbre -->
          <div id="paiement-section" class="mt-4">
            <h5>Paiement des frais de timbre</h5>
            <div class="mb-3">
              <label for="frais_timbre" class="form-label">Frais de timbre à payer (500 F par copie)</label>
              <input type="text" class="form-control" id="frais_timbre" name="frais_timbre" readonly>
            </div>
            <div class="mb-3">
              <label for="moyen_paiement" class="form-label">Moyen de paiement</label>
              <select id="moyen_paiement" class="form-select" name="moyen_paiement" required>
                <option value="">-- Choisir --</option>
                <option value="orange">Orange Money</option>
                <option value="wave">Wave</option>
                <option value="moov">Moov Money</option>
                <option value="mtn">MTN Money</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="numero_depot" class="form-label">Numéro sur lequel effectuer le dépôt</label>
              <div class="input-group">
               <input type="text" class="form-control" id="numero_depot" name="numero_depot" readonly>
               <button type="button" class="btn btn-outline-secondary" id="btn-copier">📋 Copier</button>
              </div>
            </div>

            <div class="mb-3">
              <label for="reference_paiement" class="form-label">Identifiant du dépôt (après transfert manuel)</label>
              <input type="text" class="form-control" name="reference_paiement" required>
            </div>
            <p class="text-muted">Effectuez le dépôt sur le numéro affiché entre les parenthèses, puis renseignez l\'identifiant ici.</p>
          </div>

          <button type="submit" class="btn btn-success">Envoyer la demande</button>';

    if (isset($_SESSION['success'])) {
      $result .= '<div class="alert alert-success mt-3" role="alert">'
        . htmlspecialchars($_SESSION['success']) .
        '</div>';
      unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
      $result .= '<div class="alert alert-danger mt-3" role="alert">'
        . htmlspecialchars($_SESSION['error']) .
        '</div>';
      unset($_SESSION['error']);
    }
    global $model;
    $user_id = $_SESSION['user']['id'];
    $user_demandes = $model->getDemandesByUtilisateur($user_id);

    $result .= ' </form>
      </section>

      <hr class="my-5">

      <!-- Section : Suivi -->';
$result .= '
<section id="suivi">
  <h3 class="section-title">Mes demandes en cours</h3>
  
';

if (empty($user_demandes)) {
  $result .= '
    <div class="alert alert-info text-center mt-3">
      Aucune demande enregistrée pour le moment.
    </div>
  ';
} else {
  $result .= '
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th style="font-size: 14px;">Identifiant</th>
          <th style="font-size: 14px;">Date</th>
          <th style="font-size: 14px;">Type</th>
          <th style="font-size: 14px;">Nombre de copie</th>
          <th style="font-size: 14px;">Frais de timbre</th>
          <th style="font-size: 14px;">Opérateur</th>
          <th style="font-size: 14px;">ID_paiement</th>
          <th style="font-size: 14px;">Statut</th>
        </tr>
      </thead>
      <tbody>
  ';

  foreach ($user_demandes as $demande) {
    $badgeClass = match ($demande['statut']) {
      'validée'    => 'bg-success',
      'refusée'    => 'bg-danger',
      'en attente' => 'bg-warning',
      default      => 'bg-secondary',
    };

    $typeLibelles = [
    'nouvelle_naissance' => 'Nouvel acte de naissance',
    'copie_naissance'    => 'Copie d\'acte de naissance',
    'mariage'            => 'Acte de mariage',
    'deces'              => 'Acte de décès'
];


    $result .= '
      <tr>
        <td>#' . htmlspecialchars($demande['id']) . '</td>
        <td>' . date('d/m/Y', strtotime($demande['date_demande'])) . '</td>
        <td>' . htmlspecialchars($typeLibelles[$demande['type_acte']] ?? $demande['type_acte']) . '</td>
        <td>' . (int) $demande['nombre_copies'] . '</td>
        <td>' . (int) $demande['montant_paye'] . ' F CFA</td>
        <td>' . ucfirst($demande['moyen_paiement']) . '</td>
        <td>' . htmlspecialchars($demande['reference_paiement']) . '</td>
        <td><span class="badge ' . $badgeClass . '">' . ucfirst($demande['statut']) . '</span></td>
      </tr>
    ';
  }

  $result .= '
      </tbody>
    </table>
  ';
}

$result .= '</section>';


      $result .= '<hr class="my-5">

      <!-- Section : Résultats -->
      <section id="resultats">
        <h3 class="section-title">Actes délivrés</h3>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Type</th>
              <th>Date de délivrance</th>
              <th>Téléchargement</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Acte de naissance</td>
              <td>10/05/2025</td>
              <td><a href="documents/acte_naissance_10_05.pdf" class="btn btn-sm btn-outline-primary" target="_blank">Télécharger</a></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</div>';
  } else {
    header("Location: login");
    exit();
  }

  return $result;
}





function displaydashboard_agent()
{
  $result = '
  <!-- Menu latéral -->
<aside class="sidebarAgent">
  <h2>e-Actes</h2>
  <a href="#dashboard" class="active"><i class="fas fa-chart-line"></i> Tableau de bord</a>
  <a href="#demandes"><i class="fas fa-folder-open"></i> Demandes reçues</a>
  <a href="#ajouter"><i class="fas fa-plus-circle"></i> Ajouter un acte</a>
  <a href="#messagerie"><i class="fas fa-envelope"></i> Messagerie</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
</aside>

<!-- Zone principale -->
<div class="mainAgent">
  <h2 class="mb-4">Tableau de bord – Agent administratif</h2>

  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card p-3 text-white bg-success">
        <h4>Demandes traitées</h4>
        <p class="display-6">120</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3 text-white bg-warning">
        <h4>En attente</h4>
        <p class="display-6">35</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3 text-white bg-primary">
        <h4>Messages non lus</h4>
        <p class="display-6">8</p>
      </div>
    </div>
  </div>

  <section id="demandes">
    <div class="card">
      <div class="card-header">
        <h5>Dernières demandes reçues</h5>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Type d’acte</th>
              <th>Date</th>
              <th>Statut</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Traoré Aïcha</td>
              <td>Naissance</td>
              <td>20/05/2025</td>
              <td><span class="badge bg-warning">En attente</span></td>
              <td>
                <a href="traiter_demande.php?id=1" class="btn btn-sm btn-success btn-action">Traiter</a>
                <a href="details.php?id=1" class="btn btn-sm btn-secondary btn-action">Voir</a>
              </td>
            </tr>
            <tr>
              <td>Koné Youssouf</td>
              <td>Mariage</td>
              <td>18/05/2025</td>
              <td><span class="badge bg-info text-dark">En cours</span></td>
              <td>
                <a href="traiter_demande.php?id=2" class="btn btn-sm btn-success btn-action">Traiter</a>
                <a href="details.php?id=2" class="btn btn-sm btn-secondary btn-action">Voir</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
  ';
  return $result;
}
