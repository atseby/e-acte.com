document.addEventListener('DOMContentLoaded', () => {
  const typeActe = document.getElementById('type_acte');
  const fraisTimbreInput = document.getElementById('frais_timbre');

  document.addEventListener('input', () => {
    // Si champ copie existe (cas copie acte naissance)
    const nbCopiesField = document.querySelector('input[name="nombre_copies"]');
    if (nbCopiesField && fraisTimbreInput) {
      const nb = parseInt(nbCopiesField.value);
      if (!isNaN(nb) && nb > 0) {
        fraisTimbreInput.value = (nb * 500) + ' F CFA';
      } else {
        fraisTimbreInput.value = '';
      }
    }
  });
});
