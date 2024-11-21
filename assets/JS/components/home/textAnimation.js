document.addEventListener('DOMContentLoaded', () => {

const dynamicText = document.getElementById('dynamic-text');
const texts = ["Web Developer", "Strong Woman", "Motivated Junior", "Web Developper"];
let currentTextIndex = 0; // Index du mot
let charIndex = 0; // Index de la lettre dans le mot

function typewriter() {
    if (dynamicText) {
        // Affiche chaque lettre du mot actuel
        if (charIndex < texts[currentTextIndex].length) {
            dynamicText.innerHTML += `<span>${texts[currentTextIndex][charIndex]}</span>`;
            charIndex++;
            setTimeout(typewriter, 200); // Vitesse d'affichage des lettres
        } else {
            // Si on n'a pas encore atteint le dernier mot, effacer le texte après une pause
            if (currentTextIndex < texts.length - 1) {
                setTimeout(deleteText, 1000); // Temps d'attente après avoir fini le mot
            }
        }
    }
}

function deleteText() {
    if (charIndex > 0) {
        // Efface la dernière lettre une par une
        dynamicText.innerHTML = texts[currentTextIndex].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(deleteText, 100); // Vitesse d'effacement des lettres
    } else {
        // Passe au mot suivant
        currentTextIndex++;
        
        // Passe au mot suivant après une petite pause
        setTimeout(typewriter, 500);
    }
}

// Lancer l'animation après un court délai
setTimeout(typewriter, 500);

})

