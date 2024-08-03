const slider = document.querySelector('.slider');
let currentIndex = 0;

function showCard(index) {
  const translateValue = -index * 100 + '%';
  slider.style.transform = 'translateX(' + translateValue + ')';
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % document.querySelectorAll('.card').length;
  showCard(currentIndex);
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + document.querySelectorAll('.card').length) % document.querySelectorAll('.card').length;
  showCard(currentIndex);
}