# Liste des Pages Elementor avec Titres

**Date** : 30 novembre 2025  
**Source** : Analyse base de données SQL

---

## Pages identifiées

| ID | Titre | Type | Statut | Notes |
|----|-------|------|--------|-------|
| **5** | **FNMNS Occitanie Méditerranée** | page | publish | **Page d'accueil** |
| 4264 | Formateur en Secourisme | revision | inherit | Révision de la page 289 |

---

## Pages à identifier (30 pages)

Les pages suivantes ont été détectées avec `_elementor_edit_mode = 'builder'` mais les titres doivent être extraits :

- 7, 17, 31, 124, 146, 285, 287, 289, 291, 987, 989, 1093, 1405, 1536, 1655, 1698, 1941, 2013, 2268, 2528, 4180, 4245, 4257, 4258, 4259, 4260, 4261, 4262, 4263, 4265

---

## Comment extraire les titres manuellement

### Méthode 1 : Via MySQL (si base restaurée)

```sql
SELECT p.ID, p.post_title, p.post_type, p.post_status, p.post_name
FROM wp_posts p
INNER JOIN wp_postmeta pm ON p.ID = pm.post_id
WHERE pm.meta_key = '_elementor_edit_mode'
AND pm.meta_value = 'builder'
AND p.post_type = 'page'
ORDER BY p.ID;
```

### Méthode 2 : Via fichier SQL avec grep

Pour chaque ID, chercher la ligne INSERT correspondante :

```bash
grep "^INSERT INTO \`wp_posts\` VALUES (ID," backup_2025-11-30-1213_FNMNS_OCCITANIE_Matre_Nageur_1f383497518a-db
```

Le titre se trouve généralement après le contenu (6ème champ entre guillemets simples).

### Méthode 3 : Utiliser phpMyAdmin ou Adminer

1. Restaurer la base de données dans un environnement local
2. Exécuter la requête SQL ci-dessus
3. Exporter les résultats en CSV

---

## Notes importantes

- **Page 5** : Page d'accueil confirmée (page_on_front = 5)
- **Pages 4245-4265** : Pages récentes créées en novembre 2025 (priorité migration)
- **Page 289** : Page "Formateur en Secourisme" (révision 4264 trouvée)
- Certaines pages peuvent être des révisions (post_type = 'revision') et doivent être filtrées

---

## Prochaines étapes

1. ✅ Identifier page d'accueil (ID 5) - **FAIT**
2. ⚠️ Extraire titres des 30 autres pages
3. ⚠️ Filtrer les révisions (garder uniquement post_type = 'page')
4. ⚠️ Documenter chaque page avec son URL (post_name)

---

**Document généré le** : 30 novembre 2025

