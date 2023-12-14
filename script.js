// Select the button and add an event listener
const themeToggle = document.getElementById('themeToggle');

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