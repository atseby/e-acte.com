<?php include 'includes/header.php'; ?>

<main class="dashboard">
    <h2>Bienvenue sur votre tableau de bord</h2>

    <section class="actions">
        <a href="demande_acte.php" class="card-action orange">
            <h3>Faire une nouvelle demande</h3>
            <p>Remplissez un formulaire pour obtenir un acte administratif.</p>
        </a>

        <a href="mes_demandes.php" class="card-action green">
            <h3>Mes demandes</h3>
            <p>Consultez l’état de vos demandes en cours ou archivées.</p>
        </a>

        <a href="acte_view.php" class="card-action bleu">
            <h3>Téléchargement d’actes</h3>
            <p>Voir et télécharger vos actes validés en PDF.</p>
        </a>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
