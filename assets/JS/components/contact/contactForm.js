document.addEventListener('DOMContentLoaded', () => {
    if(document.location.hash === '#contact') {
        history.replaceState({}, document.title, window.location.pathname);
    }   

    if (document.querySelector('.form-error-message')) {
        window.location.hash = "contact"; // Ajoute #contact à l’URL pour scroller automatiquement
    }
});