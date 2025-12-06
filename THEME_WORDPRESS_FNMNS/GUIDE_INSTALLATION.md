# 🚀 Guide d'Installation - Thème WordPress FNMNS Occitanie

## 📦 Installation rapide (5 minutes)

### Étape 1 : Préparer le thème

1. Le dossier `THEME_WORDPRESS_FNMNS` contient tous les fichiers nécessaires
2. **Compressez le dossier en fichier ZIP** (nommez-le `fnmns-occitanie-theme.zip`)

### Étape 2 : Installer dans WordPress

1. Connectez-vous à votre administration WordPress
2. Allez dans **Apparence** → **Thèmes**
3. Cliquez sur **Ajouter** puis **Téléverser un thème**
4. Sélectionnez le fichier ZIP du thème
5. Cliquez sur **Installer maintenant**
6. Une fois installé, cliquez sur **Activer le thème**

### Étape 3 : Créer la page landing

1. Allez dans **Pages** → **Ajouter**
2. Donnez un titre : "Accueil" ou "FNMNS Occitanie"
3. Dans la colonne de droite, section **Attributs de page**, sélectionnez le template **"Landing Page FNMNS"**
4. Cliquez sur **Publier**

### Étape 4 : Configurer comme page d'accueil

1. Allez dans **Réglages** → **Lecture**
2. Dans **Votre page d'accueil affiche**, sélectionnez **Une page statique**
3. Dans **Page d'accueil**, sélectionnez la page que vous venez de créer
4. Cliquez sur **Enregistrer les modifications**

## ✅ C'est terminé !

Votre landing page est maintenant en ligne et accessible sur votre site WordPress.

---

## 📁 Structure du thème

```
THEME_WORDPRESS_FNMNS/
├── style.css              # Fichier principal du thème (avec en-têtes WordPress)
├── functions.php          # Fonctions et configurations du thème
├── index.php              # Template par défaut
├── header.php             # En-tête du site
├── footer.php             # Pied de page du site
├── page-landing.php       # Template personnalisé pour la landing page
├── README.txt             # Documentation du thème
├── INSTALLATION.md        # Guide d'installation
└── assets/
    ├── css/
    │   └── style.css      # Styles CSS de la landing page
    └── js/
        └── main.js        # JavaScript de la landing page
```

## 🎨 Personnalisation

### Modifier les couleurs

Les couleurs sont définies dans `/assets/css/style.css` via les variables CSS :

```css
:root {
  --brand: #1E3A8A;        /* Bleu principal */
  --accent: #E11D48;       /* Rouge accent */
  --bg: #ffffff;           /* Fond */
  --ink: #000000;          /* Texte */
}
```

### Modifier le contenu

Le contenu de la landing page se trouve dans `/page-landing.php`. Vous pouvez modifier directement le HTML dans ce fichier.

### Modifier les styles

Les styles se trouvent dans `/assets/css/style.css`. Vous pouvez modifier les styles directement dans ce fichier.

## 🔧 Dépannage

### Le thème ne s'affiche pas correctement

1. Vérifiez que tous les fichiers sont bien présents dans le dossier du thème
2. Vérifiez que les permissions des fichiers sont correctes (644 pour les fichiers, 755 pour les dossiers)
3. Videz le cache de votre navigateur et de WordPress

### Les styles ne s'appliquent pas

1. Vérifiez que le fichier `/assets/css/style.css` existe bien
2. Vérifiez que le fichier `functions.php` charge bien le CSS
3. Videz le cache de votre navigateur et de WordPress

### Le JavaScript ne fonctionne pas

1. Vérifiez que le fichier `/assets/js/main.js` existe bien
2. Vérifiez que le fichier `functions.php` charge bien le JavaScript
3. Ouvrez la console du navigateur (F12) pour voir les erreurs éventuelles

## 📞 Support

Pour toute question ou problème, contactez le support technique.

---

**Version du thème :** 1.0.0  
**Date de création :** 2025  
**Auteur :** FNMNS Occitanie

