--------------------------------------------
Méthode d'utilisation du pré-processeur SASS
--------------------------------------------

1. En cas de 1ère utilisation, une installation de SASS sur la machine sera nécessaire en tant que variable d'environnement, pour cela, suivre la méthode d'installation sur : https://sass-lang.com/install

2. Une fois SASS installé, toutes les modifications seront à faire directement dans le dossier "app". Le dossier "public" contiendra uniquement le SCSS compilé et minifié en CSS.

3. Une fois dans le dossier "app", pour ce qui touchera aux modifications, le fichier "index.scss" servira uniquement à importer/rassembler les différents fichiers.
Les fichiers de type "_colors" contiendront quant à eux les différentes variables et éléments utilisés en répétition dans le code.
Pour modification des éléments du site, il faudra se rendre dans les dossiers contenant des fichiers (comme layout ou components par exemple). Il est aussi possible de créer un nouveau fichier pour compartimenter correctement le code, il ne faudra pas oublier d'importer celui-ci dans "index.scss".

4. Avant toute modification, il faudra lancer ce code dans un terminal de commande, depuis la racine du thème :
sass --watch css/app/index.scss:css/public/index.css --style compressed

5. Après modification, n'oubliez pas de sauvegarder, si aucune erreur n'est présente, un message de ce type devrait apparaître :
Compiled app\index.scss to public\index.css.

6. Ensuite, transférer les fichiers modifiés ou l'ensemble du dossier vers le FTP pour appliquer les changements au site.