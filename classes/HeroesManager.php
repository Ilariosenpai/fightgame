<?php
require_once("./config/db.php");
require("Hero.php");



class HeroesManager{

    private $db;
    private $hero;
    


    public function __construct($db)
    {
      $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
      $this->db = $db;
    }

    public function add(Hero $hero){

        $ajout = $this->db->prepare("INSERT INTO heroes (nom , classe) 
        VALUES (:nom, :classe)");

        $ajout->execute([

            'nom'=> $hero->getNom(),
            'classe'=>$hero->getClasse()
        ]);

        $id = $this->db->lastInsertId();
        $hero->setId($id); 

        header("./index.php");

        
    }


    public function FindAllAlive(){

      $listeheros = $this->db->prepare("SELECT * FROM heroes WHERE vie > 0 ");

      $listeheros->execute();

      $allHeroes = $listeheros->fetchAll();

      $heroes = [];

      foreach ($allHeroes as $hero) {
        $newHero = new Hero($hero);
        $newHero->setId($hero['id']);
        $newHero->setAttack($hero['attack']);
        $newHero->setVie($hero['vie']);
        $heroes[] = $newHero;
      }
     
      return $heroes;
     


    }


    public function find($heroId)
    {
        $query = "SELECT * FROM heroes WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $heroId, PDO::PARAM_INT);
        $statement->execute();

        $heroData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($heroData) {
       
            $hero = new Hero($heroData);

            $hero->setId($heroData['id']);
            $hero->setAttack($heroData['attack']);
            $hero->setVie($heroData['vie']);

            
        

            return $hero;
        }

        return null; 
    }

    public function update($hero){

      $updte = $this->db->prepare("UPDATE heroes SET vie = :vie WHERE id = :id");

      $updte->execute([


        'id' => $hero->getId(),
        'vie' => $hero->getVie()




      ]);



    }
    
}




