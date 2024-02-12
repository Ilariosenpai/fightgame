<?php

class Hero {

    private $id;
    private $nom;
    private $vie;
    private $attack;
    private $classe;
    private $image;

    
    public function __construct(array $data)
    {
    
     
    $this->nom = $data['nom'];
    $this->classe = $data['classe'];
    }
  
  public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
      
        if(method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }



    //getters

    public function getVie()
    {
        return $this->vie;
    }

  
  public function getId()
    {
      return $this->id;
    }
  
  public function getNom()
    {
      return $this->nom;
    }
  
  public function getAttack()
    {
      return $this->attack;
    }
  public function getClasse() : string
    {
      return $this->classe;
    }
    

    //Setters

  
  public function setId($id)
    {
      $id = (int) $id;

      if($id > 0)
      {
        $this->id = $id;
      }
    }
  
  public function setNom($nom)
    {
        $this->nom = $nom;
    }


  public function setAttack($attack)
    {

        $this->attack = $attack;

    }
  public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    public function setVie($vie) {

      $this->vie = $vie;
    }

    public function setImage($image) {

      $this->image = $image;
    }

    public function isAlive()
    {
        return $this->vie > 0;
    }

    


    public function hit(Monster $monster){

      $damage = rand(0,50) + $this->attack;
      $monsterHealtPoint = $monster-> getVie();
      $monster->setVie($monsterHealtPoint - $damage);
  
      return $this->getNom() . " attaque " . $monster->getName() . " et lui inflige " . $damage . " points de dégâts.";
     }
}


