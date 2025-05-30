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
