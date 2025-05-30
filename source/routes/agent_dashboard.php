<?php include 'includes/header.php'; ?>

<section class="dashboard">
    <h2>Tableau de bord – Agent administratif</h2>

    <section class="table-container">
        <h3>Demandes en attente</h3>
        <table class="table-demandes">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type d'acte</th>
                    <th>Date de la demande</th>
                    <th>État</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemple de ligne de demande -->
                <tr>
                    <td>Traoré Aïcha</td>
                    <td>Naissance</td>
                    <td>08/05/2025</td>
                    <td><span class="badge attente">En attente</span></td>
                    <td>
                        <a href="traiter_demande.php?id=1" class="btn vert">Traiter</a>
                    </td>
                </tr>
                <!-- Ajoute d'autres lignes dynamiquement avec PHP plus tard -->
            </tbody>
        </table>
    </section>

    <section class="actions-agent">
        <a href="ajouter_acte.php" class="btn orange">Ajouter un acte</a>
        <a href="messagerie.php" class="btn bleu">Communiquer avec l’usager</a>
    </section>
</section>

<?php include 'includes/footer.php'; ?>
