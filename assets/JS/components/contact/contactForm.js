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

        // On fait comme ça car on veut finalement que si le formulaire ets ok OU non, on soit redirigé vers la partie contact dans les 2 cas.
        if (hasErrors || !hasErrors) {
            document.getElementById('contact').scrollIntoView();
            history.replaceState({}, document.title, window.location.pathname);
        }
    }, 100);
});