# Trackable - Cahier des charges

## Sommaire
1. Contexte  
2. Objectifs  
3. Fonctionnalités  
4. Technologies  
5. Base de Données (BDD)  
6. Calendrier  
7. Organisation  

---

## Contexte  
Le suivi de colis est une problématique majeure pour de nombreuses grandes entreprises, particulièrement celles dépendant fortement de la logistique. **Trackable** vise à améliorer la perception et la supervision des livraisons à travers une interface web simple et efficace.

---

## Objectifs  
Trackable a pour ambition de :  
- Simplifier la gestion et l’organisation des colis et de leurs incidents quotidiens.  
- Cibler les grandes entreprises opérant avec des ressources externes ou intercontinentales (ex : grandes enseignes de commerce, import-export).  
- Permettre le suivi des camions via Google Maps ou le GPS du véhicule.  

Les objectifs spécifiques sont :  
- Renforcer nos compétences en développement web.  
- Développer nos capacités à travailler en équipe.  
- Créer un site web robuste pour valider nos acquis et enrichir nos portfolios.  

---

## Fonctionnalités  
- **Page d’accueil** :  
  - Header - Inscription/Connexion  
  - Suivi de l’état d’avancement des livreurs  
  - Gestion des commandes  
  - Création d’une livraison  

- **Page d’inscription/connexion**  

- **Page Détails** :  
  - Visualisation des colis  
  - Heures de départ/arrivée (déclarées/estimées)  
  - Déclaration de problèmes  

---

## Technologies  
- **Frontend/Serveur** :  
  - **PHP natif** : langage principal pour le développement backend.  
  - **JavaScript** : utilisé pour les opérations côté client, en complément de PHP.  
  - **HTML/CSS** : pour la structure et le style des pages web.  
- **Backend** :  
  - **MySQL (PHPmyadmin)** : gestion de la base de données.  
  - **Git/GitHub** : gestion de version et collaboration.  
- **API Google Maps** : pour le suivi en temps réel des camions.  

---

## Base de Données (BDD)  

### Table `User`  
| Champ       | Description                              |  
|-------------|------------------------------------------|  
| `id_user`   | Identifiant de l’utilisateur             |  
| `email`     | Adresse email de l’utilisateur           |  
| `password`  | Mot de passe (haché côté serveur)        |  
| `role`      | Rôle (Agent de livraison ou coordinateur)|  

### Table `Colis`  
| Champ         | Description                                    |  
|---------------|------------------------------------------------|  
| `id_colis`    | Identifiant du colis                          |  
| `nom`         | Nom du colis                                  |  
| `date_dep`    | Date et heure de départ                       |  
| `date_arr`    | Date et heure d'arrivée                       |  
| `informations`| Informations sur le colis                    |  
| `problemes`   | Liste des problèmes rencontrés                |  

### Table `Mouvement`  
| Champ       | Description                                     |  
|-------------|-------------------------------------------------|  
| `id_mouv`   | Identifiant du mouvement                       |  
| `colis_id`  | Relie un/des colis à un/des utilisateurs        |  
| `user_id`   | Relie un utilisateur à un/des colis            |  

### Table `Logs`  
| Champ       | Description                                    |  
|-------------|------------------------------------------------|  
| `id`        | Identifiant du log                            |  
| `mouv_id`   | Relie un mouvement pour historiser les actions |  
| `user_id`   | Relie un utilisateur pour historiser les actions|  
| `colis_id`  | Relie un colis pour historiser les actions     |  
| `action`    | Résumé de l’action effectuée                  |  
| `datelog`   | Date et heure de l’action                     |  

---

## Calendrier  
| Date       | Étape                                  |  
|------------|----------------------------------------|  
| 02/12/24   | Cahier des charges (CDC)              |  
| 03/12/24   | Développement (DEV)                   |  
| 04/12/24   | Développement (DEV)                   |  
| 08/01/25   | Présentation du projet                |  

---

## Organisation  
Répartition des tâches et rôles :  

| Nom                | Email                          | Rôle                    |  
|---------------------|-------------------------------|--------------------------|  
| **Ben SHUM**       | ben.shum@efrei.net            | Développeur fullstack   |  
| **Melwan ATBANE**  | melwan.atbane@efrei.net       | Développeur fullstack   |  
| **Mathieu AUDIBERT**| mathieu.audibert@efrei.net    | Développeur fullstack   |  
