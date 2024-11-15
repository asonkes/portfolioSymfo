document.addEventListener('DOMContentLoaded', () => {
    const snip1573 = document.querySelector('.snip1573');
    const figcationText = document.querySelector('.figcationText');
    const block = document.getElementById('triangleTwo-transparent');
    let hoverTimeout;

    // Fonction pour gérer l'animation avec un délai
    function addHoverClass() {
        hoverTimeout = setTimeout(() => {
                snip1573.classList.add('hover');
                figcationText.classList.add('active');     
        }, 200);
    }
    
    // Fonction pour annuler l'animation si on quitte le hover
    function removeHoverClass() {
        clearTimeout(hoverTimeout);  // Annule le délai si la souris quitte avant
            snip1573.classList.remove('hover');
            figcationText.classList.remove('active');
        }

    function updateHoverEvents() {
        let width = window.innerWidth;
        console.log(width, 'width');

        if(width > 990 ) {
            block.addEventListener('mouseover', addHoverClass);
            block.addEventListener('mouseleave', removeHoverClass);
            snip1573.classList.remove('active');
        } else {
            block.removeEventListener('mouseover', addHoverClass);
            block.removeEventListener('mouseleave', removeHoverClass);
            snip1573.classList.add('active');
        }
    }

    // La fonction s'éxécute au chargement de la page
    updateHoverEvents();

    // Au redimensionnement, les évènements se mettent à jour
    window.addEventListener('resize', updateHoverEvents);
})



