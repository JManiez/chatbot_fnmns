# Proxy Serveur Sécurisé OpenAI - FNMNS Chatbot

Ce serveur Node.js/Express sert de proxy sécurisé entre le chatbot frontend et l'API OpenAI, en gardant la clé API côté serveur pour la sécurité.

## 🚀 Installation

### 1. Installer les dépendances

```bash
cd server
npm install
```

### 2. Configurer les variables d'environnement

Créez un fichier `.env` à la racine du dossier `server/` avec le contenu suivant :

```env
# Clé API OpenAI (obligatoire)
OPENAI_API_KEY=sk-votre-cle-api-ici

# Port du serveur (optionnel, défaut: 3000)
PORT=3000

# Origine autorisée pour CORS
# Pour le développement local: http://localhost:5500
# Pour la production: https://fnmns-occitanie.com
ALLOWED_ORIGIN=https://fnmns-occitanie.com

# Modèle OpenAI par défaut (optionnel)
DEFAULT_MODEL=gpt-3.5-turbo

# Tokens maximum par défaut (optionnel)
DEFAULT_MAX_TOKENS=500

# Température par défaut (optionnel)
DEFAULT_TEMPERATURE=0.7
```

**⚠️ IMPORTANT :** Ne commitez jamais le fichier `.env` dans Git ! Il est déjà dans `.gitignore`.

### 3. Démarrer le serveur

```bash
npm start
```

Ou en mode développement :

```bash
node server.js
```

Le serveur démarre sur le port 3000 (ou le port spécifié dans `.env`).

## 📡 Endpoints

### GET `/api/health`

Vérification que le serveur fonctionne.

**Réponse :**
```json
{
  "status": "ok",
  "message": "Proxy OpenAI fonctionnel",
  "timestamp": "2024-01-01T12:00:00.000Z"
}
```

### POST `/api/chat`

Endpoint principal pour le chatbot.

**Requête :**
```json
{
  "messages": [
    { "role": "system", "content": "Tu es un assistant..." },
    { "role": "user", "content": "Bonjour" }
  ],
  "model": "gpt-3.5-turbo",
  "maxTokens": 500,
  "temperature": 0.7
}
```

**Réponse :**
```json
{
  "text": "Bonjour ! Comment puis-je vous aider ?",
  "links": [
    { "text": "Voir toutes les formations", "url": "https://fnmns-occitanie.com/#formations" }
  ]
}
```

## 🔒 Sécurité

- ✅ Clé API stockée côté serveur uniquement
- ✅ CORS configuré pour autoriser uniquement le domaine du site
- ✅ Validation des requêtes entrantes
- ✅ Gestion d'erreurs sécurisée
- ✅ Variables d'environnement pour la configuration

## 🌐 Configuration du serveur web

### Apache

Ajoutez dans votre fichier `.htaccess` ou configuration Apache :

```apache
ProxyPass /api http://localhost:3000/api
ProxyPassReverse /api http://localhost:3000/api
```

### Nginx

Ajoutez dans votre configuration Nginx :

```nginx
location /api {
    proxy_pass http://localhost:3000;
    proxy_http_version 1.1;
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection 'upgrade';
    proxy_set_header Host $host;
    proxy_cache_bypass $http_upgrade;
}
```

### PM2 (Recommandé pour la production)

Pour faire tourner le serveur en arrière-plan avec redémarrage automatique :

```bash
npm install -g pm2
pm2 start server.js --name fnmns-chatbot-proxy
pm2 save
pm2 startup
```

## 🧪 Test

### Test de santé

```bash
curl http://localhost:3000/api/health
```

### Test du chatbot

```bash
curl -X POST http://localhost:3000/api/chat \
  -H "Content-Type: application/json" \
  -d '{
    "messages": [
      {"role": "user", "content": "Bonjour"}
    ]
  }'
```

## 📝 Logs

Les logs sont affichés dans la console :
- Requêtes entrantes (méthode, chemin, timestamp)
- Erreurs API OpenAI
- Erreurs serveur

## 🔧 Dépannage

### Le serveur ne démarre pas

- Vérifiez que le port 3000 n'est pas déjà utilisé
- Vérifiez que le fichier `.env` existe et contient `OPENAI_API_KEY`
- Vérifiez que les dépendances sont installées : `npm install`

### Erreur CORS

- Vérifiez que `ALLOWED_ORIGIN` dans `.env` correspond au domaine du site
- Pour le développement local, utilisez `http://localhost:5500` (ou le port de votre serveur local)

### Erreur API OpenAI

- Vérifiez que votre clé API est valide
- Vérifiez que vous avez des crédits sur votre compte OpenAI
- Consultez les logs du serveur pour plus de détails

## 📦 Dépendances

- `express` : Framework web Node.js
- `dotenv` : Gestion des variables d'environnement
- `cors` : Gestion CORS
- `node-fetch` : Client HTTP pour les appels API

## 📄 Licence

ISC

