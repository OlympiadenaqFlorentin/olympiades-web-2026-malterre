# olympiades-web-2026-malterre

# 🏎️ RaceParc

## Présentation du projet

RaceParc est un projet de site internet consacré à l’univers du sport automobile. Il permet aux visiteurs de découvrir un parc dédié à la passion des voitures de course, à travers différentes animations, un musée et un système de billetterie.

L’objectif du site est de présenter les activités du parc, de mettre en valeur l’histoire du sport automobile et de permettre aux visiteurs de préparer leur visite.

Le site contient les pages suivantes :

### 🏠 Accueil

Présentation générale du parc et découverte de son univers.

### 🏁 Animations

Découverte des animations et des activités proposées aux visiteurs, avec des liens vers les pages spécifiques à chaque attraction.

### 🏆 Musée

Présentation d’une collection d’objets liés à l’histoire de l’automobile, comprenant notamment des véhicules, des combinaisons et des trophées.

Plusieurs formules de visite sont proposées :

- **Visite simple :** 17 €
- **Visite guidée :** 22 €
- **Pass VIP :** 30 €

### 🎟️ Billetterie

Accès à la page de billetterie pour consulter les informations relatives aux billets.

### 👤 Connexion

Accès à une page de connexion utilisateur.

## 🛠️ Technologies utilisées

- **HTML5 :** structure des pages web.
- **CSS3 :** mise en forme et design du site.
- **PHP :** utilisé pour certaines pages, notamment celle de connexion.

## 📁 Structure du projet

```text
RaceParc/
│
├── Index.html
├── Style.css
├── BDD.sql
├── README
│
├── Back/
│   ├── Class_User.php
│   ├── PDO.php
│
├── Front/
│   ├── Animation.html
│   ├── Musee.html
│   ├── Billetterie.html
│   ├── Login.php
│   └── Attractions/
│       ├── balade_motors.html
│       ├── Batem.html
│       ├── Flame_Rouge.html
│       └── Rider_Max.html
│
└── illustrations/
    ├── Roue.png
    ├── Musée banière.png
    └── ...
```

## 🚀 Installation et lancement

1. Télécharger ou cloner le projet.
2. Placer les fichiers dans le dossier de son choix.
3. Vérifier que les chemins vers les fichiers CSS et les illustrations sont corrects.
4. Créer la base de données à l’aide du fichier `BDD.sql`.
5. Ouvrir `Index.html` dans un navigateur pour consulter le site.
6. Si les fonctionnalités PHP sont nécessaires, utiliser un serveur web compatible avec PHP.

## 🌐 Fonctionnalités

### Connexion

La fonctionnalité de connexion ne fonctionne pas actuellement. Elle devait me servir de test pour créer un formulaire de connexion, avec l’ajout d’un grade utilisateur. Cependant, les données ne sont pas enregistrées dans la base de données. Le problème semble provenir du constructeur de ma classe `User`.

### Billetterie

La billetterie est statique : elle ne comporte aucun formulaire de paiement.
