<?php include 'includes/header.php'; ?>

<main class="contact-page">
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
</main>

<?php include 'includes/footer.php'; ?>
