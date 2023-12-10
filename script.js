// Add an event listener to the logo element
const logo = document.querySelector('.logo');
logo.addEventListener('click', scrollToTop);

// Function to scroll to the top of the page
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}
