document.addEventListener('DOMContentLoaded', function () {
    const shortText = document.getElementById('about-short');
    const fullText = document.getElementById('about-full');
    const toggleBtn = document.getElementById('toggle-about');

    toggleBtn.addEventListener('click', function () {
        const isShort = shortText.style.display !== 'none';

        if (isShort) {
            shortText.style.display = 'none';
            fullText.style.display = 'block';
            toggleBtn.textContent = 'See Less';
        } else {
            shortText.style.display = 'block';
            fullText.style.display = 'none';
            toggleBtn.textContent = 'See More';
        }
    });
});
