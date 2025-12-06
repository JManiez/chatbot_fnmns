#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Script pour intégrer Google Tag Manager avec gestion des cookies RGPD
dans tous les fichiers HTML du dossier LOCAL
"""

import os
import re
from pathlib import Path

# ID Google Tag Manager
GTM_ID = "GTM-WP8B56M8"

# CSS pour le bandeau de cookies
COOKIE_CSS = """    /* ==================== BANDEAU DE CONSENTEMENT COOKIES (RGPD) ==================== */
    .cookie-consent {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: var(--bg);
      border-top: 2px solid var(--line);
      box-shadow: 0 -4px 20px rgba(2, 6, 23, 0.1);
      padding: clamp(20px, 4vw, 32px);
      z-index: 10000;
      transform: translateY(100%);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      max-width: 100%;
    }

    .cookie-consent.show {
      transform: translateY(0);
    }

    .cookie-consent__container {
      max-width: var(--container);
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 20px;
    }

    .cookie-consent__content {
      flex: 1;
      min-width: 250px;
    }

    .cookie-consent__title {
      font-size: clamp(16px, 2vw, 18px);
      font-weight: 600;
      color: var(--ink);
      margin-bottom: 8px;
    }

    .cookie-consent__text {
      font-size: clamp(13px, 1.8vw, 15px);
      color: var(--muted);
      line-height: 1.5;
      margin: 0;
    }

    .cookie-consent__text a {
      color: var(--brand);
      text-decoration: underline;
      transition: color 0.2s;
    }

    .cookie-consent__text a:hover {
      color: var(--brand-dark);
    }

    .cookie-consent__actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      align-items: center;
    }

    .cookie-consent__btn {
      padding: 12px 24px;
      border: none;
      border-radius: var(--radius);
      font-size: clamp(14px, 1.8vw, 16px);
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
      white-space: nowrap;
      font-family: inherit;
    }

    .cookie-consent__btn--accept {
      background: var(--brand);
      color: #ffffff;
    }

    .cookie-consent__btn--accept:hover {
      background: var(--brand-dark);
      transform: translateY(-1px);
      box-shadow: var(--shadow-sm);
    }

    .cookie-consent__btn--refuse {
      background: transparent;
      color: var(--muted);
      border: 1px solid var(--line);
    }

    .cookie-consent__btn--refuse:hover {
      background: var(--surface);
      color: var(--ink);
      border-color: var(--muted);
    }

    .cookie-consent__btn--settings {
      background: transparent;
      color: var(--brand);
      text-decoration: underline;
      padding: 12px 16px;
    }

    .cookie-consent__btn--settings:hover {
      color: var(--brand-dark);
    }

    @media (max-width: 768px) {
      .cookie-consent__container {
        flex-direction: column;
        align-items: stretch;
      }

      .cookie-consent__actions {
        width: 100%;
        justify-content: stretch;
      }

      .cookie-consent__btn {
        flex: 1;
        min-width: 120px;
      }
    }
"""

# HTML du bandeau de cookies
COOKIE_HTML = f"""  <!-- ==================== BANDEAU DE CONSENTEMENT COOKIES (RGPD) ==================== -->
  <div id="cookieConsent" class="cookie-consent" role="dialog" aria-labelledby="cookieConsentTitle" aria-describedby="cookieConsentText">
    <div class="cookie-consent__container">
      <div class="cookie-consent__content">
        <h3 id="cookieConsentTitle" class="cookie-consent__title">Nous utilisons des cookies</h3>
        <p id="cookieConsentText" class="cookie-consent__text">
          Ce site utilise des cookies pour améliorer votre expérience et analyser le trafic. En acceptant, vous autorisez l'utilisation de cookies de mesure d'audience (Google Tag Manager) conformément à notre politique de confidentialité. 
          <a href="https://fnmns-occitanie.com/politique-de-confidentialite/" target="_blank" rel="noopener">En savoir plus</a>
        </p>
      </div>
      <div class="cookie-consent__actions">
        <button id="cookieAccept" class="cookie-consent__btn cookie-consent__btn--accept" aria-label="Accepter les cookies">
          Accepter
        </button>
        <button id="cookieRefuse" class="cookie-consent__btn cookie-consent__btn--refuse" aria-label="Refuser les cookies">
          Refuser
        </button>
      </div>
    </div>
  </div>

  <!-- ==================== GESTION DES COOKIES ET GOOGLE TAG MANAGER ==================== -->
  <script>
    (function() {{
      'use strict';
      
      // ⚠️ CONFIGURATION : ID Google Tag Manager
      const GTM_CONTAINER_ID = '{GTM_ID}';
      
      // Nom du cookie de consentement
      const COOKIE_CONSENT_NAME = 'cookie_consent';
      const COOKIE_CONSENT_DURATION = 365; // Durée en jours (1 an)
      
      /**
       * Fonction utilitaire pour créer/retirer un cookie
       */
      function setCookie(name, value, days) {{
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/;SameSite=Lax';
      }}
      
      /**
       * Fonction utilitaire pour lire un cookie
       */
      function getCookie(name) {{
        const nameEQ = name + '=';
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {{
          let cookie = cookies[i];
          while (cookie.charAt(0) === ' ') {{
            cookie = cookie.substring(1, cookie.length);
          }}
          if (cookie.indexOf(nameEQ) === 0) {{
            return cookie.substring(nameEQ.length, cookie.length);
          }}
        }}
        return null;
      }}
      
      /**
       * Fonction pour supprimer un cookie
       */
      function deleteCookie(name) {{
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;';
      }}
      
      /**
       * Supprimer tous les cookies de tracking (Google Analytics, GTM, etc.)
       */
      function deleteTrackingCookies() {{
        // Liste des cookies à supprimer (GA, GTM, et autres cookies de tracking)
        const cookiesToDelete = [
          '_ga', '_gid', '_gat', '_gat_gtag_', '_gat_UA_', '_gcl_au',
          '_fbp', '_fbc', // Facebook Pixel si présent
          'NID', 'SID', 'HSID', 'SSID', 'APISID', 'SAPISID', 'SIDCC', // Cookies Google
          '_dc_gtm_', '_gtm_' // Cookies GTM
        ];
        
        const domain = window.location.hostname;
        const paths = ['/', '/fnmns-landing'];
        
        // Supprimer les cookies standards
        cookiesToDelete.forEach(cookieName => {{
          deleteCookie(cookieName);
          document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;domain=' + domain;
          document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;domain=.' + domain;
          
          paths.forEach(path => {{
            document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=' + path;
            document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=' + path + ';domain=' + domain;
            document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=' + path + ';domain=.' + domain;
          }});
        }});
        
        // Supprimer les cookies _ga_* (format dynamique)
        const allCookies = document.cookie.split(';');
        allCookies.forEach(cookie => {{
          const cookieName = cookie.split('=')[0].trim();
          if (cookieName.startsWith('_ga_') || cookieName.startsWith('_gat_gtag_') || cookieName.startsWith('_gtm_')) {{
            deleteCookie(cookieName);
            document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;domain=' + domain;
            document.cookie = cookieName + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;domain=.' + domain;
          }}
        }});
      }}
      
      /**
       * Charger Google Tag Manager (conforme RGPD - uniquement après consentement)
       */
      function loadGoogleTagManager() {{
        if (!GTM_CONTAINER_ID || GTM_CONTAINER_ID === 'GTM-XXXXXXX') {{
          console.warn('⚠️ Google Tag Manager non configuré : veuillez définir GTM_CONTAINER_ID dans le script.');
          return;
        }}
        
        // Initialiser dataLayer avant GTM
        window.dataLayer = window.dataLayer || [];
        
        // Code GTM - Partie 1 : Script dans le head
        const gtmScript = document.createElement('script');
        gtmScript.innerHTML = `
          (function(w,d,s,l,i){{w[l]=w[l]||[];w[l].push({{'gtm.start':
          new Date().getTime(),event:'gtm.js'}});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          }})(window,document,'script','dataLayer','${{GTM_CONTAINER_ID}}');
        `;
        document.head.appendChild(gtmScript);
        
        // Code GTM - Partie 2 : noscript dans le body
        const gtmNoscript = document.createElement('noscript');
        gtmNoscript.innerHTML = `<iframe src="https://www.googletagmanager.com/ns.html?id=${{GTM_CONTAINER_ID}}" height="0" width="0" style="display:none;visibility:hidden"></iframe>`;
        document.body.insertBefore(gtmNoscript, document.body.firstChild);
        
        console.log('✅ Google Tag Manager chargé (GTM-' + GTM_CONTAINER_ID.split('-')[1] + ')');
      }}
      
      /**
       * Afficher le bandeau de consentement
       */
      function showCookieConsent() {{
        const cookieBanner = document.getElementById('cookieConsent');
        if (cookieBanner) {{
          setTimeout(() => {{
            cookieBanner.classList.add('show');
          }}, 500); // Petite animation d'apparition
        }}
      }}
      
      /**
       * Masquer le bandeau de consentement
       */
      function hideCookieConsent() {{
        const cookieBanner = document.getElementById('cookieConsent');
        if (cookieBanner) {{
          cookieBanner.classList.remove('show');
          setTimeout(() => {{
            cookieBanner.style.display = 'none';
          }}, 400);
        }}
      }}
      
      /**
       * Gérer l'acceptation des cookies
       */
      function acceptCookies() {{
        setCookie(COOKIE_CONSENT_NAME, 'accepted', COOKIE_CONSENT_DURATION);
        hideCookieConsent();
        loadGoogleTagManager();
      }}
      
      /**
       * Gérer le refus des cookies
       */
      function refuseCookies() {{
        setCookie(COOKIE_CONSENT_NAME, 'refused', COOKIE_CONSENT_DURATION);
        hideCookieConsent();
        deleteTrackingCookies();
        
        // Supprimer tous les scripts GTM s'ils ont déjà été chargés
        const gtmScripts = document.querySelectorAll('script[src*="googletagmanager.com"], script:contains("gtm.js")');
        gtmScripts.forEach(script => script.remove());
        
        // Supprimer le noscript GTM
        const gtmNoscript = document.querySelector('noscript iframe[src*="googletagmanager.com"]');
        if (gtmNoscript && gtmNoscript.parentNode) {{
          gtmNoscript.parentNode.remove();
        }}
        
        // Nettoyer la dataLayer
        if (window.dataLayer) {{
          window.dataLayer = [];
        }}
      }}
      
      /**
       * Initialisation au chargement de la page
       */
      function initCookieConsent() {{
        const consent = getCookie(COOKIE_CONSENT_NAME);
        
        if (!consent) {{
          // Aucun consentement enregistré : afficher le bandeau
          showCookieConsent();
        }} else if (consent === 'accepted') {{
          // Consentement accepté : charger Google Tag Manager
          loadGoogleTagManager();
        }} else {{
          // Consentement refusé : supprimer tous les cookies de tracking
          deleteTrackingCookies();
        }}
        
        // Ajouter les event listeners sur les boutons
        const acceptBtn = document.getElementById('cookieAccept');
        const refuseBtn = document.getElementById('cookieRefuse');
        
        if (acceptBtn) {{
          acceptBtn.addEventListener('click', acceptCookies);
        }}
        
        if (refuseBtn) {{
          refuseBtn.addEventListener('click', refuseCookies);
        }}
      }}
      
      // Initialiser lorsque le DOM est prêt
      if (document.readyState === 'loading') {{
        document.addEventListener('DOMContentLoaded', initCookieConsent);
      }} else {{
        initCookieConsent();
      }}
      
      // Exposer des fonctions globales pour permettre la modification du consentement plus tard
      window.manageCookieConsent = {{
        show: showCookieConsent,
        accept: acceptCookies,
        refuse: refuseCookies,
        getConsent: function() {{
          return getCookie(COOKIE_CONSENT_NAME);
        }}
      }};
      
    }})();
  </script>"""


def integrate_gtm_cookies(file_path):
    """Intègre le CSS, HTML et JS pour GTM et cookies dans un fichier HTML"""
    
    print(f"Traitement de {file_path.name}...")
    
    # Lire le fichier
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Vérifier si déjà intégré
    if 'cookie-consent' in content and GTM_ID in content:
        print(f"  ⚠️  {file_path.name} semble déjà contenir le code GTM. Ignoré.")
        return False
    
    # 1. Ajouter le CSS avant </style>
    if '</style>' in content:
        if 'BANDEAU DE CONSENTEMENT COOKIES' not in content:
            content = content.replace('</style>', COOKIE_CSS + '\n  </style>', 1)
            print(f"  ✅ CSS ajouté")
        else:
            print(f"  ⚠️  CSS déjà présent")
    else:
        print(f"  ⚠️  Pas de balise </style> trouvée")
    
    # 2. Ajouter le HTML et JS avant </body>
    if '</body>' in content:
        if 'cookieConsent' not in content:
            content = content.replace('</body>', COOKIE_HTML + '\n</body>', 1)
            print(f"  ✅ HTML et JavaScript ajoutés")
        else:
            print(f"  ⚠️  HTML déjà présent")
    else:
        print(f"  ⚠️  Pas de balise </body> trouvée")
    
    # Écrire le fichier modifié
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(content)
    
    return True


def main():
    """Fonction principale"""
    script_dir = Path(__file__).parent
    local_dir = script_dir / 'LOCAL'
    
    if not local_dir.exists():
        print(f"❌ Le dossier LOCAL n'existe pas : {local_dir}")
        return
    
    # Lister tous les fichiers HTML
    html_files = list(local_dir.glob('*.html'))
    
    if not html_files:
        print(f"❌ Aucun fichier HTML trouvé dans {local_dir}")
        return
    
    print(f"📁 {len(html_files)} fichier(s) HTML trouvé(s)\n")
    
    # Traiter chaque fichier
    for html_file in html_files:
        integrate_gtm_cookies(html_file)
        print()
    
    print("✅ Intégration terminée !")


if __name__ == '__main__':
    main()
