<?php

// création d'une classe appelée 'Proverbes'
class Proverbes
{
    /**
     * Tableau contenant tous les proverbes Japonais
     *
     * @var array
     */
    private array $_proverbesJap = [
        "Vous pouvez rester immobile sur le flot des ondes, mais non sur le flot du monde.",
        "La culture, c'est ce qui demeure dans l'homme lorsqu'il a tout oublié.",
        "La mort est à la fois plus grande qu'une montagne et plus petite qu'un cheveu.",
        "La grenouille dans le puits ne voit jamais l'océan.",
        "Celui qui confesse son ignorance la montre une fois ; celui qui essaye de la cacher la montre plusieurs fois.",
        "Même la pensée d’une fourmi peut toucher le ciel.",
        "On ne vide pas l'océan avec un coquillage.",
        "Quand on veut chercher un abri, il faut choisir l'ombre d'un grand arbre.",
        "Aucune route n'est longue aux côtés d'un ami.",
        "Apprend la sagesse dans la sottise des autres."
    ];

    /**
     * Propriété '$_choixAleatoireProverbe' à laquelle est affectée une chaine de caractères vide qui accueillera les outputs de la structure conditionnelle de la fonction 'setProverbe()'
     *
     * @var string
     */
    private string $_choixAleatoireProverbe = "";

    /**
     * Constructeur de la classe
     * Permet de vérifier la variable '$choix'
     */
    public function __construct(int | string $choix)
    {
        $this->setProverbe($choix);
    }

    /**
     * setter (mutateur) : vérification des valeurs associées aux propriétés
     * 
     * @return void
     */
    public function setProverbe(int | string $choix)
    {
        if (is_string($choix)) {
            $this->_choixAleatoireProverbe = "Indiquez un nombre compris entre 1 et 10 !";
        } elseif ($choix < 1 || $choix > count($this->_proverbesJap)) {
            $this->_choixAleatoireProverbe = "Veuillez choisir un numéro disponible.";
        } else {
            $this->_choixAleatoireProverbe = "\"" . $this->_proverbesJap[$choix - 1] . "\"";
        }
    }

    /**
     * getter (accesseur) : affichage la propriété $_choixAleatoireProverbe
     *
     * @return void
     */
    public function getProverbe() : string
    {
        echo $this->_choixAleatoireProverbe;
    }
}

?>