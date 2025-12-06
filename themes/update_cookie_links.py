#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Script pour mettre à jour les liens "En savoir plus" dans les bandeaux de cookies
pour pointer vers la nouvelle page politique-de-cookies.html
"""

import os
import re
from pathlib import Path

# Nouvelle URL de la politique de cookies
NEW_COOKIE_POLICY_URL = "https://fnmns-occitanie.com/politique-de-cookies/"

# Anciennes URLs possibles à remplacer
OLD_URLS = [
    "https://fnmns-occitanie.com/politique-de-confidentialite/",
    "politique-de-confidentialite.html",
    "politique-de-cookies.html"
]


def update_cookie_links(file_path):
    """Met à jour les liens dans le bandeau de cookies"""
    
    print(f"Traitement de {file_path.name}...")
    
    # Lire le fichier
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Vérifier si le bandeau de cookies existe
    if 'cookieConsent' not in content:
        print(f"  ⚠️  Pas de bandeau de cookies trouvé. Ignoré.")
        return False
    
    modified = False
    
    # Pattern pour trouver le lien "En savoir plus"
    patterns = [
        r'(<a href=["\'])([^"\']*politique[^"\']*)(["\'][^>]*>En savoir plus</a>)',
        r'(<a href=["\'])([^"\']*)(["\'][^>]*target=["\']_blank["\'][^>]*rel=["\']noopener["\'][^>]*>En savoir plus</a>)',
    ]
    
    for pattern in patterns:
        matches = list(re.finditer(pattern, content, re.IGNORECASE))
        for match in matches:
            old_link = match.group(0)
            # Vérifier si c'est un lien de politique
            if 'politique' in old_link.lower() or match.group(2) in OLD_URLS or not match.group(2).startswith('http'):
                new_link = match.group(1) + NEW_COOKIE_POLICY_URL + match.group(3)
                content = content.replace(old_link, new_link, 1)
                modified = True
                print(f"  ✅ Lien mis à jour: {match.group(2)} → {NEW_COOKIE_POLICY_URL}")
    
    # Si pas de modification avec les patterns, chercher directement
    if not modified:
        # Chercher le texte "En savoir plus" dans le contexte du cookie consent
        if 'En savoir plus' in content:
            # Pattern plus simple pour trouver le lien
            simple_pattern = r'(<a href=["\'])([^"\']*)(["\'][^>]*target=["\']_blank["\'][^>]*rel=["\']noopener["\'][^>]*>En savoir plus</a>)'
            matches = list(re.finditer(simple_pattern, content))
            for match in matches:
                if 'cookieConsent' in content[max(0, match.start()-500):match.start()]:
                    old_url = match.group(2)
                    if old_url != NEW_COOKIE_POLICY_URL:
                        new_link = match.group(1) + NEW_COOKIE_POLICY_URL + match.group(3)
                        content = content.replace(match.group(0), new_link, 1)
                        modified = True
                        print(f"  ✅ Lien mis à jour vers: {NEW_COOKIE_POLICY_URL}")
                        break
    
    # Écrire le fichier modifié
    if modified:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        return True
    else:
        print(f"  ⚠️  Aucun lien à mettre à jour trouvé.")
        return False


def main():
    """Fonction principale"""
    script_dir = Path(__file__).parent
    local_dir = script_dir / 'LOCAL'
    
    if not local_dir.exists():
        print(f"❌ Le dossier LOCAL n'existe pas : {local_dir}")
        return
    
    # Lister tous les fichiers HTML
    html_files = list(local_dir.glob('*.html'))
    
    # Exclure la page de politique elle-même
    html_files = [f for f in html_files if f.name != 'politique-de-cookies.html']
    
    if not html_files:
        print(f"❌ Aucun fichier HTML trouvé dans {local_dir}")
        return
    
    print(f"📁 {len(html_files)} fichier(s) HTML à traiter\n")
    
    # Traiter chaque fichier
    updated_count = 0
    for html_file in html_files:
        if update_cookie_links(html_file):
            updated_count += 1
        print()
    
    print(f"✅ Mise à jour terminée ! {updated_count} fichier(s) modifié(s).")


if __name__ == '__main__':
    main()
