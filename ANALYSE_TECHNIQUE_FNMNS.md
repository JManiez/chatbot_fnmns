# Analyse Technique WordPress FNMNS Occitanie

**Date d'analyse** : 30 novembre 2025  
**Thème analysé** : Astra 4.11.13  
**Objectif** : Cartographie technique en vue d'une migration vers Gutenberg

**📄 Documents complémentaires** :
- `ANALYSE_BDD_ELEMENTOR.md` : Analyse détaillée de la base de données (33 pages Elementor identifiées)

---

## 1. ARBORESCENCE COMPLÈTE DU THÈME ASTRA

### 1.1 Structure générale

```
themes/astra/
├── Fichiers principaux (racine)
│   ├── functions.php (212 lignes)
│   ├── style.css (65 lignes - header uniquement)
│   ├── header.php
│   ├── footer.php
│   ├── page.php
│   ├── single.php
│   ├── archive.php
│   ├── 404.php
│   ├── index.php
│   ├── search.php
│   ├── sidebar.php
│   ├── comments.php
│   └── searchform.php
│
├── inc/ (436 fichiers PHP)
│   ├── addons/ (breadcrumbs, heading-colors, scroll-to-top, transparent-header)
│   ├── admin-functions.php
│   ├── assets/ (CSS, fonts, images, JS)
│   ├── blog/ (blog-config.php, blog.php, single-blog.php)
│   ├── builder/ (Header/Footer Builder)
│   ├── compatibility/ (Elementor, WooCommerce, Gutenberg, etc.)
│   ├── core/ (classes principales, hooks, deprecated)
│   ├── customizer/ (116 fichiers de configuration)
│   ├── dynamic-css/ (15 fichiers de génération CSS)
│   ├── lib/ (notices, analytics, webfont)
│   ├── metabox/ (11 fichiers)
│   ├── modules/ (posts-structures, related-posts)
│   └── schema/ (9 fichiers de schema markup)
│
├── template-parts/ (20+ fichiers)
│   ├── 404/
│   ├── advanced-footer/
│   ├── blog/
│   ├── content-*.php
│   ├── footer/
│   ├── header/
│   └── single/
│
├── assets/
│   ├── css/minified/ (64 fichiers CSS)
│   ├── js/
│   │   ├── minified/ (24 fichiers)
│   │   └── unminified/ (20 fichiers)
│   ├── fonts/
│   └── svg/
│
└── admin/ (interface d'administration)
```

### 1.2 Statistiques

- **Fichiers PHP** : 436
- **Fichiers CSS** : 107
- **Fichiers JavaScript** : 125
- **Version du thème** : 4.11.13
- **Version PHP minimale** : 5.3 (namespaces Elementor nécessitent 5.4+)

### 1.3 Thème enfant

**AUCUN THÈME ENFANT DÉTECTÉ** dans la structure actuelle.  
⚠️ **RISQUE** : Modifications directes dans le thème parent (non recommandé).

---

## 2. FICHIERS PHP : TEMPLATES, HOOKS, FUNCTIONS.PHP

### 2.1 functions.php - Analyse détaillée

**Lignes clés** :
- Ligne 18 : Version `ASTRA_THEME_VERSION = '4.11.13'`
- Lignes 188-193 : Chargement conditionnel Elementor (PHP 5.4+)
- Lignes 208-211 : **Fonction personnalisée ajoutée** :
  ```php
  function autoriser_json_upload($mimes) {
      $mimes['json'] = 'application/json';
      return $mimes;
  }
  add_filter('upload_mimes', 'autoriser_json_upload');
  ```
  → Permet l'upload de fichiers JSON (probablement pour templates Elementor)

**Fichiers de compatibilité chargés** :
- `class-astra-elementor.php` (566 lignes)
- `class-astra-elementor-pro.php` (558 lignes)
- `class-astra-gutenberg.php`
- `class-astra-woocommerce.php`
- Et 15+ autres fichiers de compatibilité

### 2.2 Templates PHP principaux

#### header.php
- Hooks utilisés : `astra_html_before()`, `astra_head_top()`, `astra_head_bottom()`, `astra_body_top()`, `astra_header_before()`, `astra_header()`, `astra_header_after()`, `astra_content_before()`
- Structure : DOCTYPE, head, body, skip-link, site wrapper

#### footer.php
- Hooks utilisés : `astra_content_bottom()`, `astra_content_after()`, `astra_footer_before()`, `astra_footer()`, `astra_footer_after()`, `astra_body_bottom()`

#### page.php
- Structure : Sidebar conditionnelle (left/right), primary content, loop via `astra_content_page_loop()`

#### single.php
- Structure : Sidebar conditionnelle, primary content, loop via `astra_content_loop()`

#### archive.php
- Structure : Sidebar conditionnelle, archive header via `astra_archive_header()`, pagination via `astra_pagination()`

### 2.3 Hooks WordPress identifiés

**Fichier** : `inc/core/theme-hooks.php` (507 lignes)

**Hooks HTML/Body** :
- `astra_html_before`
- `astra_body_top`, `astra_body_bottom`
- `astra_head_top`, `astra_head_bottom`

**Hooks Header** :
- `astra_header_before`, `astra_header`, `astra_header_after`
- `astra_masthead_top`, `astra_masthead`, `astra_masthead_bottom`
- `astra_main_header_bar_top`, `astra_main_header_bar_bottom`
- `astra_masthead_content`
- `astra_masthead_toggle_buttons_before`, `astra_masthead_toggle_buttons`, `astra_masthead_toggle_buttons_after`

**Hooks Content** :
- `astra_content_before`, `astra_content_after`
- `astra_content_top`, `astra_content_bottom`
- `astra_content_while_before`, `astra_content_loop`, `astra_content_while_after`
- `astra_content_page_loop`

**Hooks Entry** :
- `astra_entry_before`, `astra_entry_after`
- `astra_entry_top`, `astra_entry_bottom`
- `astra_entry_content_before`, `astra_entry_content_after`
- `astra_entry_content_single`, `astra_entry_content_single_page`
- `astra_entry_content_blog`
- `astra_entry_content_404_page`

**Hooks Footer** :
- `astra_footer_before`, `astra_footer`, `astra_footer_after`
- `astra_footer_content_top`, `astra_footer_content`, `astra_footer_content_bottom`

**Hooks Archive** :
- `astra_archive_header`
- `astra_pagination`

### 2.4 Filtres WordPress identifiés

**Filtres principaux** :
- `astra_dynamic_theme_css` : Génération CSS dynamique
- `astra_enqueue_theme_assets` : Contrôle chargement assets
- `astra_page_layout` : Layout de page
- `astra_get_content_layout` : Layout de contenu
- `astra_the_title_enabled` : Affichage titre
- `astra_featured_image_enabled` : Affichage image mise en avant
- `astra_footer_sml_layout` : Layout footer
- `astra_main_header_display` : Affichage header
- `astra_body_font_family` : Police du body
- `astra_color_palettes` : Palette de couleurs

---

## 3. CSS CUSTOM

### 3.1 CSS du thème

**style.css** : Header uniquement (65 lignes), pas de CSS réel.  
Le CSS est chargé depuis `assets/css/minified/` (64 fichiers).

### 3.2 CSS dynamique

**Fichier** : `inc/class-astra-dynamic-css.php` (6466 lignes)

**Génération via** :
- Classe `Astra_Dynamic_CSS`
- Filtre `astra_dynamic_theme_css`
- Méthode `return_output()` qui génère tout le CSS dynamique

**Sections CSS générées** :
- Variables CSS (couleurs, espacements, breakpoints)
- Typographie (body, headings H1-H6, site title, tagline)
- Layout (container, sidebar, page builder)
- Blog (single, archive, cards)
- Header (logo, navigation, mobile)
- Footer (main, small)
- 404 Page
- WooCommerce (si actif)
- Dark Mode
- RTL Support

### 3.3 CSS Elementor

**Fichier** : `inc/compatibility/class-astra-elementor.php`

**CSS de compatibilité généré** :
```php
// Lignes 115-216 : CSS de compatibilité Elementor
- .elementor-widget-heading .elementor-heading-title { margin: 0 }
- .elementor-page .ast-menu-toggle { color/background unset }
- .elementor-post.elementor-grid-item.hentry { margin-bottom: 0 }
- Support RTL pour sections stretched
- Support WooCommerce widgets Elementor
```

### 3.4 CSS minifiés

**Emplacement** : `assets/css/minified/` (64 fichiers)

**Fichiers principaux** :
- `style.min.css` / `style-flex.min.css` (selon builder actif)
- `frontend.min.css` / `main.min.css` (si header/footer builder actif)
- `customizer-controls.min.css`
- `extend-customizer.min.css`
- Versions RTL pour chaque fichier

### 3.5 CSS inline

**Génération** : Via `wp_add_inline_style()` dans :
- `class-astra-enqueue-scripts.php`
- `class-astra-dynamic-css.php`
- Fichiers de compatibilité (Elementor, WooCommerce, etc.)

---

## 4. TEMPLATES ELEMENTOR

### 4.1 Compatibilité Elementor

**Fichier principal** : `inc/compatibility/class-astra-elementor.php` (566 lignes)

**Fonctionnalités** :
- Détection pages Elementor : `is_elementor_activated($id)`
- Auto-configuration layout : Désactive titre, featured image, met layout en "page-builder"
- CSS de compatibilité : Headings, grid, RTL, WooCommerce
- Intégration palette couleurs globale : Synchronisation avec Elementor Global Colors
- Support Mini Cart WooCommerce

**Fichier Pro** : `inc/compatibility/class-astra-elementor-pro.php` (558 lignes)

**Fonctionnalités Pro** :
- Support Theme Builder (headers, footers, single, archive)
- Override templates Astra avec templates Elementor
- Gestion post meta (sidebar, content layout, footer)
- Support locations Elementor Pro
- Compatibilité widgets WooCommerce Elementor Pro

### 4.2 Métabox Elementor

**Fichier** : `inc/metabox/class-astra-elementor-editor-settings.php` (977 lignes)

**Intégration React** dans l'éditeur Elementor :
- Section "Astra Settings" dans Page Settings
- Contrôles : Container Layout, Container Style, Sidebar Layout, Sidebar Style
- Disable Elements : Header, Footer, Banner, Breadcrumbs
- Advanced Settings : Header Rows, Transparent Header, Sticky Header
- Synchronisation bidirectionnelle avec post meta

### 4.3 Templates Elementor Pro

**Locations supportées** :
- `header` : Remplace `astra_header()`
- `footer` : Remplace `astra_footer()`
- `single` : Remplace contenu single post/page
- `archive` : Remplace contenu archive
- `404` : Remplace template 404

**Méthode** : `do_location()` via Elementor Pro Theme Builder Module

### 4.4 Templates dans uploads

**⚠️ NÉCESSITE EXTRACTION** des archives :
- `backup_*_uploads.zip`
- `backup_*_uploads2.zip`
- `backup_*_uploads3.zip`

**Emplacements probables** :
- `wp-content/uploads/elementor/templates/` (JSON)
- `wp-content/uploads/elementor/css/` (CSS générées)
- `wp-content/uploads/elementor/js/` (JS générées)

---

## 5. ADD-ONS ELEMENTOR

### 5.1 Add-ons détectés dans la base de données

**✅ ANALYSE EFFECTUÉE** : Add-ons identifiés via base de données

#### Royal Elementor Addons (WPR)
- **Version** : 1.7.1041
- **Plugin** : `royal-elementor-addons/wpr-addons.php`
- **Freemius SDK** : 2.12.0
- **Post types créés** : `wpr_templates`, `wpr_mega_menu`
- **Templates utilisés** : Templates WPR détectés

#### Essential Addons for Elementor Lite (EAEL)
- **Version** : 6.5.3
- **Plugin** : `essential-addons-for-elementor-lite/essential_adons_elementor.php`
- **Widgets activés** (extrait) :
  - `data-table` ✅ (utilisé)
  - `fancy-text`, `creative-btn`, `count-down`
  - `team-members`, `testimonials`, `info-box`
  - `flip-box`, `call-to-action`, `dual-header`
  - `price-table`, `filter-gallery`, `image-accordion`
  - `content-ticker`, `tooltip`, `adv-accordion`
  - `adv-tabs`, `progress-bar`, `feature-list`
  - Et 30+ autres widgets

**Widgets EAEL utilisés dans les pages** :
- `data-table` : Tables de données (détecté page 987)
- Autres widgets à vérifier dans les JSON Elementor

### 5.2 Note importante

Les add-ons sont des **plugins séparés**, pas dans le thème.  
**Impact migration** : Widgets EAEL et WPR nécessiteront conversion en blocs Gutenberg équivalents

### 5.2 Hooks Elementor utilisés

**Hooks détectés dans le thème** :
- `elementor/loaded` : Vérification chargement
- `elementor/documents/register_controls` : Ajout contrôles
- `elementor/preview/init` : Mode preview
- `elementor/preview/enqueue_styles` : Styles preview
- `elementor/editor/before_enqueue_scripts` : Scripts éditeur
- `elementor/theme/register_locations` : Locations Theme Builder
- `elementor/document/after_save` : Sauvegarde document

---

## 6. DÉPENDANCES WP-CONTENT/UPLOADS

### 6.1 Archives uploads

**Fichiers disponibles** :
- `backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-uploads.zip`
- `backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-uploads2.zip`
- `backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-uploads3.zip`

**⚠️ ACTION REQUISE** : Décompresser pour analyser :
- Templates Elementor JSON
- CSS générées par Elementor
- Médias utilisés

### 6.2 Structure attendue dans uploads

```
wp-content/uploads/
├── elementor/
│   ├── css/ (CSS générées par page)
│   ├── js/ (JS générées)
│   └── templates/ (templates sauvegardés)
├── [année]/[mois]/ (médias uploadés)
└── ...
```

---

## 7. LISTE DES PAGES ELEMENTOR

### 7.1 Identification via base de données

**✅ ANALYSE EFFECTUÉE** du fichier :
- `backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-db`

**RÉSULTATS** : **33 pages construites avec Elementor** identifiées

**IDs des pages Elementor** :
- 5, 7, 17, 31, 124, 146, 285, 287, 289, 291, 987, 989, 1093, 1405, 1536, 1655, 1698, 1941, 2013, 2268, 2528, 4180, 4245, 4257, 4258, 4259, 4260, 4261, 4262, 4263, 4264, 4265

**Versions Elementor détectées** :
- 3.25.10 (page 2013, 2268)
- 3.26.4 (page 285)
- 3.28.1 (page 2528)
- 3.32.4 (pages 5, 17)
- 3.32.5 (pages 287, 291)
- 3.33.1 (pages 987, 1536)
- 3.33.2 (page 289)

**Versions Elementor Pro détectées** :
- 3.25.4 (pages 2013, 2268)
- 3.26.3 (pages 285, 1655, 1698, 1405, 124, 31)
- 3.27.5 (page 146)
- 3.27.6 (page 1093)
- 3.28.1 (page 2528)
- 3.28.2 (page 1941)
- 3.32.2 (pages 5, 17, 989, 4257, 4258)
- 3.32.3 (pages 287, 291, 7, 4180)
- 3.33.1 (pages 987, 1536, 289, 4245, 4260, 4261, 4262, 4263, 4264, 4265)

**⚠️ PROBLÈME** : Versions multiples d'Elementor/Pro utilisées sur différentes pages (incohérence)

### 7.2 Pages avec shortcodes

**✅ ANALYSE EFFECTUÉE** : **90 occurrences de "shortcode"** trouvées dans la base

**Shortcodes identifiés** :
- `[trustindex no-registration=google]` : Widget avis Google (Trustindex)
- `[ninja_forms_all_fields]` : Formulaires Ninja Forms
- `[ninja_forms_calc]` : Calculs Ninja Forms

**Widgets Elementor utilisant shortcodes** :
- Widget "shortcode" natif Elementor
- Widget "data-table" Essential Addons (EAEL) avec tables HTML

---

## 8. PAGES ELEMENTOR + SHORTCODES

### 8.1 Shortcodes dans templates Elementor

**✅ ANALYSE EFFECTUÉE** : Shortcodes identifiés dans les données Elementor

**Widgets shortcode Elementor détectés** :
- Widget "shortcode" natif utilisé dans les pages
- Exemple page 5 (accueil) : `[trustindex no-registration=google]`

**Shortcodes identifiés** :
1. **Trustindex** : `[trustindex no-registration=google]`
   - Plugin : WP Reviews Plugin for Google
   - Usage : Affichage avis Google
   - Pages : Page d'accueil (ID 5)

2. **Ninja Forms** : `[ninja_forms_all_fields]`, `[ninja_forms_calc]`
   - Plugin : Ninja Forms
   - Usage : Formulaires et calculs
   - Pages : À vérifier dans les formulaires

### 8.2 Plugins de shortcodes identifiés

**Plugins actifs avec shortcodes** :
- **Ninja Forms** : Formulaires (`[ninja_forms_*]`)
- **WP Reviews Plugin for Google** : Avis (`[trustindex *]`)
- **Contact Form 7** : Compatibilité détectée dans thème
- **WooCommerce** : Compatibilité détectée (si utilisé)

**Impact migration** :
- Shortcodes natifs Gutenberg : Compatibles ✅
- Widgets shortcode Elementor : Nécessitent conversion en blocs shortcode Gutenberg

---

## 9. SCRIPTS ET CSS CHARGÉS PAR PAGE

### 9.1 Classe d'enqueue

**Fichier** : `inc/core/class-astra-enqueue-scripts.php` (627 lignes)

**Méthode principale** : `enqueue_scripts()` (ligne 275)

### 9.2 Scripts JavaScript

**Scripts toujours chargés** :
- `astra-flexibility` : Support flexbox IE10 (conditionnel IE)
- `astra-customevent` : Polyfill CustomEvent IE
- `astra-theme-js` : Script principal (style.js ou frontend.js selon builder)

**Scripts conditionnels** :
- `astra-mobile-cart` : Si WooCommerce/EDD + cart dans header
- `astra-live-search` : Si live search activé
- `astra-theme-js-pro` : Si Astra Pro < 3.5.9

**Emplacement** : `assets/js/minified/` ou `unminified/` (selon SCRIPT_DEBUG)

### 9.3 Styles CSS

**Styles toujours chargés** :
- `astra-theme-css` : Style principal (style.css ou main.css selon builder)
- `astra-galleries-css` : Galeries (chargé via filtre `gallery_style`)

**Styles conditionnels** :
- `astra-contact-form-7` : Si CF7 actif
- `astra-gravity-forms` : Si Gravity Forms actif
- `astra-elementor-editor-style` : Dans éditeur Elementor
- `astra-google-fonts` : Polices Google

**CSS inline** :
- Généré via `wp_add_inline_style()` sur `astra-theme-css`
- Contenu : CSS dynamique complet (6466+ lignes)

### 9.4 Dépendances

**Dépendances JavaScript** :
- jQuery (pour la plupart)
- `customize-preview` (pour scripts customizer)
- `wp-element` (pour React components)

**Dépendances CSS** :
- `astra-theme-dynamic` : Pour styles dépendants (si cache activé)
- RTL support : Versions `-rtl` disponibles

### 9.5 Chargement par type de page

**Toutes les pages** :
- `astra-theme-css`
- `astra-theme-js`
- CSS dynamique inline

**Pages Elementor** :
- CSS de compatibilité Elementor (inline)
- Styles Elementor (via plugin)

**Pages WooCommerce** :
- `astra-woocommerce` CSS (inline)
- Scripts WooCommerce si nécessaire

**Éditeur Gutenberg** :
- `astra-block-editor-script`
- `astra-block-editor-styles` ou `astra-wp-editor-styles`

---

## 10. STRUCTURE H1/H2/H3

### 10.1 Templates PHP

#### Page 404 (`template-parts/404/404-layout.php`)
- **H1** : `<h1 class="page-title">` via `astra_the_title()`
- **H3** : `<h3 class="page-sub-title">` (si structural setup)

#### Archive (`template-parts/archive-banner.php`)
- Structure via `astra_get_option($astra_banner_control . '-structure')`
- Éléments possibles : title, description, meta

#### Single Post (`template-parts/single/single-layout.php`)
- Titre via `the_title()` (screen-reader-text)
- Structure via hooks `astra_single_header_*`

#### Blog (`template-parts/blog/blog-layout.php`)
- **H2** : `<h2 class="entry-title">` via `astra_the_title()` dans `content.php`

#### Page (`template-parts/content-page.php`)
- Pas de titre visible dans template (géré par Elementor ou meta)

### 10.2 Schema Markup

**Fichiers schema** : `inc/schema/` (9 fichiers)

**Classes** :
- `Astra_Schema` : Classe principale
- `Astra_CreativeWork_Schema` : Articles, posts
- `Astra_WPHeader_Schema` : Header
- `Astra_WPFooter_Schema` : Footer
- `Astra_WPSidebar_Schema` : Sidebar
- `Astra_Person_Schema` : Auteur
- `Astra_Organization_Schema` : Organisation
- `Astra_Site_Navigation_Schema` : Navigation
- `Astra_Breadcrumb_Schema` : Breadcrumbs

**Activation** : Via filtre `astra_schema_enabled` (défaut : true)

### 10.3 Hiérarchie des titres

**Structure recommandée** :
- **H1** : Titre principal (page, post, archive)
- **H2** : Sections principales, titres de posts dans archive
- **H3** : Sous-sections, sous-titres

**⚠️ À VÉRIFIER** : Dans les templates Elementor (JSON) pour respect de la hiérarchie

---

## 11. PROBLÈMES POTENTIELS POUR MIGRATION GUTENBERG

### 11.1 Dépendances Elementor

**RISQUE ÉLEVÉ** :
- Pages construites avec Elementor ne peuvent pas être migrées automatiquement
- Widgets Elementor → Blocs Gutenberg nécessitent conversion manuelle
- Templates Elementor Pro (headers, footers) → Templates de blocs ou thème
- CSS Elementor spécifique → CSS custom ou styles de blocs

**ACTIONS** :
1. Identifier toutes les pages Elementor
2. Évaluer complexité de chaque page
3. Prioriser migration (pages simples en premier)
4. Créer blocs Gutenberg équivalents si nécessaire

### 11.2 Hooks obsolètes

**Fichiers deprecated** :
- `inc/core/deprecated/deprecated-filters.php` (187 lignes)
- `inc/core/deprecated/deprecated-hooks.php` (78 lignes)
- `inc/core/deprecated/deprecated-functions.php` (219 lignes)

**Filtres obsolètes identifiés** :
- `astra_color_palletes` → `astra_color_palettes` (v1.0.22)
- `astra_sigle_post_navigation_enabled` → `astra_single_post_navigation_enabled` (v1.0.27)
- `astra_primary_header_main_rt_section` → `astra_header_section_elements` (v1.2.2)
- `ast_footer_bar_display` → `astra_footer_bar_display` (v3.7.4)
- `ast_main_header_display` → `astra_main_header_display` (v3.7.4)
- `secondary_submenu_border_class` → `astra_secondary_submenu_border_class` (v3.7.4)
- `gtn_image_group_css_comp` → `astra_gutenberg_image_group_style_support` (v3.7.4)
- `ast_footer_sml_layout` → `astra_footer_sml_layout` (v3.7.4)
- `primary_submenu_border_class` → `astra_primary_submenu_border_class` (v3.7.4)
- `astra_single_banner_post_meta` → `astra_single_post_meta` (v4.0.2)
- `astra_get_option_dynamic-blog-layouts` → `astra_get_option_dynamic_blog_layouts` (v4.1.0)

**Hooks obsolètes** :
- `asta_register_admin_menu` → `astra_register_admin_menu` (v3.7.4)
- Hooks admin redesign (v4.0.0) : `astra_welcome_page_*`, `astra_single_post_*`

**Fonctions obsolètes** :
- `footer_menu_static_css()` → `astra_footer_menu_static_css()` (v3.7.4)
- `is_support_footer_widget_right_margin()` → `astra_support_footer_widget_right_margin()` (v3.7.4)
- `prepare_button_defaults()` → `astra_prepare_button_defaults()` (v3.7.4)
- `prepare_html_defaults()` → `astra_prepare_html_defaults()` (v3.7.4)
- `prepare_social_icon_defaults()` → `astra_prepare_social_icon_defaults()` (v3.7.4)
- `prepare_widget_defaults()` → `astra_prepare_widget_defaults()` (v3.7.4)
- `prepare_menu_defaults()` → `astra_prepare_menu_defaults()` (v3.7.4)
- `prepare_divider_defaults()` → `astra_prepare_divider_defaults()` (v3.7.4)
- `is_astra_pagination_enabled()` → `astra_check_pagination_enabled()` (v3.7.4)
- `is_current_post_comment_enabled()` → `astra_check_current_post_comment_enabled()` (v3.7.4)
- `ast_load_preload_local_fonts()` → `astra_load_preload_local_fonts()` (v3.7.4)
- `ast_get_webfont_url()` → `astra_get_webfont_url()` (v3.7.4)

**⚠️ RISQUE** : Si des plugins/thèmes utilisent ces hooks/filtres obsolètes, ils peuvent casser.

### 11.3 Filtres personnalisés

**Filtres détectés dans functions.php** :
- `autoriser_json_upload` : Permet upload JSON (pour Elementor)

**Impact Gutenberg** : Aucun (fonctionne toujours)

### 11.4 CSS spécifique Elementor

**CSS à convertir** :
- Styles de compatibilité Elementor (lignes 115-216 de `class-astra-elementor.php`)
- CSS inline générée pour pages Elementor
- Styles widgets Elementor Pro WooCommerce

**Solution** : Créer CSS équivalent pour blocs Gutenberg ou styles de thème

### 11.5 Shortcodes

**RISQUE MOYEN** :
- Shortcodes dans pages Elementor → Compatibles Gutenberg
- Shortcodes dans widgets Elementor → Nécessitent blocs équivalents

**Solution** : Utiliser blocs shortcode natifs Gutenberg ou créer blocs personnalisés

### 11.6 Compatibilité Gutenberg

**Fichier** : `inc/compatibility/class-astra-gutenberg.php`

**Support détecté** :
- Styles éditeur Gutenberg
- Compatibilité blocs
- CSS block editor

**✅ POSITIF** : Le thème supporte déjà Gutenberg

---

## 12. POINTS RJ45 (ERREURS JS, CONFLITS PHP, FILTRES OBSOLÈTES)

### 12.1 Erreurs JavaScript potentielles

**Fichiers JS analysés** :

#### customizer-google-fonts.js
- **Ligne 46** : `console.warn()` pour erreurs AJAX Google Fonts
- **Ligne 73** : `console.error()` si fallback échoue
- **Gestion d'erreur** : Fallback synchrone si AJAX échoue

#### block-editor-script.js
- **Ligne 37** : Try/catch pour accès iframe (cross-origin)
- **Gestion** : Ignore silencieusement si accès refusé

**⚠️ POINTS D'ATTENTION** :
- Pas de gestion d'erreur globale
- Dépendances jQuery non vérifiées
- Pas de vérification existence éléments DOM avant manipulation

### 12.2 Conflits PHP

**Namespaces** :
- **Elementor** : Utilise namespace `Elementor` (ligne 10 de `class-astra-elementor.php`)
- **Elementor Pro** : Utilise namespace `ElementorPro\Modules\ThemeBuilder\ThemeSupport` (ligne 17)
- **Astra** : Pas de namespace (classes préfixées `Astra_`)

**⚠️ RISQUE** : Conflits possibles si :
- Autres plugins utilisent mêmes namespaces
- Classes avec mêmes noms

**Vérifications** :
- `class_exists()` utilisé avant instanciation
- Vérification version PHP pour namespaces (5.4+)

### 12.3 Filtres obsolètes

**Voir section 11.2** pour liste complète.

**⚠️ RISQUE** :
- Plugins/thèmes utilisant anciens filtres peuvent casser
- Messages de dépréciation dans logs si `WP_DEBUG` activé

**Recommandation** : Vérifier logs WordPress pour warnings de dépréciation

### 12.4 Conflits de hooks

**Hooks WordPress standards utilisés** :
- `wp_enqueue_scripts` : Priorité 1 (très tôt)
- `after_setup_theme` : Configuration thème
- `wp` : Setup schema
- `template_redirect` : Gestion preview Elementor

**⚠️ RISQUE** : Conflits avec plugins modifiant mêmes hooks

### 12.5 Compatibilité PHP

**Version minimale** : PHP 5.3  
**Namespaces Elementor** : PHP 5.4+  
**Closures** : PHP 5.3+ (utilisées dans plusieurs endroits)

**⚠️ RISQUE** : Si PHP < 5.4, compatibilité Elementor ne se charge pas

---

## 13. CARTE COMPLÈTE DU SITE

### 13.1 Architecture technique

```
WordPress Core
    ↓
Astra Theme 4.11.13
    ├── Core (hooks, enqueue, dynamic CSS)
    ├── Builder (Header/Footer)
    ├── Customizer (116 configs)
    ├── Compatibility
    │   ├── Elementor (Free + Pro)
    │   ├── Gutenberg ✅
    │   ├── WooCommerce
    │   └── 15+ autres
    └── Modules (Posts Structures, Related Posts)
        ↓
Elementor Plugin
    ├── Templates (JSON dans uploads)
    ├── CSS générées
    └── Widgets/Add-ons
```

### 13.2 Flux de chargement

1. **functions.php** : Chargement classes, compatibilité
2. **Hooks WordPress** : `after_setup_theme`, `wp_enqueue_scripts`
3. **Enqueue Scripts** : CSS/JS conditionnels
4. **Dynamic CSS** : Génération CSS inline
5. **Templates** : Header → Content → Footer
6. **Elementor** : Override templates si actif

### 13.3 Dépendances critiques

**Thème → Elementor** :
- Détection pages Elementor
- CSS compatibilité
- Override templates (Pro)

**Elementor → Thème** :
- Utilise hooks Astra
- Post meta pour layout
- Palette couleurs globale

---

## 14. LISTE DES RISQUES

### 14.1 Risques CRITIQUES

1. **Aucun thème enfant** : Modifications directes dans thème parent
2. **Dépendance Elementor forte** : Pages non migrables automatiquement
3. **CSS Elementor spécifique** : Perte de styles à la migration
4. **Templates Elementor Pro** : Headers/Footers à recréer

### 14.2 Risques ÉLEVÉS

1. **Hooks obsolètes** : Plugins utilisant anciens hooks peuvent casser
2. **Shortcodes dans Elementor** : Nécessitent conversion
3. **CSS dynamique complexe** : 6466+ lignes à vérifier
4. **Base de données** : Nécessite extraction pour analyse complète

### 14.3 Risques MOYENS

1. **JavaScript** : Pas de gestion d'erreur globale
2. **Namespaces PHP** : Conflits potentiels
3. **Compatibilité PHP** : Version minimale 5.3 (obsolète)
4. **Add-ons Elementor** : Non détectés dans thème (à vérifier plugins)

### 14.4 Risques FAIBLES

1. **Filtres personnalisés** : `autoriser_json_upload` (compatible)
2. **Schema markup** : Compatible Gutenberg
3. **Support Gutenberg** : Déjà présent dans thème

---

## 15. POINTS À CORRIGER AVANT MIGRATION

### 15.1 Actions IMMÉDIATES

1. **Créer thème enfant** :
   ```
   - Créer dossier themes/fnmns-child/
   - style.css avec Template: astra
   - functions.php pour modifications
   ```

2. **Extraire base de données** :
   ```
   - Décompresser backup_*_db.gz
   - Analyser pages Elementor
   - Lister shortcodes utilisés
   ```

3. **Extraire uploads** :
   ```
   - Décompresser backup_*_uploads*.zip
   - Analyser templates Elementor JSON
   - Lister CSS générées
   ```

### 15.2 Actions PRÉ-MIGRATION

1. **Audit complet** :
   - Liste toutes les pages Elementor
   - Identifier widgets/add-ons utilisés
   - Documenter structures complexes

2. **Tests de compatibilité** :
   - Activer `WP_DEBUG` pour détecter hooks obsolètes
   - Vérifier logs erreurs PHP/JS
   - Tester chaque type de page

3. **Backup complet** :
   - Base de données
   - Fichiers uploads
   - Thème et plugins

### 15.3 Actions PENDANT MIGRATION

1. **Migration progressive** :
   - Pages simples d'abord
   - Pages complexes ensuite
   - Templates globaux en dernier

2. **Conversion Elementor → Gutenberg** :
   - Créer blocs équivalents
   - Convertir CSS
   - Tester chaque page

3. **Vérification** :
   - Structure H1/H2/H3
   - Schema markup
   - Performance

---

## 16. PAGES À MIGRER EN PRIORITÉ

### 16.1 Liste complète des pages Elementor (33 pages)

**Pages identifiées** (IDs) :
- **5** : Page d'accueil (FNMNS Occitanie Méditerranée) - **PRIORITÉ CRITIQUE**
- **17** : Page inconnue
- **31** : Page inconnue
- **124** : Page inconnue
- **146** : Page inconnue
- **285** : Page inconnue
- **287** : Page inconnue
- **289** : Page inconnue (Formateur en Secourisme - révision)
- **291** : Page inconnue
- **987** : Page avec widget EAEL data-table
- **989** : Page inconnue
- **1093** : Page inconnue
- **1405** : Page inconnue
- **1536** : Page inconnue
- **1655** : Page inconnue
- **1698** : Page inconnue
- **1941** : Page inconnue
- **2013** : Page inconnue
- **2268** : Page inconnue
- **2528** : Page inconnue
- **4180** : Page inconnue
- **4245-4265** : Pages récentes (novembre 2025) - **PRIORITÉ ÉLEVÉE**

**⚠️ ACTION REQUISE** : Extraire les titres des pages depuis la table `wp_posts` pour identifier chaque page

### 16.2 Critères de priorité

1. **Pages publiques principales** : Accueil (ID 5), pages récentes (4245-4265)
2. **Pages simples** : Peu de widgets Elementor
3. **Pages avec trafic** : Analytics à vérifier
4. **Pages critiques** : Conversion, ventes

### 16.3 Ordre recommandé

**Phase 1 - Pages simples** :
- Pages de contenu texte uniquement
- Pages avec widgets basiques (texte, image, bouton)

**Phase 2 - Pages moyennes** :
- Pages avec formulaires
- Pages avec galeries
- Pages avec vidéos
- Pages avec shortcodes simples

**Phase 3 - Pages complexes** :
- Pages avec widgets EAEL/WPR (data-table, etc.)
- Pages avec intégrations tierces
- Templates Elementor Pro

**Phase 4 - Templates globaux** :
- Headers Elementor Pro
- Footers Elementor Pro
- Templates archive/single

---

## 17. SUGGESTIONS POUR RESTRUCTURATION GUTENBERG

### 17.1 Stratégie globale

1. **Utiliser blocs natifs Gutenberg** :
   - Paragraphe, Titre, Image, Colonnes
   - Group, Cover, Media & Text
   - Navigation, Query Loop

2. **Créer blocs personnalisés** :
   - Pour widgets Elementor spécifiques
   - Pour fonctionnalités métier
   - Pour composants réutilisables

3. **Utiliser patterns Gutenberg** :
   - Sections récurrentes
   - Headers/Footers
   - Layouts standards

### 17.2 Conversion Elementor → Gutenberg

**Widgets Elementor → Blocs Gutenberg** :

| Elementor | Gutenberg |
|-----------|-----------|
| Heading | Titre (H1-H6) |
| Text Editor | Paragraphe |
| Image | Image |
| Button | Bouton (custom ou HTML) |
| Columns | Colonnes |
| Section | Group |
| Spacer | Espaceur |
| Icon | Icône (custom) |
| Form | Formulaire (plugin) |
| Gallery | Galerie |
| Video | Vidéo |

**Layouts** :
- Sections Elementor → Group blocks
- Colonnes Elementor → Columns block
- Espacements → Spacer block ou margins/padding

### 17.3 CSS et styles

1. **Utiliser theme.json** :
   - Couleurs, typographie, espacements
   - Styles globaux
   - Support FSE (Full Site Editing) si possible

2. **CSS custom** :
   - Dans thème enfant
   - Via `wp_add_inline_style()`
   - Styles de blocs personnalisés

3. **Performance** :
   - Minimiser CSS inline
   - Utiliser CSS variables
   - Optimiser chargement

### 17.4 Templates et patterns

1. **Templates de blocs** :
   - Créer templates réutilisables
   - Utiliser Template Parts
   - Patterns pour sections communes

2. **Full Site Editing** :
   - Si WordPress 5.9+ et thème compatible
   - Templates HTML de blocs
   - Navigation de blocs

### 17.5 Migration des fonctionnalités

1. **Shortcodes** :
   - Convertir en blocs shortcode
   - Ou créer blocs équivalents
   - Garder compatibilité si nécessaire

2. **Intégrations** :
   - Formulaires → Blocs formulaires
   - Maps → Blocs maps
   - Calendriers → Blocs calendriers

3. **Performance** :
   - Lazy loading images
   - Optimisation CSS/JS
   - Cache

---

## 18. RECOMMANDATIONS FINALES

### 18.1 Avant migration

1. ✅ Créer thème enfant
2. ✅ Extraire et analyser base de données - **FAIT** (33 pages identifiées)
3. ⚠️ Extraire et analyser uploads - **EN ATTENTE** (archives uploads à décompresser)
4. ✅ Documenter toutes les pages Elementor - **FAIT** (33 pages listées)
5. ⚠️ Extraire titres des pages depuis wp_posts pour identification complète
6. ✅ Tester environnement de staging

### 18.2 Pendant migration

1. ✅ Migration progressive (page par page)
2. ✅ Tests à chaque étape
3. ✅ Backup réguliers
4. ✅ Documentation des changements

### 18.3 Après migration

1. ✅ Tests complets (fonctionnel, performance, SEO)
2. ✅ Vérification structure H1/H2/H3
3. ✅ Validation schema markup
4. ✅ Optimisation performance
5. ✅ Formation équipe

---

## 19. CONCLUSION

Le site FNMNS Occitanie utilise le thème **Astra 4.11.13** avec une **dépendance forte à Elementor**. La migration vers Gutenberg nécessitera :

1. **Analyse approfondie** des pages Elementor (nécessite extraction BDD/uploads)
2. **Conversion manuelle** des pages complexes
3. **Création de blocs personnalisés** pour fonctionnalités spécifiques
4. **Migration progressive** pour minimiser les risques

**Points positifs** :
- Thème supporte déjà Gutenberg
- Structure de hooks bien organisée
- CSS dynamique centralisé

**Points d'attention** :
- Aucun thème enfant (modifications directes)
- Dépendance Elementor forte
- Hooks obsolètes à vérifier

**Prochaines étapes** :
1. Extraire base de données et uploads
2. Créer thème enfant
3. Auditer toutes les pages Elementor
4. Établir plan de migration détaillé

---

**Document généré le** : 30 novembre 2025  
**Analyse effectuée par** : Agent ANALYSE WordPress  
**Mode** : Lecture seule (aucune modification effectuée)

