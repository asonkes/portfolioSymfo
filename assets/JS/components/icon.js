document.addEventListener('DOMContentLoaded', () => {
    const icon = document.getElementById('icon');
    console.log('icon', icon);

    if(icon) {
        icon.addEventListener('click', () => {
            const flashMessage = document.querySelector('.flashMessage');
    
            flashMessage.classList.add('active');
        })
    }
})