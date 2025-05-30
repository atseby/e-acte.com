<?php include 'includes/header.php'; ?>

<main class="formulaire-page">
    <h2>Demande d'acte administratif</h2>

    <form action="traitement_demande_acte.php" method="post" enctype="multipart/form-data" class="formulaire">

        <div class="form-groupe">
            <label for="type_acte">Type d'acte demandé</label>
            <select id="type_acte" name="type_acte" required>
                <option value="">-- Sélectionner --</option>
                <option value="naissance">Acte de naissance</option>
                <option value="mariage">Acte de mariage</option>
                <option value="décès">Acte de décès</option>
            </select>
        </div>

        <div class="form-groupe">
            <label for="infos_demande">Informations complémentaires</label>
            <textarea id="infos_demande" name="infos_demande" rows="4" placeholder="Indiquez les informations utiles (nom complet, date de naissance, etc.)" required></textarea>
        </div>

        <div class="form-groupe">
            <label for="justificatif">Pièces justificatives (PDF, JPG, PNG)</label>
            <input type="file" id="justificatif" name="justificatif[]" accept=".pdf,.jpg,.jpeg,.png" multiple required>
        </div>

        <button type="submit" class="btn orange">Soumettre la demande</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>
