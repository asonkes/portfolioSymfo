document.addEventListener('DOMContentLoaded', () => {
    let animationTimeLine = false; // Pour éviter de relancer les animations déjà jouées
    const circle = document.querySelectorAll('.circle');
    const containerLi = document.querySelectorAll('.containerLi');

    // Garder la trace des indices déjà affichés
    let currentIndex = 0;

    function timeLine() {
        const works = document.getElementById('works');
        const worksPosition = works.getBoundingClientRect().top;
        const screenHeight = window.innerHeight / 1.3;

        if (worksPosition < screenHeight && !animationTimeLine) {
            animationTimeLine = true;
        }

        // Faire apparaître les LI un par un lorsque chacun entre dans la vue
        if (animationTimeLine && currentIndex < containerLi.length) {
            const currentLi = containerLi[currentIndex];
            const currentCircle = circle[currentIndex];
            const liPosition = currentLi.getBoundingClientRect().top;

            // Vérifier si l'élément est dans la vue
            if (liPosition < screenHeight) {
                currentLi.classList.add('active'); // Activer l'élément
                currentCircle.classList.add('active');
                currentIndex++; // Passer au suivant
            }
        }
    }

    // Ajouter un écouteur d'événement pour le scroll
    document.addEventListener('scroll', timeLine);

    // Exécuter la timeline immédiatement au chargement de la page
    timeLine();
});