// Hamburger menu
const header = document.querySelector("header");
const hamburgerBtn = document.querySelector("#hamburger-btn");
const closeMenuBtn = document.querySelector("#close-menu-btn");

// Toggle mobile menu on hamburger button click
hamburgerBtn.addEventListener("click", () => {
    header.classList.toggle("show-mobile-menu");
    hamburgerBtn.style.display = "none"; // Hide hamburger icon
    closeMenuBtn.style.display = "block"; // Show close button icon
});

// Close mobile menu on close button click
closeMenuBtn.addEventListener("click", () => {
    header.classList.remove("show-mobile-menu");
    hamburgerBtn.style.display = "block"; // Show hamburger icon
    closeMenuBtn.style.display = "none"; // Hide close button icon
});

// Sticky nav
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    const heroSection = document.querySelector('.hero-section');
    const heroSectionHeight = heroSection.clientHeight;

    if (window.pageYOffset > heroSectionHeight) {
        header.style.position = 'sticky';
        document.body.style.paddingTop = header.offsetHeight + 'px'; // Add padding to the body when header becomes sticky
    } else {
        header.style.position = 'static';
        document.body.style.paddingTop = 0; // Reset padding when header is static
    }
});

