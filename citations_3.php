<?php
// je demande à ce que pour que code fonctionne, 'Proverbes.php' fonctionne bien et je le lie à ma page 'citations_3.php'
require 'Proverbes.php';

/*
1. je vérifie que le bouton a bien été pressé
2. si il a été pressé, j'affecte à la variable '$choix' la valeur associée à 'choix' dans '$_GET' tout en forçant le typage en 'integer'
3. si il n'a pas été pressé, j'affecte une chaine de caractères vide pour que ma structure conditionnelle plus loin dans mon code puisse fonctionner comme désiré
*/
$choix = isset($_GET['choix']) ? (int)$_GET['choix'] : "";

// je crée une nouvelle instance, je base mon nouvel objet '$proverbes' sur la classe 'Proverbes()'
// la varibale '$choix' est passée en tant que paramètre au constructeur de la classe 'Proverbes()'
$proverbes = new Proverbes($choix);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Formulaire - citations</title>

      <style>
        /* style CSS */
        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input, form {
            width: 50%;
        }
        p {
            font-style: italic;
        }
      </style>
</head>

<body>
    <!-- création d'une balise <div></div> pour ajuster le style de la page -->
    <div id="container">
        <!-- balise <h1></h1> dans laquelle j'affiche, selon ce que me retourne ma structure conditionnelle, soit :
        - "Proverbes Japonais" / si la variable '$choix' est une chaine de caractère (d'où la chaine de caractères vide si le bouton n'est pas pressé)
        - "Proverbe Japonais n°" . $choix / si la variable '$choix' est de type 'integer' pour que l'on puisse avoir le numéro du proverbe -->
        <h1><?php echo is_string($choix) ? "Proverbes Japonais" : "Proverbe Japonais n°" . $choix ?></h1>

        <!-- balise <p></p> dans laquelle j'affiche ce que la fonction 'getProverbe()' me retournera -->
        <p id='recupVal'><?php $proverbes->getProverbe(); ?></p>
        <form method='get' action=''>

                <!-- ajout dans 'value=""' de PHP, qui me permet de garder le curseur à l'emplacement du numéro précédemment sélectionné -->
                <input type='range' min='1' max='10' name='choix' onchange='updateTextInput(this.value);' value='<?php echo $choix ?>'>
                <br>
                <input type='submit' value='afficher un proverbe'>
        </form>
        <script>
                //laisser cette instruction js ! Elle permettra d'exécuter le type input lors d'une modification
                function updateTextInput(val) {
                    document.getElementById('recupVal').innerHTML = val;
                }
        </script>
    </div>
</body>

</html>