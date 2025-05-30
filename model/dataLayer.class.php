<?php

class DataLayer {
    // Propriété privée pour stocker la connexion PDO
    private $connexion;

    // Constructeur pour initialiser la connexion
    public function __construct() {
        try {
            // Utilisation des constantes définies dans le fichier config.php
            $this->connexion = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", 
                DB_USER, 
                DB_PASSWORD
            );
            
            // Configuration des options PDO
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Activer les exceptions
            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // Mode tableau associatif
            
            return NULL;
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    // FONCTION D'INSCRIPTION CITOYEN

    function userRegister($nom, $email, $telephone, $motdepasse) {
    try {
        // Vérification si l'e-mail est déjà utilisé
        $verif = $this->connexion->prepare("SELECT id FROM utilisateur WHERE email = :email");
        $verif->bindParam(':email', $email);
        $verif->execute();

        if ($verif->rowCount() > 0) {
            // L'email existe déjà
            return false;
        }

        // Hachage du mot de passe
        $hash = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Insertion dans la base de données
        $stmt = $this->connexion->prepare("INSERT INTO utilisateur (nom, email, telephone, mot_de_passe) VALUES (:nom, :email, :telephone, :motdepasse)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':motdepasse', $hash);

        $stmt->execute();
        // INSCRIPTION REUSSI
        return true;
    } catch (PDOException $e) {
        // ERREUR D'INSCRIPTION
        return false;
    }
}

// FONCTION CONNEXION CITOYEN

function userLogin($email, $motdepasse) {
    try {
        // Rechercher le citoyen par email
        $stmt = $this->connexion->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($motdepasse, $user['mot_de_passe'])) {
            // Connexion réussi
            return $user;
        } else {
            return null;
        }

    } catch (PDOException $e) {
        return null;
    }
}


// FONCTION POUR ENVOYER UNE DEMANDE D'ACTE
function envoyerDemande($data) {
    try {
        $sql = "INSERT INTO demande (
            utilisateur_id,
            type_acte_id,
            nombre_copies,
            motif,
            nom_enfant,
            date_heure_naissance,
            nomCompletPere,
            nomCompletMere,
            numero_extrait,
            extrait_mariee,
            extrait_marie,
            extrait_defunt,
            moyen_paiement,
            numero_depot,
            reference_paiement,
            montant_paye
        ) VALUES (
            :utilisateur_id, :type_acte_id, :nombre_copies, :motif, :nom_enfant, :date_heure_naissance,
            :nomCompletPere, :nomCompletMere, :numero_extrait, :extrait_mariee, :extrait_marie,
            :extrait_defunt, :moyen_paiement, :numero_depot, :reference_paiement, :montant_paye
        )";

        $stmt = $this->connexion->prepare($sql);
        $execution = $stmt->execute([
            ':utilisateur_id'       => $data['utilisateur_id'],
            ':type_acte_id'         => $data['type_acte_id'],
            ':nombre_copies'        => $data['nombre_copies'],
            ':motif'                => $data['motif'],
            ':nom_enfant'           => $data['nom_enfant'] ?? null,
            ':date_heure_naissance' => $data['date_heure_naissance'] ?? null,
            ':nomCompletPere'       => $data['nomCompletPere'] ?? null,
            ':nomCompletMere'       => $data['nomCompletMere'] ?? null,
            ':numero_extrait'       => $data['numero_extrait'] ?? null,
            ':extrait_mariee'       => $data['extrait_mariee'] ?? null,
            ':extrait_marie'        => $data['extrait_marie'] ?? null,
            ':extrait_defunt'       => $data['extrait_defunt'] ?? null,
            ':moyen_paiement'       => $data['moyen_paiement'],
            ':numero_depot'         => $data['numero_depot'],
            ':reference_paiement'   => $data['reference_paiement'],
            ':montant_paye'         => $data['montant_paye']
        ]);

        if ($execution) {
            $lastId = $this->connexion->lastInsertId();
            $stmt2 = $this->connexion->prepare("SELECT * FROM demande WHERE id = :id");
            $stmt2->execute([':id' => $lastId]);
            $demandeActe = $stmt2->fetch(PDO::FETCH_ASSOC);
            return $demandeActe;
        } else {
            return false;
        }

    } catch (PDOException $e) {
        error_log("Erreur lors de l'envoi de la demande : " . $e->getMessage());
        return false;
    }
}

// FONCTION POUR RECUPERER LES DEMANDES D'ACTE D'UN UTILISATEUR
function getDemandesByUtilisateur($utilisateur_id) {

    try {
        $stmt = $this->connexion->prepare("
            SELECT d.*, t.libelle AS type_acte
            FROM demande d
            JOIN type_acte t ON d.type_acte_id = t.id
            WHERE d.utilisateur_id = :id
            ORDER BY d.date_demande DESC
        ");
        $stmt->execute([':id' => $utilisateur_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        error_log("Erreur récupération demandes : " . $e->getMessage());
        return [];
    }
}


}
