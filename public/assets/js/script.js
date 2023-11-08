function filterObjects(className) {
    const objects = document.querySelectorAll('.courses');
    objects.forEach((object) => {
        if (className === 'all') {
            object.classList.add('show');
        } else if (className === 'free') {
            if (object.querySelector('.cost').textContent.trim() === 'Gratuit') {
                object.classList.add('show');
            } else {
                object.classList.remove('show');
            }
        } else if (className === 'premium') {
            if (object.querySelector('.cost').textContent.trim() !== 'Gratuit') {
                object.classList.add('show');
            } else {
                object.classList.remove('show');
            }
        }
    });
}
