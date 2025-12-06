(function() {
  'use strict';
  
  // Gestion des onglets avec accessibilité
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-content');
  
  function switchTab(targetId, button) {
    // Désactiver tous les onglets
    tabButtons.forEach(btn => {
      btn.classList.remove('active');
      btn.setAttribute('aria-selected', 'false');
    });
    
    tabPanels.forEach(panel => {
      panel.classList.remove('active');
      panel.setAttribute('hidden', '');
    });
    
    // Activer l'onglet sélectionné
    button.classList.add('active');
    button.setAttribute('aria-selected', 'true');
    
    const targetPanel = document.getElementById(targetId);
    if (targetPanel) {
      targetPanel.classList.add('active');
      targetPanel.removeAttribute('hidden');
      
      // Focus sur le premier élément focusable du panel (accessibilité)
      const firstFocusable = targetPanel.querySelector('a, button');
      if (firstFocusable) {
        firstFocusable.focus();
      }
    }
  }
  
  // Gestion des clics
  tabButtons.forEach(button => {
    button.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      switchTab(targetId, this);
    });
    
    // Navigation au clavier
    button.addEventListener('keydown', function(e) {
      let index = Array.from(tabButtons).indexOf(this);
      
      if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
        e.preventDefault();
        const direction = e.key === 'ArrowRight' ? 1 : -1;
        index = (index + direction + tabButtons.length) % tabButtons.length;
        tabButtons[index].focus();
      } else if (e.key === 'Home') {
        e.preventDefault();
        tabButtons[0].focus();
      } else if (e.key === 'End') {
        e.preventDefault();
        tabButtons[tabButtons.length - 1].focus();
      }
    });
  });
  
  // Lazy loading des images (amélioration performance)
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.classList.add('loaded');
            observer.unobserve(img);
          }
        }
      });
    });
    
    document.querySelectorAll('.card__media').forEach(media => {
      imageObserver.observe(media);
    });
  }
  
  // Smooth scroll pour les ancres avec offset pour le header
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href !== '') {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          const headerHeight = 70;
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
          // Mettre à jour l'URL sans recharger la page
          history.pushState(null, null, href);
        }
      }
    });
  });

  // Header scroll effect
  let lastScroll = 0;
  const header = document.querySelector('.header');
  
  if (header) {
    window.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;
      
      if (currentScroll > 100) {
        header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
      } else {
        header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
      }
      
      lastScroll = currentScroll;
    });
  }

  // Gestion du menu déroulant sur mobile
  const dropdownItem = document.querySelector('.header__nav-item--dropdown');
  if (dropdownItem) {
    const dropdownLink = dropdownItem.querySelector('.header__nav-link--dropdown');
    
    // Sur mobile, toggle au clic
    if (window.innerWidth <= 768) {
      dropdownLink.addEventListener('click', function(e) {
        e.preventDefault();
        dropdownItem.classList.toggle('active');
      });
    }
    
    // Fermer le menu si on clique en dehors
    document.addEventListener('click', function(e) {
      if (!dropdownItem.contains(e.target) && window.innerWidth <= 768) {
        dropdownItem.classList.remove('active');
      }
    });
  }
})();

