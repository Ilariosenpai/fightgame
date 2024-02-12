<?php

class FightsManager{

    public function createMonster()
    {
        $spawn = rand(1,10);

        if($spawn <= 3){
        
        $monster = new Monster("Démon inférieur", 200);
        return $monster;

        } else if($spawn >= 4 && $spawn < 8){

            $monster = new Monster("Démon intermédiaire", 250);
            return $monster;
        } else if ($spawn >= 8) {

            $monster = new Monster("Merluche le Déchu" , 400);
            return $monster;
        }
    }

   

  
    public function fight($hero, $monster)
    {
        $logfight = [];

        while ($hero->isAlive() && $monster->isAlive()) {
           
            $logfight[] = $monster->hit($hero);

            
            if ($hero->isAlive()) {
                $logfight[] = $hero->hit($monster);
            }
        }

        
        return $logfight;
    }
    
   

   
}








 
