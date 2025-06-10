document.addEventListener('DOMContentLoaded', () => {
  const typeActe = document.getElementById('type_acte');
  const detailsContainer = document.getElementById('details-demande');
  const fraisTimbreInput = document.getElementById('frais_timbre');
  const moyenPaiement = document.getElementById('moyen_paiement');
  const numeroDepot = document.getElementById('numero_depot');
  const btnCopier = document.getElementById('btn-copier');

  const numeros = {
    orange: '0700000000',
    wave: '0700000000',
    moov: '0500000000',
    mtn: '0100000000'
  };

  // Afficher les champs selon le type d’acte
  typeActe.addEventListener('change', () => {
    const value = typeActe.value;
    detailsContainer.innerHTML = ''; // Réinitialiser

    switch (value) {
      case 'nouvelle_naissance':
        detailsContainer.innerHTML = `
          <div class="mb-3">
            <label for="nombre_copies" class="form-label">Nombre de copies <span style="color: red;">(*)</span>
</label>
            <input type="number" class="form-control" name="nombre_copies" id="nombre_copies" required>
          </div>
          <div class="mb-3">
            <label for="nom_enfant" class="form-label">Nom et prénoms de l’enfant <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="nom_enfant" required>
          </div>
          <div class="mb-3">
            <label for="date_heure_naissance" class="form-label">Date et heure de naissance <span style="color: red;">(*)</span>
</label>
            <input type="datetime-local" class="form-control" name="date_heure_naissance" required>
          </div>
          <div class="mb-3">
            <label for="nomCompletPere" class="form-label">Nom et prénoms du père <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="nomCompletPere" required>
          </div>
          <div class="mb-3">
            <label for="nomCompletMere" class="form-label">Nom et Prénoms de la mère <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="nomCompletMere" required>
          </div>
        `;
        break;

      case 'copie_naissance':
        detailsContainer.innerHTML = `
          <div class="mb-3">
            <label for="nombre_copies" class="form-label">Nombre de copies <span style="color: red;">(*)</span>
</label>
            <input type="number" class="form-control" name="nombre_copies" id="nombre_copies" required>
          </div>
          <div class="mb-3">
            <label for="numero_extrait" class="form-label">Numéro et registre de l’extrait <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="numero_extrait" placeholder="789 du 13/11/2002 du registre 16" required>
          </div>
        `;
        break;

      case 'mariage':
        detailsContainer.innerHTML = `
          <div class="mb-3">
            <label for="nombre_copies" class="form-label">Nombre de copies <span style="color: red;">(*)</span>
</label>
            <input type="number" class="form-control" name="nombre_copies" id="nombre_copies" required>
          </div>
          <div class="mb-3">
            <label for="nomComplet_mariee" class="form-label">Nom et prénoms de la mariée <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="nomComplet_mariee" required>
          </div>
          <div class="mb-3">
            <label for="nomComplet_marie" class="form-label">Nom et prénoms du marié <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="nomComplet_marie" required>
          </div>
        `;
        break;

      case 'deces':
        detailsContainer.innerHTML = `
          <div class="mb-3">
            <label for="nombre_copies" class="form-label">Nombre de copies <span style="color: red;">(*)</span>
</label>
            <input type="number" class="form-control" name="nombre_copies" id="nombre_copies" required>
          </div>
          <div class="mb-3">
            <label for="extrait_defunt" class="form-label">Numéro de l’extrait de naissance du défunt <span style="color: red;">(*)</span>
</label>
            <input type="text" class="form-control" name="extrait_defunt" placeholder="789 du 13/11/2002 du registre 16" required>
          </div>
        `;
        break;
    }

    updateFrais(); // mise à jour immédiate
  });

  // Mettre à jour les frais automatiquement
  document.addEventListener('input', () => {
    updateFrais();
  });

  function updateFrais() {
    const nbCopiesField = document.querySelector('input[name="nombre_copies"]');
    if (nbCopiesField && fraisTimbreInput) {
      const nb = parseInt(nbCopiesField.value);
      fraisTimbreInput.value = (!isNaN(nb) && nb > 0) ? (nb * 500) + ' F CFA' : '';
    }
  }

  // Mettre à jour le numéro de paiement selon le moyen choisi
  moyenPaiement.addEventListener('change', () => {
    const valeur = moyenPaiement.value;
    numeroDepot.value = valeur && numeros[valeur] ? numeros[valeur] : '';
  });

  // Bouton "Copier"
  if (btnCopier) {
    btnCopier.addEventListener('click', () => {
      if (numeroDepot.value.trim() !== '') {
        numeroDepot.select();
        navigator.clipboard.writeText(numeroDepot.value)
          .then(() => {
            btnCopier.textContent = '✅ Copié';
            setTimeout(() => {
              btnCopier.textContent = '📋 Copier';
            }, 1500);
          })
          .catch(() => {
            alert('❌ Échec de la copie.');
          });
      }
    });
  }
});
