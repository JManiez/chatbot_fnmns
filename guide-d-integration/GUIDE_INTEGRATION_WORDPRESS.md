# Guide d'intégration WordPress - Landing Page FNMNS Occitanie

## 📋 Vue d'ensemble

Ce guide vous explique comment intégrer `landing-page-amelioree.html` dans WordPress en utilisant le thème **Astra** (déjà présent dans votre projet).

---

## 🎯 Méthodes d'intégration (3 options)

### **Option 1 : Template de page personnalisé (RECOMMANDÉ)**
✅ Meilleure performance  
✅ Contrôle total  
✅ Compatible avec tous les thèmes  
⚠️ Nécessite un accès FTP/cPanel

### **Option 2 : Page Builder (Elementor/Beaver Builder)**
✅ Interface visuelle  
✅ Facile à modifier  
⚠️ Peut ralentir le site  
⚠️ Nécessite un plugin payant (gratuit possible)

### **Option 3 : Shortcode personnalisé**
✅ Flexible  
✅ Réutilisable  
⚠️ Plus complexe à maintenir

---

## 🚀 OPTION 1 : Template de page personnalisé (Recommandé)

### Étape 1 : Créer un thème enfant Astra

**Pourquoi un thème enfant ?**
- Protège vos modifications lors des mises à jour d'Astra
- Meilleure pratique WordPress

#### 1.1 Créer la structure du thème enfant

Créez ces fichiers dans `/wp-content/themes/astra-child/` :

**`style.css`**
```css
/*
Theme Name: Astra Child
Description: Thème enfant pour FNMNS Occitanie
Author: Votre nom
Template: astra
Version: 1.0.0
*/

/* Les styles seront dans un fichier séparé */
```

**`functions.php`**
```php
<?php
/**
 * Fonctions du thème enfant Astra
 */

// Charger les styles du thème parent
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles', 15 );
function astra_child_enqueue_styles() {
    wp_enqueue_style( 'astra-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'astra-child-style', get_stylesheet_directory_uri() . '/style.css', array('astra-parent-style') );
    
    // Charger les styles de la landing page
    wp_enqueue_style( 'fnmns-landing-style', get_stylesheet_directory_uri() . '/assets/css/landing-page.css', array(), '1.0.0' );
    
    // Charger les scripts
    wp_enqueue_script( 'fnmns-landing-script', get_stylesheet_directory_uri() . '/assets/js/landing-page.js', array('jquery'), '1.0.0', true );
}
```

### Étape 2 : Extraire et organiser les fichiers

#### 2.1 Extraire le CSS

Créez `/wp-content/themes/astra-child/assets/css/landing-page.css`

**Action :** Copiez tout le contenu de la balise `<style>` de `landing-page-amelioree.html` dans ce fichier.

#### 2.2 Extraire le JavaScript

Créez `/wp-content/themes/astra-child/assets/js/landing-page.js`

**Action :** Copiez tout le contenu de la balise `<script>` de `landing-page-amelioree.html` dans ce fichier.

#### 2.3 Créer le template de page

Créez `/wp-content/themes/astra-child/page-landing-fnmns.php`

```php
<?php
/**
 * Template Name: Landing Page FNMNS Occitanie
 * 
 * Template personnalisé pour la page d'accueil FNMNS Occitanie
 */

get_header(); ?>

<div id="fnmns-landing" class="fnmns-landing" lang="fr">
    
    <!-- Skip link pour l'accessibilité -->
    <a href="#formations" class="skip-link">Aller au contenu principal</a>

    <!-- ==================== HEADER STICKY ==================== -->
    <header class="header" role="banner">
        <div class="header__container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo" aria-label="FNMNS Occitanie - Retour à l'accueil">
                <?php
                $logo = get_theme_mod( 'custom_logo' );
                if ( $logo ) {
                    echo wp_get_attachment_image( $logo, 'full', false, array(
                        'alt' => 'FNMNS Occitanie - Logo organisme de formation maîtres-nageurs Occitanie',
                        'loading' => 'eager'
                    ) );
                } else {
                    echo '<img src="' . esc_url( get_stylesheet_directory_uri() . '/assets/images/logo-fnmns.png' ) . '" alt="FNMNS Occitanie">';
                }
                ?>
            </a>
            <nav class="header__nav" role="navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'header__nav-links',
                    'fallback_cb'    => false,
                ) );
                ?>
            </nav>
            <div class="header__cta">
                <a href="tel:+33612345678" class="header__phone" aria-label="Appeler la FNMNS Occitanie">
                    <svg class="header__phone-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span><?php echo esc_html( get_option( 'fnmns_phone', '06 12 34 56 78' ) ); ?></span>
                </a>
                <a href="#contact" class="btn btn--primary" style="padding: 10px 20px; font-size: 14px;">
                    Contact
                </a>
            </div>
        </div>
    </header>

    <!-- ==================== HERO ==================== -->
    <section class="hero" aria-labelledby="hero-title">
        <?php
        $hero_image = get_post_meta( get_the_ID(), 'hero_image', true );
        if ( ! $hero_image ) {
            $hero_image = 'https://fnmns-occitanie.com/wp-content/uploads/2024/11/new_summer_collection-optijpg.jpg';
        }
        ?>
        <img 
            src="<?php echo esc_url( $hero_image ); ?>" 
            alt="FNMNS Occitanie - Formations maîtres-nageurs et sauveteurs en Occitanie"
            class="hero__background"
            loading="eager"
        >
        <div class="hero__wrap">
            <div class="hero__content">
                <span class="hero__badge" aria-label="Organisme certifié Qualiopi">Organisme certifié Qualiopi</span>
                
                <h1 id="hero-title" class="hero__title">
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'hero_title', true ) ?: 'FNMNS Occitanie' ); ?>
                </h1>
                
                <p class="hero__subtitle">
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'hero_subtitle', true ) ?: 'Organisme de formation certifié Qualiopi spécialisé dans les formations de maîtres-nageurs et sauveteurs en Occitanie' ); ?>
                </p>
                
                <div class="hero__cta">
                    <a class="btn btn--primary" href="#contact" aria-label="Demander un devis gratuit">
                        Demander un devis gratuit
                    </a>
                    <a class="btn btn--ghost" href="#formations" aria-label="Découvrir toutes les formations disponibles">
                        Découvrir les formations
                    </a>
                </div>
                
                <!-- Réseaux sociaux -->
                <div class="hero__social" aria-label="Réseaux sociaux">
                    <?php
                    $social_links = array(
                        'facebook' => 'https://www.facebook.com/share/1AAZK1TrZv/',
                        'instagram' => 'https://www.instagram.com/ctf_fnmns_lr/profilecard/?igsh=MWRkcG5rMG1kNGdhNg==',
                        'linkedin' => 'https://www.linkedin.com/company/fnmns-occitanie/',
                        'youtube' => 'https://www.youtube.com/@fnmnsoccitaniemed'
                    );
                    
                    foreach ( $social_links as $network => $url ) {
                        echo '<a href="' . esc_url( $url ) . '" class="hero__social-link" target="_blank" rel="noopener noreferrer" aria-label="Suivez-nous sur ' . esc_attr( ucfirst( $network ) ) . '">';
                        // SVG icons ici (copier depuis le HTML original)
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CONTENU PRINCIPAL ==================== -->
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>

    <!-- ==================== SECTIONS STATIQUES ==================== -->
    <!-- Copier toutes les sections depuis landing-page-amelioree.html -->
    <!-- À adapter avec des fonctions WordPress pour rendre dynamique -->

    <!-- ==================== FOOTER ==================== -->
    <footer role="contentinfo">
        <div class="container">
            <div class="footer__grid">
                <div>
                    <h3 class="footer__title">FNMNS Occitanie</h3>
                    <p class="footer__text">
                        <?php echo esc_html( get_option( 'fnmns_footer_text', 'La FNMNS Occitanie est un organisme de formation certifié Qualiopi...' ) ); ?>
                    </p>
                </div>
                <div>
                    <h3 class="footer__title">Formations</h3>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer__links',
                    ) );
                    ?>
                </div>
                <div>
                    <h3 class="footer__title">Contact</h3>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="footer__link">Formulaire de contact</a>
                    <a href="mailto:<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" class="footer__link"><?php echo esc_html( get_option( 'admin_email' ) ); ?></a>
                    <!-- Réseaux sociaux footer -->
                </div>
            </div>
            <div class="foot-note">
                <p>Copyright © <?php echo date( 'Y' ); ?> FNMNS OCCITANIE - Maître Nageur Sauveteur</p>
            </div>
        </div>
    </footer>
</div>

<?php get_footer(); ?>
```

### Étape 3 : Adapter le contenu HTML

#### 3.1 Convertir les sections statiques

Pour chaque section (À propos, Formations, etc.), vous avez deux options :

**Option A : Contenu dans l'éditeur WordPress**
- Créer des champs personnalisés (ACF ou Meta Box)
- Rendre les sections éditables depuis l'admin

**Option B : Sections codées en dur**
- Copier le HTML directement dans le template
- Plus rapide mais moins flexible

#### 3.2 Adapter les liens

**Avant (HTML statique) :**
```html
<a href="/Pages/landing-page-amelioree.html#contact">Contact</a>
```

**Après (WordPress) :**
```php
<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>">Contact</a>
// ou pour les ancres
<a href="#contact">Contact</a>
```

#### 3.3 Adapter les images

**Avant :**
```html
<img src="https://fnmns-occitanie.com/wp-content/uploads/2024/11/image.jpg">
```

**Après :**
```php
<?php
$image_id = get_post_meta( get_the_ID(), 'hero_image_id', true );
if ( $image_id ) {
    echo wp_get_attachment_image( $image_id, 'full', false, array( 'alt' => 'Description' ) );
}
?>
```

### Étape 4 : Créer la page dans WordPress

1. **Aller dans WordPress Admin** → Pages → Ajouter
2. **Titre** : "Accueil" ou "FNMNS Occitanie"
3. **Template** : Sélectionner "Landing Page FNMNS Occitanie"
4. **Permalien** : Configurer comme page d'accueil (Réglages → Lecture → Page d'accueil statique)

### Étape 5 : Configurer les menus

1. **Apparence → Menus**
2. Créer un menu "Principal" et un menu "Footer"
3. Assigner aux emplacements `primary` et `footer`

---

## 🎨 OPTION 2 : Utiliser Elementor (Alternative)

Si vous préférez une interface visuelle :

### Étape 1 : Installer Elementor

```bash
# Via WordPress Admin
Extensions → Ajouter → Rechercher "Elementor" → Installer
```

### Étape 2 : Créer une page avec Elementor

1. Créer une nouvelle page
2. Cliquer sur "Modifier avec Elementor"
3. Importer le HTML via "HTML personnalisé" ou reconstruire section par section

### Étape 3 : Ajouter les styles CSS personnalisés

Dans Elementor → Réglages → CSS personnalisé, coller le CSS de la landing page.

---

## 🔧 OPTION 3 : Shortcode personnalisé

Pour intégrer la landing page n'importe où :

### Créer le shortcode

Dans `functions.php` du thème enfant :

```php
function fnmns_landing_shortcode( $atts ) {
    ob_start();
    include get_stylesheet_directory() . '/templates/landing-content.php';
    return ob_get_clean();
}
add_shortcode( 'fnmns_landing', 'fnmns_landing_shortcode' );
```

Utilisation : `[fnmns_landing]` dans n'importe quelle page.

---

## 📝 Checklist d'intégration

### Avant la mise en ligne

- [ ] Créer le thème enfant Astra
- [ ] Extraire CSS dans `/assets/css/landing-page.css`
- [ ] Extraire JavaScript dans `/assets/js/landing-page.js`
- [ ] Créer le template `page-landing-fnmns.php`
- [ ] Adapter tous les liens internes
- [ ] Remplacer les images par des médias WordPress
- [ ] Configurer les menus WordPress
- [ ] Tester sur mobile (responsive)
- [ ] Vérifier les performances (PageSpeed Insights)
- [ ] Tester l'accessibilité (WAVE, axe DevTools)
- [ ] Vérifier le SEO (Yoast SEO ou Rank Math)

### Optimisations WordPress

- [ ] Activer la mise en cache (WP Rocket, W3 Total Cache)
- [ ] Optimiser les images (Smush, ShortPixel)
- [ ] Minifier CSS/JS (Autoptimize)
- [ ] Configurer CDN si nécessaire
- [ ] Activer lazy loading WordPress

### Sécurité

- [ ] Vérifier les permissions de fichiers (644 pour fichiers, 755 pour dossiers)
- [ ] Échapper toutes les sorties (`esc_url()`, `esc_html()`, etc.)
- [ ] Valider toutes les entrées
- [ ] Utiliser nonces pour les formulaires

---

## 🚨 Points d'attention

### 1. Conflits avec le thème Astra

Le thème Astra a ses propres styles. Vous devrez peut-être :

```css
/* Dans landing-page.css */
.fnmns-landing {
    /* Réinitialiser les styles Astra si nécessaire */
}

.fnmns-landing * {
    box-sizing: border-box;
}
```

### 2. Formulaire de contact

Le formulaire actuel utilise `event.preventDefault()` avec un `alert()`. Options :

- **Contact Form 7** : Plugin gratuit
- **WPForms** : Plugin premium
- **Gravity Forms** : Plugin premium
- **API personnalisée** : Développement sur mesure

### 3. Numéro de téléphone

Remplacer le placeholder `+33612345678` :

```php
// Dans functions.php
add_option( 'fnmns_phone', '06 XX XX XX XX' );

// Dans le template
echo esc_html( get_option( 'fnmns_phone' ) );
```

### 4. Vidéo YouTube

La vidéo YouTube est bien optimisée. Pour aller plus loin :

- Utiliser l'API YouTube IFrame Player
- Ajouter un bouton de lecture personnalisé
- Gérer la pause au scroll

---

## 📦 Structure finale recommandée

```
wp-content/themes/astra-child/
├── style.css
├── functions.php
├── page-landing-fnmns.php
├── assets/
│   ├── css/
│   │   └── landing-page.css
│   ├── js/
│   │   └── landing-page.js
│   └── images/
│       └── logo-fnmns.png
└── templates/
    └── landing-sections.php
```

---

## 🎯 Prochaines étapes après intégration

1. **Tester** : Tous les navigateurs, tous les appareils
2. **Optimiser** : Images, CSS, JavaScript
3. **SEO** : Configurer Yoast SEO ou Rank Math
4. **Analytics** : Installer Google Analytics
5. **Backup** : Configurer des sauvegardes automatiques
6. **Maintenance** : Planifier les mises à jour

---

## 💡 Ressources utiles

- **Documentation Astra** : https://wpastra.com/docs/
- **Codex WordPress** : https://codex.wordpress.org/
- **Developer Handbook** : https://developer.wordpress.org/
- **Astra Child Theme Generator** : https://wpastra.com/docs/installing-astra-child-theme/

---

## 🆘 Support

En cas de problème :
1. Vérifier les logs d'erreur WordPress (`wp-content/debug.log`)
2. Désactiver les plugins un par un pour identifier les conflits
3. Vérifier la console JavaScript du navigateur
4. Consulter la documentation WordPress/Astra

---

**Bon courage pour l'intégration ! 🚀**

