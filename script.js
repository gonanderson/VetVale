document.addEventListener('DOMContentLoaded', function () {
    const carouselContainer = document.querySelector('.carousel');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    let currentSlide = 0;

    const slides = [
        'img1.png',
        'img2.png',
        'img3.png',
        'img4.png',
        'img5.png',
        'img6.png',
        'img7.png',
        'img8.png'
    ];

    // Função para carregar os slides no carrossel
    function loadSlides() {
        slides.forEach(slide => {
            const img = document.createElement('img');
            img.src = slide;
            img.alt = `Slide ${slides.indexOf(slide) + 1}`;
            carouselContainer.appendChild(img);
        });
    }

    // Carregar os slides ao iniciar
    loadSlides();

    // Função para atualizar a posição do carrossel
    function updateCarousel() {
        carouselContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    // Função para mover para o próximo slide
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        updateCarousel();
    }

    // Função para mover para o slide anterior
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        updateCarousel();
    }

    // Adicionar eventos aos botões
    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);
});
