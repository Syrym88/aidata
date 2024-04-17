document.addEventListener('DOMContentLoaded', function() {
    initializeSlider('slider1', 2000); 
    initializeSlider('slider2', 3000); 

    function initializeSlider(sliderId, intervalTime) {
        const slider = document.getElementById(sliderId);
        const slidesContainer = slider.querySelector('.slides');
        let currentIndex = 0;
        const totalSlides = slider.querySelectorAll('.slide').length;
        const slideWidth = 100 / totalSlides; 

        function moveSlider() {
            slidesContainer.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            moveSlider();
        }

        let interval = setInterval(nextSlide, intervalTime);
    }
});
