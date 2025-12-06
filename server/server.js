/**
 * Proxy serveur sécurisé pour l'API OpenAI
 * Ce serveur fait le pont entre le chatbot frontend et l'API OpenAI
 * en gardant la clé API côté serveur pour la sécurité
 */

require('dotenv').config();
const express = require('express');
const cors = require('cors');
const fetch = require('node-fetch');

const app = express();
const PORT = process.env.PORT || 3000;

// Configuration CORS
const allowedOrigins = process.env.ALLOWED_ORIGIN 
  ? process.env.ALLOWED_ORIGIN.split(',').map(o => o.trim())
  : ['https://fnmns-occitanie.com', 'http://localhost', 'http://127.0.0.1'];

// Ajouter les origines par défaut si elles ne sont pas déjà présentes
if (!allowedOrigins.includes('https://fnmns-occitanie.com')) {
  allowedOrigins.push('https://fnmns-occitanie.com');
}

const corsOptions = {
  origin: function (origin, callback) {
    // Autoriser les requêtes sans origine (Postman, curl, etc.)
    if (!origin) {
      return callback(null, true);
    }
    
    // Vérifier si l'origine est dans la liste autorisée
    if (allowedOrigins.includes(origin)) {
      return callback(null, true);
    }
    
    // En développement, autoriser toutes les origines
    if (process.env.NODE_ENV !== 'production') {
      return callback(null, true);
    }
    
    // Bloquer l'origine
    console.warn(`CORS blocked origin: ${origin}`);
    console.warn(`Allowed origins: ${allowedOrigins.join(', ')}`);
    callback(new Error('Not allowed by CORS'));
  },
  credentials: true,
  methods: ['GET', 'POST', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization']
};

app.use(cors(corsOptions));
app.use(express.json());

// Middleware de logging (optionnel, pour le débogage)
app.use((req, res, next) => {
  console.log(`${new Date().toISOString()} - ${req.method} ${req.path}`);
  next();
});

// Vérifier que la clé API est configurée
if (!process.env.OPENAI_API_KEY) {
  console.error('❌ ERREUR: OPENAI_API_KEY n\'est pas définie dans le fichier .env');
  console.error('   Veuillez créer un fichier .env avec votre clé API OpenAI');
  process.exit(1);
}

// Endpoint de santé (pour vérifier que le serveur fonctionne)
app.get('/api/health', (req, res) => {
  res.json({ 
    status: 'ok', 
    message: 'Proxy OpenAI fonctionnel',
    timestamp: new Date().toISOString()
  });
});

// Endpoint principal pour le chatbot
app.post('/api/chat', async (req, res) => {
  try {
    // Validation de la requête
    const { messages, model, maxTokens, temperature } = req.body;

    if (!messages || !Array.isArray(messages) || messages.length === 0) {
      return res.status(400).json({ 
        error: 'Le champ "messages" est requis et doit être un tableau non vide' 
      });
    }

    // Configuration par défaut
    const openaiModel = model || process.env.DEFAULT_MODEL || 'gpt-3.5-turbo';
    const openaiMaxTokens = maxTokens || parseInt(process.env.DEFAULT_MAX_TOKENS) || 500;
    const openaiTemperature = temperature || parseFloat(process.env.DEFAULT_TEMPERATURE) || 0.7;

    // Validation du format des messages
    const validMessages = messages.every(msg => 
      msg.role && (msg.role === 'system' || msg.role === 'user' || msg.role === 'assistant') && 
      typeof msg.content === 'string'
    );

    if (!validMessages) {
      return res.status(400).json({ 
        error: 'Format de messages invalide. Chaque message doit avoir "role" et "content"' 
      });
    }

    // Appel à l'API OpenAI
    const openaiResponse = await fetch('https://api.openai.com/v1/chat/completions', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${process.env.OPENAI_API_KEY}`
      },
      body: JSON.stringify({
        model: openaiModel,
        messages: messages,
        max_tokens: openaiMaxTokens,
        temperature: openaiTemperature
      })
    });

    // Gestion des erreurs OpenAI
    if (!openaiResponse.ok) {
      const errorData = await openaiResponse.json().catch(() => ({}));
      console.error('Erreur OpenAI API:', openaiResponse.status, errorData);
      
      return res.status(openaiResponse.status).json({
        error: 'Erreur lors de l\'appel à l\'API OpenAI',
        details: errorData.error?.message || 'Erreur inconnue',
        status: openaiResponse.status
      });
    }

    // Récupération de la réponse
    const data = await openaiResponse.json();

    if (!data.choices || !data.choices[0] || !data.choices[0].message) {
      return res.status(500).json({ 
        error: 'Format de réponse OpenAI invalide' 
      });
    }

    // Extraction du texte de la réponse
    const responseText = data.choices[0].message.content.trim();

    // Extraction des liens (fonction simple basée sur les URLs)
    const links = extractLinksFromResponse(responseText);

    // Retour de la réponse au format attendu par le frontend
    res.json({
      text: responseText,
      links: links
    });

  } catch (error) {
    console.error('Erreur serveur:', error);
    res.status(500).json({ 
      error: 'Erreur interne du serveur',
      message: error.message 
    });
  }
});

/**
 * Fonction pour extraire les liens d'une réponse texte
 * Cherche les URLs et les convertit en liens structurés
 */
function extractLinksFromResponse(text) {
  const links = [];
  const urlRegex = /(https?:\/\/[^\s]+)/g;
  const matches = text.match(urlRegex);
  
  if (matches) {
    matches.forEach(url => {
      // Vérifier si c'est un lien vers une formation FNMNS
      if (url.includes('fnmns-occitanie.com')) {
        // Extraire le nom de la formation de l'URL
        const formationMatch = url.match(/fnmns-occitanie\.com\/([^\/]+)/);
        if (formationMatch) {
          const formationName = formationMatch[1].replace(/-/g, ' ').replace(/\//g, '');
          links.push({ 
            text: `En savoir plus sur ${formationName}`, 
            url: url 
          });
        } else {
          links.push({ text: 'En savoir plus', url: url });
        }
      } else if (url.includes('mailto:')) {
        links.push({ text: 'Envoyer un email', url: url });
      } else {
        links.push({ text: 'En savoir plus', url: url });
      }
    });
  }

  // Ajouter des liens contextuels basés sur le contenu
  const lowerText = text.toLowerCase();
  if (lowerText.includes('formation')) {
    links.push({ 
      text: 'Voir toutes les formations', 
      url: 'https://fnmns-occitanie.com/#formations' 
    });
  }
  if (lowerText.includes('contact')) {
    links.push({ 
      text: 'Nous contacter', 
      url: 'mailto:fnmnsoccitanie@gmail.com' 
    });
  }

  return links;
}

// Gestion des erreurs 404
app.use((req, res) => {
  res.status(404).json({ error: 'Endpoint non trouvé' });
});

// Démarrage du serveur
app.listen(PORT, () => {
  console.log('🚀 Proxy OpenAI démarré');
  console.log(`📍 Serveur écoute sur le port ${PORT}`);
  console.log(`🌐 Origines autorisées: ${allowedOrigins.join(', ')}`);
  console.log(`🔑 Clé API configurée: ${process.env.OPENAI_API_KEY ? '✅ Oui' : '❌ Non'}`);
  console.log(`\n💡 Endpoints disponibles:`);
  console.log(`   - GET  /api/health (vérification)`);
  console.log(`   - POST /api/chat (endpoint chatbot)`);
});

