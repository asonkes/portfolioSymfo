document.addEventListener('DOMContentLoaded', () => {

    function readMore() {
        const readMore = document.querySelectorAll('.readMore');

        readMore.forEach((event) => {

            event.addEventListener('click', () => {
                // Ligne sélectionne le modal qui est juste après le "readMore" sur lequel on a cliqué
                const modal = event.nextElementSibling;
               
                modal.classList.toggle('active');
            })
        })
    }

    readMore();
})