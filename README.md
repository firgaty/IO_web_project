# IO_web_project
Projet de groupe universitaire. Site web dynamique.

## Organiation
L'ensemble des pages accessibles au public sont à la racine.
- __css/__ : dossier contenant toutes les fueilles de style.
- __test/__ : dossier contenant touts les scripts utiles au développement mais retirés par la suite.
- __lib/__ : dossier contenant toutes les bibliothèques de fonctions utilisées par les différentes pages web.
- __image/__ : dossier contenant les images utilises par le site.
- __init/__ : dossier contenant les scripts d'initialisaion du site, notament ceux liés à la création des base de données.

### Dossier test/
Il est à noté qu'à présent seuls deux scripts sont ici répertorié:
- __connexionDB.php__ : Comme on travail majoritairement en local, on a pas les même paramètres de connexion à nos bases de données respectives. Donc, au lieu de devoir commenter les identifiant de l'autre, on  plus qu'à changer une variable au sein de ce script. $DB_USER peut prendre deux valeur: 'Félix' ou 'Pierre'.
```php
$DB_USER = 'pierre' 
/*
* Définit par la suite la variable $connexion avec les 
* identifiants et la base de Pierre.
*/
```
- __testDB.php__: test une grande partie de notre connexion à un BD donnée.
