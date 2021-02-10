# Installation
Vous devez d'abord créer remplir le ficher `docker-compose.env` pour configuer la base de donnée

Ainsi que le fichier `config\bdd.ini`

Puis lancer le docker avec `docker-compose up`

Puis initialiser la base de donnée avec `docker-compose exec web php app/setupBDD.php`
