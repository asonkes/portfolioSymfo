document.addEventListener('DOMContentLoaded', () => {
   
    function timeLine() {
        let animationTimeLine = false;
        const works = document.getElementById('works');
        const worksPosition = works.getBoundingClientRect().top;
        const screenHeight = window.innerHeight / 1.3; 

        const containerLiOdd = document.querySelectorAll('#container > ul li:nth-child(odd)');
        const containerLiEven = document.querySelectorAll('#container > ul li:nth-child(even)');

        if(worksPosition < screenHeight && !animationTimeLine) {
            containerLiOdd.forEach((e) => {
                e.classList.add('active');
            })
        }

        if(worksPosition < screenHeight && !animationTimeLine) {
            containerLiEven.forEach((event) => {
                event.classList.add('active');
            })
        }
    }

    document.addEventListener('scroll', timeLine);

    timeLine();
})