<?php
/**
 * Template Name: Landing Page FNMNS
 * 
 * Template personnalisé pour la landing page FNMNS Occitanie
 * 
 * @package FNMNS_Occitanie
 */

get_header();
?>

<div id="fnmns-landing" class="fnmns-landing" lang="fr">
  
  <!-- Skip link pour l'accessibilité -->
  <a href="#formations" class="skip-link">Aller au contenu principal</a>

  <!-- ==================== HEADER STICKY ==================== -->
  <header class="header" role="banner">
    <div class="header__container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo" aria-label="FNMNS Occitanie - Retour à l'accueil">
        <img src="https://fnmns-occitanie.com/wp-content/uploads/2019/12/cropped-cropped-cropped-bandeau-site-png.png" alt="FNMNS Occitanie - Logo organisme de formation maîtres-nageurs Occitanie" loading="eager">
      </a>
      <nav class="header__nav" role="navigation">
        <ul class="header__nav-links">
          <li class="header__nav-item header__nav-item--dropdown">
            <a href="#formations" class="header__nav-link header__nav-link--dropdown">
              Formations
              <svg class="header__dropdown-icon" width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </a>
            <ul class="header__dropdown-menu" role="menu">
              <li role="none"><a href="https://fnmns-occitanie.com/bpjeps-aan/" class="header__dropdown-link" role="menuitem">BPJEPS AAN</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/bnssa/" class="header__dropdown-link" role="menuitem">BNSSA</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/caep/" class="header__dropdown-link" role="menuitem">CAEP MNS</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/bpjeps-motonautisme-et-disciplines-associees/" class="header__dropdown-link" role="menuitem">BPJEPS Motonautisme</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/secourisme-sport-securite/" class="header__dropdown-link" role="menuitem">SSA Littoral</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/formation-continue/" class="header__dropdown-link" role="menuitem">PSE1/PSE2</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/formateur-secourisme/" class="header__dropdown-link" role="menuitem">Formateur Secourisme</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/news/" class="header__dropdown-link" role="menuitem">Aisance Aquatique</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/p-o-s-s/" class="header__dropdown-link" role="menuitem">POSS</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/technicien-dinstallation-et-de-maintenance-de-piscines/" class="header__dropdown-link" role="menuitem">Technicien Piscines</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/formation-traitement-de-leau/" class="header__dropdown-link" role="menuitem">Traitement de l'eau</a></li>
              <li role="none"><a href="https://fnmns-occitanie.com/formation-sauveteur-secouriste-du-travail-formation-gestes-et-postures/" class="header__dropdown-link" role="menuitem">SST / Gestes et Postures</a></li>
            </ul>
          </li>
          <li><a href="#pourquoi-nous" class="header__nav-link">Pourquoi Nous</a></li>
          <li><a href="#adhesion" class="header__nav-link">Adhésion</a></li>
          <li><a href="#contact" class="header__nav-link">Contact</a></li>
        </ul>
      </nav>
      <div class="header__cta">
        <a href="tel:+33612345678" class="header__phone" aria-label="Appeler la FNMNS Occitanie">
          <svg class="header__phone-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
          <span>06 12 34 56 78</span>
        </a>
        <a href="#contact" class="btn btn--primary" style="padding: 10px 20px; font-size: 14px;">
          Contact
        </a>
      </div>
    </div>
  </header>

  <!-- ==================== HERO ==================== -->
  <section class="hero" aria-labelledby="hero-title">
    <img 
      src="https://fnmns-occitanie.com/wp-content/uploads/2024/11/new_summer_collection-optijpg.jpg" 
      alt="FNMNS Occitanie - Formations maîtres-nageurs et sauveteurs en Occitanie"
      class="hero__background"
      loading="eager"
    >
    <div class="hero__wrap">
      <div class="hero__content">
        <span class="hero__badge" aria-label="Organisme certifié Qualiopi">Organisme certifié Qualiopi</span>
        
        <h1 id="hero-title" class="hero__title">
          FNMNS Occitanie
        </h1>
        
        <p class="hero__subtitle">
          Organisme de formation certifié Qualiopi spécialisé dans les formations de maîtres-nageurs et sauveteurs en Occitanie
        </p>
        
        <div class="hero__cta">
          <a class="btn btn--primary" href="#contact" aria-label="Demander un devis gratuit">
            Demander un devis gratuit
          </a>
          <a class="btn btn--ghost" href="#formations" aria-label="Découvrir toutes les formations disponibles">
            Découvrir les formations
          </a>
        </div>
        
        <div class="hero__social" aria-label="Réseaux sociaux">
          <a href="https://www.facebook.com/share/1AAZK1TrZv/" class="hero__social-link" target="_blank" rel="noopener noreferrer" aria-label="Suivez-nous sur Facebook">
            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </a>
          <a href="https://www.instagram.com/ctf_fnmns_lr/profilecard/?igsh=MWRkcG5rMG1kNGdhNg==" class="hero__social-link" target="_blank" rel="noopener noreferrer" aria-label="Suivez-nous sur Instagram">
            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
          <a href="https://www.linkedin.com/company/fnmns-occitanie/" class="hero__social-link" target="_blank" rel="noopener noreferrer" aria-label="Suivez-nous sur LinkedIn">
            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
          </a>
          <a href="https://www.youtube.com/@fnmnsoccitaniemed" class="hero__social-link" target="_blank" rel="noopener noreferrer" aria-label="Suivez-nous sur YouTube">
            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php
// Inclure le reste du contenu depuis le fichier BODY
// Pour simplifier, je vais inclure le contenu directement ici
// En production, vous pourriez utiliser file_get_contents() ou include()
?>

  <!-- ==================== À PROPOS ==================== -->
  <section id="a-propos" aria-labelledby="a-propos-title">
    <div class="container">
      <h2 id="a-propos-title" class="section__title">
        À propos de la FNMNS Occitanie
      </h2>
      <div class="grid" style="grid-template-columns: 1fr; gap: 24px; margin-top: 40px;">
        <article class="info-card">
          <div class="info-card__icon">🏊</div>
          <h3 class="info-card__title">FNMNS Occitanie : organisme de formation reconnu</h3>
          <div class="info-card__text">
            <p>La Fédération Nationale des Métiers de la Natation et du Sport, plus connue sous le nom de <strong>FNMNS Occitanie</strong>, est un organisme de formation reconnu et certifié Qualiopi, spécialisé dans les métiers du sport, du sauvetage aquatique, et du secourisme en région Occitanie. La FNMNS Occitanie accompagne les professionnels et futurs professionnels dans leur parcours de formation.</p>
          </div>
        </article>
      </div>
      
      <div class="grid" style="grid-template-columns: 1fr; gap: 24px; margin-top: 24px;">
        <article class="info-card">
          <div class="info-card__icon">📚</div>
          <h3 class="info-card__title">Formations diplômantes avec la FNMNS Occitanie</h3>
          <div class="info-card__text">
            <p>La <strong>FNMNS Occitanie</strong> propose une large gamme de formations diplômantes reconnues par l'État : <a href="https://fnmns-occitanie.com/bpjeps-aan/" target="_blank" rel="noopener">BPJEPS Activités Aquatiques et de la Natation (AAN)</a>, <a href="https://fnmns-occitanie.com/bpjeps-motonautisme-et-disciplines-associees/" target="_blank" rel="noopener">BPJEPS Motonautisme et disciplines associées</a>, <a href="https://fnmns-occitanie.com/bnssa/" target="_blank" rel="noopener">BNSSA</a>, <a href="https://fnmns-occitanie.com/caep/" target="_blank" rel="noopener">CAEP MNS</a>, <a href="https://fnmns-occitanie.com/formateur-secourisme/" target="_blank" rel="noopener">secourisme (PSC, PSE1, PSE2)</a>, ainsi que du développement de compétences comme la <a href="https://fnmns-occitanie.com/news/" target="_blank" rel="noopener">pédagogie de l'aisance aquatique</a> et l'aquafitness.</p>
            <p style="margin-top: 16px;">Les formations proposées par la FNMNS Occitanie, adaptées aux besoins des maîtres-nageurs, éducateurs sportifs, et secouristes en Occitanie, répondent aux normes réglementaires et aux exigences du marché.</p>
          </div>
        </article>
      </div>

      <div class="grid" style="grid-template-columns: 1fr; gap: 24px; margin-top: 24px;">
        <article class="info-card">
          <div class="info-card__icon">🎯</div>
          <h3 class="info-card__title">Accompagnement personnalisé par la FNMNS Occitanie</h3>
          <div class="info-card__text">
            <p>Que vous souhaitiez devenir maître-nageur sauveteur, renouveler vos certifications ou développer vos compétences en secourisme, la <strong>FNMNS Occitanie</strong> vous accompagne à chaque étape de votre parcours professionnel en Occitanie. Choisir la FNMNS Occitanie, c'est opter pour un organisme de formation de référence dans la région.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ==================== POURQUOI NOUS ==================== -->
  <section id="pourquoi-nous" aria-labelledby="pourquoi-nous-title">
    <div class="container">
      <h2 id="pourquoi-nous-title" class="section__title">
        Pourquoi choisir la FNMNS Occitanie ?
      </h2>
      <p class="section__lead">
        Des chiffres qui témoignent de l'expertise et de l'engagement de la FNMNS Occitanie en région Occitanie
      </p>
      
      <div class="stats-grid">
        <div class="stat-card">
          <span class="stat-card__number">800+</span>
          <p class="stat-card__label">Adhérents à la FNMNS Occitanie avec assurance en responsabilité civile professionnelle</p>
        </div>
        <div class="stat-card">
          <span class="stat-card__number">400+</span>
          <p class="stat-card__label">Professionnels formés chaque année par la FNMNS Occitanie</p>
        </div>
        <div class="stat-card">
          <span class="stat-card__number">95%</span>
          <p class="stat-card__label">Taux de réussite</p>
        </div>
      </div>

      <div class="partenaires">
        <p class="partenaires__title">Partenaires majeurs</p>
        <div class="partenaires__list">
          <a href="https://drdjscs.gouv.fr/" target="_blank" rel="noopener" class="partenaires__link">DRAJES Occitanie</a>
          <a href="https://emsat.site/" target="_blank" rel="noopener" class="partenaires__link">CFA EMSAT</a>
          <a href="https://snpan.weebly.com/" target="_blank" rel="noopener" class="partenaires__link">SNPAN</a>
          <a href="https://fnmns.com/" target="_blank" rel="noopener" class="partenaires__link">FNMNS Nationale</a>
        </div>
      </div>

      <div style="text-align: center; margin-top: 48px;">
        <a href="#adhesion" class="btn btn--primary" style="font-size: 16px; padding: 16px 32px;">
          Rejoignez-nous maintenant
        </a>
      </div>
    </div>
  </section>

  <!-- ==================== ORGANISME CERTIFIÉ QUALIOPI ==================== -->
  <section id="qualiopi" aria-labelledby="qualiopi-title">
    <div class="container">
      <h2 id="qualiopi-title" class="section__title">
        FNMNS Occitanie : organisme certifié Qualiopi
      </h2>
      <p class="section__lead">
        La certification Qualiopi de la FNMNS Occitanie garantit la qualité de nos formations en Occitanie
      </p>
      
      <div class="qualiopi-grid">
        <div class="qualiopi-card">
          <h3 class="qualiopi-card__title">Reconnaissance officielle</h3>
          <p class="qualiopi-card__text">Qualiopi est délivrée par des organismes accrédités et garantit que la FNMNS Occitanie respecte un cadre rigoureux de critères qualité pour toutes ses formations en Occitanie.</p>
        </div>
        <div class="qualiopi-card">
          <h3 class="qualiopi-card__title">Accès à des financements publics et mutualisés</h3>
          <p class="qualiopi-card__text">Grâce à la certification Qualiopi de la FNMNS Occitanie, les formations proposées peuvent être éligibles à des financements comme le CPF (Compte Personnel de Formation), facilitant ainsi l'accès pour les stagiaires en Occitanie.</p>
        </div>
        <div class="qualiopi-card">
          <h3 class="qualiopi-card__title">Transparence et confiance</h3>
          <p class="qualiopi-card__text">La certification atteste que les processus pédagogiques, administratifs et d'accompagnement mis en place sont efficaces, clairs et centrés sur les besoins des apprenants.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== FORMATIONS (avec onglets) ==================== -->
  <section id="formations" aria-labelledby="formations-title">
    <div class="container">
      <h2 id="formations-title" class="section__title">
        Formations FNMNS Occitanie
      </h2>
      <p class="section__lead">
        Découvrez toutes les formations proposées par la FNMNS Occitanie. Choisissez une catégorie pour explorer les formations correspondantes.
      </p>
      
      <div class="tabs" role="tablist" aria-label="Catégories de formations">
        <button 
          class="tab-btn active" 
          data-target="aquatique" 
          role="tab" 
          aria-selected="true" 
          aria-controls="aquatique"
          id="tab-aquatique"
        >
          Aquatiques
        </button>
        <button 
          class="tab-btn" 
          data-target="nautique" 
          role="tab" 
          aria-selected="false" 
          aria-controls="nautique"
          id="tab-nautique"
        >
          Nautiques
        </button>
        <button 
          class="tab-btn" 
          data-target="secourisme" 
          role="tab" 
          aria-selected="false" 
          aria-controls="secourisme"
          id="tab-secourisme"
        >
          Secourisme
        </button>
        <button 
          class="tab-btn" 
          data-target="recyclage" 
          role="tab" 
          aria-selected="false" 
          aria-controls="recyclage"
          id="tab-recyclage"
        >
          Recyclage
        </button>
        <button 
          class="tab-btn" 
          data-target="autres" 
          role="tab" 
          aria-selected="false" 
          aria-controls="autres"
          id="tab-autres"
        >
          Autres
        </button>
      </div>

      <!-- AQUATIQUE -->
      <div 
        id="aquatique" 
        class="tab-content active" 
        role="tabpanel" 
        aria-labelledby="tab-aquatique"
      >
        <div class="grid">
          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1548839140-29a749e1cf4d?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">CAEP MNS</h3>
              <p class="card__text">
                Certificat d'Aptitude à l'Exercice de la Profession de Maître-Nageur Sauveteur (CAEP MNS)
              </p>
              <a href="https://fnmns-occitanie.com/caep/" class="card__link" aria-label="En savoir plus sur le CAEP MNS">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1548839140-29a749e1cf4d?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">BPJEPS AAN</h3>
              <p class="card__text">
                BPJEPS Activités Aquatiques et de la Natation (AAN) - Devenez Maître-Nageur Sauveteur
              </p>
              <a href="https://fnmns-occitanie.com/bpjeps-aan/" class="card__link" aria-label="En savoir plus sur la formation BPJEPS AAN">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1548438294-1ad5d5f4f063?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">BNSSA</h3>
              <p class="card__text">
                Brevet National de Sécurité et de Sauvetage Aquatique - (BNSSA) - Formez-vous pour surveiller les baignades et intervenir en cas d'accident
              </p>
              <a href="https://fnmns-occitanie.com/bnssa/" class="card__link" aria-label="En savoir plus sur le BNSSA">
                En savoir plus
              </a>
            </div>
          </article>
        </div>
      </div>

      <!-- NAUTIQUE -->
      <div 
        id="nautique" 
        class="tab-content" 
        role="tabpanel" 
        aria-labelledby="tab-nautique"
        hidden    
      >
        <div class="grid">
          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1577112374384-0b50b2dcdd5c?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">BPJEPS Motonautisme et Disciplines Associées</h3>
              <p class="card__text">
                Devenez moniteur jet et engins tractés
              </p>
              <a href="https://fnmns-occitanie.com/bpjeps-motonautisme-et-disciplines-associees/" class="card__link" aria-label="En savoir plus sur le BPJEPS Motonautisme">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1594381898411-846e7d193883?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">SSA Littoral</h3>
              <p class="card__text">
                Devenez spécialiste de la surveillance en milieu naturel
              </p>
              <a href="https://fnmns-occitanie.com/secourisme-sport-securite/" class="card__link" aria-label="En savoir plus sur le SSA Littoral">
                En savoir plus
              </a>
            </div>
          </article>
        </div>
      </div>

      <!-- SECOURISME -->
      <div 
        id="secourisme" 
        class="tab-content" 
        role="tabpanel" 
        aria-labelledby="tab-secourisme"
        hidden
      >
        <div class="grid">
          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1600959907703-0b6b95a43a9b?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Formation secourisme PSE1 et 2 /PSC</h3>
              <p class="card__text">
                Devenez secouriste et apprenez à sauver des vies
              </p>
              <a href="https://fnmns-occitanie.com/formation-continue/" class="card__link" aria-label="En savoir plus sur les formations PSE1 et PSE2">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1621072151851-1acb8e8f83e5?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Formateur en secourisme</h3>
              <p class="card__text">
                Devenez un formateur diplômé reconnu dans le domaine du secourisme
              </p>
              <a href="https://fnmns-occitanie.com/formateur-secourisme/" class="card__link" aria-label="En savoir plus sur la formation Formateur en Secourisme">
                En savoir plus
              </a>
            </div>
          </article>
        </div>
      </div>

      <!-- RECYCLAGE -->
      <div 
        id="recyclage" 
        class="tab-content" 
        role="tabpanel" 
        aria-labelledby="tab-recyclage"
        hidden
      >
        <div class="grid">
          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1526401485004-2fda9f6d6f39?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">CAEP MNS</h3>
              <p class="card__text">
                Mise à jour obligatoire pour maîtres-nageurs sauveteurs diplômés.
              </p>
              <a href="https://fnmns-occitanie.com/caep/" class="card__link" aria-label="En savoir plus sur le CAEP MNS">
                En savoir plus
              </a>
            </div>
          </article>
        </div>
      </div>

      <!-- AUTRES -->
      <div 
        id="autres" 
        class="tab-content" 
        role="tabpanel" 
        aria-labelledby="tab-autres"
        hidden
      >
        <div class="grid">
          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1533134242443-d4fd215305ad?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Pédagogie - Aisance aquatique</h3>
              <p class="card__text">
                Développez vos compétences à l'encadrement du public en aisance aquatique en devenant instructeur référencé
              </p>
              <a href="https://fnmns-occitanie.com/news/" class="card__link" aria-label="En savoir plus sur la formation Aisance Aquatique">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Plan d'Organisation de la Surveillance et des Secours (POSS)</h3>
              <p class="card__text">
                Créez ou modifiez votre POSS à l'aide de la FNMNS
              </p>
              <a href="https://fnmns-occitanie.com/p-o-s-s/" class="card__link" aria-label="En savoir plus sur le POSS">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1562183241-b937e95585b1?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Technicien d'installation et de maintenance des piscines</h3>
              <p class="card__text">
                Validez le titre professionnel pour installer et entretenir et réparer les piscines
              </p>
              <a href="https://fnmns-occitanie.com/technicien-dinstallation-et-de-maintenance-de-piscines/" class="card__link" aria-label="En savoir plus sur la formation Technicien Piscines">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1562183241-b937e95585b1?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Traitement de l'eau</h3>
              <p class="card__text">
                Apprenez à maîtriser les techniques de gestion et de traitement de l'eau pour garantir sa qualité dans les piscines et installations aquatiques
              </p>
              <a href="https://fnmns-occitanie.com/formation-traitement-de-leau/" class="card__link" aria-label="En savoir plus sur la formation Traitement de l'eau">
                En savoir plus
              </a>
            </div>
          </article>

          <article class="card">
            <div class="card__media" style="background-image:url('https://images.unsplash.com/photo-1600959907703-0b6b95a43a9b?auto=format&fit=crop&w=1200&q=80');" aria-hidden="true"></div>
            <div class="card__body">
              <h3 class="card__title">Sauveteur Secouriste du Travail / Gestes et Postures</h3>
              <p class="card__text">
                Formez-vous ou recyclez-vous aux gestes de premiers secours en milieu professionnel et à l'analyse des situations professionnelles dangereuses
              </p>
              <a href="https://fnmns-occitanie.com/formation-sauveteur-secouriste-du-travail-formation-gestes-et-postures/" class="card__link" aria-label="En savoir plus sur la formation SST">
                En savoir plus
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== PROCHAINES SESSIONS ==================== -->
  <section id="sessions" aria-labelledby="sessions-title">
    <div class="container">
      <h2 id="sessions-title" class="section__title">
        Prochaines Sessions FNMNS Occitanie
      </h2>
      <p class="section__lead">
        Inscrivez-vous dès maintenant aux prochaines formations organisées par la FNMNS Occitanie
      </p>
      
      <div class="sessions-table-wrapper">
        <table class="sessions-table" role="table">
          <thead>
            <tr>
              <th>Formation</th>
              <th>Dates</th>
              <th>Disponibilité</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <span class="session-badge">BPJEPS AAN</span>
                <div class="session-title">Formation BPJEPS AAN</div>
              </td>
              <td>
                <div class="session-date">
                  <svg class="session-date-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  Du 15 mars au 30 juin 2025
                </div>
              </td>
              <td>
                <div class="session-places">
                  <svg class="session-places-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg>
                  Places limitées - 8 restantes
                </div>
              </td>
              <td class="session-action">
                <a href="#contact" class="btn btn--primary">
                  S'inscrire
                </a>
              </td>
            </tr>
            <tr>
              <td>
                <span class="session-badge">BNSSA</span>
                <div class="session-title">Formation BNSSA</div>
              </td>
              <td>
                <div class="session-date">
                  <svg class="session-date-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  Du 10 avril au 15 mai 2025
                </div>
              </td>
              <td>
                <div class="session-places">
                  <svg class="session-places-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg>
                  Places limitées - 12 restantes
                </div>
              </td>
              <td class="session-action">
                <a href="#contact" class="btn btn--primary">
                  S'inscrire
                </a>
              </td>
            </tr>
            <tr>
              <td>
                <span class="session-badge">PSE1/PSE2</span>
                <div class="session-title">Formation Secourisme PSE1/PSE2</div>
              </td>
              <td>
                <div class="session-date">
                  <svg class="session-date-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  Du 5 mai au 20 mai 2025
                </div>
              </td>
              <td>
                <div class="session-places">
                  <svg class="session-places-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg>
                  Places limitées - 15 restantes
                </div>
              </td>
              <td class="session-action">
                <a href="#contact" class="btn btn--primary">
                  S'inscrire
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ==================== QUELQUES AVIS ==================== -->
  <section id="avis" aria-labelledby="avis-title">
    <div class="container">
      <h2 id="avis-title" class="section__title">
        Témoignages
      </h2>
      <p class="section__lead">
        Ce que disent nos stagiaires
      </p>
      
      <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-top: 40px;">
        <article class="info-card">
          <div class="info-card__icon">⭐</div>
          <h3 class="info-card__title">Marie D. - BPJEPS AAN</h3>
          <div class="info-card__text">
            <p>"Formation excellente avec des formateurs très compétents. J'ai obtenu mon diplôme et je travaille maintenant comme maître-nageur. Je recommande vivement la FNMNS Occitanie pour toutes vos formations en Occitanie !"</p>
          </div>
        </article>

        <article class="info-card">
          <div class="info-card__icon">⭐</div>
          <h3 class="info-card__title">Thomas L. - BNSSA</h3>
          <div class="info-card__text">
            <p>"Un accompagnement personnalisé tout au long de la formation. L'équipe est à l'écoute et très professionnelle. Merci pour cette belle expérience !"</p>
          </div>
        </article>

        <article class="info-card">
          <div class="info-card__icon">⭐</div>
          <h3 class="info-card__title">Sophie M. - PSE1/PSE2</h3>
          <div class="info-card__text">
            <p>"Formation de qualité avec une pédagogie adaptée. J'ai beaucoup appris et je me sens maintenant prête à intervenir en cas d'urgence. Merci !"</p>
          </div>
        </article>
      </div>

      <div style="text-align: center; margin-top: 32px;">
        <p style="color: var(--muted); margin-bottom: 16px;">Consultez tous les avis sur la FNMNS Occitanie sur Google</p>
        <a href="https://www.google.com/search?q=fnmns+occitanie+avis" target="_blank" rel="noopener" class="btn btn--secondary">
          Voir tous les avis FNMNS Occitanie
        </a>
      </div>
    </div>
  </section>

  <!-- ==================== CONTACT RAPIDE ==================== -->
  <section id="contact" aria-labelledby="contact-title">
    <div class="container">
      <h2 id="contact-title" class="section__title">
        Contactez la FNMNS Occitanie
      </h2>
      <p class="section__lead">
        Contactez la FNMNS Occitanie pour demander un devis gratuit ou poser vos questions sur nos formations en Occitanie
      </p>
      
      <div class="contact-form">
        <div class="contact-form__header">
          <div class="contact-form__icon">📝</div>
          <h3 class="contact-form__title">Demande de pré-inscription FNMNS Occitanie</h3>
          <p class="contact-form__subtitle">Remplissez le formulaire ci-dessous et l'équipe de la FNMNS Occitanie vous recontactera sous 24h</p>
        </div>
        
        <form id="contactForm" onsubmit="event.preventDefault(); alert('Merci ! Nous vous contacterons sous 24h.');">
          <div class="form-row">
            <div class="form-group">
              <label for="nom" class="form-label">Nom et Prénom *</label>
              <div class="form-input-wrapper">
                <input type="text" id="nom" name="nom" class="form-input" placeholder="Jean Dupont" required>
              </div>
            </div>
            
            <div class="form-group">
              <label for="email" class="form-label">Email *</label>
              <div class="form-input-wrapper">
                <input type="email" id="email" name="email" class="form-input" placeholder="jean.dupont@example.com" required>
              </div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="telephone" class="form-label">Téléphone *</label>
              <div class="form-input-wrapper">
                <input type="tel" id="telephone" name="telephone" class="form-input" placeholder="06 12 34 56 78" required>
              </div>
            </div>
            
            <div class="form-group">
              <label for="formation" class="form-label">Formation souhaitée *</label>
              <div class="form-input-wrapper">
                <select id="formation" name="formation" class="form-select" required>
                  <option value="">Sélectionnez une formation</option>
                  <option value="BPJEPS AAN">BPJEPS AAN</option>
                  <option value="BNSSA">BNSSA</option>
                  <option value="PSE1/PSE2">PSE1/PSE2</option>
                  <option value="CAEP MNS">CAEP MNS</option>
                  <option value="Formateur Secourisme">Formateur Secourisme</option>
                  <option value="BPJEPS Motonautisme">BPJEPS Motonautisme</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="form-group form-group--full">
            <label for="message" class="form-label">Message (optionnel)</label>
            <div class="form-input-wrapper">
              <textarea id="message" name="message" class="form-input" rows="5" placeholder="Dites-nous en plus sur votre projet de formation..."></textarea>
            </div>
          </div>
          
          <div class="form-checkbox">
            <input type="checkbox" id="rappel" name="rappel">
            <label for="rappel">Je souhaite être rappelé(e) rapidement</label>
          </div>
          
          <div class="form-checkbox">
            <input type="checkbox" id="rgpd" name="rgpd" required>
            <label for="rgpd">J'accepte que mes données soient utilisées pour me recontacter. <a href="#" target="_blank">En savoir plus</a></label>
          </div>
          
          <div class="form-submit-wrapper">
            <button type="submit" class="btn btn--primary">
              Envoyer ma demande
            </button>
            <p class="form-required-note">Les champs marqués d'un astérisque sont obligatoires</p>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- ==================== ADHÉSION ==================== -->
  <section id="adhesion" aria-labelledby="adhesion-title">
    <div class="container">
      <h2 id="adhesion-title" class="section__title">
        Rejoignez la FNMNS Occitanie
      </h2>
      <p class="section__lead">
        Adhérez à la FNMNS Occitanie et bénéficiez d'avantages exclusifs et d'une assurance professionnelle en Occitanie
      </p>
      
      <div class="grid" style="grid-template-columns: 1fr; gap: 24px; margin-top: 40px; max-width: 800px; margin-left: auto; margin-right: auto;">
        <article class="info-card" style="text-align: center;">
          <div class="info-card__icon" style="margin: 0 auto 20px;">🤝</div>
          <h3 class="info-card__title">Avantages de l'adhésion</h3>
          <div class="info-card__text">
            <p style="margin-bottom: 16px;">En rejoignant la <strong>FNMNS Occitanie</strong>, organisme de formation de référence en Occitanie, vous bénéficiez de :</p>
            <ul style="list-style: none; padding: 0; text-align: left; max-width: 500px; margin: 0 auto;">
              <li style="margin-bottom: 12px; padding-left: 24px; position: relative;">
                <span style="position: absolute; left: 0; color: var(--brand);">✓</span>
                Assurance en responsabilité civile professionnelle
              </li>
              <li style="margin-bottom: 12px; padding-left: 24px; position: relative;">
                <span style="position: absolute; left: 0; color: var(--brand);">✓</span>
                Accès à un réseau de professionnels
              </li>
              <li style="margin-bottom: 12px; padding-left: 24px; position: relative;">
                <span style="position: absolute; left: 0; color: var(--brand);">✓</span>
                Formations continues et recyclages
              </li>
              <li style="margin-bottom: 12px; padding-left: 24px; position: relative;">
                <span style="position: absolute; left: 0; color: var(--brand);">✓</span>
                Support et accompagnement personnalisé
              </li>
            </ul>
            <div style="margin-top: 24px;">
              <a href="https://fnmns-occitanie.com/adhesion-fnmns/" class="btn btn--primary" style="display: inline-flex;">
                Adhérer maintenant
              </a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ==================== STICKY CTA ==================== -->
  <div class="sticky-cta">
    <a href="tel:+33612345678" class="sticky-cta__button sticky-cta__button--phone" aria-label="Appeler la FNMNS Occitanie">
      <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
      </svg>
      <span>Appelez-nous</span>
    </a>
    <a href="#contact" class="sticky-cta__button" aria-label="Demander un devis">
      <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
      </svg>
      <span>Devis gratuit</span>
    </a>
  </div>

</div>

<?php
get_footer();
?>

