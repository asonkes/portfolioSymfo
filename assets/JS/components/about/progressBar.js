document.addEventListener(('DOMContentLoaded'), () => {
    const about = document.getElementById('about');

    if(!about) {
        return;
    }

    let animationTriggered = false;

    function progressBar() {

        const about = document.getElementById('about');
        const aboutPosition = about.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;

        if(aboutPosition < screenPosition && !animationTriggered) {

            animationTriggered = true;

            // Fonctionnalité pour l'apparition des barres en rose
            const progressBar = document.querySelectorAll('.progressBar');

            progressBar.forEach((e) => {
                e.classList.add('active');
            })

            // Fonctionnalités pour l'augmentation des chiffres
            const progressLetter = document.querySelectorAll('.progressLetter');

            progressLetter.forEach((letter) => {
                // endValue = Récupère la valeur finale que doit obtenir le chiffre
                // parseInt(letter) = pour convertir le texte en chiffre sans le "%"
                let endValue = parseInt(letter.textContent);
                // Valeur actuelle qui va augmenter et donc commence à "0"
                let current = 0;
                const duration = 300;
                const increment = endValue / duration;

                const timer = setInterval(() => {
                    if(current >= endValue) {
                        clearInterval(timer);
                    } else {
                        current += increment;
                        letter.textContent = Math.round(current) + "%";
                    }
                }, 10);
            }
        )}
    }

    window.addEventListener('scroll', progressBar);

    if(about) {
        progressBar();
    }
})