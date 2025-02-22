document.addEventListener('DOMContentLoaded', () => {

    const burgerIcon = document.getElementById('burgerIcon');
    const burgerUl = document.getElementById('burgerUl');
    const burgerLine = document.getElementById('burgerLine');
    const burgerNav = document.getElementById('burgerNav'); 
    const burgerLi = document.querySelectorAll('.burgerLi');

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

    burgerLi.forEach((e) => {
        e.addEventListener('click', () => {
            burgerUl.classList.remove('active');
            burgerLine.classList.remove('active');
        })
    })
})