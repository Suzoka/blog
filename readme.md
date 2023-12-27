# Portfolio de Morgan ZARKA

## Pour installer le site ResaWeb en local:

Installer le site en local :

- Installez XAMPP avec au minimum les modules Apache et MySQL.

- Ouvrez votre XAMPP et activer les serveurs Apache et MySQL.

- Ouvrir le dossier `htdocs`. (Dans XAMPP qui se trouve à la racine de votre disque).

- Déposer dans celui ci le dossier `blog-morgan-zarka` qui contient le code du site ainsi que le fichier de Base de Données.


## Pour installer la Base de Données en Local :

- Dans la barre d'URL de votre navigateur, tapez : [localhost/phpMyAdmin](localhost/phpMyAdmin).

- Créez une nouvelle base de donnée en cliquant sur `Nouvelle base de données`, en haut de la liste de vos bases de deonnées, à gauche de la page.

- Cliquez sur la base de donnée que vous venez de créer.

- Allez dans l'onglet `Importer`.

- Sélectionnez le fichier `blog.sql` qui se trouve dans le dossier `blog-morgan-zarka`.

- Cliquez sur `Importer`, en bas de la page.

- Ouvrez le fichier `connect-database.php`, qui se trouve dans le dossier `script` du site, avec un éditeur de texte quelquonque.

- Modifiez les lignes 2, 3 et 4 avec le nom d'utilisateur phpMyAdmin, le mot de passe de l'utilisateur, et enfin le nom de la base de donnée que vous venez de créer.


## Aller sur le site :

- Allez à l'adresse [localhost/blog-morgan-zarka](localhost/blog-morgan-zarka) dans votre navigateur pour arriver sur le site.

- La page d'accueil du site s'ouvrira.