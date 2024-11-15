document.addEventListener('DOMContentLoaded', () => {

    const movingText = document.getElementById('movingText');

    function animateScroll() {
        
        const about = document.getElementById('about');
        const aboutPosition = about.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        let animationTriggered = false;

        if(aboutPosition < screenPosition && !animationTriggered) {
            movingText.classList.add('active');
            animationTriggered = true;
        }
    }

    window.addEventListener('scroll', animateScroll);

    animateScroll();
})