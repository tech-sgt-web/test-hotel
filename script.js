const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');
const dropdownParents = document.querySelectorAll('.dropdown-parent');

// Toggle main mobile menu
hamburger.addEventListener('click', () => {
  navMenu.classList.toggle('show');
});

// Toggle dropdowns on mobile
dropdownParents.forEach(parent => {
  parent.addEventListener('click', (e) => {
    if (window.innerWidth <= 992) {
      e.preventDefault();
      parent.classList.toggle('active');
    }
  });
});
