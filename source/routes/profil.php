<?php include 'includes/header.php'; ?>

<main class="profil-page">
    <h2>Mon profil</h2>

    <section class="profil-formulaire">
        <form action="traitement_profil.php" method="post" class="formulaire">
            <div class="form-groupe">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="Traoré" required>
            </div>

            <div class="form-groupe">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="Aïcha" required>
            </div>

            <div class="form-groupe">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="aicha@email.com" required>
            </div>

            <div class="form-groupe">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="+2250102030405" required>
            </div>

            <hr>

            <h3>Modifier mon mot de passe</h3>

            <div class="form-groupe">
                <label for="ancien_mdp">Ancien mot de passe</label>
                <input type="password" id="ancien_mdp" name="ancien_mdp">
            </div>

            <div class="form-groupe">
                <label for="nouveau_mdp">Nouveau mot de passe</label>
                <input type="password" id="nouveau_mdp" name="nouveau_mdp">
            </div>

            <div class="form-groupe">
                <label for="confirmation_mdp">Confirmer le mot de passe</label>
                <input type="password" id="confirmation_mdp" name="confirmation_mdp">
            </div>

            <button type="submit" class="btn vert">Mettre à jour</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
