// Hamburger menu
const header = document.querySelector("header");
const hamburgerBtn = document.querySelector("#hamburger-btn");
const closeMenuBtn = document.querySelector("#close-menu-btn");

// Toggle mobile menu on hamburger button click
hamburgerBtn.addEventListener("click", () => {
    header.classList.toggle("show-mobile-menu");
    hamburgerBtn.style.display = "none"; 
    closeMenuBtn.style.display = "block"; 
});

// Close mobile menu on close button click
closeMenuBtn.addEventListener("click", () => {
    header.classList.remove("show-mobile-menu");
    hamburgerBtn.style.display = "block"; 
    closeMenuBtn.style.display = "none"; 
});

// Sticky nav
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    const heroSection = document.querySelector('.hero-section');
    const heroSectionHeight = heroSection.clientHeight;

    if (window.pageYOffset > heroSectionHeight) {
        header.style.position = 'sticky';
        document.body.style.paddingTop = header.offsetHeight + 'px'; 
    } else {
        header.style.position = 'static';
        document.body.style.paddingTop = 0; 
    }
});
 
