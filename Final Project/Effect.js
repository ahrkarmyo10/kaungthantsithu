// Smooth scrolling when clicking on navigation links
document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll("nav a");
  
    links.forEach(link => {
      link.addEventListener("click", event => {
        event.preventDefault();
        const target = document.querySelector(link.getAttribute("href"));
        if (target) {
          const yOffset = -100; // Adjust the yOffset as needed to start just below the heading
          const y = target.getBoundingClientRect().top + window.pageYOffset + yOffset;
          window.scrollTo({ top: y, behavior: "smooth" });
        }
      });
    });
  });

  
                
  