<?php

class Monster{

    private $nom;
    private $vie;
    private $image;

    public function __construct($nom, $vie)
    {
        $this->nom = $nom;
        $this->vie = $vie;
    }

    public function getName()
    {
        return $this->nom;
    }

    public function getVie()
    {
        return $this->vie;
    }

    public function setVie($vie) {

        $this->vie = $vie;
      }

      public function getImage(){

        return $this->image;
    }

      public function isAlive()
    {
        return $this->vie > 0;
    }

   

      public function hit(Hero $hero){

        

        $damage = rand(0,20);
        $heroHealtPoint = $hero-> getVie();
        $hero->setVie($heroHealtPoint - $damage);
    
        return  $this->getName() . " attaque " . $hero->getNom() . " et lui inflige " . $damage . " points de dégâts.";
        
       
       }

}
