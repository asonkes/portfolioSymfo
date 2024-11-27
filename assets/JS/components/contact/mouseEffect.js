document.addEventListener('DOMContentLoaded', () => {

    const containerImage = document.getElementById('containerImage');

    const image1 = document.getElementById('image1');

    const image2 = document.getElementById('image2');

    if(containerImage) {
        containerImage.addEventListener('mouseover', () => {
            image1.classList.add('active');
            image2.classList.add('active');
        })

        containerImage.addEventListener('mouseout', () => {
            image1.classList.remove('active');
            image2.classList.remove('active');
        })
    }
})