<?php


include './config/Autoload.php';
require("./classes/HeroesManager.php");
require("./config/db.php");
require_once './classes/FightsManager.php';
require_once './classes/Monster.php';
$fightManager = new FightsManager();


$monster = $fightManager->createMonster();

$heroesManager = new HeroesManager($db);


$aliveHeroes = $heroesManager->findAllAlive();

if(isset ($_POST['nom']) && isset($_POST['classe']) && !empty ($_POST['nom'])){
    $create = new Hero([
        'nom' => $_POST['nom'], 
       'classe' => $_POST['classe']]);
    $heroesManager->add($create);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Fighter</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
  body {
    font-family: 'Press Start 2P', cursive;
    font-size: 15px;
    background-image: url("./images/e_WvRTzU3h8NRiSkXxtrDzSxL89fFBwXiSA-wTmvSCI.webp");
    background-size: cover;
}

</style>
<script src="script.js" defer></script>
</head>
<body>


<h1>AUTO FIGHTER</h1>


<div class="creator">
<form method="POST">
    <p>
     <input type="text" name="nom" maxlength="50" id="character-name" placeholder="Votre nom" />
      
    </p>

    <select name="classe" id="type">
                            <option value="Guerrier">Guerrier</option>
                            <option value="Mage">Magicien</option>
                            <option value="Assassin">Archer</option>
                            
                        </select>
  
                        

                        <input onclick="processName()" type="submit"   value="Utiliser ce personnage" name="utiliser" id="use-character-button" />

                        </div>

  


 <div id="heroes-container">



<?php foreach ($aliveHeroes as $aliveHero) { ?>


    <div class="card">

    <img src="./images/hakari_dance_by_aximbin_dgffbct-fullview.png">
        <h3><?= $aliveHero->getNom() ?></h3>
        
        <p>Point de vie: <?= $aliveHero->getVie()?></p>
        <p>Attaque: <?= $aliveHero->getAttack() ?></p>
        <p>Classe: <?= $aliveHero->getClasse() ?></p>
        <form></form>
        <form action="fight.php" method="POST">
            <input type="hidden" name="hero_id" value="<?= $aliveHero->getId() ?>">
            <button type="submit"  class="choose-button" > Choisir </button>
        </form>
   
   </div>
    <?php
}
?>
  </form>
</div>  

</body>
</html>