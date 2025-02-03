document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        const formErrors = document.querySelectorAll('.formError');

        if (formErrors) {
            document.getElementById('contact').scrollIntoView();
        }
    }, 100);
});