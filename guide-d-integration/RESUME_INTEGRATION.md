# 📋 Résumé : Intégration WordPress - Landing Page FNMNS Occitanie

## ✅ Fichiers créés

1. **`GUIDE_INTEGRATION_WORDPRESS.md`** - Guide complet d'intégration
2. **`INTEGRATION_WORDPRESS/functions.php`** - Fonctions WordPress prêtes à l'emploi
3. **`INTEGRATION_WORDPRESS/style.css`** - Fichier de base du thème enfant
4. **`INTEGRATION_WORDPRESS/README.md`** - Instructions d'installation
5. **`extract_assets.py`** - Script pour extraire CSS/JS automatiquement

---

## 🚀 Étapes rapides (5 minutes)

### 1. Extraire les assets

```bash
cd /Users/ju/Desktop/FNMNS/Website/BACKUP\ -\ FNMNS\ -\ 30:11:25/Pages
python3 extract_assets.py
```

Cela créera :
- `INTEGRATION_WORDPRESS/assets/css/landing-page.css`
- `INTEGRATION_WORDPRESS/assets/js/landing-page.js`
- `INTEGRATION_WORDPRESS/assets/schema.json`

### 2. Créer le thème enfant sur WordPress

1. **Via FTP/cPanel**, créez `/wp-content/themes/astra-child/`
2. **Copiez** tous les fichiers de `INTEGRATION_WORDPRESS/` dans ce dossier
3. **Créez** le dossier `assets/` avec les sous-dossiers `css/` et `js/`
4. **Copiez** les fichiers extraits dans les bons dossiers

### 3. Activer le thème enfant

1. WordPress Admin → **Apparence → Thèmes**
2. Activez **"Astra Child"**

### 4. Créer la page landing

1. **Pages → Ajouter**
2. Titre : "Accueil"
3. **Attributs de page → Modèle** : "Landing Page FNMNS Occitanie"
4. **Publier**

### 5. Configurer comme page d'accueil

1. **Réglages → Lecture**
2. **Page d'accueil statique** : Sélectionnez votre page
3. **Enregistrer**

---

## 📁 Structure finale sur WordPress

```
wp-content/themes/astra-child/
├── style.css                    ✅ Déjà créé
├── functions.php                ✅ Déjà créé
├── page-landing-fnmns.php      ⚠️ À créer (voir guide)
└── assets/
    ├── css/
    │   └── landing-page.css    ✅ À extraire avec le script
    └── js/
        └── landing-page.js     ✅ À extraire avec le script
```

---

## ⚠️ À faire manuellement

### 1. Créer le template PHP

Le fichier `page-landing-fnmns.php` doit être créé en adaptant le HTML de `landing-page-amelioree.html`.

**Voir** : Section "Étape 2 : Créer le template de page" dans `GUIDE_INTEGRATION_WORDPRESS.md`

### 2. Adapter les sections HTML

Convertir chaque section HTML en PHP avec :
- `get_post_meta()` pour les champs personnalisés
- `wp_nav_menu()` pour les menus
- `esc_url()`, `esc_html()` pour la sécurité

### 3. Configurer les menus

1. **Apparence → Menus**
2. Créer menu "Principal" et "Footer"
3. Assigner aux emplacements

### 4. Remplacer le formulaire

Le formulaire actuel utilise `alert()`. Options :
- **Contact Form 7** (gratuit)
- **WPForms** (premium)
- **API personnalisée**

---

## 🎯 Checklist complète

### Préparation
- [x] Guide d'intégration créé
- [x] Fichiers du thème enfant créés
- [x] Script d'extraction créé
- [ ] CSS/JS extraits (lancer `extract_assets.py`)
- [ ] Template PHP créé (`page-landing-fnmns.php`)

### Installation WordPress
- [ ] Thème enfant créé sur le serveur
- [ ] Fichiers copiés dans `/wp-content/themes/astra-child/`
- [ ] Thème enfant activé
- [ ] Page landing créée
- [ ] Page configurée comme accueil

### Configuration
- [ ] Menus WordPress créés et assignés
- [ ] Options FNMNS configurées (Réglages → FNMNS Options)
- [ ] Paramètres Hero remplis dans la page
- [ ] Formulaire de contact configuré
- [ ] Numéro de téléphone remplacé

### Tests
- [ ] Page s'affiche correctement
- [ ] Responsive mobile testé
- [ ] Tous les liens fonctionnent
- [ ] Formulaire fonctionne
- [ ] Performance vérifiée (PageSpeed)
- [ ] SEO vérifié (Yoast/Rank Math)

---

## 📞 Support

**Documentation complète** : `GUIDE_INTEGRATION_WORDPRESS.md`

**Problèmes courants** :
- Thème enfant non visible → Vérifier le nom du dossier et `Template: astra` dans style.css
- Styles non appliqués → Vider le cache, vérifier les chemins
- Template non disponible → Vérifier le nom exact du fichier PHP

---

## 🎉 Une fois terminé

Votre landing page sera :
- ✅ Intégrée dans WordPress
- ✅ Éditable depuis l'admin
- ✅ Optimisée pour le SEO
- ✅ Responsive
- ✅ Performante

**Temps estimé** : 2-4 heures selon votre niveau WordPress

**Bon courage ! 🚀**

