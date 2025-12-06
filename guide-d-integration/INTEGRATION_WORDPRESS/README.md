# Installation du thème enfant Astra pour FNMNS Occitanie

## 📋 Instructions d'installation

### Étape 1 : Créer le dossier du thème enfant

1. Connectez-vous à votre serveur via FTP/cPanel
2. Naviguez vers `/wp-content/themes/`
3. Créez un nouveau dossier : `astra-child`

### Étape 2 : Copier les fichiers

Copiez ces fichiers dans `/wp-content/themes/astra-child/` :

- ✅ `style.css` (ce fichier)
- ✅ `functions.php`
- ✅ `page-landing-fnmns.php` (à créer depuis le guide)
- ✅ Créer le dossier `assets/` avec :
  - `css/landing-page.css` (extraire depuis landing-page-amelioree.html)
  - `js/landing-page.js` (extraire depuis landing-page-amelioree.html)

### Étape 3 : Activer le thème enfant

1. Allez dans **Apparence → Thèmes** dans WordPress
2. Activez **Astra Child**

### Étape 4 : Créer la page landing

1. Créez une nouvelle page dans WordPress
2. Titre : "Accueil" ou "FNMNS Occitanie"
3. Dans **Attributs de page → Modèle**, sélectionnez **"Landing Page FNMNS Occitanie"**
4. Publiez la page

### Étape 5 : Configurer comme page d'accueil

1. Allez dans **Réglages → Lecture**
2. Sélectionnez **"Une page statique"**
3. Page d'accueil : Sélectionnez votre page landing
4. Enregistrez

## 📁 Structure des fichiers

```
wp-content/themes/astra-child/
├── style.css                    ← Fichier principal du thème enfant
├── functions.php                ← Fonctions WordPress personnalisées
├── page-landing-fnmns.php      ← Template de la landing page
└── assets/
    ├── css/
    │   └── landing-page.css     ← Styles de la landing page
    └── js/
        └── landing-page.js      ← Scripts de la landing page
```

## ⚙️ Configuration

### Options personnalisées

Allez dans **Réglages → FNMNS Options** pour configurer :
- Numéro de téléphone
- Email de contact
- Texte du footer

### Paramètres Hero

Lors de l'édition de la page landing, vous verrez une meta box **"Paramètres Hero"** pour :
- Titre du hero
- Sous-titre du hero
- Image du hero

## 🔧 Dépannage

### Le thème enfant n'apparaît pas

- Vérifiez que le dossier s'appelle exactement `astra-child`
- Vérifiez que `style.css` contient bien `Template: astra`
- Vérifiez que le thème parent Astra est installé et activé

### Les styles ne s'appliquent pas

- Videz le cache (navigateur + WordPress)
- Vérifiez que les fichiers CSS sont bien dans `/assets/css/`
- Vérifiez la console du navigateur pour les erreurs

### Le template ne s'affiche pas

- Vérifiez que le fichier s'appelle exactement `page-landing-fnmns.php`
- Vérifiez que vous avez sélectionné le bon template dans les attributs de page
- Vérifiez les permissions des fichiers (644 pour fichiers, 755 pour dossiers)

## 📚 Documentation

Consultez `GUIDE_INTEGRATION_WORDPRESS.md` pour le guide complet d'intégration.

