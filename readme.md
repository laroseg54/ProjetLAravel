Le guide d'installation de notre projet: 
    
    Les commandes à faire : 
    
      git clone git@github.com:laroseg54/ProjetLAravel.git
      composer update
      génerer la clé pour le fichier .env:  php artisan key:generate
      créer la base de données 
      modifier le fichier .env.exemple en .env en modifiant le chemin complet de la base de données
      exécuter la commande php artisan migrate: refresh --seed
      
      Dans le cas ou vous n'avez pas nodejset npm  installé dans votre ordinateur, il faut installer en suivant le lien: https://www.npmjs.com/get-npm
      
      Au niveau de l'authentification en utilisant github, il faut avoir un nom pour votre compte github sinon ça va générer une erreur. 
      
      
     Les parties que nous avons implémentés: 
     
     1- Gestion des commentaires : 
     - Possibilité de placer des commentaires sous des articles.
     - Possibilité de répondre à des commentaires
     - Les admins peuvent modifier et supprimer tous les commentaires
     - Les utilisateurs peuvent modifier et supprimer leurs commentaires (la suppression d'un commentaire entraine la suppression de ses enfants) 
     - Exemple d'URL pour tester les commentaires: http://localhost:8000/articles/1
     - Un autre URL pour voir un commentaire et ses enfants: http://localhost:8000/comments/1
     
     
     2- CRUD des articles: 
     - Les utilisateurs peuvent créer, consulter et modifier leurs articles (et seulement leurs articles pas ceux des autres utilisateurs).
     - Les utilisateurs ont la possibilité aussi supprimer leurs articles.
     - URL pour consulter les articles: http://localhost:8000/articles
     - URL pour créer des articles: http://localhost:8000/articles/create
     - Pour modifier et supprimer les articles : Sur la page des articles, vous cliquez sur le bouton voir mes articles et là vous allez trouver la liste de vos articles crées avec les deux boutons "modifier l'article" et "suuprimer l'article"
     
     
     3- Identification / Authentification pour protéger l'accèes à la création , modification et suppression des articles  : 
     Dans la page des articles, si vous essayez à appuyer sur le bouton ajouter un article vous serez envoyés vers la page de l'autentification / identifcation. 
     -URLs pour tester: http://localhost:8000/login
                        http://localhost:8000/register
     
     4- Ajout de roles utilisateurs: 

     - Ajout de 2 roles : un admin et un user ( consulter la migration create_roles_table)
     - Un utilisateur qui s'enregistre aura le role d'un user (Vous pouvez le vévifier en consultant la base de données)
     - les admins ont accès a un panneau d'administration à partir duquel il peut gérer les utilisateurs(CRUD des utilisateurs) et leurs articles
     - le role user peut gérer uniquement ses articles  , le role admin peut gérer tout les articles (pas fait pour les commentaires)
     - Création de deux middleware pour controler les actions des utilisateurs  ( app\Http\Middleware\canManage.php et app\Http\Middleware\isAdmin.php)
     -URLs pour tester: http://localhost:8000/administration (l'accès sera refusé si vous n'êtes pas admin)

     !! Pour tester le role admin , se connecter en utilsant le nom du dernier utilisateur generé dans la base , le mot de passe est password . Tous les autres utilisateur ont par défaut le role user !!                 
     
     5- Identification avec Google et Github en utilisant Socialite:
     Lorsque l'utilisateur appuie soit sur le bouton "Signin with Github" ou "Signin with Google", il sera directement authentifié vers la page d'acceuil de l'application, pareil dans le cas ou il veut s'enregistrer.
     - URLs pour tester : http://localhost:8000/login
                          http://localhost:8000/register
                          
                          
    6- Intégration graphique en utilisant Sass et Laravel Mix: 
    Création d'un classe personnalisée "mon-container" au niveau de navbar pour le fichier : main.blade.php (Consulter le fichier main.scss) 
    
    
     
  
     
     
     
     
     
      
      
      
      
      
      
      
