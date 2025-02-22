document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    // Lors de la soumission du formulaire, on stocke l'état du formulaire
    // pas besoin de mettre le nom du form (grâce à form_start)
    form.addEventListener('submit', () => {
        // On donne le nom de la clé(formSubmitted) et la valeur (true)
        sessionStorage.setItem('formSubmitted', 'true');
    })

    setTimeout(() => {
        // Vérification si le formulaire a été soumis 
        // Utilisation de sessionStorage
        const formSubmitted = sessionStorage.getItem('formSubmitted');

         // Si le formulaire a été soumis et qu'il y a des erreurs ou non
         if (formSubmitted === 'true') {
            const contact = document.getElementById('contact');

            // Si il y a des erreurs, ou pas, on défile vers la section contact
            contact.scrollIntoView();

            // On supprime l'élément 'formSubmitted' après utilisation
            sessionStorage.removeItem('formSubmitted');
        }
    }, 100);
});
