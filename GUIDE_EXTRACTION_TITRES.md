# Guide : Comment Extraire les Titres des Pages Elementor

## Problème

Le fichier SQL contient des lignes `INSERT INTO` très longues avec des données complexes. Le parsing automatique est difficile à cause :
- Des guillemets échappés dans le contenu
- Des virgules dans le contenu HTML
- Des chaînes très longues

## Solutions Recommandées

### ✅ Solution 1 : Restaurer la base MySQL (RECOMMANDÉ)

**Avantages** : Méthode la plus fiable et précise

1. **Installer MySQL/MariaDB localement**
2. **Créer une base de données** :
   ```sql
   CREATE DATABASE fnmns_backup;
   ```

3. **Restaurer le fichier SQL** :
   ```bash
   mysql -u root -p fnmns_backup < backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-db
   ```

4. **Exécuter la requête SQL** :
   ```sql
   SELECT p.ID, p.post_title, p.post_type, p.post_status, p.post_name, p.post_date
   FROM wp_posts p
   INNER JOIN wp_postmeta pm ON p.ID = pm.post_id
   WHERE pm.meta_key = '_elementor_edit_mode'
   AND pm.meta_value = 'builder'
   AND p.post_type = 'page'
   ORDER BY p.ID;
   ```

5. **Exporter en CSV** depuis phpMyAdmin ou Adminer

---

### ✅ Solution 2 : Utiliser Adminer (Interface Web)

**Avantages** : Interface graphique, pas besoin de ligne de commande

1. Télécharger Adminer : https://www.adminer.org/
2. Placer `adminer.php` dans un dossier web
3. Se connecter à MySQL
4. Importer le fichier SQL
5. Exécuter la requête ci-dessus
6. Exporter les résultats

---

### ⚠️ Solution 3 : Script Python avec sqlparse (AVANCÉ)

Si vous avez Python installé avec la bibliothèque `sqlparse` :

```python
import sqlparse
import re

# Lire le fichier SQL
with open('backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-db', 'r') as f:
    content = f.read()

# Parser les INSERT statements
parsed = sqlparse.parse(content)

elementor_ids = [5, 7, 17, 31, 124, 146, 285, 287, 289, 291, 987, 989, 
                 1093, 1405, 1536, 1655, 1698, 1941, 2013, 2268, 2528, 
                 4180, 4245, 4257, 4258, 4259, 4260, 4261, 4262, 4263, 
                 4264, 4265]

for stmt in parsed:
    if 'INSERT INTO' in str(stmt) and 'wp_posts' in str(stmt):
        # Extraire les valeurs...
        pass
```

**Installation** :
```bash
pip install sqlparse
```

---

### ⚠️ Solution 4 : Extraction manuelle avec grep (LIMITÉ)

**Méthode rapide mais incomplète** :

```bash
# Pour chaque ID, chercher la ligne et extraire le titre manuellement
for id in 5 7 17 31 124 146 285 287 289 291 987 989 1093 1405 1536 1655 1698 1941 2013 2268 2528 4180 4245 4257 4258 4259 4260 4261 4262 4263 4264 4265; do
    echo "=== Page ID: $id ==="
    grep "^INSERT INTO \`wp_posts\` VALUES ($id," backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-db | head -1
    echo ""
done > pages_raw.txt
```

Puis extraire manuellement les titres depuis `pages_raw.txt`.

---

## Pages Déjà Identifiées

| ID | Titre | Confirmation |
|----|-------|--------------|
| 5 | FNMNS Occitanie Méditerranée | ✅ Confirmé (page d'accueil) |
| 289 | Formateur en Secourisme | ✅ Confirmé (révision 4264 trouvée) |

---

## Recommandation Finale

**Utiliser la Solution 1 (MySQL)** : C'est la méthode la plus fiable et la plus rapide. Une fois la base restaurée, la requête SQL vous donnera tous les titres en quelques secondes.

---

**Document créé le** : 30 novembre 2025

