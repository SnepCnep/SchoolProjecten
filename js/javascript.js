document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const links = document.querySelectorAll('.nav-links a');
  
    menuToggle.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });
  
    links.forEach((link) => {
      link.addEventListener('click', (event) => {
        const clickedLink = event.target;
        setActiveLink(clickedLink);
        navLinks.classList.remove('active');
      });
    });
  
    function setActiveLink(clickedLink) {
      const currentUrl = window.location.href;
      links.forEach((link) => {
        if (link.href === currentUrl) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }
  
    setActiveLink();
  });