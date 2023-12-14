// Select the button and add an event listener
var carouselWidth = $('.carousel-inner').scrolWidth;
var cardWidth = $('.carousel-item').width();
const themeToggle = document.getElementById('themeToggle');

var scrollPosition = 0;

$('.carousel-control-next').on('click', function()
{
    if (scrollPosition < (carouselWidth - (cardWidth*4)))
    console.log('next');
    scrollPosition = scrollPosition + cardWidth;
    $('.carousel-inner').animate({scrollLeft: scrollPosition},
    600);
});

$('.carousel-control-prev').on('click', function()
{
    if (scrollPosition > 0)
    console.log('next');
    scrollPosition = scrollPosition - cardWidth;
    $('.carousel-inner').animate({scrollLeft: scrollPosition},
    600);
});

// Add a click event listener to the button
themeToggle.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');

    const isDarkMode = document.body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDarkMode);
});

const userPrefersDark = localStorage.getItem('darkMode') === 'true';
if (userPrefersDark) {
    document.body.classList.add('dark-mode');
}