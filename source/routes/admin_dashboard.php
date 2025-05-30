<?php include 'includes/header.php'; ?>

<main class="dashboard">
    <h2>Espace administrateur</h2>

    <section class="cards-admin">
        <a href="gestion_utilisateurs.php" class="card-action orange">
            <h3>Gestion des utilisateurs</h3>
            <p>Ajouter, modifier ou supprimer des comptes utilisateurs.</p>
        </a>

        <a href="types_actes.php" class="card-action green">
            <h3>Types d’actes</h3>
            <p>Créer ou gérer les catégories d’actes administratifs.</p>
        </a>

        <a href="statistiques.php" class="card-action bleu">
            <h3>Statistiques & Export</h3>
            <p>Voir les données globales et exporter en CSV ou PDF.</p>
        </a>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
