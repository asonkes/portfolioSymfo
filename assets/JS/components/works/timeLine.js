document.addEventListener('DOMContentLoaded', () => {
 
    function timeLine() {
        let animationTimeLine = false;
        const works = document.getElementById('works');
        const worksPosition = works.getBoundingClientRect().top;
        const screenHeight = window.innerHeight / 1.3; 

        const circle = document.querySelectorAll('#circle');
        const containerLiOdd = document.querySelectorAll('#containerLiOdd');
        const containerLiEven = document.querySelectorAll('#containerLiEven');

        if(worksPosition < screenHeight && !animationTimeLine) {
            circle.forEach((e) => {
                e.classList.add('active');
            })
        }

        if(worksPosition < screenHeight && !animationTimeLine) {
            containerLiOdd.forEach((e) => {
                e.classList.add('active');
            })
        }

        if(worksPosition < screenHeight && !animationTimeLine) {
            containerLiEven.forEach((e) => {
                e.classList.add('active');
            })
        }
    }

    document.addEventListener('scroll', timeLine);

    timeLine();
})