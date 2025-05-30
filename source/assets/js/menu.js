 
    function toggleMenu(show) {
      const menu = document.getElementById("mobileMenu");
      const overlay = document.getElementById("menuOverlay");
      if (show) {
        menu.classList.add("open");
        overlay.classList.add("show");
      } else {
        menu.classList.remove("open");
        overlay.classList.remove("show");
      }
    }
 