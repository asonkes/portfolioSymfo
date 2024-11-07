const snip1573 = document.querySelector('.snip1573');
const figcationText = document.querySelector('.figcationText');
const block = document.getElementById('triangleTwo-transparent');
let hoverTimeout;

// Fonction pour gérer l'animation avec un délai
function addHoverClass() {
    hoverTimeout = setTimeout(() => {
        snip1573.classList.add('hover');
        figcationText.style.display = 'block';  // Affiche le texte après le délai
    }, 200);
}

// Fonction pour annuler l'animation si on quitte le hover
function removeHoverClass() {
    clearTimeout(hoverTimeout);  // Annule le délai si la souris quitte avant
    snip1573.classList.remove('hover');
    figcationText.style.display = 'none';  // Masque le texte
}

// Ajouter les événements de survol
block.addEventListener('mouseover', addHoverClass);
block.addEventListener('mouseleave', removeHoverClass);