# Analyse Base de Données - Pages Elementor FNMNS

**Date** : 30 novembre 2025  
**Fichier analysé** : `backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-db`

---

## RÉSUMÉ EXÉCUTIF

- **33 pages construites avec Elementor** identifiées
- **Versions Elementor multiples** : 3.25.10 à 3.33.2 (incohérence)
- **Elementor Pro actif** : Versions 3.25.4 à 3.33.1
- **2 add-ons majeurs** : Royal Addons (1.7.1041) + Essential Addons (6.5.3)
- **90 occurrences de shortcodes** dans la base
- **Widgets complexes** : EAEL data-table, slides, animations

---

## 1. PAGES ELEMENTOR IDENTIFIÉES

### 1.1 Liste complète (33 pages)

**IDs des pages** :
```
5, 7, 17, 31, 124, 146, 285, 287, 289, 291, 987, 989, 1093, 1405, 1536, 
1655, 1698, 1941, 2013, 2268, 2528, 4180, 4245, 4257, 4258, 4259, 4260, 
4261, 4262, 4263, 4264, 4265
```

**Page d'accueil** : ID **5** (page_on_front = 5) - **Titre : "FNMNS Occitanie Méditerranée"**

**Pages récentes** (novembre 2025) : IDs **4245-4265** (11 pages)

**⚠️ NOTE** : Les titres des autres pages doivent être extraits depuis la base de données.  
Voir `GUIDE_EXTRACTION_TITRES.md` pour les méthodes d'extraction.

### 1.2 Versions Elementor par page

| Page ID | Elementor | Elementor Pro | Statut |
|---------|-----------|---------------|--------|
| 5 | 3.32.4 | 3.32.2 | Accueil |
| 17 | 3.32.4 | 3.32.2 | - |
| 285 | 3.26.4 | 3.26.3 | - |
| 287 | 3.32.5 | 3.32.3 | - |
| 289 | 3.33.2 | 3.33.1 | Formateur Secourisme (révision) |
| 291 | 3.32.5 | 3.32.3 | - |
| 987 | 3.33.1 | 3.33.1 | Avec EAEL data-table |
| 989 | - | 3.32.2 | - |
| 1536 | 3.33.1 | 3.33.1 | - |
| 2013 | 3.25.10 | 3.25.4 | Ancienne version |
| 2268 | 3.25.10 | 3.25.4 | Ancienne version |
| 2528 | 3.28.1 | 3.28.1 | - |
| 4245-4265 | 3.33.1 | 3.33.1 | Pages récentes |

**⚠️ PROBLÈME** : Versions multiples créent des incohérences et risques de compatibilité

---

## 2. ADD-ONS ELEMENTOR DÉTECTÉS

### 2.1 Royal Elementor Addons (WPR)

**Informations** :
- **Version** : 1.7.1041
- **Freemius SDK** : 2.12.0
- **Status** : Actif, version gratuite
- **Post types créés** :
  - `wpr_templates` : Templates WPR
  - `wpr_mega_menu` : Menus mega WPR

**Templates WPR** : Détectés dans la base (post_type: wpr_templates)

### 2.2 Essential Addons for Elementor Lite (EAEL)

**Informations** :
- **Version** : 6.5.3
- **Status** : Actif, version lite
- **Widgets activés** (extrait de 58 widgets) :
  - ✅ `data-table` : **UTILISÉ** (page 987)
  - ✅ `fancy-text`, `creative-btn`, `count-down`
  - ✅ `team-members`, `testimonials`, `info-box`
  - ✅ `flip-box`, `call-to-action`, `dual-header`
  - ✅ `price-table`, `filter-gallery`, `image-accordion`
  - ✅ `content-ticker`, `tooltip`, `adv-accordion`
  - ✅ `adv-tabs`, `progress-bar`, `feature-list`
  - Et 40+ autres widgets

**Widgets EAEL utilisés** :
- `data-table` : Tables de données HTML (page 987, 289)
- `_eael_widget_elements` : Métadonnées EAEL détectées

---

## 3. SHORTCODES IDENTIFIÉS

### 3.1 Shortcodes dans pages Elementor

**Total** : 90 occurrences de "shortcode" dans la base

**Shortcodes détectés** :

1. **Trustindex (WP Reviews)** :
   - Pattern : `[trustindex no-registration=google]`
   - Usage : Affichage avis Google
   - Page : ID 5 (accueil)
   - Widget : Elementor shortcode widget

2. **Ninja Forms** :
   - Patterns : `[ninja_forms_all_fields]`, `[ninja_forms_calc]`
   - Usage : Formulaires et calculs
   - Plugin : Ninja Forms

### 3.2 Plugins avec shortcodes

**Plugins actifs identifiés** :
- **Ninja Forms** : Formulaires
- **WP Reviews Plugin for Google** : Avis (Trustindex)
- **Contact Form 7** : Compatibilité dans thème
- **WooCommerce** : Si utilisé

---

## 4. WIDGETS ELEMENTOR UTILISÉS

### 4.1 Widgets natifs Elementor détectés

D'après les données JSON `_elementor_data` :

**Widgets de base** :
- `heading` : Titres (H1-H6)
- `text-editor` : Éditeur de texte
- `image` : Images
- `button` : Boutons
- `spacer` : Espaceurs
- `divider` : Séparateurs
- `social-icons` : Icônes sociales
- `post-info` : Informations de post
- `shortcode` : Shortcodes

**Widgets Pro** :
- `slides` : Carrousels/Sliders (page 5)
- Containers avec animations parallax
- Motion effects (translate, scale, skew)

### 4.2 Widgets add-ons détectés

**Essential Addons (EAEL)** :
- `data-table` : Tables de données (pages 987, 289)

**Royal Addons (WPR)** :
- Templates WPR détectés
- Widgets spécifiques à vérifier dans JSON

---

## 5. STRUCTURE DES PAGES ELEMENTOR

### 5.1 Page d'accueil (ID 5)

**Structure détectée** :
- **Container Hero** : Image de fond, titre H1, sous-titre H2
- **Section "À propos"** : 2 colonnes (texte + liste)
- **Section "Pourquoi Nous"** : Liste à puces
- **Section "Qualiopi"** : Texte formaté
- **Section "Nos Formations"** : Carrousel Slides (13 formations)
- **Section "Avis"** : Shortcode Trustindex
- **Section "Équipe"** : Image de fond

**Widgets utilisés** :
- heading (H1, H2)
- text-editor
- slides (carrousel)
- shortcode (avis)
- social-icons
- button
- divider
- image

**Versions** : Elementor 3.32.4, Pro 3.32.2

### 5.2 Page Formateur Secourisme (ID 289 - révision 4264)

**Structure détectée** :
- Hero avec image
- Sections avec H1, H2, H3
- Tables de données (EAEL data-table) : Dates et lieux de formation
- Boutons de préinscription (Google Forms)
- Contenu structuré avec listes

**Widgets utilisés** :
- heading (H1, H2, H3)
- text-editor
- button (liens externes)
- EAEL data-table (4 tables)

**Versions** : Elementor 3.33.2, Pro 3.33.1

---

## 6. MÉTADONNÉES ELEMENTOR

### 6.1 Métadonnées principales

**Par page** :
- `_elementor_edit_mode` : 'builder'
- `_elementor_version` : Version Elementor
- `_elementor_pro_version` : Version Elementor Pro
- `_elementor_data` : JSON complet de la page
- `_elementor_page_settings` : Paramètres de page
- `_elementor_page_assets` : CSS/JS chargés

### 6.2 Assets chargés (exemple page 2528)

**Styles** :
- widget-image
- widget-heading
- e-animation-fadeInLeft
- font-awesome-5-all
- font-awesome-4-shim
- widget-divider
- e-animation-fadeInDown
- widget-post-info
- widget-icon-list
- elementor-icons-fa-regular
- elementor-icons-fa-solid

**Scripts** :
- elementor-frontend

### 6.3 Métadonnées EAEL

**Page 987** :
- `_eael_widget_elements` : `data-table` activé
- `_eael_custom_js` : Vide

---

## 7. PROBLÈMES IDENTIFIÉS

### 7.1 Versions multiples

**RISQUE ÉLEVÉ** :
- Pages créées avec différentes versions Elementor (3.25.10 à 3.33.2)
- Risque d'incompatibilité entre versions
- Migration complexifiée

**Recommandation** : Uniformiser toutes les pages à la dernière version avant migration

### 7.2 Dépendances add-ons

**RISQUE CRITIQUE** :
- Widgets EAEL (data-table) utilisés
- Templates WPR utilisés
- Conversion nécessaire en blocs Gutenberg équivalents

### 7.3 Shortcodes

**RISQUE MOYEN** :
- Shortcodes compatibles Gutenberg ✅
- Widgets shortcode Elementor nécessitent conversion

---

## 8. RECOMMANDATIONS SPÉCIFIQUES

### 8.1 Avant migration

1. **Uniformiser versions** : Mettre toutes les pages à Elementor 3.33.2 / Pro 3.33.1
2. **Documenter chaque page** : Extraire titres depuis wp_posts
3. **Identifier widgets utilisés** : Analyser JSON de chaque page
4. **Lister dépendances** : EAEL, WPR, shortcodes par page

### 8.2 Pendant migration

1. **Page d'accueil (ID 5)** : Priorité absolue
2. **Pages récentes (4245-4265)** : Priorité élevée
3. **Pages avec EAEL** : Conversion widgets data-table
4. **Pages avec shortcodes** : Conversion en blocs shortcode

### 8.3 Conversion widgets → blocs

**Mapping recommandé** :

| Elementor Widget | Gutenberg Block |
|-----------------|-----------------|
| heading | Titre (H1-H6) |
| text-editor | Paragraphe |
| image | Image |
| button | Bouton (custom) |
| slides | Carrousel (custom) |
| shortcode | Shortcode |
| divider | Séparateur |
| social-icons | Icônes sociales (custom) |
| EAEL data-table | Table (custom) |
| spacer | Espaceur |

---

## 9. STATISTIQUES

- **Total pages Elementor** : 33
- **Versions différentes** : 7 versions Elementor, 9 versions Pro
- **Add-ons utilisés** : 2 (Royal + Essential)
- **Shortcodes** : 90 occurrences
- **Widgets EAEL utilisés** : 1 confirmé (data-table)
- **Pages avec Pro** : Toutes (33/33)

---

**Document généré le** : 30 novembre 2025  
**Source** : Analyse base de données SQL

