document.addEventListener('DOMContentLoaded', () => {

    const burgerIcon = document.getElementById('burgerIcon');
    const burgerUl = document.getElementById('burgerUl');
    const burgerLine = document.getElementById('burgerLine');
    const burgerNav = document.getElementById('burgerNav'); 

    burgerIcon.addEventListener('click', () => {
        burgerUl.classList.toggle('active');
        burgerLine.classList.toggle('active');
    })


    window.addEventListener('click', (event) => {
        if (!burgerNav.contains(event.target) && !burgerIcon.contains(event.target)) {
            burgerUl.classList.remove('active');
            burgerLine.classList.remove('active');
        }
    })
})