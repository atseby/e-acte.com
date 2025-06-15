<?php

function displayActionIncription(){
    global $model;
    if(isset($_POST) && !empty($_POST)){
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $telephone = $_POST["telephone"];
        $motdepasse = $_POST["motdepasse"];
        $result = $model->userRegister($nom, $email, $telephone, $motdepasse);
        if($result == 1){
            displayActionConnexion();

        }
        else{
            return "❌ Inscription échouée";

        }
        
    }

}

function displayActionConnexion(){
    $email = $_POST["email"];
    $password = $_POST["motdepasse"];
    global $model;
    $user = $model->userLogin($email, $password);
    if(isset($user)){
        // L'utilisateur existe
        $_SESSION["user"] = $user;
        if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
            if($_SESSION["user"]["role"] == "agent"){
                header("Location: dashboard_agent");
                exit();
            }
            header("Location: profil");
            exit();
        }
        

    }
    else{
        return "❌ Adresse e-mail ou mot de passe incorrect.";
    }

}

function displayActionDemandeActe() {
    global $model;

    if (isset($_SESSION["user"])) {
        $data = $_POST; // Plus sécurisé que $_REQUEST
        $data['utilisateur_id'] = $_SESSION["user"]["id"];

        // Nettoyage basique (optionnel)
        $data['nombre_copies'] = intval($data['nombre_copies'] ?? 1);
        $data['montant_paye'] = $data['nombre_copies'] * 500;
        $typeMapping = [
            'nouvelle_naissance'=> 1,
            'copie_naissance'=> 2,
            'mariage'=> 3,
            'deces'=> 4
        ];
        $data['type_acte_id'] = $typeMapping[$data['type_acte']];

        $demandeActe = $model->envoyerDemande($data);

        if ($demandeActe) {
            $_SESSION['success'] = "Votre demande a été enregistrée avec succès.";
            header("Location: profil#suivi");
        } else {
            $_SESSION['error'] = "Une erreur est survenue. Veuillez réessayer.";
            header("Location: profil#demande");
        }
        exit;
    } else {
        $_SESSION['error'] = "Vous devez être connecté pour faire une demande.";
        header("Location: login");
        exit;
    }
}

function displayActionLogoutUser() {

    // Supprimer uniquement la session de l'utilisateur
    unset($_SESSION['user']);

    // Redirection vers la page de connexion ou d’accueil
    header("Location: login");
    exit;
}

// FONCTION POUR GENERER LES FICHIERS PDF DES DEMANDES D'ACTE
function displayActionGenererPDFDemande() {
    
    global $model;

    $demande_id = $_POST['demande_id'] ?? null;
    if (!$demande_id) {
        die("ID de la demande non spécifié.");
    }

    // Récupération des données
    $demande = $model->getDemandeById($demande_id);
    $demande['type_acte'] = $model->getTypeActeById($demande['type_acte_id']);
    $user = $model->getUserById($demande['utilisateur_id']);
    $user_email = $user['email'];

    if (!$demande) {
        die("Demande introuvable.");
    }

    // Initialisation du PDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('État Civil Côte d’Ivoire');
    $pdf->SetTitle('Acte - ' . ucfirst($demande['type_acte']));
    $pdf->SetMargins(15, 20, 15);
    $pdf->AddPage();

    $date_daujourdhui = date("d/m/Y");
    $html = ''; // Contenu HTML dynamique

    // ----------------------------------------
    // GÉNÉRATION SPÉCIFIQUE SELON LE TYPE D’ACTE
    // ----------------------------------------
    switch ($demande['type_acte']) {
        case 'nouvelle_naissance':
            $date_naissance = date('d/m/Y', strtotime($demande['date_heure_naissance']));
            $heure_naissance = date('H:i', strtotime($demande['date_heure_naissance']));
            $date_naissance_lettres = utf8_encode(strftime('%e %B %Y', strtotime($demande['date_heure_naissance'])));

            $html .= '
            <table width="100%" cellpadding="5">
                <tr>
                    <td width="50%" style="font-size: 12px;">
                        REPUBLIQUE DE COTE D\'IVOIRE<br><br>
                        COMMUNE D\'ATTECOUBE<br><br>
                        <img src="source/assets/images/logo_maire.jpeg" width="100" height="100"><br><br>
                        REF: ETAT CIVIL CENTRE DE <strong>ATTECOUBE COMMUNE</strong><br><br>
                        N° ' . htmlspecialchars($demande["numero_extrait"]) . '
                    </td>
                    <td width="50%" align="right" style="font-size: 12px;">
                        <strong>EXTRAIT</strong><br>
                        du registre des actes de l\'état civil<br>
                        pour l\'année ' . date('Y') . '<br><br>
                        Le ' . $date_naissance_lettres . ' est né <strong>' . htmlspecialchars($demande["nom_enfant"]) . '</strong><br>
                        à la maternité d\'Attécoubé à ' . $heure_naissance . '<br><br>
                        Fils de <strong>' . htmlspecialchars($demande["nomCompletPere"]) . '</strong><br>
                        et de <strong>' . htmlspecialchars($demande["nomCompletMere"]) . '</strong>
                    </td>
                </tr>
            </table>';
            break;

        case 'copie_naissance':
            $html .= '
            <h2 align="center">COPIE D’ACTE DE NAISSANCE</h2>
            <p><strong>Numéro de l’extrait :</strong> ' . htmlspecialchars($demande["numero_extrait"]) . '</p>
            <p><strong>Copies demandées :</strong> ' . htmlspecialchars($demande["nombre_copies"]) . '</p>';
            break;

        case 'mariage':
            $html .= '
            <h2 align="center">EXTRAIT D’ACTE DE MARIAGE</h2>
            <p><strong>Marié :</strong> ' . htmlspecialchars($demande["nomComplet_marie"]) . '</p>
            <p><strong>Mariée :</strong> ' . htmlspecialchars($demande["nomComplet_mariee"]) . '</p>
            <p><strong>Copies :</strong> ' . htmlspecialchars($demande["nombre_copies"]) . '</p>';
            break;

        case 'deces':
            $html .= '
            <h2 align="center">ACTE DE DÉCÈS</h2>
            <p><strong>Numéro de l’extrait du défunt :</strong> ' . htmlspecialchars($demande["extrait_defunt"]) . '</p>
            <p><strong>Copies :</strong> ' . htmlspecialchars($demande["nombre_copies"]) . '</p>';
            break;

        default:
            $html .= '<p>Type de demande non reconnu.</p>';
            break;
    }

    // ----------------------------------------
    // Infos communes
    // ----------------------------------------
    $html .= '<br><hr><br>
    <h4>MENTIONS (éventuellement) :</h4>
    <p>
        Marié le .................. à ....................<br><br>
        Avec .............................................<br><br>
        Mariage dissous par décision de divorce en date du ...................<br><br>
        Décédé le ...................................... à ...................<br><br>
        Certifie le présent extrait conforme aux indications portées au registre.
    </p>
    <br><br><br>
    <table width="100%">
        <tr>
            <td width="50%">
                <img src="source/assets/images/timbre_500.jpg" width="80">
            </td>
            <td width="50%" align="right">
                Délivré à Attécoubé, le ' . $date_daujourdhui . '<br>
                Officier de l\'Etat Civil<br>
                L\'agent de l\'Etat Civil<br><br>
                <img src="source/assets/images/signature_officier.jpg" width="80"><br>
                <img src="source/assets/images/cachet.png" width="60">
            </td>
        </tr>
    </table>';

    // Ajouter le HTML au PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // QR Code
    $pdf->write2DBarcode('' . $demande['id'], 'QRCODE,H', 15, 250, 30, 30);

    // Affichage ou téléchargement
    $pdf->Output('acte_' . $demande['type_acte'] . '_' . $demande['id'] . '.pdf', 'I');
}


// FONCTION POUR VALIDER DEMANDES D'ACTE
function displayActionValiderDemande() {
    global $model;

    if (isset($_POST['demande_id']) && !empty($_POST['demande_id'])) {
        $demande_id = intval($_POST['demande_id']);
        $acteur_id = $_SESSION['user']['id'] ?? null;

        // Chemin du fichier PDF généré à stocker
        $chemin_pdf = "documents/acte_" . $demande_id . ".pdf";

        $result = $model->validerDemande($demande_id, $chemin_pdf, $acteur_id);

        if ($result) {
            $_SESSION['success'] = "✅ La demande a été validée avec succès.";
        } else {
            $_SESSION['error'] = "❌ La demande ne peut pas être validée (peut-être déjà validée).";
        }
    } else {
        $_SESSION['error'] = "❌ ID de la demande manquant.";
    }

    header("Location: " . BASE_URL . "/detailsdemande/" . $demande_id);
    exit;
}

// FONCTION POUR REFUSER UNE DEMANDE D'ACTE
function displayActionRefuserDemande() {
    global $model;

    if (isset($_POST['demande_id']) && !empty($_POST['demande_id'])) {
        $demande_id = intval($_POST['demande_id']);
        $acteur_id = $_SESSION['user']['id'] ?? null;

        $result = $model->refuserDemande($demande_id, $acteur_id);

        if ($result) {
            $_SESSION['success'] = "✅ La demande a été refusée avec succès.";
        } else {
            $_SESSION['error'] = "❌ La demande ne peut pas être refusée (peut-être déjà validée).";
        }
    } else {
        $_SESSION['error'] = "❌ ID de la demande manquant.";
    }

    header("Location: " . BASE_URL . "/detailsdemande/" . $demande_id);
    exit;
}
