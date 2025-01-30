document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        const formErrors = document.querySelectorAll('.formError');
        // Ici on met false, car on considère par défault qu'il n'y a pas d'erreur
        let hasErrors = false;

        formErrors.forEach(error => {
            // Si on enlève les espaces du contenu et que le texte n'est tout de même pas vide
            // hasErrors = false (car cela veut dire qu'il y a du contenu, et donc des erreurs)
            if (error.textContent.trim() !== '') {
                hasErrors = true;
            }
        });

        // Equivaut à hasErrors === true
        if (hasErrors) {
            document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
        } else if (document.location.hash === '#contact') {
            history.replaceState({}, document.title, window.location.pathname);
        }
    }, 100);
});