<!-- 2697adff-ed65-4f13-8042-15b04a2767ae 8c9ff71d-1561-4323-85ab-2131cc82862f -->
# Création de la page BNSSA HTML

## Analyse du contenu source

Le contenu de la page https://fnmns-occitanie.com/bnssa/ a été analysé et contient :

- Description du BNSSA (Brevet National de Sécurité et de Sauvetage Aquatique)
- Objectifs de formation (sauvetage aquatique, surveillance réglementaire)
- Prérequis (17 ans révolus, certificat médical)
- Contenu de formation (théorie, pratique, épreuves physiques, PSE1 intégré)
- Épreuves d'examen (QCM théorique, parcours 100m, nage 250m avec équipements, intervention simulée)
- Débouchés professionnels (surveillant de baignade, sauveteur en milieu naturel)
- Coût : 600€
- Solutions de financement
- Pourquoi choisir FNMNS Occitanie

## Structure à créer

### 1. Head section (SEO optimisé)

- Meta tags avec keywords : "BNSSA, formation BNSSA, BNSSA Occitanie, Brevet National Sécurité Sauvetage Aquatique, formation sauveteur aquatique"
- Canonical URL : https://fnmns-occitanie.com/bnssa/
- Open Graph et Twitter Card
- Schema.org JSON-LD de type "Course" avec :
- name: "BNSSA"
- educationalCredentialAwarded: "BNSSA"
- timeRequired et duration adaptés au BNSSA
- teaches: ["Sauvetage aquatique", "Surveillance aquatique", "Secourisme", "Techniques de sauvetage"]

### 2. Header

- Réutiliser la structure identique de caep-mns.html et bpjeps-aan.html
- Navigation avec menu déroulant "Formations" incluant le lien BNSSA

### 3. Hero Section

- Titre : "BNSSA - Brevet National de Sécurité et de Sauvetage Aquatique"
- Sous-titre : Description du BNSSA
- Bouton CTA "Se préinscrire" (lien vers formulaire Google Forms si disponible)
- Image de fond ou vidéo (comme dans caep-mns.html)

### 4. Sections de contenu (dans l'ordre)

- **Présentation** : Qu'est-ce que le BNSSA ? (info-card)
- **Prochaines Sessions** : Tableau des sessions (structure identique, données à adapter)
- **Conditions d'accès** : Prérequis (17 ans, certificat médical) + section accessibilité/handicap
- **Programme** : Contenu de formation (théorie, pratique, épreuves physiques, PSE1 intégré) + bouton téléchargement PDF si disponible
- **Évaluation** : Détails des épreuves (QCM théorique, parcours 100m, nage 250m, intervention simulée)
- **Débouchés professionnels** : Surveillant de baignade, sauveteur en milieu naturel
- **Financement** : Coût 600€ + solutions de financement (aides régionales, auto-financement, etc.)
- **Documents et Références** : Textes réglementaires
- **CTA 1** : Section avec fond dégradé bleu "Inscrivez-vous à la Formation BNSSA"
- **Satisfaction et Résultats** : Statistiques (réutiliser structure des autres pages)
- **CTA 2** : Section avec fond dégradé rouge "Devenez sauveteur aquatique avec le BNSSA"

### 5. Footer

- Structure identique aux autres pages
- Lien BNSSA dans la section "Formations"

### 6. Sticky CTA

- Bouton flottant "Devis gratuit" (identique aux autres pages)

### 7. Scripts JavaScript

- Réutiliser les scripts de gestion du menu burger, smooth scroll, lazy loading, animations

## Fichiers de référence

- Structure HTML/CSS : `themes/LOCAL/caep-mns.html` et `themes/LOCAL/bpjeps-aan.html`
- Variables CSS identiques (--brand, --accent, etc.)
- Classes CSS réutilisées (.info-card, .section__title, .btn, etc.)

## Points d'attention

- Utiliser le même formulaire de préinscription que les autres pages ou créer un lien approprié
- Adapter les dates de sessions si disponibles
- Vérifier les liens PDF de programme si disponibles
- Maintenir la cohérence des couleurs et du design
- Optimiser les balises H1-H3 pour le SEO avec keywords BNSSA
- Inclure "formation BNSSA" et "BNSSA" dans les textes de manière naturelle

## Fichier à créer

- `themes/LOCAL/bnssa.html`

### To-dos

- [ ] Créer le fichier bnssa.html avec la structure complète (head, header, hero, sections, footer) en s'inspirant de caep-mns.html et bpjeps-aan.html
- [ ] Ajouter les meta tags SEO optimisés avec keywords BNSSA et formation BNSSA, Open Graph, Twitter Card
- [ ] Créer le Schema.org JSON-LD de type Course pour le BNSSA avec toutes les propriétés nécessaires (provider, educationalCredentialAwarded, teaches, etc.)
- [ ] Créer la section Hero avec titre, sous-titre et bouton CTA 'Se préinscrire'
- [ ] Créer toutes les sections de contenu : Présentation, Sessions, Conditions, Programme, Évaluation, Débouchés, Financement, Documents
- [ ] Créer les sections CTA avec fonds dégradés (bleu et rouge) pour l'inscription
- [ ] Ajouter le footer et le sticky CTA identiques aux autres pages
- [ ] Ajouter les scripts JavaScript pour menu burger, smooth scroll, lazy loading et animations