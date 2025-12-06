#!/usr/bin/env python3
"""
Script pour extraire le CSS et JavaScript de landing-page-amelioree.html
et créer les fichiers séparés pour WordPress
"""

import re
import os
from pathlib import Path

def extract_css_and_js(html_file_path, output_dir):
    """
    Extrait le CSS et JavaScript du fichier HTML
    """
    # Lire le fichier HTML
    with open(html_file_path, 'r', encoding='utf-8') as f:
        html_content = f.read()
    
    # Créer le dossier de sortie
    output_path = Path(output_dir)
    output_path.mkdir(parents=True, exist_ok=True)
    
    # Extraire le CSS (contenu entre <style> et </style>)
    css_pattern = r'<style>(.*?)</style>'
    css_matches = re.findall(css_pattern, html_content, re.DOTALL)
    
    if css_matches:
        css_content = css_matches[0].strip()
        css_file = output_path / 'landing-page.css'
        with open(css_file, 'w', encoding='utf-8') as f:
            f.write(css_content)
        print(f"✅ CSS extrait : {css_file}")
    else:
        print("⚠️  Aucun CSS trouvé")
    
    # Extraire le JavaScript (contenu entre <script> et </script>, mais pas les JSON-LD)
    js_pattern = r'<script(?![^>]*type=["\']application/ld\+json["\'])([^>]*)>(.*?)</script>'
    js_matches = re.findall(js_pattern, html_content, re.DOTALL)
    
    if js_matches:
        js_content = '\n\n'.join([match[1].strip() for match in js_matches if match[1].strip()])
        js_file = output_path / 'landing-page.js'
        with open(js_file, 'w', encoding='utf-8') as f:
            f.write(js_content)
        print(f"✅ JavaScript extrait : {js_file}")
    else:
        print("⚠️  Aucun JavaScript trouvé")
    
    # Extraire le JSON-LD séparément
    jsonld_pattern = r'<script type=["\']application/ld\+json["\']>(.*?)</script>'
    jsonld_matches = re.findall(jsonld_pattern, html_content, re.DOTALL)
    
    if jsonld_matches:
        jsonld_content = jsonld_matches[0].strip()
        jsonld_file = output_path / 'schema.json'
        with open(jsonld_file, 'w', encoding='utf-8') as f:
            f.write(jsonld_content)
        print(f"✅ Schema.org JSON-LD extrait : {jsonld_file}")
    
    print(f"\n📁 Fichiers créés dans : {output_path.absolute()}")
    print("\n📋 Prochaines étapes :")
    print("   1. Copier landing-page.css dans /wp-content/themes/astra-child/assets/css/")
    print("   2. Copier landing-page.js dans /wp-content/themes/astra-child/assets/js/")
    print("   3. Utiliser schema.json pour créer une fonction WordPress")

if __name__ == '__main__':
    # Chemins
    script_dir = Path(__file__).parent
    html_file = script_dir / 'landing-page-amelioree.html'
    output_dir = script_dir / 'INTEGRATION_WORDPRESS' / 'assets'
    
    if not html_file.exists():
        print(f"❌ Fichier non trouvé : {html_file}")
        exit(1)
    
    print(f"📄 Lecture de : {html_file}")
    extract_css_and_js(html_file, output_dir)
    print("\n✅ Extraction terminée !")

